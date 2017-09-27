<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$vars = [$id];
$sql = "SELECT * FROM candidato WHERE id_candidato =?";
$candidato = get_data($sql, $vars);
//var_dump($candidato);
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
                    <?php
                    echo '<b>' . utf8_encode($candidato[0]['nome']) . '</b> - Envio de Documentos';
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
        </div>
    </div>
</div>