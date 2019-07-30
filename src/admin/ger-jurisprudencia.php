<?php
	require_once('header.php');
?>
<main>
	<div class="container">
		<div class="row ger-default">
			<div class="col-sm-8"></div>
			<div class="col-sm-4">
				<button type="button" class="btn btn-default btn-lg btn-success"><i class="fas fa-plus"></i> Nova Jurisprudência</button>
			</div><!-- col-sm-4-->
			<div class="col-sm-12 ger-servicos">
				<table class="table table-hover">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Título da Jurisprudência</th>
				      <th scope="col">Descrição da Jurisprudência</th>
				      <th scope="col">Opções</th>
				    </tr>
				  </thead>
				  <tbody>
				    <tr>
				      <th scope="row">1</th>
				      <td>Jurisprudência</td>
				      <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris luctus [...]</td>
				      <td><span><a href="" class="text-primary"><i class="fas fa-edit"></i></a></span><span><a href="" class="text-danger"><i class="fas fa-trash-alt"></i></a></span></td>
				    </tr>
				    <tr>
				      <th scope="row">2</th>
				      <td>Jurisprudência</td>
				      <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris luctus [...]</td>
				      <td><span><a href="" class="text-primary"><i class="fas fa-edit"></i></a></span><span><a href="" class="text-danger"><i class="fas fa-trash-alt"></i></a></span></td>
				    </tr>
				    <tr>
				      <th scope="row">3</th>
				      <td>Jurisprudência</td>
				      <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris luctus [...]</td>
				      <td><span><a href="" class="text-primary"><i class="fas fa-edit"></i></a></span><span><a href="" class="text-danger"><i class="fas fa-trash-alt"></i></a></span></td>
				    </tr>
				  </tbody>
				</table>
			</div><!-- col-sm-12-->
		</div><!-- row -->
	</div><!-- container-->
</main>

<main>
	<div class="container">
		<div class="row ger-default">
			<div class="col-sm-8 form-border">	
				<h3>Gerenciamento de Jurisprudência</h3>			
				<form class="form-row">
				  <div class="form-group col-sm-4">
				      <label for="inputState">Grupo</label>
				      <select id="inputState" class="form-control">
				        <option value="0">Direitos da Familia</option>
				        <option value="1">Direitos da Familia</option>
				      </select>
			      </div>	
				  <div class="form-group col-sm-8">
				    <label for="formGroupExampleInput">Nome da Jurisprudência</label>
				    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nome da Jurisprudência">
				  </div>				  
				  <div class="form-group col-sm-12">
				    <textarea class="form-control" id="" rows="5" placeholder="Descrição da jurisprudência" required></textarea>
				  </div>
				  <div class="form-group col-sm-4">
				      <label for="inputState">Ativo?</label>
				      <select id="inputState" class="form-control">
				        <option value="0" selected>Sim</option>
				        <option value="1">Não</option>
				      </select>
			      </div>
				  <div class="col-sm-8"></div>
				  <div class="col-sm-8"></div>
				  <div class="col-sm-4">
				  	<button type="submit" class="btn btn-form btn-primary mb-2">Salvar Jurisprudência</button>
				  </div>
				</form>
			</div><!-- col-sm-8-->
			<div class="col-sm-4">
				<h1>Acesso Rápido</h1>				
				<ul class="nav flex-column quick-access">
				  <li class="nav-item">
				    <a class="nav-link active" href="ger-slides.php">Slides</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" href="ger-videos.php">Videos</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" href="ger-servicos.php">Serviços</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" href="ger-entrevistas.php">Entrevistas</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" href="ger-informativos.php">Informativos</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" href="ger-jurisprudencia.php">Jurisprudência</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" href="ger-blog.php">Blog</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link disabled" href="#">Configurações do Site</a>
				  </li>
				</ul>
			</div>
		</div><!-- row -->
	</div><!-- container-->
</main>
<?php
	require_once('footer.php');
?>