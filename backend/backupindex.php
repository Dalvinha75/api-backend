<?php
namespace App\Back;
require '../vendor/autoload.php';

 $methodo = $_SERVER['REQUEST_METHOD'];
 $uri = $_SERVER['REQUEST_URI'];

 if ($methodo === 'GET' && $uri === '/') {
    http_response_code(200);
    echo json_encode(
        ['status'=> true, 'message' => 'chegou com sucesso']
    );
    // {
    //     "nome": "eu"
    //     "idade": 18 (colocar no postman)
    // }
 }elseif ($methodo === 'POST' && $uri === '/'){
    $input = json_decode(file_get_contents('php://input'), true);
    http_response_code(201);
    echo json_encode(
        ['mensage' => 'Usuário criado', 'user' => $input]
    );
 }elseif ($methodo === 'PUT' && preg_match('/\/api.php\/users\/(\d+)/', $uri, $matches)){
    $id = $matches[1];
    $input = json_decode(file_get_contents('php://input'), true);
    $users[$id] = $input;
    http_response_code(200);
    echo json_encode(
        ['status' => true, 'message ' => 'Usuário atualizado', 'users' => $input]
    );
 }elseif ($methodo === 'DELETE' &&  preg_match ('/\/api.php\/users\/(\d)/',$uri,$matches)){
    $id = $matches[1];
    unset($users[$id]);
    http_response_code(204);
    echo json_encode(
        ['status' => true, 'message' => 'Usuário deletado']
    );

}
