<?php

declare(strict_types=1);

namespace App\Service\Parsing;

use App\Entity\Mastery;
use App\Entity\Skill;
use App\Exception\Mastery\NotFound;
use App\Utils\ParseTrait;
use Doctrine\ORM\EntityManagerInterface;
use stdClass;
use Symfony\Component\HttpKernel\KernelInterface;
use function array_map;
use function explode;
use function in_array;
use function preg_split;
use function reset;
use function sprintf;

class SkillsService
{
    use ParseTrait;

    private static array $characterProperties = [
        'characterLifeModifier', // "+30% жизни",
        'characterStrengthModifier', // "+30% силы",
        'characterTotalSpeedModifier', // "-15% ко всем показателям скорости",
        'characterArmorStrengthReqReduction',  // -8% потребностей доспехов в силе
        'characterShieldStrengthReqReduction', // -8% потребностей щитов в силе
        'characterLifeRegen',                  // +5.0 ед. жизни в секунду восстанавливается
        'characterTotalSpeedModifier',          // +4% ко всем показателям скорости
        'characterDefensiveAbility',    // +25 ед. оборонительной способности
        'characterManaLimitReserve',   // 75 ед. энергии снимается на поддержку умения
        'characterDefensiveBlockRecoveryReduction', // 25% времени восстановления щита
        'characterAttackSpeedModifier', // +5% скорости атаки
        'characterDefensiveAbility', // +31 ед. оборонительной способности
        'characterOffensiveAbility', // +31 ед. наступательной способности
        'characterOffensiveAbilityModifier', // +33% наступательной способности
        'characterDodgePercent', // 3% шанс уклониться от атаки
    ];

    private static array $offensiveProperties = [
        'offensivePhysical', // 26 ед. физического урона
        'offensivePhysicalModifier', // +10% физического урона
        'defensivePhysical', // 3% сопротивление физическому урону
        'defensivePierce', // 3% сопротивление проникающему урону
        'defensiveProtection', // 4 ед. защиты
    ];

    public function __construct(
        private readonly KernelInterface $kernel,
        private readonly EntityManagerInterface $em
    ) {
    }

    public function parse(string $filename): void
    {
        $content = $this->getContentFromFile($this->kernel, $filename);

        $skills = [];
        foreach ($content as $skillItem) {
            $skill = new stdClass();
            $skill->name = $skillItem['name'];
            $skill->original_name = $skillItem['original_name'];
            $skill->tier = $skillItem['tier'];
            $skill->column = $skillItem['column'];
            $skill->type = $skillItem['type'];
            $skill->maximum_level = $skillItem['maximum_level'];
            $skill->cooldown = $skillItem['cooldown'];
            $skill->icon = $skillItem['icon'];
            $skill->tag = $skillItem['tag'];
            $skill->description = $skillItem['description'];

            if (isset($skillItem['parent'])) {
                $skill->parent = $skillItem['parent'];
            }

            if (isset($skillItem['summons'])) {
                $skill->summons = $skillItem['summons'];
            }

            $skillProperties = [];
            $skillLevel = 1;
            foreach ($skillItem['properties'] as $kk => $properties) {
                foreach ($properties as $name => $value) {
                    $skillProperties[$kk]['level'] = $skillLevel;
                    $skillProperties[$kk][$name] = $value;

                    if (($skillItem['type'] === 'Sustained') || ($skillItem['type'] === 'Passive' && !isset($skillItem['parent']))) {
                        if (in_array($name, self::$characterProperties)) {
                            $valueArray = explode(' ', $value);
                            $skillProperties[$kk][$this->generateNewPropertyKey($name)] = reset($valueArray);
                        }

                        if (in_array($name, self::$offensiveProperties)) {
                            $valueArray = explode(' ', $value);
                            $key = 'character_' . $this->generateNewPropertyKey($name);
                            $skillProperties[$kk][$key] = reset($valueArray);
                        }
                    }
                }

                ++$skillLevel;
                $skill->properties = $skillProperties;
            }

            $skills[] = $skill;
        }

        $this->save($skills, $filename);
    }

    private function generateNewPropertyKey(string $key): string
    {
        $parts = preg_split('/(?=[A-Z])/', $key);

        return implode('_', array_map('strtolower', $parts));
    }

    private function save(array $skills, string $slug): void
    {
        $this->em->beginTransaction();

        try {
            $mastery = $this->em->getRepository(Mastery::class)->findOneBy(['slug' => $slug]);

            if (!$mastery) {
                throw new NotFound(sprintf('Mastery with %s does not exist!', $slug));
            }

            foreach ($skills as $skill) {
                $skillItem = new Skill();
                $skillItem->setMastery($mastery);
                $skillItem->setName($skill->name);
                $skillItem->setOriginalName($skill->original_name);
                $skillItem->setTier($skill->tier);
                $skillItem->setColumn($skill->column);
                $skillItem->setType($skill->type);
                $skillItem->setMaximumLevel($skill->maximum_level);
                $skillItem->setCoolDown($skill->cooldown);
                $skillItem->setTag($skill->tag);
                $skillItem->setDescription($skill->description);

                if (isset($skill->parent)) {
                    $skillItem->setParent($skill->parent);
                }

                if (isset($skill->summons)) {
                    $skillItem->setSummons($skill->summons);
                }

                $skillItem->setProperties($skill->properties);

                $this->em->persist($skillItem);
            }

            $this->em->flush();
            $this->em->commit();
        } catch (\Exception $exception) {
            $this->em->rollback();
            throw $exception;
        }
    }
}
