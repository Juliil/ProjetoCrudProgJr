<?php
include_once 'Curso.php';
include_once '../professor/professores.php';

$curso = new Curso();

$professor = new Professor();
$arrProfessor = $professor->recuperarDados();

if (!empty($_GET['id_curso'])) {
    $curso->carregarPorId($_GET['id_curso']);
}

include_once '../public/Cabecalho.php';

if (!empty($_GET)) {
    echo "<h1 class='text-center'>Atualizar Curso</h1>";
} else
    echo "<h1 class='text-center'>Novo Curso</h1>";
?>

    <div class="container">
        <form class="form-horizontal" action="processamento.php?acao=salvar" method="post">
            <input type="hidden" name="id_curso" value="<?= $curso->getIdCurso(); ?>">

            <div class="form-group">
                <label for="nome" class="col-sm-2 control-label">Nome</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nome" name="nome"
                           value="<?= $curso->getNome(); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="dt_criacao" class="col-sm-2 control-label">Data da Criação</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="dt_criacao" name="dt_criacao"
                           value="<?= $curso->getDtCriacao(); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="id_professor" class="col-sm-2 control-label">Professor</label>
                <div class="col-sm-10">
                    <select class="form-control" name="id_professor" id="id_professor">
                        <option value="">Selecione</option>
                        <?php
                            foreach ($arrProfessor as $professor) :
                        ?>
                            <?php $checked = ( $professor['id_professor'] == $curso->getIdprofessor() ) ? 'selected' : ''; ?>
                            <option <?= $checked ?>
                                value=" <?= $professor['id_professor'] ?>"><?= $professor['nome'] ?>
                            </option>
                        <?php
                            endforeach;
                        ?>
                    </select>
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">Salvar</button>
                    <a href="../curso/index.php" class="btn btn-danger">Voltar</a>
                </div>
        </form>
    </div>

<?php
include_once '../public/Rodape.php';