<?php
	require_once('header.php');
	$jurisprudencia = $conn->query("select * from tbl_jurisprudencia order by id_jurisprudencia") or trigger_error($conn->error);
	$jurisprudencia_grupo = $conn->query("select * from  tbl_jurisprudencia_grupo where ativo = 1") or trigger_error($conn->error);
?>
<main class="maintable">
	<div class="container">
		<div class="row ger-default">
			<div class="col-sm-8"></div>
			<div class="col-sm-4">
				<button type="button" class="btn btn-default btn-lg btn-add" id="btn-add-jurisprudencia"><i class="fas fa-plus"></i> Nova Jurisprudência</button>
			</div><!-- col-sm-4-->
			<div class="col-sm-12 ger-servicos">
				<table class="table table-hover">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Título da Jurisprudência</th>
				      <th scope="col">Descrição da Jurisprudência</th>
				      <th scope="col">Ativo</th>
				      <th scope="col">Opções</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php if ($jurisprudencia && $jurisprudencia->num_rows > 0) {
			    		while($juris = $jurisprudencia->fetch_object()) {
			    		$id = $juris->id_jurisprudencia;
				    ?>
				    <tr>
				      <th scope="row"><?php echo $juris->id_jurisprudencia; ?></th>
				      <td><?php echo $juris->nome; ?></td>
				      <td><?php echo nl2br (substr ($juris->descricao, 0, 100)); ?>...</td>
				      <?php if ($juris->ativo == 1) { 
			        	$ativo ='fas fa-check text-success'; 
				      	} else { 
				      		$ativo ='fas fa-times text-danger';
				      	} 
				      ?>
				      <td><span><i class='<?php echo $ativo; ?>'></span></td>
				      <td>
				      	<span><a href="" class="text-primary btn-edit-jurisprudencia" data-id="<?php echo $id;?>" alt="Editar Jurisprudência<?php echo $juris->id_jurisprudencia; ?>" title="Editar Jurisprudência <?php echo $juris->id_jurisprudencia; ?>"><i class="fas fa-edit"></i></a></span>
				      	<span><a href="" class="text-danger btn-del-jurisprudencia" data-id="<?php echo $id;?>" alt="Remover jurisprudência <?php echo $juris->id_jurisprudencia; ?>" title="Remover jurisprudência <?php echo $juris->id_jurisprudencia; ?>"><i class="fas fa-trash-alt"></i></a></span>
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
				<button type="button" class="btn btn-default btn-lg btn-voltar" id="btn-voltar-jurisprudencia"><i class='fa fa-arrow-left'></i> Voltar</button>
			</div><!-- col-sm-4-->	
			<div class="col-sm-8 form-border">	
				<h3>Gerenciamento de Jurisprudência</h3>			
				<form class="form-row" id="form-jurisprudencia" data-toggle="validator" action="acts/acts.jurisprudencias.php" method="POST">
				  <div class="form-group col-sm-1">
					<label for="id">ID</label>
			    	<input type="number" class="form-control" id="id" name="id" aria-describedby="id" maxlength="11" disabled />
				  </div>	
				  <div class="form-group col-sm-4">
				      <label for="inputState">Grupo</label>
				      <select id="grupo" name="grupo" class="form-control">
				        <?php if ($jurisprudencia_grupo && $jurisprudencia_grupo->num_rows > 0) {
			    			while($grupo = $jurisprudencia_grupo->fetch_object()) {
			    			$id = $grupo->id_grupo;
				   		?>
				   		<option value="<?php echo $id; ?>"><?php echo $grupo->nome; ?></option>
				        	<?php } ?>			        	
						<?php }?>
				      </select>
			      </div>	
				  <div class="form-group col-sm-7">
				    <label for="formGroupExampleInput">Nome da Jurisprudência</label>
				    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome da Jurisprudência" required>
				  </div>				  
				  <div class="form-group col-sm-12">
				    <textarea class="form-control" id="descricao" name="descricao" rows="5" placeholder="Descrição da jurisprudência" required></textarea>
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
				  	<button type="submit" class="btn btn-form btn-primary mb-2" id="btn-salvar-jurisprudencia">Salvar Jurisprudência</button>
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