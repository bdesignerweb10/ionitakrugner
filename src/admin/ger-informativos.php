<?php
	require_once('header.php');
	$informativos = $conn->query("select * from tbl_informativos order by id_info") or trigger_error($conn->error);
	$info_img = $conn->query("select * from tbl_informativos_img where ativo = 1") or trigger_error($conn->error);
?>
<main class="maintable">
	<div class="container">
		<div class="row ger-default">
			<div class="col-sm-8"></div>
			<div class="col-sm-4">
				<button type="button" class="btn btn-default btn-lg btn-add" id="btn-add-informativo"><i class="fas fa-plus"></i> Novo Informativo</button>
			</div><!-- col-sm-4-->
			<div class="col-sm-12 ger-servicos">
				<table class="table table-hover">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Título do informativo</th>
				      <th scope="col">Data postagem</th>
				      <th scope="col">Ativo</th>
				      <th scope="col">Opções</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php if ($informativos && $informativos->num_rows > 0) {
			    		while($info = $informativos->fetch_object()) {
			    		$id = $info->id_info;
				   	?>
				    <tr>
				      <th scope="row"><?php echo $info->id_info; ?></th>
				      <td><?php echo $info->titulo; ?></td>
				      <td><?php if($info->data_postagem != null) {$timestamp = strtotime($info->data_postagem); echo date('d/m/Y', $timestamp);} else {echo 'Sem data';} ?></td>
				      <?php if ($info->ativo == 1) { 
			        	$ativo ='fas fa-check text-success'; 
				      	} else { 
				      		$ativo ='fas fa-times text-danger';
				      	} 
				      ?>
				      <td><span><i class='<?php echo $ativo; ?>'></span></td>
				      <td>
				      	<span><a href="" class="text-primary btn-edit-informativos" data-id="<?php echo $id;?>" alt="Editar Informativos <?php echo $info->id_info; ?>" title="Editar informativos <?php echo $info->id_info; ?>"><i class="fas fa-edit"></i></a></span>
				      	<span><a href="" class="text-danger btn-del-informativos" data-id="<?php echo $id;?>" alt="Remover informativos <?php echo $info->id_info; ?>" title="Remover informativos <?php echo $info->id_info; ?>"><i class="fas fa-trash-alt"></i></a></span>
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
				<button type="button" class="btn btn-default btn-lg btn-voltar" id="btn-voltar-informativo"><i class='fa fa-arrow-left'></i> Voltar</button>
			</div><!-- col-sm-4-->	
			<div class="col-sm-8 form-border">	
				<h3>Gerenciamento de Informativo</h3>			
				<form class="form-row" id="form-informativo" data-toggle="validator" action="acts/acts.informativos.php" method="POST">
				  <div class="form-group col-sm-1">
					<label for="id">ID</label>
			    	<input type="number" class="form-control" id="id" name="id" aria-describedby="id" maxlength="11" disabled />
				  </div>	
				  <div class="form-group col-sm-4">
				      <label for="inputState">Imagem</label>
				      <select id="imagem" name="imagem" class="form-control">				      	
				      	<?php if ($info_img && $info_img->num_rows > 0) {
			    			while($img_info = $info_img->fetch_object()) {
			    			$id = $img_info->id_img;
				   		?>
				        <option value="<?php echo $id; ?>"><?php echo $img_info->nome; ?></option>
				        	<?php } ?>			        	
						<?php }?>
				      </select>
			      </div>	
				  <div class="form-group col-sm-7">
				    <label for="nome">Titulo do informativo</label>
				    <input type="text" class="form-control" id="nome" name="nome" placeholder="Titulo do informativo" required>
				  </div>				  
				  <div class="form-group col-sm-12">
				    <textarea class="form-control" id="descricao" name="descricao" rows="5" placeholder="Descrição do informativo" required></textarea>
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
				  	<button type="submit" class="btn btn-form btn-primary mb-2 form-control" id="btn-salvar-informativo">Salvar Informativo</button>
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