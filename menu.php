<?php

	require('./inc/Config.inc.php');
	if(!isset($_SESSION)){
		header("Location: 404.php");
		exit;
	}

	const HOME = "Pagina inicial";
	const CAD_OCORRENCIA = "Cadastrar nova ocorrência";
	const PARQUE = "Parque de iluminação";
	const CAD_PONTOS = "Cadastrar pontos de iluminação";
	const MANUTENCAO = "Lista de manutenções cadastrdas";
    const COMPONENTES = "Componentes";
    const USUARIOS = "Lista de usaurios";
	const RELATORIOS = "Relatorios";
?>

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

<nav class="navbar navbar-default" >
    <div class="container-fluid" style="margin: 10px 0px 30px 0px;">
        <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="btn-x navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="glyphicon glyphicon-option-vertical"></span>
                </button>
                <a class="navbar-brand" href="home.php"><img src="demos/logo.png" hspace="20px" width="170px" height="40px"></a>
            </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="glyphicon glyphicon-menu-hamburger"></span>&nbsp;&nbsp;&nbsp;
                        MENU&nbsp;<span class="caret"></span>
                    </a>
<?php
                    if ($_SESSION['isAdmin'] == Usuario::ADMIN){
?>
                    <ul id="menus" class="dropdown-menu">
                        <li><a href="home.php"><i class="glyphicon glyphicon-home"></i>
                                &nbsp;&nbsp;&nbsp;<?php echo HOME?></a></li>
                        <li><a href="nova-ocorrenca.php"><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>
                                &nbsp;&nbsp;&nbsp;<?php echo CAD_OCORRENCIA?></a></li>
                        <li><a href="parquedeiluminacao.php"><i class="glyphicon glyphicon-globe" aria-hidden="true"></i>
                                &nbsp;&nbsp;&nbsp;<?php echo PARQUE?></a></li>
                        <li><a href="cadastroPonto.php"><i class="glyphicon glyphicon-flash" aria-hidden="true"></i>
                                &nbsp;&nbsp;&nbsp;<?php echo CAD_PONTOS?></a></li>
                        <li><a href="manutencao.php"><i class="glyphicon glyphicon-cog" aria-hidden="true"></i>
                                &nbsp;&nbsp;&nbsp;<?php echo MANUTENCAO?></a></li>
                        <li><a href="componentes.php"><i class="glyphicon glyphicon-wrench" aria-hidden="true"></i>
                                &nbsp;&nbsp;&nbsp;<?php echo COMPONENTES?></a></li>
                        <li><a href="usuario.php"><i class="glyphicon glyphicon-user" aria-hidden="true"></i>
                                &nbsp;&nbsp;&nbsp;<?php echo USUARIOS?></a></li>
                        <li><a href="dashboard.php"><i class="glyphicon glyphicon-file" aria-hidden="true"></i>
                                &nbsp;&nbsp;&nbsp;<?php echo RELATORIOS?></a></li>
                    </ul>
<?php               } else if ($_SESSION['isAdmin'] == Usuario::TECNICO){
?>
                    <ul id="menus" class="dropdown-menu">
                        <li><a href="home.php"><i class="glyphicon glyphicon-home"></i>
                                &nbsp;&nbsp;&nbsp;<?php echo HOME?></a></li>
                        <li><a href="parquedeiluminacao.php"><i class="glyphicon glyphicon-globe" aria-hidden="true"></i>
                                &nbsp;&nbsp;&nbsp;<?php echo PARQUE?></a></li>
                        <li><a href="cadastroPonto.php"><i class="glyphicon glyphicon-flash" aria-hidden="true"></i>
                                &nbsp;&nbsp;&nbsp;<?php echo CAD_PONTOS?></a></li>
                        <li><a href="manutencao.php"><i class="glyphicon glyphicon-cog" aria-hidden="true"></i>
                                &nbsp;&nbsp;&nbsp;<?php echo MANUTENCAO?></a></li>
                        <li><a href="componentes.php"><i class="glyphicon glyphicon-wrench" aria-hidden="true"></i>
                                &nbsp;&nbsp;&nbsp;<?php echo COMPONENTES?></a></li>
                    </ul>

<?php               } else if ($_SESSION['isAdmin'] == Usuario::OPERADOR){
?>
                    <ul id="menus" class="dropdown-menu">
                        <li><a href="home.php"><i class="glyphicon glyphicon-home"></i>
                                &nbsp;&nbsp;&nbsp;<?php echo HOME?></a></li>
                        <li><a href="nova-ocorrenca.php"><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>
                                &nbsp;&nbsp;&nbsp;<?php echo CAD_OCORRENCIA?></a></li>
                        <li><a href="parquedeiluminacao.php"><i class="glyphicon glyphicon-globe" aria-hidden="true"></i>
                                &nbsp;&nbsp;&nbsp;<?php echo PARQUE?></a></li>
                        <li><a href="componentes.php"><i class="glyphicon glyphicon-wrench" aria-hidden="true"></i>
                                &nbsp;&nbsp;&nbsp;<?php echo MANUTENCAO?></a></li>
                    </ul>

<?php               } else if ($_SESSION['isAdmin'] == Usuario::USUARIO){
?>
                    <ul id="menus" class="dropdown-menu">
                        <li><a href="home.php"><i class="glyphicon glyphicon-home"></i>
                                &nbsp;&nbsp;&nbsp;<?php echo HOME?></a></li>
                        <li><a href="nova-ocorrenca.php"><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>
                                &nbsp;&nbsp;&nbsp;<?php echo CAD_OCORRENCIA?></a></li>
                        <li><a href="parquedeiluminacao.php"><i class="glyphicon glyphicon-globe" aria-hidden="true"></i>
                                &nbsp;&nbsp;&nbsp;<?php echo PARQUE?></a></li>
                    </ul>

<?php               }
?>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;&nbsp;
                        <?php echo strtoupper($_SESSION['usuario'])?>&nbsp;<span class="caret"></span>
                    </a>
                    <ul id="menus" class="dropdown-menu">
                        <li><a href="#"><span class="glyphicon glyphicon-map-marker"></span>&nbsp;&nbsp;&nbsp;Minhas ocorrências</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;&nbsp;Meus dados</a></li>
                        <li><a href="deslogar.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp;&nbsp;&nbsp;Desconectar</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>