<?php

session_start();

include "../validacao/funcoesValidacao.php";
include "../alert/alerta.php";
include "../validacao/busca.php";
 

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>

    <style>
        #textoBusca {
            text-wrap: nowrap;
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
                        <a class="nav-link active text-white fw-semibold fs-5" aria-current="page" href="../Pagina/index.php">Cadastrar
                            tarefa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-semibold fs-5" href="../Pagina/listaTarefa.php">listar Tarefa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-white fw-semibold fs-5" aria-current="page" href="../Pagina/BuscarTarefa.php">Buscar Tarefa</a>
                    </li>
                </ul>
            </div>
        </nav>



        <div class="container mt-5">
            <label for="Buscar_tarefa">
                <h2 class="text-primary fw-semibold">Buscar Tarefas</h2>
            </label>
        </div>

        <?php if (VerificaoMetodoGet()) : ?>

            <form action="BuscarTarefa.php" method="get">
                <div class="container mt-5">
                    <div class="col d-flex align-items-center">
                        <input type="text" class="form-control me-2 w-75" id="Buscar_Tarefa" name="Buscar_Tarefa" autocomplete="on">
                        <button type="submit" class="btn btn-primary w-25">BUSCAR TAREFA</button>
                    </div>
                </div>
            </form>

        <?php endif; ?>

        <div class="container mt-5">
            <?php if (!empty($result) && $Total_Encontros_Tarefa > 0) : ?>
                <p class="fw-normal fs-2">Foram encontrado(s) <span class="fw-bold"><?php echo $Total_Encontros_Tarefa ?> registros</span> com a palavra-chave <span class="fw-bold">"<?php echo $tarefaBuscada ?>"</span></p>
            <?php endif; ?>
            <?php if (isset($tarefaBuscada) && strlen($tarefaBuscada) < 3) : ?>
                <div class="alert alert-danger">
                    <strong>Ops!!!</strong>
                    <span>você precisa informar ao menos 3 caracteres para realizar uma busca</span>
                </div>
            <?php endif; ?>
            <?php if (isset($tarefaBuscada) && empty($tarefaBuscada)) : ?>
                <div class="alert alert-warning">
                    <strong>Ops!!!</strong>
                    <span>Não foram encontrados registros com a palavra-chave <span class="fw-bold">"<?php echo $tarefaBuscada ?>"</span></span>
                </div>
            <?php endif; ?>



            <table class="table">
                <thead>
                    <tr class="table-primary">
                        <th class="col ">#</th>
                        <th scope="col">Tarefa</th>
                        <th scope="col">Data</th>
                        <th scope="col">Ação</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php if(!empty($result)): ?>
                    <?php while ($row = $result->fetch_assoc()) : ?>
                        <tr class="table-success">
                            <th><?php echo $row["Id"]; ?></th>
                            <td><?php echo  $row["titulo"]; ?></td>
                            <td><?php echo  date('d/m/Y', strtotime($row["datas"])); ?></td>
                            <td>
                                <a href="../validacao/delete.php?id=<?php echo $row['Id']; ?>" class="btn btn-danger link-light link-underline link-underline-opacity-0">Excluir</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                    <?php endif; ?>

                </tbody>
            </table>


        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>