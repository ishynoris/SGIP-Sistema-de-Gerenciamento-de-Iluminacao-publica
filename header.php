<?php	  
    session_start();
    ob_start();

	if (!$_SESSION['login']) {
        session_destroy();
        header("Location: index.php"); 
        exit;
    }

	include 'function.php';
	$dtibd = new DTIDb("localhost", "viare024_sip", "viare024_sip", "iwd5QplD?$(9");

?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="utf-8">

		<!-- Estilos -->
		<link rel="stylesheet" type="text/css" href="css/adminStyle.css">
		<link rel="stylesheet" type="text/css" media="print" href="css/adminStyle.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	 	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	 	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
	 	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
	 	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	 	<link rel="stylesheet" href="https://js.arcgis.com/4.0/esri/css/main.css">
	 	<link rel="shortcut icon" href="//esri.github.io/quickstart-map-js/images/favicon.ico">
		<link rel="stylesheet" href="//js.arcgis.com/3.10/js/esri/css/esri.css">		
    	<link rel="stylesheet" href="//esri.github.io/bootstrap-map-js/src/css/bootstrapmap.css">

		<!-- Javascript -->		
	 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script type="text/javascript" src="vendor/terraformer/terraformer.min.js"></script>
		<script type="text/javascript" src="vendor/terraformer-arcgis-parser/terraformer-arcgis-parser.min.js"></script>
		<script type="text/javascript" src="http://js.arcgis.com/3.10"></script>
	 	<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js" ></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
	 	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	 	<script type="text/javascript" src="js/npm.js"></script>
	 	<script type="text/javascript" src="js/mapas.js"></script>
    	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>	
    	<script type="text/javascript" src="http://cidades-estados-js.googlecode.com/files/cidades-estados-v0.2.js"></script> 
		<script type="text/javascript">
		    window.onload = function() {
		        new dgCidadesEstados( 
		            document.getElementById('estado'), 
		            document.getElementById('cidade'), 
		            true
		        );
		    }
		</script>
		<script type='text/javascript'>
			$(function(){
			    $("#tabela input").keyup(function(){       
			        var index = $(this).parent().index();
			        var nth = "#tabela td:nth-child("+(index+1).toString()+")";
			        var valor = $(this).val().toUpperCase();
			        $("#tabela tbody tr").show();
			        $(nth).each(function(){
			            if($(this).text().toUpperCase().indexOf(valor) < 0){
			                $(this).parent().hide();
			            }
			        });
			    });
			 
			    $("#tabela input").blur(function(){
			        $(this).val("");
			    });
			});
		</script>	
		<script>
		function printPageArea(){
		    var divToPrint=document.getElementById("tabela");
			newWin= window.open("");
			newWin.document.write(divToPrint.outerHTML);
			newWin.print();
			newWin.close();	
		}
		</script>	
		
	 	<title>Sistema de Iluminacão Publica</title>
	</head>
 <body>

