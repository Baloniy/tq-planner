<?php

declare(strict_types=1);

$finder = PhpCsFixer\Finder::create()
    ->exclude(['vendor', 'var'])
    ->in(__DIR__);

return (new PhpCsFixer\Config())
    ->setRules([
        '@Symfony' => true,
        '@PSR12' => true,
        'array_syntax' => ['syntax' => 'short'],
        'single_line_throw' => false,
        'yoda_style' => [
            'equal' => false,
            'identical' => false,
            'less_and_greater' => false,
        ],
        'trailing_comma_in_multiline' => true,
        'single_trait_insert_per_statement' => false,
        'concat_space' => ['spacing' => 'one'],
        'array_indentation' => true,
        'types_spaces' => ['space' => 'single'],
    ])
    ->setFinder($finder);
