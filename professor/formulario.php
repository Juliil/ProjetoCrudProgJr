<?php
include_once 'professores.php';

$professor = new Professor();
$arProfessor = $professor->recuperarDados();


if (!empty($_GET['id_professor'])) {
    $professor->carregarPorId($_GET['id_professor']);
}

include_once '../public/Cabecalho.php';

if (!empty($_GET)) {
    $title = "Atualizar Professor";
} else {
    $title = "Novo Professor";
}
    echo "<h1 class='text-center'>".$title."</h1>";
?>

    <div class="container">

        <form class="form-horizontal" action="processamento.php?acao=salvar" method="post">
            <input type="hidden" name="id_professor" value="<?= $professor->getIdProfessor(); ?>">

            <div class="form-group">
                <label for="nome" class="col-sm-2 control-label">Nome</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nome" name="nome"
                           value="<?= $professor->getNome(); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="dt_nascimento" class="col-sm-2 control-label">Data de Nascimento</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="dt_nascimento" name="dt_nascimento" value="<?= $professor->getDtNascimento(); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="dt_criacao" class="col-sm-2 control-label">Data de Criação</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="dt_criacao" name="dt_criacao" value="<?= $professor->getDtCriacao(); ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">Salvar</button>
                    <a href="../professor/index.php" class="btn btn-danger">Voltar</a>
                </div>
            </div>

        </form>
    </div>

<?php
include_once '../public/Rodape.php';