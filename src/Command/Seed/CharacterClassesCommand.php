<?php

declare(strict_types=1);

namespace App\Command\Seed;

use App\Entity\CharacterClass;
use App\Entity\Mastery;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:seed-classes',
    description: 'Flush character classes data',
)]
class CharacterClassesCommand extends Command
{
    public function __construct(
        private EntityManagerInterface $entityManager
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $masters = $this->entityManager->getRepository(Mastery::class)->findAll();

        $classes = self::getClassesData();

        $characterClasses = [];
        foreach ($masters as $mastery) {
            if (!key_exists($mastery->getSlug(), $classes)) {
                continue;
            }

            $class = $classes[$mastery->getSlug()];
            $masteryClasses = [];
            foreach ($masters as $mastery2) {
                if (!key_exists($mastery2->getSlug(), $class)) {
                    continue;
                }

                $masteryClasses['mastery_id'] = $mastery;
                $masteryClasses['additional_mastery_id'] = $mastery2;
                $masteryClasses['name'] = $class[$mastery2->getSlug()];

                $characterClasses[] = $masteryClasses;
            }
        }

        $alreadySavedClasses = [];

        $this->truncateTable();

        foreach ($characterClasses as $characterClass) {
            if (in_array($characterClass['name'], $alreadySavedClasses)) {
                continue;
            }

            $class = new CharacterClass();
            $class->setMastery($characterClass['mastery_id']);
            $class->setAdditionalMastery($characterClass['additional_mastery_id']);
            $class->setName($characterClass['name']);

            $this->entityManager->persist($class);

            $alreadySavedClasses[] = $characterClass['name'];
        }

        $this->entityManager->flush();

        return Command::SUCCESS;
    }

    private static function getClassesData(): array
    {
        return [
            'storm' => [
                'storm' => 'Хозяин бурь',
                'dream' => 'Пророк',
                'spirit' => 'Оракул',
                'defense' => 'Паладин',
                'earth' => 'Хозяин стихий',
                'hunting' => 'Мудрец',
                'nature' => 'Друид',
                'warfare' => 'Тан',
                'rune' => 'Громовержец',
                'rogue' => 'Ведун',
            ],
            'dream' => [
                'dream' => 'Провидец',
                'spirit' => 'Ворожей',
                'storm' => 'Пророк',
                'defense' => 'Храмовник',
                'earth' => 'Пробудитель',
                'hunting' => 'Гаруспик',
                'nature' => 'Обрядник',
                'warfare' => 'Предвестник',
                'rune' => 'Сейд-маг',
                'rogue' => 'Призрак',
            ],
            'rune' => [
                'dream' => 'Сейд-маг',
                'spirit' => 'Шаман',
                'storm' => 'Громовержец',
                'defense' => 'Рунный кузнец',
                'earth' => 'Говорящий с камнями',
                'hunting' => 'Охотник на драконов',
                'nature' => 'Оборотень',
                'warfare' => 'Берсерк',
                'rune' => 'Мастер рун',
                'rogue' => 'Пройдоха',
            ],
            'spirit' => [
                'dream' => 'Ворожей',
                'spirit' => 'Маг',
                'storm' => 'Оракул',
                'defense' => 'Властитель душ',
                'earth' => 'Заклинатель',
                'hunting' => 'Шаман',
                'nature' => 'Прорицатель',
                'warfare' => 'Охотник на ведьм',
                'rune' => 'Шаман',
                'rogue' => 'Варлок',
            ],
            'rogue' => [
                'dream' => 'Призрак',
                'spirit' => 'Варлок',
                'storm' => 'Ведун',
                'defense' => 'Корсар',
                'earth' => 'Волшебник',
                'hunting' => 'Разбойник',
                'nature' => 'Иллюзионист',
                'warfare' => 'Ассасин',
                'rune' => 'Пройдоха',
                'rogue' => 'Тень',
            ],
            'nature' => [
                'dream' => 'Обрядник',
                'spirit' => 'Прорицатель',
                'storm' => 'Друид',
                'defense' => 'Страж',
                'earth' => 'Колдун',
                'hunting' => 'Рейнджер',
                'nature' => 'Странник',
                'warfare' => 'Поборник',
                'rune' => 'Оборотень',
                'rogue' => 'Иллюзионист',
            ],
            'hunting' => [
                'dream' => 'Гаруспик',
                'spirit' => 'Шаман',
                'storm' => 'Мудрец',
                'defense' => 'Служитель',
                'earth' => 'Мститель',
                'hunting' => 'Охотник',
                'nature' => 'Рейнджер',
                'warfare' => 'Убийца',
                'rune' => 'Охотник на драконов',
                'rogue' => 'Разбойник',
            ],
            'warfare' => [
                'dream' => 'Предвестник',
                'spirit' => 'Охотник на ведьм',
                'storm' => 'Тан',
                'defense' => 'Завоеватель',
                'earth' => 'Боевой маг',
                'hunting' => 'Убийца',
                'nature' => 'Поборник',
                'warfare' => 'Воин',
                'rune' => 'Берсерк',
                'rogue' => 'Ассасин',
            ],
            'earth' => [
                'dream' => 'Пробудитель',
                'spirit' => 'Заклинатель',
                'storm' => 'Хозяин стихий',
                'defense' => 'Джаггернаут',
                'earth' => 'Пиромант',
                'hunting' => 'Мститель',
                'nature' => 'Колдун',
                'warfare' => 'Боевой маг',
                'rune' => 'Говорящий с камнями',
                'rogue' => 'Волшебник',
            ],
            'defense' => [
                'dream' => 'Храмовник',
                'spirit' => 'Властитель душ',
                'storm' => 'Паладин',
                'defense' => 'Защитник',
                'earth' => 'Джаггернаут',
                'hunting' => 'Служитель',
                'nature' => 'Страж',
                'warfare' => 'Завоеватель',
                'rune' => 'Рунный кузнец',
                'rogue' => 'Корсар',
            ],
        ];
    }

    private function truncateTable()
    {
        $connection = $this->entityManager->getConnection();
        $platform = $connection->getDatabasePlatform();

        $connection->executeStatement($platform->getTruncateTableSQL('character_classes', true));
    }
}
