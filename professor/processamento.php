<?php
/**
 * Arquivo de Controller/Processamento de Professores.
 * 
 */
include_once 'professores.php';

$professor = new Professor();

switch ($_GET['acao']) {
    case 'salvar';
        # Se o id não estiver vazio ele altera, senão ele cria um novo.
        if (!empty($_POST['id_professor'])) {
            $professor->alterar($_POST);
        } else {
            $professor->inserir($_POST);
        }
        break;
    case 'excluir';
        $professor->excluir($_GET['id_professor']);
        break;
}

header('location: index.php');