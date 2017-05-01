<?php

require __DIR__.'/../public/env.php';

$config = require(__DIR__.'/../src/settings.php');

$config['settings']['db']['name'] = $config['settings']['db']['database'];
$config['settings']['db']['user'] = $config['settings']['db']['username'];
$config['settings']['db']['pass'] = $config['settings']['db']['password'];
$config['settings']['db']['adapter'] = 'mysql';

return [
    'paths' => [
        'migrations' => __DIR__
    ],
    'migration_base_class' => '\App\Migration\Migration',
    'environments' => [
        'default_migration_table' => 'phinxlog',
        'default_database' => 'prod',
        'prod' => $config['settings']['db']
    ]
];;