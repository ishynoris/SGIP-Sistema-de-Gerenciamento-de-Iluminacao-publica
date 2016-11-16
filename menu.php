<?php
	include 'classes/Usuario.class.php';

	if ($_SESSION['isAdmin'] == Usuario::ADMIN) {
?>

<div class="col-sm-2">

	<div class="nav-side-menu">
	
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<h3><strong><?php echo $_SESSION['usuario']; ?></strong></h3>
			<a href="deslogar.php" style="color: #a8bbba;">Desconectar</a>
		</div>
	
		<div class="menu-list" style="clear: both">  
			<ul id="menu-content" class="menu-content out" >
				<li><a href="home.php">
					<i class="fa fa-tachometer" aria-hidden="true"></i>Pagina Inicial</a></li>             
				<li><a class="links" href="registrarOcorrencia.php">
					<i class="fa fa-users" aria-hidden="true"></i>Atendimento</a></li>
				<li><a class="links" href="parquedeiluminacao.php">
					<i class="fa fa-lightbulb-o" aria-hidden="true"></i>Parque de Iluminação </a></li>
				<li><a class="links" href="cadastroPonto.php">
					<i class="fa fa-bolt" aria-hidden="true"></i>Cadastro de Pontos</a></li>
				<li><a class="links" href="manutencao.php">
					<i class="fa fa-cog" aria-hidden="true"></i>Manutenção</a></li>
				<li><a class="links" href="componentes.php">
					<i class="fa fa-plus-circle" aria-hidden="true"></i>Componentes</a></li>
				<li><a class="links" href="usuario.php">
					<i class="fa fa-street-view" aria-hidden="true"></i>Usuario</a></li>
				<li><a class="links" href="dashboard.php">
					<i class="fa fa-file-pdf-o" aria-hidden="true"></i>Relatorios</a></li>
			</ul>
		</div>
	</div>
</div>

<?php 
	} else if ($_SESSION['isAdmin'] == Usuario::TECNICO) {
?>

<div class="col-sm-2">
	<div class="nav-side-menu">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
        	</button>

	        <h3><strong><?php echo $_SESSION['usuario']; ?></strong></h3>
        	<a href="deslogar.php" style="color: #a8bbba;">Desconectar</a>
		</div>
      
		<div class="menu-list" style="clear: both">  
			<ul id="menu-content" class="menu-content out" >
				<li><a href="home.php"><i class="fa fa-tachometer" aria-hidden="true">
					</i>Pagina Inicial</a></li>
				<li><a class="links" href="parquedeiluminacao.php">
					<i class="fa fa-lightbulb-o" aria-hidden="true"></i>Parque de Ilumina��o </a></li>
				<li><a class="links" href="cadastroPonto.php">
					<i class="fa fa-bolt" aria-hidden="true"></i>Cadastro de Pontos</a></li>
				<li><a class="links" href="manutencao.php">
					<i class="fa fa-cog" aria-hidden="true"></i>Manutenção</a></li>
				<li><a class="links" href="componentes.php">
					<i class="fa fa-plus-circle" aria-hidden="true"></i>Componentes</a></li>
			</ul>
		</div>
	</div>
</div>

<?php 
	} else if ($_SESSION['isAdmin'] == Usuario::USUARIO){ 
?>

<div class="col-sm-2">
	<div class="nav-side-menu">
		<div class="navbar-header">
		
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<h3><strong><?php echo $_SESSION['usuario']; ?></strong></h3>
			<a href="deslogar.php" style="color: #a8bbba;">Desconectar</a>
		</div>
		
		<div class="menu-list" style="clear: both">  
			<ul id="menu-content" class="menu-content out" >
				<li><a href="home.php">
					<i class="fa fa-tachometer" aria-hidden="true"></i>Pagina Inicial</a></li>             
				<li><a class="links" href="registrarOcorrencia.php">
					<i class="fa fa-users" aria-hidden="true"></i>Atendimento</a></li>
				<li><a class="links" href="parquedeiluminacao.php">
					<i class="fa fa-lightbulb-o" aria-hidden="true"></i>Parque de Iluminação </a></li>
			</ul>
		</div>
  </div>
</div>

<?php 
	} 
?>