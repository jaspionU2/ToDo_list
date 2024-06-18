<?php

function ValidacaoTitulo($valor)
{
  return !empty($valor) && strlen($valor) > 5;
}

function ValidacaoData($data)
{
  if (!empty($data)) {
    $DataAtual = date('Y-m-d');
    $DataTarefaFormatada =  date('Y-m-d', strtotime($data));
    if ($DataTarefaFormatada < $DataAtual) {
      return false;
    }
    return true;
  } else {
    return  false;
  }
}

function VerificaoMetodoGet()
{
  return $_SERVER['REQUEST_METHOD'] == 'GET';
}

function VerificaoMetodoPost()
{
  return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function ValidacaoBusca($busca, $tarefas)
{
  if (!empty($busca) && strlen($busca) > 0) {
    $TarefasFiltradas = [];
    $buscaLowerCase = strtolower($busca);

    foreach ($tarefas as $tarefa) {
      if (str_contains(strtolower($tarefa['tarefa']), $buscaLowerCase)) {
        $TarefasFiltradas[] = $tarefa;
      }
    }

    return $TarefasFiltradas;

  }else{

    return [];
  }

}
