<?php

function exibirAlertaSucesso($mensagem)
{
    if (!empty($mensagem)) {
       return $mensagem;
    }
    return '';

}

function exibirAlertaErro($mensagem)
{
    if (!empty($mensagem)) {
      return $mensagem;
    }
      return '';

}

?>
