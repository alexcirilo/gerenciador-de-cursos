<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Helper\FlashMessageTrait;
use Alura\Cursos\Infra\EntityManagerCreator;

class Persistencia implements InterfaceControladorRequisicao
{
    use FlashMessageTrait;
    /**
     * @var \Doctrine\ORM\EntityManagerInterface
     */
    private $entityManager;
    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())->getEntityManager();
    }
    public function processaRequisicao(): void
    {
        $curso = new Curso();
        $curso->setDescricao(filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING));
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);


        if (!is_null($id) && $id !== false) {
            $curso->setId($id);
            $this->entityManager->merge($curso);
            
            $this->defineMensagem('success','Curso Editado com Sucesso!');
            header('Location: /listar-cursos');
        } else {
            $this->entityManager->persist($curso);
            
            $this->defineMensagem("success","Curso Salvo com Sucesso");
            header('Location: /listar-cursos');
        }



        
        $this->entityManager->flush();
    }
}