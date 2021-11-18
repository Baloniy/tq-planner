<?php

declare(strict_types=1);

namespace App\DataFixtures;

trait MasteryPropertiesTrait
{
    private function getDreamProperties(): array
    {
        return [
            (object)[
                "level" => 1,
                "intelligence" => 2, // +2 ед. интеллекта"
                "life" => 35, // +35 ед. жизни
                "mana" => 8, // +8 ед. энергии
                "strength" => 2 // +2 ед. силы
            ],
            (object)["level" => 2, "intelligence" => 4, "life" => 70, "mana" => 16, "strength" => 4],
            (object)["level" => 3, "intelligence" => 5, "life" => 105, "mana" => 24, "strength" => 6],
            (object)["level" => 4, "intelligence" => 7, "life" => 140, "mana" => 32, "strength" => 8],
            (object)["level" => 5, "intelligence" => 9, "life" => 175, "mana" => 40, "strength" => 10],
            (object)["level" => 6, "intelligence" => 10, "life" => 210, "mana" => 48, "strength" => 12],
            (object)["level" => 7, "intelligence" => 12, "life" => 245, "mana" => 56, "strength" => 14],
            (object)["level" => 8, "intelligence" => 14, "life" => 280, "mana" => 64, "strength" => 16],
            (object)["level" => 9, "intelligence" => 16, "life" => 315, "mana" => 72, "strength" => 18],
            (object)["level" => 10, "intelligence" => 18, "life" => 350, "mana" => 80, "strength" => 20],
            (object)["level" => 11, "intelligence" => 19, "life" => 385, "mana" => 88, "strength" => 22],
            (object)["level" => 12, "intelligence" => 21, "life" => 420, "mana" => 96, "strength" => 24],
            (object)["level" => 13, "intelligence" => 23, "life" => 455, "mana" => 104, "strength" => 26],
            (object)["level" => 14, "intelligence" => 24, "life" => 490, "mana" => 112, "strength" => 28],
            (object)["level" => 15, "intelligence" => 26, "life" => 525, "mana" => 120, "strength" => 30],
            (object)["level" => 16, "intelligence" => 28, "life" => 560, "mana" => 128, "strength" => 32],
            (object)["level" => 17, "intelligence" => 30, "life" => 595, "mana" => 136, "strength" => 34],
            (object)["level" => 18, "intelligence" => 32, "life" => 630, "mana" => 144, "strength" => 36],
            (object)["level" => 19, "intelligence" => 33, "life" => 665, "mana" => 152, "strength" => 38],
            (object)["level" => 20, "intelligence" => 35, "life" => 700, "mana" => 160, "strength" => 40],
            (object)["level" => 21, "intelligence" => 37, "life" => 735, "mana" => 168, "strength" => 42],
            (object)["level" => 22, "intelligence" => 38, "life" => 770, "mana" => 176, "strength" => 44],
            (object)["level" => 23, "intelligence" => 40, "life" => 805, "mana" => 184, "strength" => 46],
            (object)["level" => 24, "intelligence" => 42, "life" => 840, "mana" => 192, "strength" => 48],
            (object)["level" => 25, "intelligence" => 44, "life" => 875, "mana" => 200, "strength" => 50],
            (object)["level" => 26, "intelligence" => 46, "life" => 910, "mana" => 208, "strength" => 52],
            (object)["level" => 27, "intelligence" => 47, "life" => 945, "mana" => 216, "strength" => 54],
            (object)["level" => 28, "intelligence" => 49, "life" => 980, "mana" => 224, "strength" => 56],
            (object)["level" => 29, "intelligence" => 51, "life" => 1015, "mana" => 232, "strength" => 58],
            (object)["level" => 30, "intelligence" => 52, "life" => 1050, "mana" => 240, "strength" => 60],
            (object)["level" => 31, "intelligence" => 54, "life" => 1085, "mana" => 248, "strength" => 62],
            (object)["level" => 32, "intelligence" => 56, "life" => 1120, "mana" => 256, "strength" => 64],
            (object)["level" => 33, "intelligence" => 58, "life" => 1155, "mana" => 264, "strength" => 66],
            (object)["level" => 34, "intelligence" => 60, "life" => 1190, "mana" => 272, "strength" => 68],
            (object)["level" => 35, "intelligence" => 61, "life" => 1225, "mana" => 280, "strength" => 70],
            (object)["level" => 36, "intelligence" => 63, "life" => 1260, "mana" => 288, "strength" => 72],
            (object)["level" => 37, "intelligence" => 65, "life" => 1295, "mana" => 296, "strength" => 74],
            (object)["level" => 38, "intelligence" => 66, "life" => 1330, "mana" => 304, "strength" => 76],
            (object)["level" => 39, "intelligence" => 68, "life" => 1365, "mana" => 312, "strength" => 78],
            (object)["level" => 40, "intelligence" => 70, "life" => 1400, "mana" => 320, "strength" => 80],
        ];
    }

