<?php 
	include 'header.php'; 
	include 'menu-top.php';
	include 'controller/PontoIluminacaoController.class.php';
?>	
	
    <style>
        .line{
            padding: 30px;
            margin: 70px 20px 0px 50px;
        }
    </style>
	<div class="row">

<?php 
	
	include 'menu-left.php';

	$numero = $_GET['pid'];
	$conservacao = $_GET['sid'];
	$id = $_SESSION['id'];
?>
		<div class="col-sm-10">
			<div class="bk line" >
				<legend style="padding-bottom:10px; margin-bottom: 50px">
					<span class="glyphicon glyphicon-flash"></span>&nbsp;&nbsp;&nbsp;Pontos de iluminação
				</legend>		
<?php 

				if(empty($numero) || empty($conservacao) || empty($id)){
					header("Location: pontos-iluminacao.php");
					exit;
				} else {
					$controller = new PontoIluminacaoController();
					$flag = $controller->delete($numero, $conservacao);
				}

?>			</div>
		</div>
	</div>