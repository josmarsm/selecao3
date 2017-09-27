<!DOCTYPE html>
<html lang="ptb">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <?php
        //header('Content-Type: text/html; charset=ISO-8859-1', true);
        setlocale(LC_TIME, 'ptb');
        ?>
        <title><?php echo gera_titulos(); ?></title>
        <!-- Bootstrap Core CSS -->
        <link href="<?php echo site ?>/includes/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- MetisMenu CSS -->
        <link href="<?php echo site ?>/includes/metisMenu/metisMenu.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="<?php echo site ?>/includes/dist/css/sb-admin-2.css" rel="stylesheet">
        <!-- Morris Charts CSS -->
        <link href="<?php echo site ?>/includes/morrisjs/morris.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="<?php echo site ?>/includes/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo site ?>/includes/selecao/selecao.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script type="text/javascript">

            // checa se o documento foi carregado
            $(document).ready(function () {
                desabilita_campos();
               
                
                //To enable
                $("#poscomp_sim").click(function () {
                    habilita_campos();
                });
                //To disable
                $("#poscomp_nao").click(function () {
                    desabilita_campos();
                });

            });


            function desabilita_campos() {
                $("#poscomp_complemento").attr('disabled', 'disabled');
                $("#poscomp_complemento").hide();
            }

            function habilita_campos() {
                $("#poscomp_complemento").removeAttr('disabled');
                $("#poscomp_complemento").show();
            }
            function inicio() {
                desabilita_campos();
            }



        </script>
    </head>
    <style>
        #error-msg{ display:none }
        #success-msg{ display:none }

    </style>
    <body>

        <nav class="navbar navbar-default" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Seleção 3.0</a>
            </div>


            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="<?php echo site ?>/candidato/?p=home">Home</a></li>
                    <li><a href="<?php echo site . '/candidato/?p=identificacao&?id=' . $_SESSION['id_usuario']; ?>">Formulário de Identificação</a></li>
                    <li><a href="<?php echo site . '/candidato/?p=curriculo&id=' . $_SESSION['id_usuario']; ?>">Envio do Currículo</a></li>                   
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Relatórios <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Lista de Candidatos</a></li>
                            <li><a href="#">Lista de Candidatos - Não avaliados</a></li>
                            <li><a href="#">Aprovados</a></li>
                            <li><a href="#">Aprovados - Por orientador</a></li>
                            <li><a href="#">Aprovados - Por linha des pesquisa</a></li>
                            <li><a href="#">Aprovados - Por Classificação</a></li>                                
                        </ul>
                    </li>                        
                </ul>

                <form class="navbar-form navbar-right" role="search">
                    <ul class="nav navbar-top-links navbar-right">
                        <li class="dropdown">
                            <a class="dropdown-toggle" 
                               data-toggle="dropdown" 
                               href="#">
                                <i class="fa fa-envelope fa-fw"></i> 
                                {Caixa Postal}
                                <i class="fa fa-caret-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-messages">
                                <li>
                                    <a href="#">
                                        <div>
                                            <strong>John Smith</strong>
                                            <span class="pull-right text-muted">
                                                <em>Yesterday</em>
                                            </span>
                                        </div>
                                        <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#">
                                        <div>
                                            <strong>John Smith</strong>
                                            <span class="pull-right text-muted">
                                                <em>Yesterday</em>
                                            </span>
                                        </div>
                                        <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#">
                                        <div>
                                            <strong>John Smith</strong>
                                            <span class="pull-right text-muted">
                                                <em>Yesterday</em>
                                            </span>
                                        </div>
                                        <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a class="text-center" href="#">
                                        <strong>Read All Messages</strong>
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </li>
                            </ul>
                            <!-- /.dropdown-messages -->
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-user fa-fw"></i> {<b><?php echo $_SESSION['nome'] ?></b>}<i class="fa fa-caret-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="<?php echo site ?>/candidato/?p=perfil"><i class="fa fa-user fa-fw"></i> User Profile</a>
                                </li>
                                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="<?php echo site ?>/candidato/?f=logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </form>


            </div><!-- /.navbar-collapse -->

        </nav>