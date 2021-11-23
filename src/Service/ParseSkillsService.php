<?php

declare(strict_types=1);

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\KernelInterface;
use stdClass;

class ParseSkillsService
{
    private static array $characterProperties = [
        'characterLifeModifier',// "+30% жизни",
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
        'defensiveProtection', //4 ед. защиты
    ];

    public function __construct(
        private KernelInterface $kernel,
        private EntityManagerInterface $em
    ) {}

    public function parse(string $filename): void
    {
        $content = $this->getFileContent($filename);


        $skills = [];
        foreach ($content as $skillItem) {
            $skill = new stdClass();
            $skill->name = $skillItem['name'];
            $skill->tier = $skillItem['tier'];
            $skill->type = $skillItem['type'];
            $skill->maximum_level = $skillItem['maximum_level'];
            $skill->cooldown = $skillItem['cooldown'];
            $skill->icon = $skillItem['icon'];
            $skill->tag = $skillItem['tag'];
            $skill->description = $skillItem['description'];

            if (isset($skillItem['parent'])) {
                $skill->parent = $skillItem['parent'];
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
                            $key = 'character_'.$this->generateNewPropertyKey($name);
                            $skillProperties[$kk][$key] = reset($valueArray);
                        }
                    }
                }

                $skillLevel++;
                $skill->properties = $skillProperties;
            }

            $skills[] = $skill;
        }

        dd($skills);
    }

    private function getFileContent(string $filename): array
    {
        $projectDir = $this->kernel->getProjectDir();
        $masteryUrl = $projectDir.DIRECTORY_SEPARATOR."assets/data".DIRECTORY_SEPARATOR.$filename;

        if (!file_exists($masteryUrl)) {
            throw new NotFoundHttpException("File $filename does not exist!\n");
        }

        return json_decode(file_get_contents($masteryUrl), true);
    }

    private function generateNewPropertyKey(string $key): string
    {
        $parts = preg_split("/(?=[A-Z])/", $key);

        return implode('_', array_map('strtolower',$parts));
    }

    private function save(array $data)
    {
        $this->em->beginTransaction();

        try {

        } catch (\Exception $exception) {
            throw ;
        }
        foreach ($data as $item) {

        }
    }
}