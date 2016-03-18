<?php
return [
    'color' => null,
    //'interactive' => true,
    'sourcePath' => __DIR__. DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR,
    'messagePath' => __DIR__. DIRECTORY_SEPARATOR . '..'.DIRECTORY_SEPARATOR.'messages',
    'languages' => ['de-DE'],
    'translator' => 'Yii::t',
    'sort' => false,
    'overwrite' => true,
    'removeUnused' => false,
    'markUnused' => true,
    'except' => [
        '.svn',
        '.git',
        '.gitignore',
        '.gitkeep',
        '.hgignore',
        '.hgkeep',
        '/messages',
        'vendor',
        'environments',
        'tests',
        '/BaseYii.php',
    ],
    'only' => [
        '*.php',
    ],
    'format' => 'php',
    //'db' => 'db',
    //'sourceMessageTable' => '{{%source_message}}',
    //'messageTable' => '{{%message}}',
    //'catalog' => 'messages',
    //'ignoreCategories' => [],
];