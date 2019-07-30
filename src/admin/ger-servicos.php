<?php
	require_once('header.php');
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
				      <th scope="col">Opções</th>
				    </tr>
				  </thead>
				  <tbody>
				    <tr>
				      <th scope="row">1</th>
				      <td>Serviço 1</td>
				      <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris luctus [...]</td>
				      <td><span><a href="" class="text-primary"><i class="fas fa-edit"></i></a></span><span><a href="" class="text-danger"><i class="fas fa-trash-alt"></i></a></span></td>
				    </tr>
				    <tr>
				      <th scope="row">2</th>
				      <td>Serviço 2</td>
				      <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris luctus [...]</td>
				      <td><span><a href="" class="text-primary"><i class="fas fa-edit"></i></a></span><span><a href="" class="text-danger"><i class="fas fa-trash-alt"></i></a></span></td>
				    </tr>
				    <tr>
				      <th scope="row">3</th>
				      <td>Serviço 3</td>
				      <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris luctus [...]</td>
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
				<button type="button" class="btn btn-default btn-lg btn-voltar" id="btn-voltar-servico"><i class='fa fa-arrow-left'></i> Voltar</button>
			</div><!-- col-sm-4-->	
			<div class="col-sm-8 form-border">	
				<h3>Gerenciamento de Serviços</h3>			
				<form id="form-servico" class="form-panel" data-toggle="validator" action="acts/acts.servicos.php" method="POST">
				  <div class="form-group col-sm-12">
				    <label for="formGroupExampleInput">Nome do Serviço</label>
				    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do Slide">
				  </div>
				  <div class="form-group col-sm-12">
				    <label for="exampleFormControlFile1">Imagem do Serviço</label>
				    <input type="file" class="form-control-file" id="img" name="img">
				  </div>
				  <div class="form-group col-sm-12">
				    	<textarea class="form-control" id="descricao" name="descricao" rows="5" placeholder="Descrição do serviço" required></textarea>
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
					  	<button type="submit" class="btn btn-form btn-primary mb-2" id="btn-salvar-servico">Salvar Serviço</button>
					  </div>
				  </div>
				</form>
			</div><!-- col-sm-8-->
			<div class="col-sm-4">
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