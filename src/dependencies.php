<?php
// DIC configuration


$container = $app->getContainer();

// view renderer
$container['renderer'] = function ($c) {
    $settings = $c->get('settings')['renderer'];
    return new Slim\Views\PhpRenderer($settings['template_path']);
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};

$container['telegram'] = function ($c) {
    $settings = $c->get('settings')['telegram'];
    $telegram = new \Telegram\Bot\Api($settings['access_token']);
    return $telegram;
};

$container['capsule'] = function ($c) {
    $capsule = new \Illuminate\Database\Capsule\Manager;
    $capsule->addConnection($c['settings']['db']);
    $capsule->bootEloquent();

    $resolver = new \Illuminate\Database\ConnectionResolver();
    $resolver->addConnection('default', $capsule->getConnection('default'));
    $resolver->setDefaultConnection('default');
    \Illuminate\Database\Eloquent\Model::setConnectionResolver($resolver);
    return $capsule;
};