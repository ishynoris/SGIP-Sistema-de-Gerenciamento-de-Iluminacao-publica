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

    <link rel="stylesheet" type="text/css" href="css/adminLogin.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/npm.js"></script>
    <title>Area Administrativa</title>
</head>

<body>
<section class="container">
    <div class="wrapper" style="padding: 80px">
        <img src="demos/logo.png">
    </div>

    <article class="col-sm-12">
        <div class="col-sm-4 col-sm-offset-4 login">

            <form action="" method="post">

                <div class="input-group-lg">
                    <input type="text" name="edtLogin" class="form-control" placeholder="CPF" /><br>
                    <input type="password" name="edtSenha" class="form-control" placeholder="Senha"/>
                </div><br>

                <input type="submit" class="btn btn-primary btn-lg btn-block btnLogin"
                       value="Entrar" name="<?php echo IndexController::BTN_SEND?>" style="margin-bottom: 20px;"/>
                <div class="btn-group btn-group-justified" role="group" aria-label="...">
                    <div class="btn-group" role="group">
                        <input type="submit" class="btn btn-info btn-lg" name="<?php echo IndexController::BTN_REGISTER?>" value="Novo cadastro" />
                    </div>
                    <div class="btn-group" role="group">
                        <input type="submit" class="btn btn-default btn-lg" name="<?php echo IndexController::BTN_RECOVER?>" value="Recuperar a senha"/>
                    </div>
                </div>
            </form>
        </div>
    </article>
</section>
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