<?php
$perfil = "";
$acao = "";

if ($perfil == "admin") {
    echo "perfil admin";
} else {
    //echo "perfil usuario";
}

if ($acao == "add") {
    echo "acção de adicionar";
} elseif ($acao == "edit") {
    echo "ação editar";
}

$vars = [$_SESSION['id_usuario']];
$sql = "select * from usuario where id_usuario =?";
$usuario = get_data($sql, $vars);
//print_r($usuario);
//echo $usuario[0]['nome']
?>
<div class="container">

    <div class="panel panel-default">
        <?php
        if (isset($_GET['mensagem'])) {
            $mensagem = unserialize($_GET['mensagem']);
            echo $mensagem;
        }
        ?>
    </div>

    <!-- /.row -->
    <div class="row">
        <!-- começa aqui o conteúdo de cada página -->
        <form class="form-horizontal">
            <fieldset>
                <div class="panel panel-primary">
                    <div class="panel-heading">Formulário de Identificação - [<b> <?php echo $_SESSION['nome']; ?> </b>]</div>

                    <div class="panel-body">                                               

                        <!-- Select Basic -->
                        <div class="form-group">

                            <label class="col-md-2 control-label" for="selectbasic">Linha de Pesquisa 1 <h11>*</h11></label>

                            <div class="col-md-3">
                                <select required id="escolaridade" name="escolaridade" class="form-control">
                                    <option value=""></option>
                                    <option value="Analfabeto">Analfabeto</option>
                                    <option value="Fundamental Incompleto">Fundamental Incompleto</option>
                                    <option value="Fundamental Completo">Fundamental Completo</option>
                                    <option value="Médio Incompleto">Médio Incompleto</option>
                                    <option value="Médio Completo">Médio Completo</option>
                                    <option value="Superior Incompleto">Superior Incompleto</option>
                                    <option value="Superior Completo">Superior Completo</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <!-- Select Basic -->

                            <label class="col-md-2 control-label" for="selectbasic">Linha de Pesquisa 2 <h11>*</h11></label>

                            <div class="col-md-3">
                                <select required id="escolaridade" name="escolaridade" class="form-control">
                                    <option value=""></option>
                                    <option value="Analfabeto">Analfabeto</option>
                                    <option value="Fundamental Incompleto">Fundamental Incompleto</option>
                                    <option value="Fundamental Completo">Fundamental Completo</option>
                                    <option value="Médio Incompleto">Médio Incompleto</option>
                                    <option value="Médio Completo">Médio Completo</option>
                                    <option value="Superior Incompleto">Superior Incompleto</option>
                                    <option value="Superior Completo">Superior Completo</option>
                                </select>
                            </div>
                        </div>

                        <!-- Select Basic -->
                        <div class="form-group">

                            <label class="col-md-2 control-label" for="selectbasic">Orientador 1 <h11>*</h11></label>

                            <div class="col-md-3">
                                <select required id="escolaridade" name="escolaridade" class="form-control">
                                    <option value=""></option>
                                    <option value="Analfabeto">Analfabeto</option>
                                    <option value="Fundamental Incompleto">Fundamental Incompleto</option>
                                    <option value="Fundamental Completo">Fundamental Completo</option>
                                    <option value="Médio Incompleto">Médio Incompleto</option>
                                    <option value="Médio Completo">Médio Completo</option>
                                    <option value="Superior Incompleto">Superior Incompleto</option>
                                    <option value="Superior Completo">Superior Completo</option>
                                </select>
                            </div>
                        </div>

                        <!-- Select Basic -->
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="selectbasic">Orientador 2 <h11>*</h11></label>

                            <div class="col-md-3">
                                <select required id="escolaridade" name="escolaridade" class="form-control">
                                    <option value=""></option>
                                    <option value="Analfabeto">Analfabeto</option>
                                    <option value="Fundamental Incompleto">Fundamental Incompleto</option>
                                    <option value="Fundamental Completo">Fundamental Completo</option>
                                    <option value="Médio Incompleto">Médio Incompleto</option>
                                    <option value="Médio Completo">Médio Completo</option>
                                    <option value="Superior Incompleto">Superior Incompleto</option>
                                    <option value="Superior Completo">Superior Completo</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <!-- Select Basic -->

                            <label class="col-md-2 control-label" for="selectbasic">Orientador 3 <h11>*</h11></label>

                            <div class="col-md-3">
                                <select required id="escolaridade" name="escolaridade" class="form-control">
                                    <option value=""></option>
                                    <option value="Analfabeto">Analfabeto</option>
                                    <option value="Fundamental Incompleto">Fundamental Incompleto</option>
                                    <option value="Fundamental Completo">Fundamental Completo</option>
                                    <option value="Médio Incompleto">Médio Incompleto</option>
                                    <option value="Médio Completo">Médio Completo</option>
                                    <option value="Superior Incompleto">Superior Incompleto</option>
                                    <option value="Superior Completo">Superior Completo</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <!-- Multiple Radios (inline) -->
                            <label class="col-md-2 control-label" for="radios">Utilizar POSCOMP? <h11>*</h11></label>
                            <div class="col-md-4"> 
                                <label required="" class="radio-inline" for="radios-0" >
                                    <input name="sexo" id="sexo" value="feminino" type="radio" required>
                                    Feminino
                                </label> 
                                <label class="radio-inline" for="radios-1">
                                    <input name="sexo" id="sexo" value="masculino" type="radio">
                                    Masculino
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <!-- Multiple Radios (inline) -->
                            <label class="col-md-2 control-label" for="radios">Bolsa? <h11>*</h11></label>
                            <div class="col-md-4"> 
                                <label required="" class="radio-inline" for="radios-0" >
                                    <input name="sexo" id="sexo" value="feminino" type="radio" required>
                                    Feminino
                                </label> 
                                <label class="radio-inline" for="radios-1">
                                    <input name="sexo" id="sexo" value="masculino" type="radio">
                                    Masculino
                                </label>
                            </div>
                        </div>

                        <!-- Button (Double) -->
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="Cadastrar"></label>
                            <div class="col-md-8">
                                <button id="Cadastrar" name="Cadastrar" class="btn btn-success" type="Submit">Cadastrar</button>
                                <button id="Cancelar" name="Cancelar" class="btn btn-danger" type="Reset">Cancelar</button>
                            </div>
                        </div>

                    </div>
                </div>


            </fieldset>
        </form>

        <!-- termina aqui o conteúdo de cada página-->    



        <!-- /.panel -->
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>