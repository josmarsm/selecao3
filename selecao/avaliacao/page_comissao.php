<?php
$id_usuario = $_SESSION['id_usuario'];
$perfil = $_SESSION['perfil'];

$sql_usuario = "SELECT * FROM usuario WHERE id_usuario=?";
$sql_candidato_admin = "SELECT 
        i.id_usuario, i.inscricao, i.status, u.nome
        FROM identificacao AS i
        INNER JOIN usuario AS u ON i.id_usuario = u.id_usuario         
        order by nome";
$sql_candidato_comissao = "SELECT 
        i.id_usuario, i.inscricao, i.status, u.nome
        FROM identificacao AS i
        INNER JOIN usuario AS u ON i.id_usuario = u.id_usuario 
        WHERE comissao_avaliador =?
        order by nome";
$sql_candidato_orientador = "SELECT 
        i.id_usuario, i.inscricao, i.status, u.nome
        FROM identificacao AS i
        INNER JOIN usuario AS u ON i.id_usuario = u.id_usuario 
        WHERE comissao_avaliador =?
        order by nome";
if ($perfil == 1) {
    $candidatos = get_data_all($sql_candidato_admin);
    //var_dump($candidatos);
} else {
    $vars = [$id_usuario];    
    $candidatos = get_data($sql_candidato_comissao, $vars);
    //var_dump($candidatos);
}
echo '<pre>';
//print_r($candidatos);
echo '</pre>';
?>


<div class="wrapper" role="main">
    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <?php
                if (isset($_GET['mensagem'])) {
                    $mensagem = unserialize($_GET['mensagem']);
                    echo $mensagem;
                }
                ?>
            </div>
        </div>                 
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Lista de Candidatos - Avaliação Comissão
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" 
                           class="table table-striped table-bordered table-hover" 
                           id="dataTables-example">
                        <thead>
                            <tr>
                                <th class="no-sort">Inscrição</th>
                                <th>Nome</th>
                                <th>Status</th>
                                <th>Situação</th>
                                <th>Delegar</th>
                                <?php
                                if ($_SESSION['perfil'] == 1) {
                                    echo "<th>Upload Docs</th>";
                                }
                                ?>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($candidatos as $col) {
                                ?>
                                <tr class="odd gradeX">
                                    <td style="width: 20px"><?php echo $col['inscricao']; ?></td>
                                    <td><?php                                        
                                        echo $col['nome'];
                                        ?></td>
                                    <td align=center style="width: 195px">
                                        <?php
                                        if ($col['status'] == 1) {
                                            echo 'Avaliado - <button onclick="GetCandidatoReAvaliar(' . $col['id_usuario'] . ')" class="btn btn-success">ReAvaliar</button>';
                                        } else {
                                            echo 'Não Avaliado - '
                                            . '<a '
                                            . 'href = "formularios/candidato.php"'
                                            . 'data-id_candidato = "' . $col['id_usuario'] . '"'
                                            . 'data-toggle = "modal"'
                                            . 'data-target = "#myModal_avaliar"'
                                            . 'data-remote = "false"'
                                            . 'data-title = "Cadastro do Candidato ['.$col['id_usuario'].' - '.$col['nome'].']"'
                                            . 'data-button = "Finaliza Avaliação"'
                                            . 'class="btn btn-success">'
                                            . 'Avaliar'
                                            . '</a';
                                        }
                                        ?>                                    
                                    </td>
                                    <td align=center style="width: 100px">
                                        <?php
                                        if ($col['status'] == 1) {
                                            $vars = $col['id_candidato'];
                                            $sql = "select sum(p_line_a) as * from curriculo where id_candidato = ?";
                                            $curriculo = get_data($sql, $vars);

                                            echo "Faz calculo para verificar situação";
                                        } else {
                                            echo "Não avaliado";
                                        }
                                        ?>  
                                    </td>
                                    <td align=center style="width: 100px">
                                        <?php
                                        if ($col['status'] == 1) {
                                            echo "";
                                        } else {
                                            echo '<button '
                                            . 'onclick="GetCandidatoDelegar(' . $col['id_usuario'] . ' ) " '
                                            . 'class="btn btn-warning">Delegar</button>';
                                        }
                                        ?> 
                                    </td>
                                    <?php
                                    if ($_SESSION['perfil'] == 1) {

                                        echo '<td align=center style="width: 120px">'
                                        . '<a '
                                        . 'href = "formularios/documentos.php"'
                                        . 'data-id = "1"'
                                        . 'data-toggle = "modal"'
                                        . 'data-target = "#myModal_upload"'
                                        . 'data-remote = "false"'
                                        . 'data-title = "Upload de documentos do Candidato [XXXXX]"'
                                        . 'data-button = "Finaliza Upload"'
                                        . 'class="btn btn-success">'
                                        . 'Upload'
                                        . '</a'
                                        . '</td>';
                                    }
                                    ?>
                                </tr>
                            <?php } ?>                          

                        </tbody>
                    </table>                 
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
    </div>
