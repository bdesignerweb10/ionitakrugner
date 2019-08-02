<?php
	require_once('header.php');
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
				    <tr>
				      <th scope="row">1</th>
				      <td>Jurisprudência</td>
				      <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris luctus [...]</td>
				      <td><span><i class="fas fa-check text-success" title="Ativo"></i></span></td>
				      <td><span><a href="" class="text-primary"><i class="fas fa-edit"></i></a></span><span><a href="" class="text-danger"><i class="fas fa-trash-alt"></i></a></span></td>
				    </tr>
				    <tr>
				      <th scope="row">2</th>
				      <td>Jurisprudência</td>
				      <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris luctus [...]</td>
				      <td><span><i class="fas fa-check text-success" title="Ativo"></i></span></td>
				      <td><span><a href="" class="text-primary"><i class="fas fa-edit"></i></a></span><span><a href="" class="text-danger"><i class="fas fa-trash-alt"></i></a></span></td>
				    </tr>
				    <tr>
				      <th scope="row">3</th>
				      <td>Jurisprudência</td>
				      <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris luctus [...]</td>
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
				<button type="button" class="btn btn-default btn-lg btn-voltar" id="btn-voltar-jurisprudencia"><i class='fa fa-arrow-left'></i> Voltar</button>
			</div><!-- col-sm-4-->	
			<div class="col-sm-8 form-border">	
				<h3>Gerenciamento de Jurisprudência</h3>			
				<form class="form-row" id="form-jurisprudencia" data-toggle="validator" action="acts/acts.jurisprudencia.php" method="POST">
				  <div class="form-group col-sm-4">
				      <label for="inputState">Grupo</label>
				      <select id="grupo" name="grupo" class="form-control">
				        <option value="" selected>Selecione um grupo</option>
				        <option value="0">Direitos da Familia</option>
				        <option value="1">Direitos da Familia</option>
				      </select>
			      </div>	
				  <div class="form-group col-sm-8">
				    <label for="formGroupExampleInput">Nome da Jurisprudência</label>
				    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome da Jurisprudência" required>
				  </div>				  
				  <div class="form-group col-sm-12">
				    <textarea class="form-control" id="descricao" name="descricao" rows="5" placeholder="Descrição da jurisprudência" required></textarea>
				  </div>
				  <div class="form-group col-sm-4">
				      <label for="inputState">Ativo?</label>
				      <select id="ativo" name="ativo" class="form-control">
				        <option value="0" selected>Sim</option>
				        <option value="1">Não</option>
				      </select>
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