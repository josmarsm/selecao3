<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

$vars = [$id];
//var_dump($vars);
$sql_identificacao = "SELECT * FROM identificacao WHERE id_usuario =?";
$identificacao = get_data($sql_identificacao, $vars);
//var_dump($identificacao);
?>

<div class="container">
    <div>
    </div>
    <!-- /.row -->
    <div class="row">
        <!-- começa aqui o conteúdo de cada página -->
        <fieldset>
            <div class="panel panel-primary">
                <div class="panel-heading">

                    <?php
                    $id_aplicacao = 2;
                    echo 'Formulário de Upload de Documentos [<b> ' . $_SESSION['nome'] . '</b> ]';
                    $status_aplicacao = status_aplicacao($id_aplicacao);

                    if ($status_aplicacao[0] == 'ativada') {
                        echo ' Edição Ativa';
//echo '<button type="button" id="Editar" name="Editar" class="btn btn-success" data-toggle="modal" data-target="#myedit">Editar</button>';
                    } else {
                        echo utf8_encode($status_aplicacao[1]) . '<br>';
                    }



                    //}
                    ?>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-pills">                        
                        <li><a href="#formacao-pills" data-toggle="tab">Formação Acadêmica</a>
                        </li>
                        <li><a href="#atividade-pills" data-toggle="tab">Atividades Profissionais e Participação em eventos</a>
                        </li>
                        <li><a href="#publicacao-pills" data-toggle="tab">Publicação</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="formacao-pills">
                            <div class="panel-body">
                                <h4>Formação Acadêmica (máximo 4,0 pontos)</h4> 
                                <h4>Documentos Anexados:</h4>                                
                                <table class="table table-hover table-bordered table-striped" flow-transfers>
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nome do Documento</th>
                                            <th>Tipo do Documento</th>
                                            <th>Data Inclusão</th>
                                            <th>Pontuação Solicitada</th>                                            
                                            <th>Settings</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-repeat="file in transfers">
                                            <td>{{$index + 1}}</td>
                                            <td>{{file.name}}</td>
                                            <td>{{file.size}}</td>
                                            <td>{{file.relativePath}}</td>                                            
                                            <td>{{file.isComplete()}}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a class="btn btn-mini btn-warning" ng-click="file.pause()" ng-hide="file.paused">
                                                        Pause
                                                    </a>
                                                    <a class="btn btn-mini btn-warning" ng-click="file.resume()" ng-show="file.paused">
                                                        Resume
                                                    </a>                                                    
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <p>
                                    <button type="button" class="btn btn-small btn-success" data-toggle="modal" data-target="#myModal">Upload de Documentos</button>
                                    <a class="btn btn-small btn-success" ng-click="$flow.resume()">Upload</a>
                                    <a class="btn btn-small btn-danger" ng-click="$flow.pause()">Pause</a>
                                    <a class="btn btn-small btn-info" ng-click="$flow.cancel()">Cancel</a>

                                </p>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="atividade-pills">
                            <div class="panel-body">
                                <h4>Atividades Profissionais e Participação em eventos na área de computação (máximo 2,0 pontos)</h4> 
                                <h4>Documentos Anexados:</h4>                                
                                <table class="table table-hover table-bordered table-striped" flow-transfers>
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nome do Documento</th>
                                            <th>Tipo do Documento</th>
                                            <th>Data Inclusão</th>
                                            <th>Pontuação Solicitada</th>                                            
                                            <th>Settings</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-repeat="file in transfers">
                                            <td>{{$index + 1}}</td>
                                            <td>{{file.name}}</td>
                                            <td>{{file.size}}</td>
                                            <td>{{file.relativePath}}</td>                                            
                                            <td>{{file.isComplete()}}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a class="btn btn-mini btn-warning" ng-click="file.pause()" ng-hide="file.paused">
                                                        Pause
                                                    </a>
                                                    <a class="btn btn-mini btn-warning" ng-click="file.resume()" ng-show="file.paused">
                                                        Resume
                                                    </a>                                                    
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <p>
                                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>
                                    <a class="btn btn-small btn-success" ng-click="$flow.resume()">Upload</a>
                                    <a class="btn btn-small btn-danger" ng-click="$flow.pause()">Pause</a>
                                    <a class="btn btn-small btn-info" ng-click="$flow.cancel()">Cancel</a>

                                </p>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="publicacao-pills">                            
                            <div class="panel-body">
                                <h4>Publicação na área de computação (máximo 4,0)</h4> 
                                <h4>Documentos Anexados:</h4>                                
                                <table class="table table-hover table-bordered table-striped" flow-transfers>
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nome do Documento</th>
                                            <th>Tipo do Documento</th>
                                            <th>Data Inclusão</th>
                                            <th>Pontuação Solicitada</th>                                            
                                            <th>Settings</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-repeat="file in transfers">
                                            <td>{{$index + 1}}</td>
                                            <td>{{file.name}}</td>
                                            <td>{{file.size}}</td>
                                            <td>{{file.relativePath}}</td>                                            
                                            <td>{{file.isComplete()}}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a class="btn btn-mini btn-warning" ng-click="file.pause()" ng-hide="file.paused">
                                                        Pause
                                                    </a>
                                                    <a class="btn btn-mini btn-warning" ng-click="file.resume()" ng-show="file.paused">
                                                        Resume
                                                    </a>                                                    
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <p>
                                    <button type="button" class="btn btn-small btn-success" data-toggle="modal" data-target="#myModal">Open Modal</button>
                                    <a class="btn btn-small btn-success" ng-click="$flow.resume()">Upload</a>
                                    <a class="btn btn-small btn-danger" ng-click="$flow.pause()">Pause</a>
                                    <a class="btn btn-small btn-info" ng-click="$flow.cancel()">Cancel</a>

                                </p>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->

            <!-- Modal -->
            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Modal Header</h4>
                        </div>
                        <div class="modal-body">
                            <p>Some text in the modal.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>

        </fieldset>
    </div>
    <!-- termina aqui o conteúdo de cada página-->    
    <!-- /.panel -->
    <!-- /.col-lg-12 -->
</div>