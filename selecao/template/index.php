<?php
include '../funcoes/funcoes.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap 3: Layouts</title>

        <link href="<?php echo site ?>/includes/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo site ?>/includes/template/css/style.css" rel="stylesheet">

        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="container-fluid">
            <header class="row">
                cabeçalho
            </header>
            <div class="row">
                <div role="main">
                    conteúdo
                    <!-- conteudo principal -->
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="<?php echo site ?>/includes/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>