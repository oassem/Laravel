<?php

/**
 * Author : Ahmed Mohamed Abd El Ftah
 *
 * Twitter : @amaelftah
 *
 * Github: https://github.com/amaelftah
 */

/**
 * Config for PHP-CS-Fixer ver2 , it's inspired from old laravel php-cs fixer
 * https://github.com/laravel/framework/blob/5.3/.php_cs
 *
 * and also inspired from
 * https://gist.github.com/isuzuki/5fd0177993cca7a5fd15ad09be27d706
 *
 * and also inspired from Spatie Company
 *
 * you can check each rule explanation from here
 * https://mlocati.github.io/php-cs-fixer-configurator/
 */

$rules = [
    '@PSR2' => true,
    'array_syntax' => ['syntax' => 'short'],
    'no_short_echo_tag' => true,
    'no_unused_imports' => true,
    'ordered_imports' => ['sortAlgorithm' => 'alpha'],
    'method_chaining_indentation' => true,
    'class_attributes_separation' => true,
    'no_leading_namespace_whitespace' => true,
    'array_indentation' => true,
    'single_blank_line_before_namespace' => true,
    'function_typehint_space' => true,
    'no_empty_comment' => true,
    'no_empty_statement' => true,
    'ternary_operator_spaces' => true,
    'trailing_comma_in_multiline_array' => true,
    'multiline_whitespace_before_semicolons' => true,
];

$excludes = [
    'vendor',
    'node_modules',
];

return PhpCsFixer\Config::create()
    ->setRules($rules)
    ->setFinder(
        PhpCsFixer\Finder::create()
            ->in(__DIR__)
            ->exclude($excludes)
            ->notName('README.md')
            ->notName('*.xml')
            ->notName('*.yml')
            ->notPath('bootstrap/cache')
            ->notPath('storage/*')
            ->notPath('nova')
            ->notPath('database/migrations')
            ->notPath('vendor')
            ->name('*.php')
            ->ignoreDotFiles(true)
            ->ignoreVCS(true)
    );
