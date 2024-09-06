<?php
namespace App\Back\Controller;
use App\Back\Model\User;
class Usercontroller{

    public function getUsers(){
        return[
            ['nome'=>'eux', 'idade'=>15],
            ['nome'=>'tu', 'idade'=>16],
        ];
    }

    public function insertUsers($data){
        //+5 
        $user = new User();
        $idade = $data['idade'];
        $idade += 5;
        $user->setNome($data['nome']);
        $user->setIdade($idade);
        return ['nome'=> $user->getNome(), 'idade'=> $user->getIdade()];
       
    }
    public function updateUsers($data){
        //+5 
        $user = new User();
        $idade = $data['idade'];
        $idade += 5;
        $user->setNome($data['nome']);
        $user->setIdade($idade);
        return ['nome'=> $user->getNome(), 'idade'=> $user->getIdade()];
        
    }
    public function deleteUsers($data){
        //-5 
        $user = new User();
        $idade = $data['idade'];
        $idade = $idade - 5;
        $user->setNome($data['nome']);
        $user->setIdade($idade); 
        return ['nome'=> $data['nome'], 'idade'=> $idade];
        
    }
}