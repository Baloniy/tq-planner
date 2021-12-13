<?php

$finder = (new PhpCsFixer\Finder())
    ->in(__DIR__)
    ->exclude('var')
;

return (new PhpCsFixer\Config())
    ->setRules([
        '@Symfony' => true,
        'array_syntax' => ['syntax' => 'short'],
        'single_line_throw' => false,
        'yoda_style' => false,
        'single_trait_insert_per_statement' => false,
        'concat_space' => false,
    ])
    ->setFinder($finder)
;
