<?php
namespace App\Domain\Model;

class User {
    public function getUserData() {
        // Aqui você interagiria com o banco de dados para buscar dados do usuário
        return ['nome' => 'João', 'idade' => 30];
    }
}
