<?php
header('Content-Type: text/html; charset=utf-8');
include 'function.php';

$dtibd = new DTIDb("localhost", "viare024_sip", "viare024_sip", "iwd5QplD?$(9");

$resultado = $dtibd -> executarQuery("select","SELECT * FROM ocorrencia");

?>

<style type="text/css">
	input{
		display: block;
	    width: 100%;
	    height: 34px;
	    padding: 6px 12px;
	    font-size: 14px;
	    line-height: 1.42857143;
	    color: #555;
	    background-color: #fff;
	    background-image: none;
	    border: 1px solid #ccc;
	    border-radius: 4px;
	    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
	    box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
	    -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
	    -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
	    transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
	}

	button{
		margin-top: 20px;
	    float: right;
	    background-color: #3498db;
	    color: #fff;
	    border: none;
	    border-radius: 10px;
	    padding: 20px;
	}
</style>

<table width="100%" border="1" cellpadding="2" cellspacing="0" id="tabela">
		<tr>
			<th colspan="2"><img src="http://www.viaretaluz.com.br/images/logo.png"/></th>
			<th colspan="5" style="font-size: 35px;text-transform: uppercase;font-weight: bold;">Relátorio de Atendimento</th></tr>
		<tr>
			<th>Numero do Protocolo</th>
			<th>Status</th>
			<th>Data</th>
			<th>Nome do Municipe</th>
			<th>Endereco do Municipe</th>
			<th>Descricao</th>
		</tr>

		<tr id="filtro">
			<th style="background: #fff;color: #000;padding: 0px !important; "><input type="text" class="form-control login-field" id="txtColuna1" placeholder="Filtrar por Protocolo"/></th>
			<th style="background: #fff;color: #000;padding: 0px !important; "><input type="text" class="form-control login-field" id="txtColuna2" placeholder="Filtrar por Status"/></th>
			<th style="background: #fff;color: #000;padding: 0px !important; "><input type="text" class="form-control login-field" id="txtColuna3" placeholder="Filtrar por Data"/></th>
			<th style="background: #fff;color: #000;padding: 0px !important; "><input type="text" class="form-control login-field" id="txtColuna4" placeholder="Filtrar por Nome"/></th>
			<th style="background: #fff;color: #000;padding: 0px !important; "><input type="text" class="form-control login-field" id="txtColuna5" placeholder="Filtrar por Endereco"/></th>
			<th style="background: #fff;color: #000;padding: 0px !important; "><input type="text" class="form-control login-field" id="txtColuna6" placeholder="Filtrar por Descricao"/></th>
		</tr>

<?php
foreach ($resultado as $key) {
?>
	
		<tr style="text-align: center">
			<td><?php echo $key['numeroProtocolo']; ?></td>
			<td><?php echo $key['status']; ?></td>
			<td><?php echo $key['data']; ?></td>
			<td><?php echo $key['nomeMunicipe']; ?></td>
			<td><?php echo $key['enderecoMunicipe']; ?></td>
			<td><?php echo $key['descricao']; ?></td>
		</tr>


<?php
}
?>
</table>

<button onclick="myFunction()" id="botao" >Imprimir</button>

<script>
function myFunction() {
	document.getElementById("botao").style.display = "none";
	document.getElementById("filtro").style.display = "none";
    window.print();
}
</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
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
