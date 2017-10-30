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
                            Lista de Candidatos - Avaliação Orientador
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" 
                                   class="table table-striped table-bordered table-hover" 
                                   id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Inscrição</th>
                                        <th>Nome</th>
                                        <th>Status</th>
                                        <th>Avaliar</th>
                                        <th>Delegar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="odd gradeX">
                                        <td>025345256</td>
                                        <td>Paulo Jose de Almeida</td>
                                        <td>Avaliado - Reprovado</td>
                                        <td>Reavaliar</td>
                                        <td></td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td>025345256</td>
                                        <td>Alberto Roberto de Nobrega</td>
                                        <td>Não Avaliado</td>
                                        <td></td>
                                        <td>Delegar</td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td>025345256</td>
                                        <td>André Santiago Fernandes da Silva</td>
                                        <td>Não Avaliado</td>
                                        <td></td>
                                        <td>Delegar</td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td>025345256</td>
                                        <td>Josmar Nuernberg de Almeida Sampaio</td>
                                        <td>Avaliado - Selecionado</td>
                                        <td>Reavaliar</td>
                                        <td></td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td>025345256</td>
                                        <td>Jorge Trindade dos Santos</td>
                                        <td>Avaliado - Selecionado</td>
                                        <td>Reavaliar</td>
                                        <td></td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td>025345256</td>
                                        <td>Bernardete Lima do Carmo</td>
                                        <td>Não avaliado</td>
                                        <td></td>
                                        <td>Delegar</td>
                                    </tr>
                                </tbody>
                            </table>                 
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            </div>
        </div>