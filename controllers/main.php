<?php
use \Slim\Savant;

$app->get('/', function() use($app) {
  return Savant\render('index');
});

$app->get('/map', function() use($app) {
  return Savant\render('map');
});

$app->map('/map/img', function() use($app) {
  $params = $app->request()->params();
  $app->response['Content-type'] = 'image/png';
  $assetPath = dirname(__FILE__) . '/../p3k/map/images';
  $map = p3k\geo\StaticMap\generate($params, null, $assetPath);
})->via('GET','POST');