    private function getDefenseProperties(): array
    {
        return [
            (object)[
                "level" => 1,
                "dexterity" => 2, // +2 ед. ловкости
                "life" => 50, // +50 ед. жизни
                "strength"=> 2 // +2 ед. силы
            ],
            (object)["level" => 2, "dexterity"=> 4, "life"=> 100, "strength"=> 3],
            (object)["level" => 3, "dexterity"=> 6, "life"=> 150, "strength"=> 4],
            (object)["level" => 4, "dexterity"=> 8, "life"=> 200, "strength"=> 6],
            (object)["level" => 5, "dexterity"=> 10, "life"=> 250, "strength"=> 8],
            (object)["level" => 6, "dexterity"=> 12, "life"=> 300, "strength"=> 9],
            (object)["level" => 7, "dexterity"=> 14, "life"=> 350, "strength"=> 10],
            (object)["level" => 8, "dexterity"=> 16, "life"=> 400, "strength"=> 12],
            (object)["level" => 9, "dexterity"=> 18, "life"=> 450, "strength"=> 14],
            (object)["level" => 10, "dexterity"=> 20, "life"=> 500, "strength"=> 15],
            (object)["level" => 11, "dexterity"=> 22, "life"=> 550, "strength"=> 16],
            (object)["level" => 12, "dexterity"=> 24, "life"=> 600, "strength"=> 18],
            (object)["level" => 13, "dexterity"=> 26, "life"=> 650, "strength"=> 20],
            (object)["level" => 14, "dexterity"=> 28, "life"=> 700, "strength"=> 21],
            (object)["level" => 15, "dexterity"=> 30, "life"=> 750, "strength"=> 22],
            (object)["level" => 16, "dexterity"=> 32, "life"=> 800, "strength"=> 24],
            (object)["level" => 17, "dexterity"=> 34, "life"=> 850, "strength"=> 26],
            (object)["level" => 18, "dexterity"=> 36, "life"=> 900, "strength"=> 27],
            (object)["level" => 19, "dexterity"=> 38, "life"=> 950, "strength"=> 28],
            (object)["level" => 20, "dexterity"=> 40, "life"=> 1000, "strength"=> 30],
            (object)["level" => 21, "dexterity"=> 42, "life"=> 1050, "strength"=> 32],
            (object)["level" => 22, "dexterity"=> 44, "life"=> 1100, "strength"=> 33],
            (object)["level" => 23, "dexterity"=> 46, "life"=> 1150, "strength"=> 34],
            (object)["level" => 24, "dexterity"=> 48, "life"=> 1200, "strength"=> 36],
            (object)["level" => 25, "dexterity"=> 50, "life"=> 1250, "strength"=> 38],
            (object)["level" => 26, "dexterity"=> 52, "life"=> 1300, "strength"=> 39],
            (object)["level" => 27, "dexterity"=> 54, "life"=> 1350, "strength"=> 40],
            (object)["level" => 28, "dexterity"=> 56, "life"=> 1400, "strength"=> 42],
            (object)["level" => 29, "dexterity"=> 58, "life"=> 1450, "strength"=> 44],
            (object)["level" => 30, "dexterity"=> 60, "life"=> 1500, "strength"=> 45],
            (object)["level" => 31, "dexterity"=> 62, "life"=> 1550, "strength"=> 46],
            (object)["level" => 32, "dexterity"=> 64, "life"=> 1600, "strength"=> 48],
            (object)["level" => 33, "dexterity"=> 66, "life"=> 1650, "strength"=> 50],
            (object)["level" => 34, "dexterity"=> 68, "life"=> 1700, "strength"=>51],
            (object)["level" => 35, "dexterity"=> 70, "life"=> 1750, "strength"=> 52],
            (object)["level" => 36, "dexterity"=> 72, "life"=> 1800, "strength"=> 54],
            (object)["level" => 37, "dexterity"=> 74, "life"=> 1850, "strength"=> 56],
            (object)["level" => 38, "dexterity"=> 76, "life"=> 1900, "strength"=> 57],
            (object)["level" => 39, "dexterity"=> 78, "life"=> 1950, "strength"=> 58],
            (object)["level" => 40, "dexterity"=> 80, "life"=> 2000, "strength"=> 60],
        ];
    }

