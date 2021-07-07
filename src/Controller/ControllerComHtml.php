<?php

namespace Alura\Cursos\Controller;

abstract class ControllerComHtml
{
    public function renderizaHtml(string $caminhoTemplate, array $dados): string
    {
        extract($dados); //extrai de array os dados 
        ob_start(); //inicialização de buffer de saída.
        
        require __DIR__ . '/../../view/' . $caminhoTemplate;

        $html = ob_get_clean(); // retorna o conteúdo e limpa o buffer.

        return $html;

    }
}
