<?php

include_once './controller/IndexController.class.php';
$error = "";

$controller = new IndexController();
$error = $controller->triggerInput($controller->getInputAction());
if($error == IndexController::LOGIN_SENHA_VALIDO){
    header("Location: home.php");
    exit;
}

?>
<!DOCTYPE HTML>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">

    <link rel="shortcut icon" href="//esri.github.io/quickstart-map-js/images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/adminLogin.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">

    <style>
        .container{
            width: 100vw;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
        }
        .container-h40{
            height: 40vh;
        }
    </style>

    <!--<script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/npm.js"></script>-->
    <title>Area Administrativa</title>
</head>

<body>
    <div class="col-sm-10 container container-h40">
        <img src="demos/logo.png">
    </div>
    <div class="container">
        <div class="login">
            <form method="post">
                <div class="input-group-lg">
                    <input type="text" name="edtLogin" class="form-control" placeholder="CPF"/><br>
                    <input type="password" name="edtSenha" class="form-control" placeholder="Senha"/>
                </div><br>
                <input type="submit" class="btn btn-primary btn-lg btn-block btnLogin"
                    value="Entrar" name="<?php echo IndexController::BTN_SEND?>" style="margin-bottom: 20px;"/>
                <div class="">
                    <div class="btn-group">
                        <input type="submit" class="btn btn-info btn-lg" name="<?php echo IndexController::BTN_REGISTER?>" value="Novo cadastro" />
                    </div>
                    <div class="btn-group">
                        <input type="submit" class="btn btn-default btn-lg" name="<?php echo IndexController::BTN_RECOVER?>" value="Recuperar a senha"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php
if ($error == IndexController::LOGIN_SENHA_NULL || $error == IndexController::LOGIN_SENHA_INVALIDO){
        ?>
    <div style="padding-top:50px;">
        <div class="wrapper alert alert-danger" role="alert"><?php echo $error;?></div>
    </div>
    <?php
}
?>
</body>

</html>