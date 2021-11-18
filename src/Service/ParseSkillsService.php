<?php

declare(strict_types=1);

namespace App\Service;

class ParseSkillsService
{

    public function parse()
    {
        $projectDir = $this->kernel->getProjectDir();
        $masteryUrl = $projectDir.DIRECTORY_SEPARATOR."assets/data".DIRECTORY_SEPARATOR.$filename;

        $content = json_decode(file_get_contents($masteryUrl), true);
        dd($content);
    }
}