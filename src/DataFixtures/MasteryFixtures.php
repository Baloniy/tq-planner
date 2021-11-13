<?php

declare(strict_types=1);

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Mastery;

class MasteryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        foreach ($this->getData() as $item) {
            $mastery = new Mastery();
            $mastery->setName($item['name']);
            $mastery->setTag($item['tag']);
            $mastery->setImage($item['image']);
            $mastery->setDescription($item['description']);

            $manager->persist($mastery);
        }

        $manager->flush();
    }

    private function getData(): array
    {
        return [
            [
                'name' => 'Сила Грёз',
                'tag' => 'xtagSkillDreamName001',
                'image' => 'dream.png',
                'description' => 'Преврати свой разум в оружие, и используй силу мира грёз для подчинения реальности своей воле.'
            ],
            [
                'name' => 'Рунное мастерство',
                'tag' => 'x2tagSkillRunesName001',
                'image' => 'rune.png',
                'description' => 'Изучите тайны рун и используйте их, чтобы черпать волшебную мощь во время боя.'
            ],
            [
                'name' => 'Силы воздуха',
                'tag' => 'tagSkillName018',
                'image' => 'storm.png',
                'description' => 'Герой обретает ясность мыслей и внутреннюю сосредоточенность, необходимые для того, чтобы освободиться от земных забот и научиться управлять погодой.'
            ],
            [
                'name' => 'Силы духа',
                'tag' => 'tagSkillName030',
                'image' => 'spirit.png',
                'description' => 'Герой получает магические знания и тренированный ум, необходимые для изучения тёмного искусства управления духами.'
            ],
            [
                'name' => 'Теневое ремесло',
                'tag' => 'tagSkillName050',
                'image' => 'rogue.png',
                'description' => 'Герой получает тайные знания, необходимые для развития теневых навыков.'
            ],
            [
                'name' => 'Силы леса',
                'tag' => 'tagSkillName065',
                'image' => 'nature.png',
                'description' => 'Дарует герою внутреннюю гармонию и терпение, необходимые для понимания языка диких животных и управления тайными силами леса.'
            ],
            [
                'name' => 'Искусство охоты',
                'tag' => 'tagSkillName076',
                'image' => 'hunting.png',
                'description' => 'Наделяет героя инстинктами и ловкостью хищника, необходимыми для овладения искусством охоты.'
            ],
            [
                'name' => 'Боевое искусство',
                'tag' => 'tagSkillName001',
                'image' => 'warfare.png',
                'description' => 'Тренировки и физические упражнения дают герою возможность овладеть воинскими умениями.'
            ],
            [
                'name' => 'Силы земли',
                'tag' => 'tagSkillName098',
                'image' => 'earth.png',
                'description' => 'Древние ритуалы тренировки разума и духа помогают герою получить силу от самой Земли и обрести власть над камнем и огнём.'
            ],
            [
                'name' => 'Искусство защиты',
                'tag' => 'tagSkillName116',
                'image' => 'defense.png',
                'description' => 'Даёт герою крепкое телосложение и силу, необходимые для овладения навыками защиты себя и союзников.'
            ]
        ];
    }
}
