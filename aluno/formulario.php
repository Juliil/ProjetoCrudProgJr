<?php
include_once 'Aluno.php';
include_once '../curso/Curso.php';
include_once '../professor/professores.php';


$aluno = new Aluno();
$arrAluno = $aluno->recuperarDados();

$arrCursos = (new Curso())->recuperarDados();

$professor = new Professor();
$arrProfessor = $professor->recuperarDados();

if (!empty($_GET['id_aluno'])) {
    $aluno->carregarPorId($_GET['id_aluno']);
}

include_once '../public/Cabecalho.php';

if (!empty($_GET)) {
    echo "<h1 class='text-center'>Atualizar Aluno</h1>";
} else
    echo "<h1 class='text-center'>Novo Aluno</h1>";

?>
    <div class="container">
        <form class="form-horizontal" action="processamento.php?acao=salvar" method="post">
            <input type="hidden" name="id_aluno" value="<?= $aluno->getIdAluno(); ?>">

            <div class="form-group">
                <label for="nome" class="col-sm-2 control-label">Nome</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nome" name="nome"
                           value="<?= $aluno->getNome(); ?>" maxlength="10">
                </div>
            </div>
            <div class="form-group">
                <label for="dt_nascimento" class="col-sm-2 control-label">Data de Nascimento</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="dt_nascimento" name="dt_nascimento"
                           value="<?= $aluno->getDtNascimento(); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="logradouro" class="col-sm-2 control-label">Logradouro</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="logradouro" name="logradouro"
                           value="<?= $aluno->getLogradouro(); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="numero" class="col-sm-2 control-label">Numero</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="numero" name="numero"
                           value="<?= $aluno->getNumero(); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="bairro" class="col-sm-2 control-label">Bairro</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="bairro" name="bairro"
                           value="<?= $aluno->getBairro(); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="cidade" class="col-sm-2 control-label">Cidade</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="cidade" name="cidade"
                           value="<?= $aluno->getCidade(); ?>">
                </div>
            </div>

            <div class="form-group">
                <label for="estado" class="col-sm-2 control-label">Estado</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="estado" name="estado"
                           value="<?= $aluno->getEstado(); ?>">
                </div>
            </div>
            
            <div class="form-group">
                <label for="dt_criacao" class="col-sm-2 control-label">Data de Criação</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="dt_criacao" name="dt_criacao"
                           value="<?= $aluno->getDtCriacao(); ?>">
                </div>
            </div>
            
            <div class="form-group">
                <label for="cep" class="col-sm-2 control-label">Cep</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="cep" name="cep"
                        value="<?= $aluno->getCep(); ?>">
                </div>
            </div>
            
            <div class="form-group">
                <label for="id_curso" class="col-sm-2 control-label">Curso</label>
                <div class="col-sm-10">
                    <select class="form-control" name="id_curso" id="id_curso">
                        <option value="">Selecione</option>
                        <?php
                            foreach ($arrCursos as $curso) :
                        ?>
                            <?php $checked = ( $curso['id_curso'] == $aluno->getIdCurso() ) ? 'selected' : ''; ?>
                            <option <?= $checked ?>
                                value=" <?= $curso['id_curso'] ?>"><?= $curso['nome'] ?>
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
                    <a href="../aluno/index.php" class="btn btn-danger">Voltar</a>
                </div>
        </form>
    </div>
<?php
include_once '../public/Rodape.php';
