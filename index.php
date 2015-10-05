<?php
require 'Slim/Slim.php';
Slim\Slim::registerAutoloader();

require 'clienteDAO.php';
require "cidadesDAO.php";
require "dividasDAO.php";
require "estabelecimentoDAO.php";
require "estadosDAO.php";

$app = new \Slim\Slim();
//$app->response()->header('Content-Type', 'application/json;charset=utf-8');

/* estabelecimentos */
$app->get('/estabelecimentos/:id', function ($id) {
    echo json_encode(estabelecimentoDAO::getById($id));
});

$app->get('/estabelecimentos/', function () {
    echo json_encode(estabelecimentoDAO::getAll());
});

$app->delete("/delestab/:id/", function ($id) {
    echo json_encode(estabelecimentoDAO::delete($id));
});

$app->post("/addestab/", function () {
  global $app;

  $body = $app->request->getBody();

  $output;
  parse_str($body, $output);

  $object = json_decode(json_encode($output));

  echo json_encode(estabelecimentoDAO::add($object));
});
/* end estabelecimentos */

/* cidades */
$app->get("/cidades/:id", function ($id) {
  echo json_encode(cidadesDAO::getById($id));
});

$app->get("/cidades/", function () {
  echo json_encode(cidadesDAO::getAll());
});

$app->delete("/delcity/:id", function ($id) {
  echo json_encode(cidadesDAO::delete($id));
});

$app->post("/addcity/", function () {
  global $app;

  $body = $app->request->getBody();

  $output;
  parse_str($body, $output);

  $object = json_decode(json_encode($output));

  echo json_encode(cidadesDAO::add($object));
});
/* end cidades */

/* estados */
$app->get("/estados/:id", function ($id) {
  echo json_encode(estadosDAO::getById($id));
});

$app->get("/estados/", function () {
  echo json_encode(estadosDAO::getAll());
});

$app->delete("/delestado/:id", function ($id) {
  echo json_encode(estadosDAO::delete($id));
});

$app->post("/addestado/", function () {
  global $app;

  $body = $app->request->getBody();

  $output;
  parse_str($body, $output);

  $object = json_decode(json_encode($output));

  echo json_encode(estadosDAO::add($object));
});
/* end estados */

/* dividas */
$app->get("/dividas/:id", function ($id) {
  echo json_encode(dividasDAO::getById($id));
});

$app->get("/dividas/", function () {
  echo json_encode(dividasDAO::getAll());
});

$app->delete("/deldivi/:id", function ($id) {
  echo json_encode(dividasDAO::delete($id));
});

$app->post("/adddivi/", function () {
  global $app;

  $body = $app->request->getBody();

  $output;
  parse_str($body, $output);

  $object = json_decode(json_encode($output));

  echo json_encode(dividasDAO::add($object));
});
/* end dividas */

/* clientes */
$app->get('/clientes/:cpf', function ($cpf) {
  //recupera o cliente
  $cliente = ClienteDAO::getClienteByCPF($cpf);
  echo json_encode($cliente);
});

$app->get('/clientes', function() {
  // recupera todos os clientes
  $clientes = ClienteDAO::getAll();
  echo json_encode($clientes);
});

$app->post('/clientes', function() {
  // recupera o request
  $request = \Slim\Slim::getInstance()->request();

  // insere o cliente
  $novoCliente = json_decode($request->getBody());
  $novoCliente = ClienteDAO::addCliente($novoCliente);

  echo json_encode($novoCliente);
});

$app->put('/clientes/:id', function ($id) {
  // recupera o request
  $request = \Slim\Slim::getInstance()->request();

  // atualiza o cliente
  $cliente = json_decode($request->getBody());
  $cliente = ClienteDAO::updateCliente($cliente, $id);

   echo json_encode($cliente);
});

$app->delete('/clientes/:id', function($id) {
  // exclui o cliente
  $isDeleted = ClienteDAO::deleteCliente($id);

  // verifica se houve problema na exclusão
  if ($isDeleted) {
    echo "{'message':'Produto excluído'}";
  } else {
    echo "{'message':'Erro ao excluir produto'}";
  }
});
/* end clients */

$app->run();
