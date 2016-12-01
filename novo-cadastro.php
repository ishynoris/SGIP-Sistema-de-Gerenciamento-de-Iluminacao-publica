<?php
	require('./inc/Config.inc.php');
	include 'controller/NovoUsuarioController.class.php';
	
	$controller = new UsuarioController;
	$controller->activePost(array('btn-back', 'btn-save'));
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/adminStyle.css">
	 	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/chosen.min.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="http://digitalbush.com/wp-content/uploads/2014/10/jquery.maskedinput.js"></script>

        <script type="text/javascript" src="js/script.mascaras.js"></script>
        <script type="text/javascript" src="js/script.novo.cadastro.js"></script>
        <script type="text/javascript" src="js/chosen.jquery.min.js"></script>
	</head>
	
	<body>
		<div class="col-sm-12">
			<form id="myform" class="bk clear" style="padding: 30px; margin:50px" method="post">
				
				<div id="form-novo-cadastro" class="form-group">
				<legend style="padding-bottom: 10px;"><span class="label label-default">+</span>&nbsp;&nbsp;Novo cadastro </legend>
				
					<div class="row"  >
						<label class="col-sm-2 text-right">Tipo de usuário</label>
						<div class="col-sm-2">
							<select id="tipo-usuario" name="tipo-usuario" disabled>
								<option class="form-control" value="0">Administrador</option>
								<option class="form-control" value="1">Equipe Técnica</option>
								<option class="form-control" value="2" selected>Usuário comum</option>
							</select>
						</div>
					</div><br/>
					<div class="row"  >
						<label class="col-sm-2 text-right">Nome</label>
						<div class="col-sm-10">
							<input type="text" name='nome' class="form-control" data-toggle="tooltip" data-placement="top" title="Oi eu sou o goku">
						</div>
					</div><br/>
					<div class="row"  >
						<label class="col-sm-2 text-right">CPF</label>
						<div class="col-sm-2">
							<input onblur="validateCPF(this.value)" type="text" id="cpf" name="cpf" value="03539933522" class="form-control" >
						</div>
						<label class="col-sm-2 text-right">Data de nascimento</label>
						<div class="col-sm-2">
							<input type="text" onblur="validateData(this.value)" id="nascimento" name="nascimento" value="29041990" class="form-control">
						</div>
						<label class="col-sm-1 text-right">Sexo</label>
						<div class="col-sm-2">
							<select name="sexo"/>
								<option class="form-control" value="F">Feminino</option>
								<option class="form-control" value="M">Masculino</option>
							</select>
						</div>
					</div><br/>
					<div class="row">	
						<label class="col-sm-2 text-right">E-mail</label>
						<div class="col-sm-5">
							<input type="text" name="email" class="form-control">
						</div>
						<label class="col-sm-2 text-right">Telefone</label>
						<div class="col-sm-3">
							<input type="text" id="telefone" name="telefone" value="79998974630" class="form-control">
						</div>
					</div><br/>
					
					<div class="row" > 
					
					</div>
					<div class="row" > 		
						<label class="col-sm-2 text-right">CEP</label>
						<div class="col-sm-2">
							<input onblur="searchCEP(this.value)" type="text" id="cep" name="cep" value="49503429" class="form-control"/>
						</div>
						<div class="col-sm-1">
							<h5><span class="label label-primary" >
								<a target='_blank' href="http://www.buscacep.correios.com.br/sistemas/buscacep/buscaCep.cfm">Consultar CEP</a></span></h5>
						</div>
						<label class="col-sm-2 text-right">Logradouro</label>
						<div class="col-sm-5">
							<input type="text" id="logradouro" name="logradouro" class="form-control" disabled>
						</div>
					</div><br/>
					<div class="row" > 
						<label class="col-sm-2 text-right">Numero</label>
						<div class="col-sm-2">
							<input type="text" id="numPredialProx" name="numPredialProx" class="form-control" >
						</div>
						<label class="col-sm-2 text-right">Complemento</label>
						<div class="col-sm-6">
							<input type="text" id="complemento" name="complemento" class="form-control">
						</div>
					</div><br/>
					
					<div class="row"> 
					
						<label class="col-sm-2 text-right">Bairro</label>
						<div class="col-sm-3">
							<input type="text" id="bairro"name="bairro" class="form-control" disabled>
						</div>
						<label class="col-sm-1 text-right ">Cidade</label>
						<div class="col-sm-4">
							<input type="text" id="cidade" name="cidade" class="form-control" disabled>
						</div>
						
						<label class="col-sm-1 text-right ">UF</label>
						<div class="col-sm-1">
							<input type="text" id="uf" name="uf" class="form-control" disabled>
						</div>
					</div><br/>

                    <div class="row" >
                        <label class="col-sm-2 text-right">Senha</label>
                        <div class="col-sm-2">
                            <input onblur="verifyPass(this)" type="password" name="senha" class="form-control" >
                        </div>
                        <label class="col-sm-2 text-right">Confirme sua senha</label>
                        <div class="col-sm-2">
                            <input onblur="isMatchPassword()" type="password" name="conf-senha" class="form-control">
                        </div>
                    </div><br/>
					<div class="row" > 						
						<label class="col-sm-12" >Observação sobre o endereço</label>
					</div><br/>
					<div class="row">
						<div class="col-sm-12" style="float: right">
							<textarea name="endereco-obs" class="form-control" rows="5"></textarea>
						</div>
					</div><br/>
					<div class="row" style="margin-top: 20px; padding-left: 200px; padding-right: 200px;">
						<input type="submit" name="btn-back" value="Voltar" class="btn btn-lg btn-primary" style="float: left">
						<input type="submit" name="btn-save" value="Salvar" class="btn btn-lg btn-primary" style="float: right">
					</div>
				</div>
			</form>
		</div>
	</body>
</html>