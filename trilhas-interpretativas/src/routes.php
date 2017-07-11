<?php
// Routes
use Psr\Http\Message\ResponseInterface;
use TrilhasInterpretativas\Mediator\TrailMediator;
use TrilhasInterpretativas\Mediator\PointMediator;
use TrilhasInterpretativas\Entity\Trail;
use TrilhasInterpretativas\Entity\Point;

$app->get('/demo/[{name}]', function ($request, $response, $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});

$app->get('/trailmock', function ($request, $response, $args) {
    $mediator = new TrailMediator();
    $data = $mediator->getMock(0);
    return $response->withJson($data->toArray());
});

$app->get('/trail/[{id}]', function ($request, $response, $args) {
    $mediator = new TrailMediator();
    $data = $mediator->get($request->getAttribute('id'));
    if(is_array($data)){
      $dataReturn = array();
      foreach ( $data as $obj ) {
				$dataReturn [] = $obj->toArray();
			}
      return $response->withJson($dataReturn);
    }else{
      if($data!=null)
      return $response->withJson($data->toArray());
      else {
      return $response->withJson(array());
      }
    }


});
$app->post('/trail/', function ($request, $response, $args) {
    $mediator = new TrailMediator();
    $param = json_decode($request->getBody(),true);
    //print_r($param) ;
    $trail = Trail::construct($param);

    $data = $mediator->insert($trail);
    return $response->withJson($data);
});

$app->post('/trail/{id}/point/', function ($request, $response, $args) {
    $mediator = new PointMediator();
    $param = json_decode($request->getBody(),true);
    $point = Point::construct($param);
  //$tm = new TrailMediator();
    //$trail = $tm->get($request->getAttribute('id'));
    $trail = new Trail($request->getAttribute('id'));
    $point->setTrail($trail);

    $data = $mediator->insert($point);
    return $response->withJson($data);
});

$app->get('/{name}', function ($request, $response, $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    $name = $request->getAttribute('name');
    $response->getBody()->write("Hello, $name");

    return $response;
});

$app->get('/', function ($request, $response, $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    $response->getBody()->write("Hello");

    return $response;
});
