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
    <!-- /.row -->
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                Edição de Perfil
            </div>            
            <div class="panel-body">
                <div class="row">

                    <!-- começa aqui o conteúdo de cada página -->
                    <form class="form-horizontal">
                        <fieldset>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="nome">Nome</label>  
                                <div class="col-md-6">
                                    <input id="nome" value="<?php echo $usuario[0]['nome'] ?>" name="nome" type="text" placeholder="Nome Completo" class="form-control input-md">

                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="email">Email</label>  
                                <div class="col-md-6">
                                    <input id="email" value="<?php echo $usuario[0]['email'] ?>" name="email" type="email" placeholder="Email" class="form-control input-md">

                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="username">Username</label>  
                                <div class="col-md-6">
                                    <input id="username" value="<?php echo $usuario[0]['username'] ?>" name="username" type="text" placeholder="Username" class="form-control input-md">

                                </div>
                            </div>

                            <!-- Password input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="password">Senha</label>
                                <div class="col-md-6">
                                    <input id="password" value="<?php echo $usuario[0]['password'] ?>" name="password" type="password" placeholder="senha" class="form-control input-md" required="">
                                    <span class="help-block">(Informe uma senha)</span>
                                </div>
                            </div>

                            <!-- Password input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="confirmpassword">Confirmar senha</label>
                                <div class="col-md-6">
                                    <input id="confirmpassword" value="<?php echo $usuario[0]['password'] ?>" name="confirmpassword" type="password" placeholder="senha" class="form-control input-md" required="">
                                    <span class="help-block">(Confirme sua senha)</span>
                                </div>
                            </div>

                            <!-- Multiple Radios -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="perfil">Perfil de usuário</label>
                                <div class="col-md-4">
                                    <div class="radio">
                                        <label for="perfil-0">
                                            <input type="radio" 
                                                   name="perfil" 
                                                   id="perfil-0" 
                                                   value="1"  
                                                   <?php
                                                   if ($usuario[0]['perfil'] == 1) {
                                                       echo 'checked="checked"';
                                                   }
                                                   ?>
                                                   />
                                            Administrador
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label for="perfil-1">
                                            <input type="radio" 
                                                   name="perfil" 
                                                   id="perfil-1" 
                                                   <?php
                                                   if ($usuario[0]['perfil'] == 2) {
                                                       echo 'checked="checked"';
                                                   }
                                                   ?>
                                                   />
                                            Coordenador do Programa
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label for="perfil-2">
                                            <input type="radio" 
                                                   name="perfil" 
                                                   id="perfil-2" 
                                                   value="3"
                                                   <?php
                                                   if ($usuario[0]['perfil'] == 3) {
                                                       echo 'checked="checked"';
                                                   }
                                                   ?>
                                                   />
                                            Comissão de Seleção
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label for="perfil-3">
                                            <input type="radio" 
                                                   name="perfil" 
                                                   id="perfil-3" 
                                                   value="4"
                                                   <?php
                                                   if ($usuario[0]['perfil'] == 4) {
                                                       echo 'checked="checked"';
                                                   }
                                                   ?>
                                                   />
                                            Orientador
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label for="perfil-4">
                                            <input type="radio" 
                                                   name="perfil" 
                                                   id="perfil-4" 
                                                   value="5"
                                                   <?php
                                                   if ($usuario[0]['perfil'] == 5) {
                                                       echo 'checked="checked"';
                                                   }
                                                   ?>
                                                   />
                                            Candidato
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="status">Status do usuário</label>
                                <div class="col-md-4">
                                    <div class="radio">
                                        <label for="status-0">
                                            <input type="radio" 
                                                   name="status" 
                                                   id="status-0" 
                                                   value="1" 
                                                   <?php
                                                   if ($usuario[0]['status'] == 1) {
                                                       echo 'checked="checked"';
                                                   }
                                                   ?>
                                                   />
                                            Ativo
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label for="status-1">
                                            <input type="radio" 
                                                   name="status" 
                                                   id="status-1" 
                                                   value="2"
                                                   <?php
                                                   if ($usuario[0]['status'] == 2) {
                                                       echo 'checked="checked"';
                                                   }
                                                   ?>
                                                   />
                                            Inativo
                                        </label>
                                    </div>                                    
                                </div>
                            </div>
                            <!-- Button (Double) -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="Cadastrar"></label>
                                <div class="col-md-8">
                                    <button id="Cadastrar" name="Cadastrar" class="btn btn-success">Cadastrar</button>
                                    <button id="Cancelar" name="Cancelar" class="btn btn-danger">Cancelar</button>
                                </div>
                            </div>

                        </fieldset>
                    </form>

                    <!-- termina aqui o conteúdo de cada página-->    
                </div>
            </div>
        </div>
        <!-- /.panel -->
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>