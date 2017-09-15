<?php

$db = new PDO('mysql:dbname=selecao;host=localhost', 'root', 'Ramsoj@123');

//$path = "http://localhost/selecao";
define('site', 'http://localhost/selecao');

$error = array();
$resp = array();

if ($_GET['f'] == "login") {
    login();
}

if ($_GET['f'] == "logout") {
    logout();
}

if ($_GET['f'] == "upload") {
    upload_file();
}


function carrega_pagina() {
    (isset($_GET['p'])) ? $pagina = $_GET['p'] : $pagina = 'home';
    if (file_exists('page_' . $pagina . '.php')):
        require_once ('page_' . $pagina . '.php');
    else:
        require_once ('page_home.php');
    endif;
}

function gera_titulos() {
    (isset($_GET['p'])) ? $pagina = $_GET['p'] : $pagina = 'home';
    switch ($pagina):
        case 'home':
            $titulo = 'Home - Sistema de Seleção';
            break;
        case 'candidatos':
            $titulo = 'Candidatos - Sistema de Seleção';
            break;
        case 'comissao':
            $titulo = 'Comissao - Sistema de Seleção';
            break;
        case 'orientadores':
            $titulo = 'Orientadores - Sistema de Seleção';
            break;
        default:
            $titulo = 'Seleção - Sistema de Seleção';
            break;
    endswitch;
    return $titulo;
}

function verifica() {
    session_start();
    if ((!isset($_SESSION['username']) == true) and ( !isset($_SESSION['password']) == true)) {
        unset($_SESSION['username']);
        unset($_SESSION['password']);
        header('location:login.php');
    }
    $logado = $_SESSION['username'];
}

function logout() {
    session_start();
    session_destroy();
    session_commit();

    $resp['status'] = true;
    $resp['msg'] = "Logout realizado com sucesso!";
    echo json_encode($resp);
    header("Location:index.php", 10);
    exit;
//Caso o usuário não estejand autenticado, limpa os dados e redireciona
    if (!isset($_SESSION['username']) and ! isset($_SESSION['password'])) {
//Destrói
        session_start();
        session_destroy();
        session_commit();

//Limpa
//unset($_SESSION['username']);
//unset($_SESSION['password']);
//Redireciona para a página de autenticação
//header('location:login.php');
    }
}

function login() {
    session_start();
    $username = isset($_POST["username"]) ? addslashes(trim($_POST["username"])) : FALSE;
// Recupera a senha, a criptografando em MD5 
//$password = isset($_POST["password"]) ? md5(trim($_POST["password"])) : FALSE;
    $password = isset($_POST["password"]) ? addslashes(trim($_POST["password"])) : FALSE;

// Usuário não forneceu a senha ou o login 
    if (!$username) {
        $error['username'] = "Username não informado!";
    }

    if (!$password) {
        $error['password'] = "Password não informada!";
    }

    if (count($error) > 0) {
        $resp['msg'] = $error;
        $resp['status'] = 'false';
        $alerta = $resp;
        if (isset($alerta[msg]['username']) && isset($alerta[msg]['password'])) {
            $mensagem = '<div class="alert alert-danger" role="alert" style="margin-top: 10px;">' . $alerta[msg]['username'] . '<br>' . $alerta[msg]['password'] . '</div>';
        } elseif (isset($alerta[msg]['username'])) {
            $mensagem = '<div class="alert alert-danger" role="alert" style="margin-top: 10px;">' . $alerta[msg]['username'] . '</div>';
        } elseif (isset($alerta[msg]['password'])) {
            $mensagem = '<div class="alert alert-danger" role="alert" style="margin-top: 10px;">' . $alerta[msg]['password'] . '</div>';
        }
        header("location: login.php?mensagem=" . serialize($mensagem));
        exit;
        return;
    }

    $vars = [$username];
    $data = get_data("SELECT * FROM usuario WHERE username = ? ", $vars);
    print_r($data);
    count($data);
    $total = count($data);
// Caso o usuário tenha digitado um login válido o número de linhas será 1.. 
    if ($total >= 1) {
// Agora verifica a senha 
        if ($password == $data[0]['password']) {
// TUDO OK! Agora, passa os dados para a sessão e redireciona o usuário 
            $_SESSION["id_usuario"] = $data[0]['id_usuario'];
            $_SESSION["nome"] = stripslashes($data[0]['nome']);
            $_SESSION["email"] = stripslashes($data[0]['email']);
            $_SESSION["username"] = stripslashes($data[0]['username']);
            $_SESSION["perfil"] = stripslashes($data[0]['perfil']);
            $_SESSION["status"] = stripslashes($data[0]['status']);
            $_SESSION["ultimo_acesso"] = stripslashes($data[0]['ultimo_acesso']);

            $resp['status'] = true;
            $resp['msg'] = "Login realizado com sucesso!";
            echo json_encode($resp);

            header("Location: index.php");
            exit;
        }
// Senha inválida 
        else {
            $resp['status'] = false;
            $resp['msg'] = "Password inválida!";
            $alerta = $resp;
            $mensagem = '<div class="alert alert-danger" role="alert" style="margin-top: 10px;">' . $alerta[msg] . '</div>';
            header("location: login.php?mensagem=" . serialize($mensagem));
            exit;
        }
    }
// Login inválido 
    else {
        $resp['status'] = false;
        $resp['msg'] = "Username inexistente!";
        $alerta = $resp;
        $mensagem = '<div class="alert alert-danger" role="alert" style="margin-top: 10px;">' . $alerta[msg] . '</div>';
        header("location: login.php?mensagem=" . serialize($mensagem));
        exit;
    }
}

