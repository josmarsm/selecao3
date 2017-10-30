<?php

include '../../funcoes/config.php';
global $db;

$parametro_identificacao = 64;
$sql_identificacao = 'select * from identificacao where id_usuario=:parametro_identificacao';
$result_identificacao = $db->prepare($sql_identificacao);
$result_identificacao->bindParam(':parametro_identificacao', $parametro_identificacao);
$result_identificacao->execute();
$count = $result_identificacao->rowCount();
$rows = $result_identificacao->fetchAll();

//print_r($count);
//print_r($rows);

if ($count > 0) {
    $acao = 'view_identificacao';
} else {
    $acao = 'add_identificacao';
}
//echo $acao;
//$acao = '';
switch ($acao) {
    case 'add_identificacao' :
        echo 'Formulário de adição de identificação <br>';
        break;
    case 'edit_identificacao':
        echo 'Formulário de edição de identificação';
        print_r($rows);

        break;
    default:
        echo '
<div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <button class="btn btn-success" data-toggle="modal" data-target="#add_new_record_modal">Editar</button>
            </div>
        </div>
    </div>';

        echo '<div class = "row">';
        $parametro_linha1 = $rows[0]['linha_pesquisa_1'];
        $sql_linha1 = "select * from linha_pesquisa where id_linha_pesquisa=:parametro_linha1";
        $result_linha1 = $db->prepare($sql_linha1);
        $result_linha1->bindParam(':parametro_linha1', $parametro_linha1);
        $result_linha1->execute();
        $linha1 = $result_linha1->fetchAll();

        $parametro_linha2 = $rows[0]['linha_pesquisa_2'];
        $sql_linha2 = "select * from linha_pesquisa where id_linha_pesquisa=:parametro_linha2";
        $result_linha2 = $db->prepare($sql_linha2);
        $result_linha2->bindParam(':parametro_linha2', $parametro_linha2);
        $result_linha2->execute();
        $linha2 = $result_linha2->fetchAll();

        $parametro_orientador1 = $rows[0]['orientador_1'];
        $sql_orientador1 = "SELECT orientador.id_orientador,
                                        usuario.nome
                                        FROM
                                        orientador
                                        INNER JOIN usuario
                                        ON orientador.id_usuario = usuario.id_usuario                                        
                                        where id_orientador=:parametro_orientador1";
        $result_orientador1 = $db->prepare($sql_orientador1);
        $result_orientador1->bindParam(':parametro_orientador1', $parametro_orientador1);
        $result_orientador1->execute();
        $orientador1 = $result_orientador1->fetchAll();

        $parametro_orientador2 = $rows[0]['orientador_2'];
        $sql_orientador2 = "SELECT orientador.id_orientador,
                                        usuario.nome
                                        FROM
                                        orientador
                                        INNER JOIN usuario
                                        ON orientador.id_usuario = usuario.id_usuario                                        
                                        where id_orientador=:parametro_orientador2";
        $result_orientador2 = $db->prepare($sql_orientador2);
        $result_orientador2->bindParam(':parametro_orientador2', $parametro_orientador2);
        $result_orientador2->execute();
        $orientador2 = $result_orientador2->fetchAll();

        $parametro_orientador3 = $rows[0]['orientador_3'];
        $sql_orientador3 = "SELECT orientador.id_orientador,
                                        usuario.nome
                                        FROM
                                        orientador
                                        INNER JOIN usuario
                                        ON orientador.id_usuario = usuario.id_usuario                                        
                                        where id_orientador=:parametro_orientador3";
        $result_orientador3 = $db->prepare($sql_orientador3);
        $result_orientador3->bindParam(':parametro_orientador3', $parametro_orientador3);
        $result_orientador3->execute();
        $orientador3 = $result_orientador3->fetchAll();

        if ($rows[0]['poscomp'] == 'Sim') {
            //echo $rows[0]['poscomp'];
            $poscomp = $rows[0]['poscomp'] . ' [' . $rows[0]['ano_poscomp'] . ' - ' . $rows[0]['nota_poscomp'] . ' pontos]';
        } else {
            $poscomp = $rows[0]['poscomp'];
        }




        echo 'Linhas de Pesquisa: ' . $linha1[0]['linha_pesquisa'] . ', ' . $linha2[0]['linha_pesquisa'] . '<br>';
        echo 'Orientadores: ' . $orientador1[0]['nome'] . ', ' . $orientador2[0]['nome'] . ', ' . $orientador3[0]['nome'] . '<br>';
        echo 'Poscomp: ' . $poscomp . '<br>';
        echo 'Gostaria de Receber bolsa?: ' . $rows[0]['bolsa'];

        echo '</div>';
        break;
}