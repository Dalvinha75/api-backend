<?php
namespace App\Back;
require '../vendor/autoload.php';

 $methodo = $_SERVER['REQUEST_METHOD'];
 $uri = $_SERVER['REQUEST_URI'];

 switch ($methodo) {
    case 'GET':
        if($uri == '/'){
            http_response_code(200);
            echo json_decode(
            ['status'=> true, 'message' => 'chegou com sucesso']);
        }        
    break;
    case 'POST':
        if ($uri == '/'){
            http_response_code(201);
            echo json_decode( 
            ['mensage' => 'Usuário criado', 'user' => $input]);
        }
    break;
    case 'PUT':
        if(preg_match ('/\/api.php\/users\/(\d)/',$uri,$matches)){
            $id = $matches[1];
            $input = json_decode(file_get_contents('php://input'), true);
            $users[$id] = $input;
            http_response_code(200);
            echo json_decode(
            ['status'=> true, 'message' => 'Usuário atualizado', 'users' => $input]);
        }
        break;
    case 'DELETE':
        if(preg_match ('/\/api.php\/users\/(\d)/',$uri,$matches));{   
            $id = $matches[1];
            unset($users[$id]);
            http_response_code(204);
            echo json_encode(
            ['status' => true, 'message' => 'Usuário deletado']);
        }
        break;
    
 }