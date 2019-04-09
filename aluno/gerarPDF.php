<?php
include_once 'Aluno.php';
include_once '../Conexao.php';
include_once '../public/mpdf57/mpdf.php';
$arAlunos = (new Aluno())->recuperarDados();
$mpdf = new mPDF();
$mpdf->setDisplayMode("fullpage");
$mpdf->WriteHTML("<h1>Relatório de Alunos</h1><hr>");



$html = "<table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Curso</th>
                    <th>Professor</th>
                </tr>
            </thead>
            <tbody>";
                    foreach ($arAlunos as $aluno) {
                        
                        $html = html ."<tr>
                            <td>($aluno{nome})</td>
                            <td>($aluno{id_curso})</td>
                            <td>($aluno{id_professor})</td>
                        </tr>";
                    }

        $html = $html ." </tbody>
        </table>";
$mpdf->WriteHTML($html);   
$mpdf->Output();
exit();

?>