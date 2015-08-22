<?php
require 'vendor/autoload.php';

require 'cliente.php';
// require 'dao/ClienteDAO.php';
// require 'dao/EstabelecimentoDAO.php';
// require 'model/Cliente.php';
// require 'model/Estabelecimento.php';

$app = new \Slim\Slim();

$app->get('/clientes/:cpf', function ($cpf) {
  //recupera o cliente
  $cliente = Cliente::getClienteByCPF($cpf);
  echo json_encode($cliente);
});

$app->put('/clientes/:id', function ($id) {
  // recupera o request
  $request = \Slim\Slim::getInstance()->request();

  // atualiza o cliente
  $cliente = json_decode($request->getBody());
  $cliente = Cliente::updateCliente($cliente, $id);

   echo json_encode($cliente);
});



$app->get('/estabelecimentos', function () {
  $estabelecimentos = EstabelecimentoDAO::getAll();
  echo json_decode($estabelecimentos);
});

$app->get('/estabelecimentos/:cnpj', function ($cnpj) {
  $estabelecimento = EstabelecimentoDAO::getByCNPJ($cnpj);
  echo json_decode($estabelecimento);
});

$app->put('/estabelecimentos/:id', function ($id) {
  $estabelecimento = EstabelecimentoDAO::getById($id);
  $estabelecimentoAtualizado = json_decode(CORPOOOOOOO);
});

$app->run();
