<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\EquipmentType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EquipmentTypeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $equipmentTypes = [
            'ArmorJewelry_Amulet' => 'Ожерелье',
            'ArmorJewelry_Ring' => 'Кольцо',
            'ArmorProtective_Forearm' => 'Руки',
            'ArmorProtective_Head' => 'Голова',
            'ArmorProtective_LowerBody' => 'Ноги',
            'ArmorProtective_UpperBody' => 'Торс',
            'ItemArtifact' => 'Артефакт',
            'ItemArtifactFormula' => 'Формула',
            'ItemCharm' => 'Амулет',
            'ItemRelic' => 'Реликвия',
            'OneShot_Scroll' => 'Свиток',
            'WeaponArmor_Shield' => 'Щит',
            'WeaponHunting_Bow' => 'Лук',
            'WeaponHunting_RangedOneHand' => 'Метательная',
            'WeaponHunting_Spear' => 'Копьё',
            'WeaponMagical_Staff' => 'Посох',
            'WeaponMelee_Axe' => 'Топор',
            'WeaponMelee_Mace' => 'Палица',
            'WeaponMelee_Sword' => 'Меч',
        ];

        foreach ($equipmentTypes as $tag => $name) {
            $equipmentType = new EquipmentType(
                name: $name,
                tag: $tag
            );

            $manager->persist($equipmentType);
        }
        $manager->flush();
    }
}
