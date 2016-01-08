<?php
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

define("BASE_DIR", __DIR__ . '/../');

include BASE_DIR . 'vendor/autoload.php';

$app = new Silex\Application();

$app['debug'] = true;

/*$app->register(new Silex\Provider\DoctrineServiceProvider(),
    array('db.options' => include sprintf(
            '%s/src/Config/credentials.%s.php', BASE_DIR, APP_NAME
        ))
    );*/

$app->register(new Silex\Provider\ServiceControllerServiceProvider());

$app['projects'] = $app->share(function () use ($app) {
    $client = new GitHubClient();
    $client->setCredentials('','');

    $commits = new Models\Commits($client);
    return new Controllers\Projects($commits);
});

$app->get('/projects/{project}/changelog', 'projects:changelog');






































































$app->run();
