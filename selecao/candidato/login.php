<?php
require_once '../funcoes/funcoes.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="robots" content="noindex, nofollow">
        <title>Login &amp; Signup forms in panel - Bootsnipp.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap Core CSS -->
        <link href="<?php echo site ?>/includes/bootstrap/css/bootstrap.min.css" rel="stylesheet">        
        <!-- jQuery -->
        <script src="<?php echo site ?>/vendor/jquery/jquery.min.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo site ?>/vendor/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            window.alert = function () {};
            var defaultCSS = document.getElementById('bootstrap-css');
            function changeCSS(css) {
                if (css)
                    $('head > link').filter(':first').replaceWith('<link rel="stylesheet" href="' + css + '" type="text/css" />');
                else
                    $('head > link').filter(':first').replaceWith(defaultCSS);
            }
            $(document).ready(function () {
                var iframe_height = parseInt($('html').height());
                window.parent.postMessage(iframe_height, 'https://bootsnipp.com');
            });
        </script>
    </head>
    <body style="">
        <div class="container">
            
            <div id="signupbox" 
                 style="margin-top: 50px;" 
                 class="mainbox 
                 col-md-6 col-md-offset-3 
                 col-sm-8 col-sm-offset-2">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="panel-title">Sign Up</div>
                        <div style="float:right; font-size: 85%; position: relative; top:-10px">
                            <a id="signinlink" 
                               href="#" 
                               onclick="$('#signupbox').hide(); $('#loginbox').show()">Sign In</a>
                        </div>
                    </div>  
                    <div class="panel-body">
                        <form id="signupform" class="form-horizontal" role="form">

                            <div id="signupalert" style="display:none" class="alert alert-danger">
                                <p>Error:</p>
                                <span></span>
                            </div>
                            <div class="form-group">
                                <label for="email" 
                                       class="col-md-3 
                                       control-label">Email</label>
                                <div class="col-md-9">
                                    <input type="text" 
                                           class="form-control" 
                                           name="email" 
                                           placeholder="Email Address">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="firstname" 
                                       class="col-md-3 
                                       control-label">First Name</label>
                                <div class="col-md-9">
                                    <input type="text" 
                                           class="form-control" 
                                           name="firstname" 
                                           placeholder="First Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="lastname" 
                                       class="col-md-3 control-label">Last Name</label>
                                <div class="col-md-9">
                                    <input type="text" 
                                           class="form-control" 
                                           name="lastname" 
                                           placeholder="Last Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" 
                                       class="col-md-3 
                                       control-label">Password</label>
                                <div class="col-md-9">
                                    <input type="password" 
                                           class="form-control" 
                                           name="passwd" 
                                           placeholder="Password">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="icode"
                                       class="col-md-3
                                       control-label">Invitation Code</label>
                                <div class="col-md-9">
                                    <input type="text" 
                                           class="form-control" 
                                           name="icode" 
                                           placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <!-- Button -->                                        
                                <div class="col-md-offset-3 col-md-9">
                                    <button id="btn-signup" 
                                            type="button" 
                                            class="btn btn-info">
                                        <i class="icon-hand-right"></i> &nbsp; Sign Up</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <div id="loginbox" 
                 style="margin-top: 50px; display: none;" 
                 class="mainbox col-md-6 
                 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="panel-title">Sign In</div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px">
                            <a href="#">Forgot password?</a></div>
                    </div>     
                    <div style="padding-top:30px" class="panel-body">
                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                        <form id="loginform" class="form-horizontal" role="form">
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i>
                                </span>
                                <input id="login-username" 
                                       type="text" 
                                       class="form-control" 
                                       name="username" 
                                       value="" 
                                       placeholder="username">                                        
                            </div>
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-lock"></i></span>
                                <input id="login-password" 
                                       type="password" 
                                       class="form-control" 
                                       name="password" 
                                       placeholder="password">
                            </div>

                            <div class="input-group">
                                <div class="checkbox">
                                    <label>
                                        <input id="login-remember" 
                                               type="checkbox" 
                                               name="remember" 
                                               value="1"> 
                                        Remember me
                                    </label>
                                </div>
                            </div>
                            <div style="margin-top:10px" class="form-group">
                                <!-- Button -->
                                <div class="col-sm-12 controls">
                                    <a id="btn-login" href="#" class="btn btn-success">Login  </a>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 control">
                                    <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%">
                                        Don't have an account! 
                                        <a href="#" 
                                           onclick="$('#loginbox').hide(); $('#signupbox').show()">
                                            Sign Up Here
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6 col-sm-offset-3">
                                        <input type="submit" 
                                               name="register-submit" 
                                               id="register-submit" 
                                               tabindex="4" 
                                               class="form-control btn btn-register" 
                                               value="Register Now">
                                    </div>
                                </div>
                            </div>
                        </form>   
                    </div>                     
                </div>  
            </div>
            
        </div>
        <script type="text/javascript">
        </script>
    </body>
</html>