<?php

$header = <<<EOF

EOF;

$finder = PhpCsFixer\Finder::create()
    ->files()
    ->name('*.php')
    ->exclude('Fixtures')
    ->in(__DIR__ . '/src')
    ->in(__DIR__ . '/tests');

$config = new PhpCsFixer\Config();
return $config->setRules([
    '@PSR12' => true,
    'strict_param' => true,
    'array_syntax' => ['syntax' => 'short'],
    'binary_operator_spaces' => ['default' => null],
    'blank_line_before_statement' => ['statements' => ['continue', 'declare', 'return', 'throw', 'try']],
    'cast_spaces' => ['space' => 'single'],
    'header_comment' => ['header' => $header],
    'include' => true,
    'class_attributes_separation' => array('elements' => array('method' => 'one', 'trait_import' => 'none')),
    'no_blank_lines_after_class_opening' => true,
    'no_blank_lines_after_phpdoc' => true,
    'no_empty_statement' => true,
    'no_extra_blank_lines' => true,
    'no_leading_import_slash' => true,
    'no_leading_namespace_whitespace' => true,
    'no_superfluous_phpdoc_tags' => ['allow_mixed' => true],
    'no_trailing_comma_in_singleline_array' => true,
    'no_unused_imports' => true,
    'no_whitespace_in_blank_line' => true,
    'object_operator_without_whitespace' => true,
    'phpdoc_align' => true,
    'phpdoc_indent' => true,
    'phpdoc_no_access' => true,
    'phpdoc_no_package' => true,
    'phpdoc_order' => true,
    'phpdoc_trim' => true,
    'psr_autoloading' => ['dir' => 'src'],
    'declare_strict_types' => true,
    'single_blank_line_before_namespace' => true,
    'standardize_not_equals' => true,
    'ternary_operator_spaces' => true,
    'trailing_comma_in_multiline' => true,
])
    ->setFinder($finder);
