<?php
	require_once('header.php');
	$entrevistas = $conn->query("select * from tbl_entrevistas order by id_entrevista") or trigger_error($conn->error);
	$videos = $conn->query("select * from tbl_videos where ativo = 1") or trigger_error($conn->error);
?>
<main class="maintable">
	<div class="container">
		<div class="row ger-default">
			<div class="col-sm-8"></div>
			<div class="col-sm-4">
				<button type="button" class="btn btn-default btn-lg btn-add" id="btn-add-entrevista"><i class="fas fa-plus"></i> Nova Entrevista</button>
			</div><!-- col-sm-4-->
			<div class="col-sm-12 ger-servicos">
				<table class="table table-hover">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Título da entrevista</th>
				      <th scope="col">Descrição</th>				      
				      <th scope="col">Ativo</th>
				      <th scope="col">Opções</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php if ($entrevistas && $entrevistas->num_rows > 0) {
			    		while($noticia = $entrevistas->fetch_object()) {
			    		$id = $noticia->id_entrevista;
				    ?>
				    <tr>
				      <th scope="row"><?php echo $noticia->id_entrevista; ?></th>
				      <td><?php echo $noticia->titulo; ?></td>
				      <td><?php echo nl2br (substr ($noticia->descricao, 0, 100)); ?>...</td>
				      <?php if ($noticia->ativo == 1) { 
			        	$ativo ='fas fa-check text-success'; 
				      	} else { 
				      		$ativo ='fas fa-times text-danger';
				      	} 
				      ?>
				      <td><span><i class='<?php echo $ativo; ?>'></span></td>
				      <td>
				      	<span><a href="" class="text-primary btn-edit-entrevista" data-id="<?php echo $id;?>" alt="Editar Entrevista<?php echo $noticia->id_entrevista; ?>" title="Editar entrevista <?php echo $noticia->id_entrevista; ?>"><i class="fas fa-edit"></i></a></span>
				      	<span><a href="" class="text-danger btn-del-entrevista" data-id="<?php echo $id;?>" alt="Remover entrevista <?php echo $noticia->id_entrevista; ?>" title="Remover entrevista <?php echo $noticia->id_entrevista; ?>"><i class="fas fa-trash-alt"></i></a></span>
				      </td>
				    </tr>
				    <?php } ?>			        	
						<?php } else { ?>					
							<tr>
					        	<td colspan="6" align="center">Não há dados a serem exibidos para a listagem.</td>
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
				<button type="button" class="btn btn-default btn-lg btn-voltar" id="btn-voltar-entrevista"><i class='fa fa-arrow-left'></i> Voltar</button>
			</div><!-- col-sm-4-->	
			<div class="col-sm-8 form-border">	
				<h3>Gerenciamento de Entrevista</h3>			
				<form id="form-entrevistas" class="form-row" data-toggle="validator" action="acts/acts.entrevistas.php" method="POST">
				  <div class="form-group col-sm-1">
					<label for="id">ID</label>
			    	<input type="number" class="form-control" id="id" name="id" aria-describedby="id" maxlength="11" disabled />
				  </div>	
				  <div class="form-group col-sm-11">
				    <label for="nome">Título da entrevista</label>
				    <input type="text" class="form-control" id="nome" name="nome" placeholder="Título da entrevista"required>
				  </div>	
				  <div class="form-group col-sm-12">
				      <label for="inputState">Anexar Video?</label>
				      <select id="video" name="video" class="form-control">	
				      <option value="null">Não anexar video</option>			       
				        <?php if ($videos && $videos->num_rows > 0) {
			    			while($midia = $videos->fetch_object()) {
			    			$id = $midia->id_video;
				   		?>
				   		<option value="<?php echo $id; ?>"><?php echo $midia->titulo; ?></option>
				        	<?php } ?>			        	
						<?php }?>
				      </select>
			      </div>			  
				  <div class="form-group col-sm-12">
				    	<textarea class="form-control" id="descricao" name="descricao" rows="5" placeholder="texto da entrevista" required></textarea>
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
					  	<button type="submit" class="btn btn-form btn-primary mb-2" id="btn-salvar-entrevista">Salvar Entrevista</button>
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