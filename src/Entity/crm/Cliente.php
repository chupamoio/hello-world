<?php

namespace App\Entity\crm;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ClienteRepository")
 */
class Cliente
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
    
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nome;
    
    public function getId()
    {
        return $this->id;
    }
    
    public function getNome(): ?string
    {
        return $this->nome;
    }
    
    public function setNome(string $nome): self
    {
        $this->nome = $nome;
        
        return $this;
    }
}
