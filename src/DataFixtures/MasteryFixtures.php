<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Mastery;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MasteryFixtures extends Fixture
{
    use MasteryPropertiesTrait;

    public function load(ObjectManager $manager): void
    {
        foreach ($this->getData() as $item) {
            $mastery = new Mastery();
            $mastery->setName($item['name']);
            $mastery->setSlug($item['slug']);
            $mastery->setTag($item['tag']);
            $mastery->setImage($item['image']);
            $mastery->setDescription($item['description']);
            $mastery->setProperties($item['properties']);
            $manager->persist($mastery);
        }

        $manager->flush();
    }

    private function getData(): array
    {
        return [
            [
                'name' => 'Сила Грёз',
                'slug' => 'dream',
                'tag' => 'xtagSkillDreamName001',
                'image' => 'dream.png',
                'description' => 'Преврати свой разум в оружие, и используй силу мира грёз для подчинения реальности своей воле.',
                'properties' => $this->getDreamProperties(),
            ],
            [
                'name' => 'Рунное мастерство',
                'slug' => 'rune',
                'tag' => 'x2tagSkillRunesName001',
                'image' => 'rune.png',
                'description' => 'Изучите тайны рун и используйте их, чтобы черпать волшебную мощь во время боя.',
                'properties' => $this->getRuneProperties(),
            ],
            [
                'name' => 'Силы воздуха',
                'slug' => 'storm',
                'tag' => 'tagSkillName018',
                'image' => 'storm.png',
                'description' => 'Герой обретает ясность мыслей и внутреннюю сосредоточенность, необходимые для того, чтобы освободиться от земных забот и научиться управлять погодой.',
                'properties' => $this->getStormProperties(),
            ],
            [
                'name' => 'Силы духа',
                'slug' => 'spirit',
                'tag' => 'tagSkillName030',
                'image' => 'spirit.png',
                'description' => 'Герой получает магические знания и тренированный ум, необходимые для изучения тёмного искусства управления духами.',
                'properties' => $this->getSpiritProperties(),
            ],
            [
                'name' => 'Теневое ремесло',
                'slug' => 'rogue',
                'tag' => 'tagSkillName050',
                'image' => 'rogue.png',
                'description' => 'Герой получает тайные знания, необходимые для развития теневых навыков.',
                'properties' => $this->getRogueProperties(),
            ],
            [
                'name' => 'Силы леса',
                'slug' => 'nature',
                'tag' => 'tagSkillName065',
                'image' => 'nature.png',
                'description' => 'Дарует герою внутреннюю гармонию и терпение, необходимые для понимания языка диких животных и управления тайными силами леса.',
                'properties' => $this->getNatureProperties(),
            ],
            [
                'name' => 'Искусство охоты',
                'slug' => 'hunting',
                'tag' => 'tagSkillName076',
                'image' => 'hunting.png',
                'description' => 'Наделяет героя инстинктами и ловкостью хищника, необходимыми для овладения искусством охоты.',
                'properties' => $this->getHuntingProperties(),
            ],
            [
                'name' => 'Боевое искусство',
                'slug' => 'warfare',
                'tag' => 'tagSkillName001',
                'image' => 'warfare.png',
                'description' => 'Тренировки и физические упражнения дают герою возможность овладеть воинскими умениями.',
                'properties' => $this->getWarfareProperties(),
            ],
            [
                'name' => 'Силы земли',
                'slug' => 'earth',
                'tag' => 'tagSkillName098',
                'image' => 'earth.png',
                'description' => 'Древние ритуалы тренировки разума и духа помогают герою получить силу от самой Земли и обрести власть над камнем и огнём.',
                'properties' => $this->getEarthProperties(),
            ],
            [
                'name' => 'Искусство защиты',
                'slug' => 'defense',
                'tag' => 'tagSkillName116',
                'image' => 'defense.png',
                'description' => 'Даёт герою крепкое телосложение и силу, необходимые для овладения навыками защиты себя и союзников.',
                'properties' => $this->getDefenseProperties(),
            ],
        ];
    }
}
