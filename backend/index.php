<?php
namespace App\Back;
require '../vendor/autoload.php';
use App\Back\Controller\UserController;

$methodo = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

switch($methodo){
    case 'GET':
        switch($uri){
            case '/users':
                $users = new UserController();
                $resposta = $users->getUsers();
                if($resposta){
                    http_response_code(200);
                    echo json_encode(
                        ['status'=> true, 'message'=> 'Recebido com sucesso', 'Usuários' =>$resposta]);
                }else{
                    http_response_code(200);
                    echo json_encode(
                        ['status'=> true, 'message'=> 'Recebido com sucesso', 'Ususários' =>[]]);

                }
        
        break;
            
        case '/produtos':
            http_response_code(200);
            echo json_encode(['status'=> true, 'message'=> 'Recebido com sucesso', 'uri' => $uri]);
            break;
            default:
            echo json_encode(['URI inválido']);
            break;
        }

    case 'POST':
        switch($uri){
            case '/users':
                $data = json_decode(file_get_contents('php://input'), true);
                $users = new UserController();
                $resposta = $users->insertUsers($data);
                http_response_code(200);
                echo json_encode(['status'=> true, 'message'=> 'Recebido com sucesso', 'dados' =>$data]);
                break;
            case '/produtos':
                $data = json_decode(file_get_contents('php://input)'), true);
                break;
            defaut:
            echo json_encode(["URI inválido"]);
        }
        break;
    case 'PUT':
        case '/produtos':
            
            if(preg_match('/\/users\/(\d+)/', $uri, $match)){
            $id = $match[1];
            $data = json_decode(file_get_contents('php://input'), true);
            http_response_code(200);
            echo json_encode(['status'=> true, 'message'=> 'Recebido com sucesso', 'dados' =>$data]);
        }
        break;
    case 'DELETE':
        if(preg_match('/\/users\/(\d+)/', $uri, $match)){
        $users = new UserController();
        $resposta = $users->deleteUsers(
            ['nome' => 'Joao', 'idade' => 17]
        );

        $id = $match[1];
        // $data = json_decode(file_get_contents('php://input'), true);
        http_response_code(200);
        echo json_encode(['status'=> true, 'message'=> 'Recebido com sucesso', 'res' =>$resposta]);
    }
        break;
            
    default:
    echo json_encode(["Método inválido"]);

}
