<?php

include __DIR__ . '/../vendor/autoload.php';

use GuzzleHttp\Client;
use Silex\Application;
use Silex\Provider\TwigServiceProvider;
use Symfony\Component\HttpFoundation\Request;

$app = new Application([
    'debug'       => true,
    'ioServer'    => '//localhost:8888',
    'wsConnector' => 'http://127.0.0.1:26300'
]);

$app->register(new TwigServiceProvider(), [
    'twig.path' => __DIR__ . '/../views',
]);

$app['http.client'] = new Client();

$app->get("/{channel}", function (Application $app, $channel) {
    return $app['twig']->render('index.twig', [
        'channel'  => $channel,
        'ioServer' => $app['ioServer']
    ]);
});

$app->post("/{channel}", function (Application $app, $channel, Request $request) {
    $app['http.client']->get($app['wsConnector'] . "/info/{$channel}/" . json_encode($request->getContent()));

    return $app->json('OK');
});

$app->run();