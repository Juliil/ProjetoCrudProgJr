<?php
include_once 'professores.php';
include_once '../public/Cabecalho.php';

$arProfessor = (new Professor())->recuperarDados();
?>

    <h1 class="text-center">Professores</h1>
    <a class="btn btn-primary" href=formulario.php>Novo Professor</a>
    <table class="table table-bordered table-hover table-striped table-condensed">
        <tr>
            <td style="text-align: center;">Ações</td>
            <td>Cod Professor</td>
            <td>Nome</td>
            <td>Data de Nascimento</td>
            <td>Data de Criação</td>
        </tr>
        <?php 
            foreach ($arProfessor as $professor) : 
        ?>
            <tr>
                <td style='width: 151px'>
                    <a href="formulario.php?id_professor=<?= $professor['id_professor'] ?>"
                       class="btn btn-warning">Alterar
                    </a>
                    <a href="processamento.php?acao=excluir&id_professor=<?= $professor['id_professor'] ?>"
                       class="btn btn-danger">Excluir
                    </a>
                </td>
                <td><?= $professor['id_professor'] ?> </td>
                <td><?= $professor['nome'] ?> </td>
                <td><?= $professor['dt_nascimento'] ?> </td>
                <td><?= $professor['dt_criacao'] ?> </td>
            </tr>
        <?php
            endforeach;
        ?>
    </table>
<?php
include_once '../public/Rodape.php';
