<?php
	require_once('header.php');
?>
<main class="maintable">
	<div class="container">
		<div class="row ger-default">
			<div class="col-sm-8"></div>
			<div class="col-sm-4">
				<button type="button" class="btn btn-default btn-lg btn-add" id="btn-add-slide"><i class="fas fa-plus"></i> Novo Slide</button>
			</div><!-- col-sm-4-->
			<div class="col-sm-4">
				<div class="card mb-3 ger-slides">
				  <img src="../img/slides/banner.jpg" class="card-img-top" alt="...">
				  <div class="card-body">
				    <h5 class="card-title">Nome do Slide</h5>
				    <p class="card-text"><a href="">Link do Slide</a></p>
				    <p class="card-text"><span><a href="" class="text-primary"><i class="fas fa-edit"></i></a></span><span><a href="" class="text-danger"><i class="fas fa-trash-alt"></i></a></span></p>
				  </div>
				</div>
			</div><!--col-sm-4-->
			<div class="col-sm-4">
				<div class="card mb-3 ger-slides">
				  <img src="../img/slides/banner.jpg" class="card-img-top" alt="...">
				  <div class="card-body">
				    <h5 class="card-title">Nome do Slide</h5>
				    <p class="card-text"><a href="">Link do Slide</a></p>
				    <p class="card-text"><span><a href="" class="text-primary"><i class="fas fa-edit"></i></a></span><span><a href="" class="text-danger"><i class="fas fa-trash-alt"></i></a></span></p>
				  </div>
				</div>
			</div><!--col-sm-4-->
			<div class="col-sm-4">
				<div class="card mb-3 ger-slides">
				  <img src="../img/slides/banner.jpg" class="card-img-top" alt="...">
				  <div class="card-body">
				    <h5 class="card-title">Nome do Slide</h5>
				    <p class="card-text"><a href="">Link do Slide</a></p>
				    <p class="card-text"><span><a href="" class="text-primary"><i class="fas fa-edit"></i></a></span><span><a href="" class="text-danger"><i class="fas fa-trash-alt"></i></a></span></p>
				  </div>
				</div>
			</div><!--col-sm-4-->
			<div class="col-sm-4">
				<div class="card mb-3 ger-slides">
				  <img src="../img/slides/banner.jpg" class="card-img-top" alt="...">
				  <div class="card-body">
				    <h5 class="card-title">Nome do Slide</h5>
				    <p class="card-text"><a href="">Link do Slide</a></p>
				    <p class="card-text"><span><a href="" class="text-primary"><i class="fas fa-edit"></i></a></span><span><a href="" class="text-danger"><i class="fas fa-trash-alt"></i></a></span></p>
				  </div>
				</div>
			</div><!--col-sm-4-->
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
				<form id="form-curso" class="form-panel" data-toggle="validator" action="acts/acts.slides.php" method="POST">
				  <div class="form-group col-sm-12">
				    <label for="formGroupExampleInput">Nome do Slide (Largura - 1920px / Altura - 399px)</label>
				    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do Slide">
				  </div>
				  <div class="form-group col-sm-12">
				    <label for="formGroupExampleInput2">Link do Slide</label>
				    <input type="text" class="form-control" id="link" name="link" placeholder="Link do Slide">
				  </div>
				  <div class="form-group col-sm-12">
				    <label for="exampleFormControlFile1">Imagem do Slide</label>
				    <input type="file" class="form-control-file" id="img" name="img">
				  </div>
				  <div class="form-group col-sm-4">
				      <label for="inputState">Ativo?</label>
				      <select id="ativo" name="ativo" class="form-control">
				        <option value="0" selected>Sim</option>
				        <option value="1">Não</option>
				      </select>
			      </div>
				  <div class="row">
					  <div class="col-sm-9"></div>
					  <div class="col-sm-3">
					  	<button type="submit" class="btn btn-form btn-primary mb-2" id="btn-salvar-slide">Salvar Slide</button>
					  </div>
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