<?php
	require_once('header.php');
	$videos = $conn->query("select * from tbl_videos order by id_video") or trigger_error($conn->error);
?>
<main class="maintable">
	<div class="container">
		<div class="row ger-default">
			<div class="col-sm-8"></div>
			<div class="col-sm-4">
				<button type="button" class="btn btn-default btn-lg btn-add" id="btn-add-video"><i class="fas fa-plus"></i> Novo Video</button>
			</div><!-- col-sm-4-->
			<?php if ($videos && $videos->num_rows > 0) {
			    while($play = $videos->fetch_object()) {
			    	$id = $play->id_video;
			?>
			<div class="col-sm-4">
				<div class="card mb-3 ger-slides media">
				  <?php echo $play->url; ?>
				  <div class="card-body">
				    <h5 class="card-title"><?php echo $play->titulo; ?></h5>
				    <?php if ($play->ativo == 0) { 
			        	$ativo ='fas fa-check text-success'; 
			      	} else { 
			      		$ativo ='fas fa-times text-danger';
			      	} 
			      	?>				    
				    <p class="card-text">				    	
				    	<span><a href="" class="text-primary btn-edit-videos" data-id="<?php echo $id;?>" alt="Editar video <?php echo $play->id_video; ?>" title="Editar video <?php echo $play->id_video; ?>"><i class="fas fa-edit"></i></a></span>
				    	<span><a href="" class="text-danger btn-del-videos" data-id="<?php echo $id;?>" alt="Remover video <?php echo $play->id_video; ?>" title="Remover video <?php echo $play->id_video; ?>"><i class="fas fa-trash-alt"></i></a></span>
				    	<span>Ativo: <i class='<?php echo $ativo; ?>' title='Sim'></span>
				    </p>
				  </div>
				</div>
			</div><!--col-sm-4-->			
			<?php } ?>			        	
			<?php } else { ?>					
				<p>Não há dados a serem exibidos para a listagem.</p>
			<?php } ?>			
		</div><!-- row -->
	</div><!-- container-->
</main>

<main class="mainform">
	<div class="container">
		<div class="row ger-default">
			<div class="col-sm-8"></div>
			<div class="col-sm-4">
				<button type="button" class="btn btn-default btn-lg btn-voltar" id="btn-voltar-video"><i class='fa fa-arrow-left'></i> Voltar</button>
			</div><!-- col-sm-4-->		
			<div class="col-sm-8 form-border">
				<h3>Gerenciamento de Videos</h3>
				<form id="form-videos" class="form-row" data-toggle="validator" action="acts/acts.videos.php" method="POST">
				  <div class="form-group col-sm-1">
					<label for="id">ID</label>
			    	<input type="number" class="form-control" id="id" name="id" aria-describedby="id" maxlength="11" disabled />
				  </div>	
				  <div class="form-group col-sm-11">
				    <label for="nome">Nome do video</label>
				    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do Video" required>
				  </div>
				  <div class="form-group col-sm-12">
				    <label for="link">Endereço do video</label>
				    <input type="text" class="form-control" id="link" name="link" placeholder="Link do Video" required>
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
				  	<button type="submit" class="btn btn-form btn-primary mb-2" id="btn-salvar-video">Salvar Video</button>
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