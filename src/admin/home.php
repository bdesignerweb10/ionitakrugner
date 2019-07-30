<?php
	require_once('header.php');
?>
<main>
	<div class="container">
		<div class="row default">
			<div class="col-sm-8">
				<h1><?php echo strftime('Rio Claro, %d de %B de %Y', strtotime('today')); ?></h1>				
				<p>Status do Site: <strong class="text-success">Online</strong></p>				
			</div>
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
	</div><!-- container -->
</main>
<?php
	require_once('footer.php');
?>