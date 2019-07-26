<?php
	require_once('header-login.php');
?>
<main>
	<div class="container">
		<div class="row login">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<img src="img/logo-login.png">
				<div class="card">					
				  <div class="card-body">
				    <form>
					  <div class="form-row">
					    <div class="col-md-12 mb-3">
					      <label for="validationDefault01">Usuário</label>
					      <input type="text" class="form-control" id="validationDefault01" placeholder="Usuário" required>
					    </div>
					    <div class="col-md-12 mb-3">
					      <label for="validationDefault02">Senha</label>
					      <input type="password" class="form-control" id="validationDefault02" placeholder="Senha"  required>
					    </div>					    
					  </div>
					  <p><a href="">Esqueceu sua senha? <strong>Clique aqui</strong></a></p>
					  <button class="btn btn-primary" type="submit">Entrar</button>
					</form>
				  </div>
				</div><!-- card -->
			</div><!-- col-sm-4-->
			<div class="col-sm-4"></div>
		</div><!-- roe -->
	</div><!-- container-->
</main>
<?php
require_once('footer-login.php');
?>