    private function getWarfareProperties(): array
    {
        return [
            (object)[
                "level" => 1,
                "dexterity" => 2, // 2 ед. ловкости
                "life" => 40, // +40 ед. жизни
                "strength" => 2 // 2 ед. силы
            ],
            (object)["level" => 2, "dexterity" => 4, "life" => 80, "strength" => 4],
            (object)["level" => 3, "dexterity" => 6, "life" => 120, "strength" => 6],
            (object)["level" => 4, "dexterity" => 8, "life" => 160, "strength" => 8],
            (object)["level" => 5, "dexterity" => 10, "life" => 200, "strength" => 10],
            (object)["level" => 6, "dexterity" => 12, "life" => 240, "strength" => 12],
            (object)["level" => 7, "dexterity" => 14, "life" => 280, "strength" => 14],
            (object)["level" => 8, "dexterity" => 16, "life" => 320, "strength" => 16],
            (object)["level" => 9, "dexterity" => 18, "life" => 360, "strength" => 18],
            (object)["level" => 10, "dexterity" => 20, "life" => 400, "strength" => 20],
            (object)["level" => 11, "dexterity" => 22, "life" => 440, "strength" => 22],
            (object)["level" => 12, "dexterity" => 24, "life" => 480, "strength" => 24],
            (object)["level" => 13, "dexterity" => 26, "life" => 520, "strength" => 26],
            (object)["level" => 14, "dexterity" => 28, "life" => 560, "strength" => 28],
            (object)["level" => 15, "dexterity" => 30, "life" => 600, "strength" => 30],
            (object)["level" => 16, "dexterity" => 32, "life" => 640, "strength" => 32],
            (object)["level" => 17, "dexterity" => 34, "life" => 680, "strength" => 34],
            (object)["level" => 18, "dexterity" => 36, "life" => 720, "strength" => 36],
            (object)["level" => 19, "dexterity" => 38, "life" => 760, "strength" => 38],
            (object)["level" => 20, "dexterity" => 40, "life" => 800, "strength" => 40],
            (object)["level" => 21, "dexterity" => 42, "life" => 840, "strength" => 42],
            (object)["level" => 22, "dexterity" => 44, "life" => 880, "strength" => 44],
            (object)["level" => 23, "dexterity" => 46, "life" => 920, "strength" => 46],
            (object)["level" => 24, "dexterity" => 48, "life" => 960, "strength" => 48],
            (object)["level" => 25, "dexterity" => 50, "life" => 1000, "strength" => 50],
            (object)["level" => 26, "dexterity" => 52, "life" => 1040, "strength" => 52],
            (object)["level" => 27, "dexterity" => 54, "life" => 1080, "strength" => 54],
            (object)["level" => 28, "dexterity" => 56, "life" => 1120, "strength" => 56],
            (object)["level" => 29, "dexterity" => 58, "life" => 1160, "strength" => 58],
            (object)["level" => 30, "dexterity" => 60, "life" => 1200, "strength" => 60],
            (object)["level" => 31, "dexterity" => 62, "life" => 1240, "strength" => 62],
            (object)["level" => 32, "dexterity" => 64, "life" => 1280, "strength" => 64],
            (object)["level" => 33, "dexterity" => 66, "life" => 1320, "strength" => 66],
            (object)["level" => 34, "dexterity" => 68, "life" => 1360, "strength" => 68],
            (object)["level" => 35, "dexterity" => 70, "life" => 1400, "strength" => 70],
            (object)["level" => 36, "dexterity" => 72, "life" => 1440, "strength" => 72],
            (object)["level" => 37, "dexterity" => 74, "life" => 1480, "strength" => 74],
            (object)["level" => 38, "dexterity" => 76, "life" => 1520, "strength" => 76],
            (object)["level" => 39, "dexterity" => 78, "life" => 1560, "strength" => 78],
            (object)["level" => 40, "dexterity" => 80, "life" => 1600, "strength" => 80]
        ];
    }

    private function getEarthProperties(): array
    {
        return [];
    }

    private function getHuntingProperties(): array
    {
        return [];
    }

    private function getNatureProperties(): array
    {
        return [];
    }

    private function getRogueProperties(): array
    {
        return [];
    }

    private function getRuneProperties(): array
    {
        return [];
    }

    private function getSpiritProperties(): array
    {
        return [];
    }

    private function getStormProperties(): array
    {
        return [];
    }
}