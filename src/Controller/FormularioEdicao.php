<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Infra\EntityManagerCreator;
use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Helper\RenderizadorDeHtmlTrait;

class FormularioEdicao  implements InterfaceControladorRequisicao
{
    use RenderizadorDeHtmlTrait;

    /**
     * @var \Doctrine\Common\Persistence\ObjectRepository
     */
    private $repositorioDeCursos;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())
            ->getEntityManager();
        $this->repositorioDeCursos = $entityManager
            ->getRepository(Curso::class);
    }
    public function processaRequisicao(): void
    {
        $id = filter_input(
            INPUT_GET,
            'id',
            FILTER_VALIDATE_INT
        );

        if (is_null($id) || $id === false) {
            header('Location: /listar-cursos');
        }

        $curso = $this->repositorioDeCursos->find($id);
        echo $this->renderizaHtml('cursos/formulario.php',[
            'curso' => $curso,
            'titulo'=> 'Editar Curso: ' .$curso->getDescricao()
        ]);
    }
}
