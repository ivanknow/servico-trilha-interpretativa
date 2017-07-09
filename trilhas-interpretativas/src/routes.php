<?php
// Routes
use Psr\Http\Message\ResponseInterface;
use TrilhasInterpretativas\Mediator\TrailMediator;

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
    return $response->withJson($data);
});
$app->post('/trail/', function ($request, $response, $args) {
    $mediator = new TrailMediator();
    $trail = Trail::construct($request->getParsedBody());
    
   /* $data = $mediator->insert($request->getAttribute('id'));
    return $response->withJson($data);*/
});

$app->post('/trail/{id}/point/', function ($request, $response, $args) {
    $mediator = new PointMediator();
    $point = new Point();
    
   /* $data = $mediator->insert($request->getAttribute('id'));
    return $response->withJson($data);*/
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



