<?php

session_start();

include "./validacao/funcoesValidacao.php";
include "./alerta/alerta.php";

$erroTitulo = '';
$erroData = '';
$sucessoValidação = '';


if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $DataTarefa = $_POST['Data_Tarefa'];
  $TituloTarefa = $_POST['Titulo_Tarefa'];

  $listaSalva = false;
  $DataValida = true;
  $TituloValido = true;

   if (!ValidacaoData($DataTarefa)) {
     $erroData = 'ERRO: O campo "data" não foi informado corretamente!!!';
   }

  if (!ValidacaoTitulo($TituloTarefa)) {
    $erroTitulo = 'ERRO: O campo "Titulo" não foi informado corretamente!!!';
  }


  if (ValidacaoData($DataTarefa) && ValidacaoTitulo($TituloTarefa)) {
    $sucessoValidação = "Tarefa cadastrada com sucesso";
  }

  // if (!empty($DataTarefa)) {
  //   $DataAtual = date('Y-m-d');
  //   $DataTarefaFormatada =  date('Y-m-d', strtotime($DataTarefa));
  //   if ($DataTarefaFormatada < $DataAtual) {
  //     $DataValida = false;
  //     $erroData = 'Erro: O campo "DATA" não foi preenchido corretamente';
  //   }
  // } else {
  //   $DataValida = false;
  //   $erroData = 'ERRO: O campo data não foi informado corretamente!!!';
  // }


  // if (empty($TituloTarefa) || strlen($TituloTarefa) < 5) {
  //   $TituloValido = false;
  //   $erroTitulo = 'ERRO: O campo "Titulo" não foi informado corretamente';
  // }

}

?>


<!DOCTYPE html>
<html lang="pt-Br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Document</title>

  <style>
    body,
    html {
      height: 100%;
      margin: 0;
    }
  </style>

</head>

<body>

  <div class="container-fluid p-0">

    <nav class="navbar navbar-expand-lg bg-primary">
      <div class="container-fluid">
        <Span class="text-white font fw-semibold me-auto fs-5">ToDo list</Span>
        <ul class="navbar-nav mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active text-white fw-semibold fs-5" aria-current="page" href="index.php">Cadastrar
              tarefa</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white fw-semibold fs-5" href="listarTarefa.html">listar Tarefa</a>
          </li>
        </ul>
      </div>
    </nav>


    <div class="card border-0 mt-5 mx-4">
      <div class="card-header border-0 bg-white">
        <span class="text-primary fw-semibold fs-4">Nova Tarefa</span>
      </div>
      <div class="card-body">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
          <div class="mb-4">
            <?php if (!empty(exibirAlertaErro($erroTitulo))) : ?>
              <div class="alert alert-danger">
                <strong>Erro!</strong><br>
                <?php echo exibirAlertaErro($erroTitulo); ?>
              </div>
            <?php endif; ?>
            <label for="Titulo_Tarefa" class="form-label fw-semibold">Título da Tarefa</label>
            <input type="text" class="form-control" id="Titulo_Tarefa" name="Titulo_Tarefa" placeholder="Ex.:comprar leite">
          </div>
          <div class="mb-4">
          <?php if (!empty(exibirAlertaErro($erroData))) : ?>
              <div class="alert alert-danger">
                <strong>Erro!</strong><br>
                <?php echo exibirAlertaErro($erroData); ?>
              </div>
            <?php endif; ?>
            <label for="Data_Tarefa" class="form-label fw-semibold">Data da Tarefa</label>
            <input type="date" class="form-control" id="Data_Tarefa" name="Data_Tarefa" placeholder="Ex.:13/06/2024">
          </div>
          <button class="btn btn-primary" type="submit">Cadastrar Tarefa</button>
      </div>
      </form>

    </div>


  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>