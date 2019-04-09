<?php
include_once 'Aluno.php';
include_once '../public/Cabecalho.php';

$arAlunos = (new Aluno())->recuperarDados();
?>
    <h1 class="text-center">Alunos</h1>
    <a class="btn btn-primary" href=formulario.php>Novo Aluno</a>
    <a class="btn btn-primary" href=gerarPDF.php target="_blank">Gerar Relatório</a>
    <table class="table table-bordered table-hover table-striped table-condensed">
        <tr>
            <td style="text-align: center;">Ações</td>
            <td>Id</td>
            <td>Nome</td>
            <td>DT Nascimento</td>
            <td>Logradouro</td>
            <td>Numero</td>
            <td>Bairro</td>
            <td>Cidade</td>
            <td>Estado</td>
            <td>DT Criação</td>
            <td>CEP</td>
            <td>Curso</td>
        </tr>

        <?php
            foreach ($arAlunos as $aluno) :
        ?>
            <tr>
                <td style="width: 151px">
                    <a href="formulario.php?id_aluno=<?= $aluno['id_aluno'] ?>"
                       class="btn btn-warning">Alterar
                    </a>
                    <a href="processamento.php?acao=excluir&id_aluno=<?= $aluno['id_aluno'] ?>"
                       class="btn btn-danger">Excluir
                    </a>
                </td>
                <td><?= $aluno['id_aluno'] ?></td>
                <td><?= $aluno['nome'] ?></td>
                <td><?= $aluno['dt_nascimento'] ?></td>
                <td><?= $aluno['logradouro'] ?></td>
                <td><?= $aluno['numero'] ?></td>
                <td><?= $aluno['bairro'] ?></td>
                <td><?= $aluno['cidade'] ?></td>
                <td><?= $aluno['estado'] ?></td>
                <td><?= $aluno['dt_criacao'] ?></td>
                <td><?= $aluno['cep'] ?></td>
                <td><?= $aluno['id_curso'] ?></td>
            </tr>
        <?php
            endforeach;
        ?>
    </table>

<?php
include_once '../public/Rodape.php';
