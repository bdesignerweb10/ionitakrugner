<?php
	require_once('header.php');
	$servicos = $conn->query("select * from tbl_servicos order by id") or trigger_error($conn->error);
?>
<main class="maintable">
	<div class="container">
		<div class="row ger-default">
			<div class="col-sm-8"></div>
			<div class="col-sm-4">
				<button type="button" class="btn btn-default btn-lg btn-add" id="btn-add-servico"><i class="fas fa-plus"></i> Novo Serviço</button>
			</div><!-- col-sm-4-->
			<div class="col-sm-12 ger-servicos">
				<table class="table table-hover">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Nome do Serviço</th>
				      <th scope="col">Descrição do Serviço</th>
				      <th scope="col">Ativo</th>
				      <th scope="col">Opções</th>
				    </tr>
				  </thead>
				  <tbody>
				  <?php if ($servicos && $servicos->num_rows > 0) {
			    		while($service = $servicos->fetch_object()) {
			    		$id = $service->id;
				   ?>
				    <tr>
				      <th scope="row"><?php echo $service->id; ?></th>
				      <td><?php echo $service->nome; ?></td>
				      <td><?php echo nl2br (substr ($service->descricao, 0, 100)); ?>...</td>
				      <?php if ($service->ativo == 1) { 
			        	$ativo ='fas fa-check text-success'; 
				      	} else { 
				      		$ativo ='fas fa-times text-danger';
				      	} 
				      ?>
				      <td><span><i class='<?php echo $ativo; ?>'></span></td>
				      <td>
				      	<span><a href="" class="text-primary btn-edit-servicos" data-id="<?php echo $id;?>" alt="Editar Serviço <?php echo $service->id; ?>" title="Editar serviços <?php echo $service->id; ?>"><i class="fas fa-edit"></i></a></span>
				      	<span><a href="" class="text-danger btn-del-servicos" data-id="<?php echo $id;?>" alt="Remover serviço <?php echo $service->id; ?>" title="Remover serviço <?php echo $service->id; ?>"><i class="fas fa-trash-alt"></i></a></span>
				      </td>
				    </tr>
				    <?php } ?>			        	
						<?php } else { ?>					
							<tr>
					        	<td colspan="5" align="center">Não há dados a serem exibidos para a listagem.</td>
				            </tr>
					<?php } ?>
				  </tbody>
				</table>
			</div><!-- col-sm-12-->
		</div><!-- row -->
	</div><!-- container-->
</main>

<main class="mainform">
	<div class="container">
		<div class="row ger-default">
			<div class="col-sm-8"></div>
			<div class="col-sm-4">
				<button type="button" class="btn btn-default btn-lg btn-voltar" id="btn-voltar-servico"><i class='fa fa-arrow-left'></i> Voltar</button>
			</div><!-- col-sm-4-->	
			<div class="col-sm-8 form-border">	
				<h3>Gerenciamento de Serviços</h3>			
				<form id="form-servicos" class="form-row" data-toggle="validator" action="acts/acts.servicos.php" method="POST">
				  <div class="form-group col-sm-1">
					<label for="id">ID</label>
			    	<input type="number" class="form-control" id="id" name="id" aria-describedby="id" maxlength="11" disabled />
				  </div>	
				  <div class="form-group col-sm-11">
				    <label for="nome">Nome do Serviço</label>
				    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do Serviço" required>
				  </div>
				  <div class="form-group col-sm-12">
				    <label for="img">Imagem do Serviço</label>
				    <input type="file" class="form-control-file" id="img" name="img" required>
				  </div>
				  <div class="form-group col-sm-12">
				    	<textarea class="form-control" id="descricao" name="descricao" rows="5" placeholder="Descrição do serviço" required></textarea>
				  </div>
				  <div class="form-group col-sm-12">				      
				      <div class="checkbox" style="margin-left: 20px;">
						<label>
							<input type="checkbox" id="ativo" name="ativo" data-toggle="toggle" data-on="Sim" data-off="Não" data-onstyle="success" data-offstyle="danger">
							Se o estiver ativo, aparecerá na página inicial do site
						</label>
					   </div>
			      </div>
				  <div class="col-sm-8"></div>
				  <div class="col-sm-8"></div>				 
				  <div class="col-sm-4">
				  	<button type="submit" class="btn btn-form btn-primary mb-2 form-control" id="btn-salvar-servico">Salvar Serviço</button>
				  </div>
				</form>
			</div><!-- col-sm-8-->
			<div class="col-sm-4 access">
				<?php
					require_once('acesso-rapido.php');
				?>
			</div>
		</div><!-- row -->
	</div><!-- container-->
</main>
<?php
	require_once('footer.php');
?>