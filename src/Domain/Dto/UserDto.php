<?php 
namespace App\Domain\Dto;

// use Symfony\Component\Validator\Constraints as Assert;

class UserDto {

    public function __construct(
        private int $id, 
        private string $nome, 
        private string $email
    ) {  }

    public function getArray()
    {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'email' => $this->email
        ];
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
}