</div>

<!-- Bootstrap Modal - To Delegar -->
<!-- Modal -->
<div class="modal fade" id="delegar_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p id="candidato"> </p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Delegar Candidato</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" name="hidden_id_candidato" value="">
                <div class="form-group">
                    <label for="candidato">Candidato</label>

                    <input readonly type="text" name="candidato" id="candidato" placeholder="Candidato" class="form-control" />
                </div>

                <div class="form-group">
                    <label for="novo_avaliador">Novo Avaliador</label>                                   
                    <?php
                    $sql_comissao = "SELECT * FROM usuario WHERE perfil = ?";
                    $var_comissao = [3];
                    $comissao = get_data($sql_comissao, $var_comissao);

                    $data = '<select name="novo_avaliador" id="novo_avaliador" class="form-control">';
                    $data .= '<option value = "">Selecione um avaliador</option>';

                    foreach ($comissao as $col) {
                        $data .= '<option value =' . $col['id_usuario'] . '>' . utf8_encode($col['nome']) . '</option>';
                    }
                    $data .= '</select>';
                    echo $data;
                    ?>                        
                </div>

                <div class="form-group">
                    <label for="motivo">Motivo</label>
                    <input type="text" id="motivo" placeholder="Motivo" class="form-control" />
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="DelegarCandidato()">Delegar</button>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap Modal - To Avaliar -->
<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="avaliar_modal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <p id="candidato"> </p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Avaliação do Candidato</h4>
            </div>
            <div class="modal-body">
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                    FORMULÁRIO DE IDENTIFICAÇÃO
                                </a>
                            </h4>
                        </div>
                        <div id = "collapseOne" class = "panel-collapse collapse in">
                            <div class = "panel-body">
                                <button
                                    onclick = "formIdentificacao('1')"
                                    class = "btn btn-default closeall">
                                    Edit
                                </button>
                                <hr>
                                <input type = "hidden" name = "hidden_id_candidato" value = "">
                                <input type = "hidden" name = "hidden_nome" value = "">
                                <p id = 'nome'>Nome:</p>
                                <p id = 'linha_pesquisa_1'>Linha de Pesquisa 1:</p>
                                <p id = 'linha_pesquisa_2'>Linha de Pesquisa 2:</p>
                                <p id = 'orientador_1'>Orientador 1:</p>
                                <p id = 'orientador_2'>Oreintador 2:</p>
                                <p id = 'orientador_3'>Oreintador 3:</p>
                                <p id = 'poscomp'>Poscomp: Ano: Pontuação:</p>
                                <p id = 'bolsa'>Bolsa:</p>

                            </div>
                        </div>
                    </div>
                    <div class = "panel panel-default">
                        <div class = "panel-heading">
                            <h4 class = "panel-title">
                                <a class = "accordion-toggle" data-toggle = "collapse" data-parent = "#accordion" href = "#collapseTwo">
                                    FICHA DE AVALIAÇÃO - Análise do Currículo Lattes e Histórico Escolar
                                </a>
                            </h4>
                        </div>
                        <div id = "collapseTwo" class = "panel-collapse collapse">
                            <div class = "panel-body">
                                <a href = "#" class = "btn btn-default closeall">Edit</a>
                                <hr>
                                Formação Acadêmica (máximo 4, 0 pontos) - [xx]
                                Atividades Profissionais e Participação em eventos (na área de computação) (máximo 2, 0 pontos)- [xx]
                                Publicação (na área de computação) (máximo 4, 0) - [xx]
                            </div>
                        </div>
                    </div>
                    <div class = "panel panel-default">
                        <div class = "panel-heading">
                            <h4 class = "panel-title">
                                <a class = "accordion-toggle" data-toggle = "collapse" data-parent = "#accordion" href = "#collapseThree">
                                    RESULTADO
                                </a>
                            </h4>
                        </div>
                        <div id = "collapseThree" class = "panel-collapse collapse">
                            <div class = "panel-body">
                                Na Avaliação do curriculo o candidato obteve a [xx] sendo [xx] segunda etapa.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class = "modal-footer">
                <button type = "button" class = "btn btn-default" data-dismiss = "modal">Cancel</button>
                <button type = "button" class = "btn btn-primary" onclick = "DelegarCandidato()">Finalizar Avaliação</button>
            </div>
        </div>
    </div>
