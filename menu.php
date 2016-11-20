<?php
	if(!isset($_SESSION)){
		header("Location: 404.php");
		exit;
	}
	
	include 'classes/usuario.class.php';

	define("HOME",  "Pagina inicial");
	define("CAD_OCORRENCIA", "Cadastrar nova ocorrência");
	define("PARQUE", "Parque de iluminação");
	define("CAD_PONTOS", "Cadastrar pontos de iluminação");
	define("MANUTENCAO", "Manutenção");
	define("COMPONENTES", "Componentes");
	define("USUARIOS", "Listagem de usaurios");
	define("RELATORIOS", "Relatorios");
	
	if ($_SESSION['isAdmin'] == Usuario::ADMIN) {
?>
<div class="col-sm-2" >

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
					<i class="fa fa-tachometer" aria-hidden="true"></i><?php echo HOME?></a></li>             
				<li><a class="links" href="registrarOcorrencia.php">
					<i class="fa fa-users" aria-hidden="true"></i><?php echo CAD_OCORRENCIA?></a></li>
				<li><a class="links" href="parquedeiluminacao.php">
					<i class="fa fa-lightbulb-o" aria-hidden="true"></i><?php echo PARQUE?></a></li>
				<li><a class="links" href="cadastroPonto.php">
					<i class="fa fa-bolt" aria-hidden="true"></i><?php echo CAD_PONTOS?></a></li>
				<li><a class="links" href="manutencao.php">
					<i class="fa fa-cog" aria-hidden="true"></i><?php echo MANUTENCAO?></a></li>
				<li><a class="links" href="componentes.php">
					<i class="fa fa-plus-circle" aria-hidden="true"></i><?php echo COMPONENTES?></a></li>
				<li><a class="links" href="usuario.php">
					<i class="fa fa-street-view" aria-hidden="true"></i><?php echo USUARIOS?></a></li>
				<li><a class="links" href="dashboard.php">
					<i class="fa fa-file-pdf-o" aria-hidden="true"></i><?php echo RELATORIOS?></a></li>
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
					</i><?php echo HOME?></a></li>
				<li><a class="links" href="parquedeiluminacao.php">
					<i class="fa fa-lightbulb-o" aria-hidden="true"></i><?php echo PARQUE?></a></li>
				<li><a class="links" href="cadastroPonto.php">
					<i class="fa fa-bolt" aria-hidden="true"></i><?php echo CAD_PONTOS?></a></li>
				<li><a class="links" href="manutencao.php">
					<i class="fa fa-cog" aria-hidden="true"></i><?php echo MANUTENCAO?></a></li>
				<li><a class="links" href="componentes.php">
					<i class="fa fa-plus-circle" aria-hidden="true"></i><?php echo COMPONENTES?></a></li>
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
					<i class="fa fa-tachometer" aria-hidden="true"></i><?php echo HOME?></a></li>             
				<li><a class="links" href="registrarOcorrencia.php">
					<i class="fa fa-users" aria-hidden="true"></i><?php echo CAD_OCORRENCIA?></a></li>
				<li><a class="links" href="parquedeiluminacao.php">
					<i class="fa fa-lightbulb-o" aria-hidden="true"></i><?php echo PARQUE?> </a></li>
			</ul>
		</div>
  </div>
</div>

<?php 
	} 
?>