<?php
	require_once("header.php");
?>
<main>
	<div class="container-fluid capa">
		<div class="row">
			<img src="img/contato.png">
		</div><!-- row -->
	</div><!-- container -->
	<div class="container default">
		<div class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-10 contact">
				<div class="row">
					<div class="col-sm-6">
						<p>Envie uma mensagem e entreremos em contato com você.</p>
						<form name="contato" action="" method="post">
						  <div class="form-group">
						    <div class="col-md-12 mb-12">					      
						      <input type="text" class="form-control" id="validationDefault01" placeholder="Nome" required>
						    </div>
						  </div>
						  <div class="form-group">
						    <div class="col-md-12 mb-12">					      
						      <input type="email" class="form-control" id="validationDefault02" placeholder="E-mail" required>
						    </div>
						  </div> 
						  <div class="form-group">
						    <div class="col-md-12 mb-12">
						      <input type="text" class="form-control" id="validationDefault02" placeholder="Telefone"  required>
						    </div>
						  </div>
						  <div class="form-group">  
						    <div class="col-md-12 mb-12">
						      <input type="text" class="form-control" id="validationDefault02" placeholder="Assunto"  required>
						    </div>
						  </div>
						  <div class="form-group">  
						    <div class="col-md-12 mb-12">
						      <textarea class="form-control" id="" rows="5" placeholder="Mensagem" required></textarea>
						    </div>
						  </div>
						  <div class="form-group">
						    <button class="btn btn-contact" type="submit">Enviar</button>
						  </div>					  
						</form>
					</div><!--col-sm-6-->
					<div class="col-sm-6 contact-location">
						<p><i class="fab fa-whatsapp"></i> (19) 3336-0079 | (19) 99777-3721</p>
						<p><i class="far fa-envelope"></i> <span>novoemail@ionita.com.br</span></p>
						<p><i class="fas fa-map-marker-alt"></i> Rua 4, n915, Sala 2 - Centro | Rio Claro - SP | 13.500-030</p>
						<div class="col-sm-12 maps">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3688.459784919644!2d-47.56255818557308!3d-22.41171392602558!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c7da5a717c0001%3A0xe5bf6ad7d06d9a2d!2sR.+Quatro%2C+915+-+Centro%2C+Rio+Claro+-+SP%2C+13500-030!5e0!3m2!1spt-BR!2sbr!4v1564159861467!5m2!1spt-BR!2sbr" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
						</div>
					</div><!-- col-sm-6-->
				</div><!-- row -->	
			</div><!-- col-sm-10-->
		</div><!-- row-->
	</div><!-- container -->
</main>
<?php
	require_once("footer.php");
?>