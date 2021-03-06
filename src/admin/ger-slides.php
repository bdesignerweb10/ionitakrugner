<?php
	require_once('header.php');
	$slides = $conn->query("select * from tbl_slides order by id") or trigger_error($conn->error);
?>
<main class="maintable">
	<div class="container">
		<div class="row ger-default">
			<div class="col-sm-8"></div>
			<div class="col-sm-4">
				<button type="button" class="btn btn-default btn-lg btn-add" id="btn-add-slide"><i class="fas fa-plus"></i> Novo Slide</button>
			</div><!-- col-sm-4-->
			<?php if ($slides && $slides->num_rows > 0) {
			    while($banner = $slides->fetch_object()) {
			    	$id = $banner->id;
			?>
			<div class="col-sm-4">
				<div class="card mb-3 ger-slides">
				  <img src="../img/slides/<?php echo $banner->img; ?>" class="card-img-top" alt="...">
				  <div class="card-body">
				    <h5 class="card-title"><?php echo $banner->nome; ?></h5>
				    <p class="card-text"><a href=""><?php echo $banner->link; ?></a></p>
				    <?php if ($banner->ativo == 1) { 
			        	$ativo ='fas fa-check text-success'; 
			      	} else { 
			      		$ativo ='fas fa-times text-danger';
			      	} 
			      	?>
				    <p class="card-text">				    	
				    	<span><a href="" class="text-primary btn-edit-slides" data-id="<?php echo $id;?>" alt="Editar slides <?php echo $banner->id; ?>" title="Editar slides <?php echo $banner->id; ?>"><i class="fas fa-edit"></i></a></span>
				    	<span><a href="" class="text-danger btn-del-slides" data-id="<?php echo $id;?>" alt="Remover slide <?php echo $banner->id; ?>" title="Remover slide <?php echo $banner->id; ?>"><i class="fas fa-trash-alt"></i></a></span>
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
				<button type="button" class="btn btn-default btn-lg btn-voltar" id="btn-voltar-slide"><i class='fa fa-arrow-left'></i> Voltar</button>
			</div><!-- col-sm-4-->		
			<div class="col-sm-8 form-border">
				<h3>Gerenciamento de Slides</h3>
				<form id="form-slides" class="form-row" data-toggle="validator" action="acts/acts.slides.php" method="POST" enctype="multipart/form-data">	
				  <div class="form-group col-sm-1">
					<label for="id">ID</label>
			    	<input type="number" class="form-control" id="id" name="id" aria-describedby="id" maxlength="11" disabled />
				  </div>				  	
				  <div class="form-group col-sm-11">
				    <label for="nome">Nome do Slide (Largura - 1920px / Altura - 399px)</label>
				    <input type="text" class="form-control" id="nome" name="nome" aria-describedby="nome" placeholder="Nome do Slide" required>
				  </div>
				  <div class="form-group col-sm-12">
				    <label for="link">Link do Slide</label>
				    <input type="text" class="form-control" id="link" name="link" aria-describedby="link" placeholder="Link do Slide">
				  </div>
				  <div class="form-group col-sm-12">
				    <label for="img">Imagem do Slide</label>
				    <input type="file" class="form-control-file" id="img" name="img" aria-describedby="img" placeholder="Insira a imagem" required>				    
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
					  	<button type="submit" class="btn btn-form btn-primary mb-2 form-control" id="btn-salvar-slide">Salvar Slide</button>
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