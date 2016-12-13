<?php include 'header.php'; ?>

<div class="row">

<?php include 'menu.php'; ?>

  
	<div class="col-sm-9">
		<div id="mapDiv"></div>
	
		<form action="" method="post">
			<div class="table-responsive">
				<table class="bk" width="100%" id="tabela" style="margin-top: 50px;">
					<tr>
						<th>Logradouro</th>
						<th>Status de Conservação</th>
						<th>Numero da Placa</th>
						<th>Caracteristicas</th>
					</tr>
					<tr>
						<th style="background: #fff;color: #000;border: 1px solid #ccc;padding: 0px !important; "><input type="text"  style="border: 1px solid #fff;"   class="form-control login-field" id="txtColuna1" placeholder="Filtrar por Endereco"/></th>
						<th style="background: #fff;color: #000;border: 1px solid #ccc;padding: 0px !important; "><input type="text"  style="border: 1px solid #fff;" class="form-control login-field" id="txtColuna2" placeholder="Filtrar por Status"/></th>
						<th style="background: #fff;color: #000;border: 1px solid #ccc;padding: 0px !important; "><input type="text"  style="border: 1px solid #fff;" class="form-control login-field" id="txtColuna3" placeholder="Filtrar por Numero da Placa"/></th>
						<th style="background: #fff;color: #000;border: 1px solid #ccc;padding: 0px !important; "></th>
					</tr>

					<?php 
					$buscaProdutos = $dtibd->executarQuery("select","SELECT * FROM pontoiluminacao");

				
					foreach ((array) $buscaProdutos as $result) {
					?>
					<tr>
						<td class="tdPers"><?php echo $result['logradouro']; ?></td>
						<td class="tdPers"><?php echo $result['statusConservacao']; ?></td>
						<td class="tdPers"><?php echo $result['numeroDaPlaca']; ?></td>
						<td class="tdPers">
						<?php if ($_SESSION['isAdmin'] == 0) { ?>
							<a href="excluirPonto.php?id=<?php echo $result['id']; ?>&log=<?php echo urlencode($result['logradouro']); ?>" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
							<a href="editarPonto.php?id=<?php echo $result['id']; ?>" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
						<?php } ?>
							<a href="detalhesPonto.php?id=<?php echo $result['id']; ?>" class="btn btn-success"><i class="fa fa-search-plus" aria-hidden="true"></i></a>

						</td>

					</tr>
					<?php 
						}
					?>
				</table>
			</div>
		</form>
	</div>
</div>
