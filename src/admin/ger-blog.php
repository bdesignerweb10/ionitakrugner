<?php
	require_once('header.php');
?>
<main class="maintable">
	<div class="container">
		<div class="row ger-default">
			<div class="col-sm-8"></div>
			<div class="col-sm-4">
				<button type="button" class="btn btn-default btn-lg btn-add" id="btn-add-blog"><i class="fas fa-plus"></i> Novo Post</button>
			</div><!-- col-sm-4-->
			<div class="col-sm-12 ger-servicos">
				<table class="table table-hover">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Título do post</th>
				      <th scope="col">Categoria</th>
				      <th scope="col">Data postagem</th>
				      <th scope="col">Destaque?</th>
				      <th scope="col">Ativo</th>
				      <th scope="col">Opções</th>
				    </tr>
				  </thead>
				  <tbody>
				    <tr>
				      <th scope="row">1</th>
				      <td>Post 1</td>
				      <td>Direitos da Mulher</td>
				      <td>31/07/2019</td>
				      <td><span><i class="fas fa-check text-success" title="Ativo"></i></span></td>
				      <td><span><i class="fas fa-check text-success" title="Ativo"></i></span></td>
				      <td><span><a href="" class="text-primary"><i class="fas fa-edit"></i></a></span><span><a href="" class="text-danger"><i class="fas fa-trash-alt"></i></a></span></td>
				    </tr>
				    <tr>
				      <th scope="row">2</th>
				      <td>Post 1</td>
				      <td>Direitos da Mulher</td>
				      <td>31/07/2019</td>
				      <td><span><i class="fas fa-times text-danger"></i></span></td>
				      <td><span><i class="fas fa-check text-success" title="Ativo"></i></span></td>
				      <td><span><a href="" class="text-primary"><i class="fas fa-edit"></i></a></span><span><a href="" class="text-danger"><i class="fas fa-trash-alt"></i></a></span></td>
				    </tr>
				    <tr>
				      <th scope="row">3</th>
				      <td>Post 1</td>
				      <td>Direitos da Mulher</td>
				      <td>31/07/2019</td>
				      <td><span><i class="fas fa-times text-danger"></i></span></td>
				      <td><span><i class="fas fa-check text-success" title="Ativo"></i></span></td>
				      <td><span><a href="" class="text-primary"><i class="fas fa-edit"></i></a></span><span><a href="" class="text-danger"><i class="fas fa-trash-alt"></i></a></span></td>
				    </tr>
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
				<button type="button" class="btn btn-default btn-lg btn-voltar" id="btn-voltar-blog"><i class='fa fa-arrow-left'></i> Voltar</button>
			</div><!-- col-sm-4-->	
			<div class="col-sm-8 form-border">	
				<h3>Gerenciamento de postagens do blog</h3>			
				<form class="form-row" id="form-blog" data-toggle="validator" action="acts/acts.blogs.php" method="POST">
				  <div class="form-group col-sm-4">
				      <label for="inputState">Categoria</label>
				      <select id="imagem" name="imagem" class="form-control">
				        <option value="" selected>Selecione uma categoria</option>
				        <option value="0">Direitos das mulheres</option>
				        <option value="1">Mulher Negra</option>
				      </select>
			      </div>	
				  <div class="form-group col-sm-8">
				    <label for="formGroupExampleInput">Titulo do post</label>
				    <input type="text" class="form-control" id="nome" name="nome" placeholder="Titulo do post" required>
				  </div>				  
				  <div class="form-group col-sm-12">
				    <textarea class="form-control" id="descricao" name="descricao" rows="5" placeholder="Descrição do post" required></textarea>
				  </div>
				  <div class="form-group col-sm-4">
				      <label for="inputState">Ativo?</label>
				      <select id="ativo" name="ativo" class="form-control">
				        <option value="0" selected>Sim</option>
				        <option value="1">Não</option>
				      </select>
			      </div>
			      <div class="form-group col-sm-4">
				      <label for="inputState">Destaque?</label>
				      <select id="destaque" name="destaque" class="form-control">
				        <option value="0" selected>Sim</option>
				        <option value="1">Não</option>
				      </select>
			      </div>
				  <div class="col-sm-4"></div>
				  <div class="col-sm-8"></div>
				  <div class="col-sm-4">
				  	<button type="submit" class="btn btn-form btn-primary mb-2" id="btn-salvar-informativo">Salvar Post</button>
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