</div>

<div class = "modal fade bd-example-modal-lg" id = "formIdentificacao" role = "dialog" data-backdrop = "static">
    <div class = "modal-dialog modal-lg">
        <div class = "modal-content">
            <div class = "modal-header">
                <p id = "candidato"> </p>
                <button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close"><span aria-hidden = "true">&times;
                    </span></button>
                <h4 class = "modal-title" id = "myModalLabel">Formulário de Candidato</h4>
            </div>
            <div class = "modal-body">

            </div>
            <div class = "modal-footer">
                <button type = "button" class = "btn btn-default" data-dismiss = "modal">Cancel</button>
                <button
                    type = "button"
                    class = "btn btn-primary"
                    onclick = "DelegarCandidato()">Finalizar Avaliação</button>
            </div>
        </div>
    </div>
</div>

<!--Modal Default -->
<div data-backdrop="static" class = "modal fade" id = "myModal_avaliar" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true">
    <div class = "modal-dialog modal-lg">
        <div class = "modal-content">
            <div class = "modal-header">
                <button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close"><span aria-hidden = "true">&times;
                    </span></button>
                <h4 class = "modal-title" id = "myModalLabel">Modal title</h4>
            </div>
            <div class = "modal-body">
                <?php
                include 'formularios/avaliar.php';
                ?>
            </div>
            <div class = "modal-footer">
                <button type = "button" class = "btn btn-default hidden new" data-dismiss = "modal">Novo botão</button>
                <button type = "button" class = "btn btn-default" data-dismiss = "modal">Close</button>
                <button type = "button" class = "btn btn-primary close-changes">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div class = "modal fade" id = "myModal_delegar" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true">
    <div class = "modal-dialog modal-lg">
        <div class = "modal-content">
            <div class = "modal-header">
                <button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close"><span aria-hidden = "true">&times;
                    </span></button>
                <h4 class = "modal-title" id = "myModalLabel">Modal title</h4>
            </div>
            <div class = "modal-body">
                formularios/delegar.php
            </div>
            <div class = "modal-footer">
                <button type = "button" class = "btn btn-default hidden new" data-dismiss = "modal">Novo botão</button>
                <button type = "button" class = "btn btn-default" data-dismiss = "modal">Close</button>
                <button type = "button" class = "btn btn-primary close-changes">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div class = "modal fade" id = "myModal_upload" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true">
    <div class = "modal-dialog modal-lg">
        <div class = "modal-content">
            <div class = "modal-header">
                <button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close"><span aria-hidden = "true">&times;
                    </span></button>
                <h4 class = "modal-title" id = "myModalLabel">Modal title</h4>
            </div>
            <div class = "modal-body">
                formularios/upload.php
            </div>
            <div class = "modal-footer">
                <button type = "button" class = "btn btn-default hidden new" data-dismiss = "modal">Novo botão</button>
                <button type = "button" class = "btn btn-default" data-dismiss = "modal">Close</button>
                <button type = "button" class = "btn btn-primary close-changes">Save changes</button>
            </div>
        </div>
    </div>
</div>