function set_data($sql, $vars = null) {
    global $db;

    $stmt = $db->prepare($sql);
    $stmt->execute($vars);
}

function get_data($sql, $vars = null) {
    global $db;

    $stmt = $db->prepare($sql);
    $stmt->execute($vars);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $results;
}

function get_data_all($sql) {
    global $db;

    $stmt = $db->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $results;
}

function displayAlert($text, $type) {
    echo "<div class=\"alert alert-" . $type . "\" role=\"alert\">
        <p>" . $text . "</p>
      </div>";
}

function upload_file() {
    
    $nome = isset($_POST["$nome"]) ? addslashes(trim($_POST["$nome"])) : FALSE;

    echo 'id do candidato' . $id_candidato . '<br>';
    echo 'id do subcritério' . $id_subcriterio . '<br>';
    echo 'id do nome do arquivo' . $nome . '<br>';
    echo 'id do pontuação' . $pontuacao . '<br>';

    /*
      if(isset($_FILES['fileUpload']))
      {
      date_default_timezone_set("Brazil/East"); //Definindo timezone padrão

      $ext = strtolower(substr($_FILES['fileUpload']['name'],-4)); //Pegando extensão do arquivo

      $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
      $dir = 'uploads/'; //Diretório para uploads

      move_uploaded_file($_FILES['fileUpload']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
      }
     * 
     */
}

function create_grid_upload() {
    echo '<h4>Documentos anexados:</h4>'
    . '<table class="table table-hover table-bordered table-striped" flow-transfers>'
    . '<thead>'
    . '<tr>'
    . '<th>#</th>'
    . '<th>Nome documento</th>'
    . '<th>Relative Path</th>'
    . '<th>Nota solicitada</th>'
    . '<th>Nota validada</th>'
    . '<th>Vizualizar</th>'
    . '</tr>'
    . '</thead>'
    . '<tbody>'
    . '<tr ng-repeat="file in transfers">'
    . '<td>{{$index + 1}}</td>'
    . '<td>{{file.name}}</td>'
    . '<td>{{file.relativePath}}</td>'
    . '<td>{{file.paused}}</td>'
    . '<td>{{file.isUploading()}}</td>'
    . '<td>'
    . '<div class = "btn-group">'
    . '<a class = "btn btn-mini btn-warning" ng-click = "file.pause()" ng-hide = "file.paused">'
    . 'Pause'
    . '</a>'
    . '</div>'
    . '</td>'
    . '</tr>'
    . '</tbody>'
    . '</table>';
}
