<?php 
	include 'header.php'; 

	$origem = $_GET['origem'];
  	$destino = $_GET['destino'];
?>

<div class="row">

<?php include 'menu.php'; ?>
	
	<div class="col-sm-10"> 
		<input type="hidden" id="txtEnderecoPartida" name="txtEnderecoPartida" value="<?php echo $destino; ?>" />
		<input type="hidden" id="txtEnderecoChegada" name="txtEnderecoChegada" value="<?php echo $origem ?>"/>

		<div id="mapa" class="col-sm-6" style="height: 500px"></div>
		            
		<div class="col-sm-6" id="trajeto-texto" class="trajeto"></div>
		        
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		  
		<!-- Maps API Javascript -->
		<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBOGFtsLU7B-svf5jD7ssiWp2UMwSK0DwY&force=canvas"></script>
		 
		<!-- Arquivo de inicialização do mapa -->
		<script src="js/mapa.js"></script>

	</div>

<?php include 'footer.php'; ?>