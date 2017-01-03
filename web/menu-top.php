<?php
require('./inc/Config.inc.php');

if(!isset($_SESSION)){
    header("Location: 404.php");
    exit;
}

define("MEUS_DADOS", "Meus dados");
define("DESLOGAR", "Deslogar");
?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>

    $(function(){
        $("#menus li").css({
            "padding": "5px 0px 5px 0px"
        });
        $("").css({
            "position": "relative",
            "top": "50%",
            "transform": "translateY(-50%)"
        });
    });
</script>

<nav class="navbar navbar-default navbar-static-top" style="position: fixed; width: 100%; z-index: 10;">
    <div class="" >
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header" >
            <a href="home.php">
                <img src="demos/logo-ico.png" class="navbar-brand" hspace="20px" >
            </a>
            <button type="button" class="btn-x navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="glyphicon glyphicon-option-vertical"></span>
            </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav navbar-right" style="padding-right: 30px;">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;&nbsp;
                        <?php echo strtoupper($_SESSION['usuario'])?>&nbsp;<span class="caret"></span>
                    </a>
                    <ul id="menus" class="dropdown-menu">
                        <li ><a href="#"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;&nbsp;
                                <?php echo MEUS_DADOS?></a></li>
                        <li><a href="deslogar.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp;&nbsp;&nbsp;
                                <?php echo DESLOGAR; ?></a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>