<?php
	require_once("header.php");

	$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;

	$pesquisar = $_POST['pesquisar'];
	/*$geral = $conn->query("SELECT * FROM (SELECT @rownum := @rownum + 1 AS id, QRYJOIN.* FROM (select id_blog as id_geral, nome AS NOME, descricao AS DESCRICAO from tbl_blog union select id_entrevista AS ID_GERAL,titulo AS NOME, descricao AS DESCRICAO from tbl_entrevistas union select id_info AS ID_GERAL,titulo AS NOME, descricao AS DESCRICAO from tbl_informativos union select id_jurisprudencia AS ID_GERAL,nome AS NOME, descricao AS DESCRICAO from tbl_jurisprudencia) AS QRYJOIN,
       (SELECT @rownum := 0) r) AS PESQUISA WHERE  nome like '%$pesquisa%' or descricao like '%pesquisa%'") or trigger_error($conn->error);*/
	$result_geral = "SELECT * FROM (SELECT @rownum := @rownum + 1 AS id, QRYJOIN.* FROM (select id_blog as id_geral, nome AS NOME, descricao AS DESCRICAO from tbl_blog union select id_entrevista AS ID_GERAL,titulo AS NOME, descricao AS DESCRICAO from tbl_entrevistas union select id_info AS ID_GERAL,titulo AS NOME, descricao AS DESCRICAO from tbl_informativos union select id_jurisprudencia AS ID_GERAL,nome AS NOME, descricao AS DESCRICAO from tbl_jurisprudencia) AS QRYJOIN,
       (SELECT @rownum := 0) r) AS PESQUISA WHERE  nome like '%$pesquisa%' or descricao like '%pesquisa%'";

    $resultado_geral = mysqli_query($conn, $result_geral) or trigger_error($conn->error);
	$total_geral = mysqli_num_rows($resultado_geral);
	$quantidade_pg = 6;
	$num_pagina = ceil($total_geral/$quantidade_pg);
	$inicio = ($quantidade_pg*$pagina)-$quantidade_pg;

	$geral = "SELECT * FROM (SELECT @rownum := @rownum + 1 AS id, QRYJOIN.* FROM (select id_blog as id_geral, nome AS NOME, descricao AS DESCRICAO from tbl_blog union select id_entrevista AS ID_GERAL,titulo AS NOME, descricao AS DESCRICAO from tbl_entrevistas union select id_info AS ID_GERAL,titulo AS NOME, descricao AS DESCRICAO from tbl_informativos union select id_jurisprudencia AS ID_GERAL,nome AS NOME, descricao AS DESCRICAO from tbl_jurisprudencia) AS QRYJOIN, (SELECT @rownum := 0) r) AS PESQUISA where nome like '%$pesquisa%' or descricao like '%pesquisa%' limit $inicio, $quantidade_pg";

	$resultados = mysqli_query($conn, $geral) or trigger_error($conn->error);
?>
<main>
	<div class="container-fluid capa">
		<!--<div class="row">
			<img src="img/informativos.png">
		</div><!-- row -->
	</div><!-- container -->
	<div class="container default">
		<div class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-4">
				<h5 class="card-title headline">Resultado da pesquisa</h5>							
			</div>
			<div class="col-sm-5"></div>
			<div class="col-sm-1">
				<a href="index.php" class="btn btn-card"> Voltar</a>				
			</div><!-- col-sm-4-->
			<div class="col-sm-2"></div>
			<div class="col-sm-10 border">
		</div><!-- row-->					
	</div><!--container -->	
	<div class="container default">
		<div class="row">
			<?php								
				if ($resultados && $resultados->num_rows > 0) {
			  	while($g = $resultados->fetch_object()) {	
		 	?>
		 	<div class="col-sm-2"></div>		 	
			<div class="col-sm-10">
				<h5 class="card-title headline"><?php echo $g->NOME; ?></h5>
				<p class="post-text"><?php echo nl2br (substr ($g->DESCRICAO, 0, 250)); ?> [...]</p>
				<p><a href="geral.php?id=<?php echo $g->id; ?>" class="blog-link">Saiba Mais</a></p>
			</div>
			<div class="col-sm-10 offset-2">
				<hr>
			</div>
				<?php } ?> 
			<?php } ?>
		</div><!-- row -->	
		<div class="row">
			<div class="col-sm-5"></div>	
			<div class="col-sm-4 pagination-nav">
				<?php				
					$pagina_anterior = $pagina - 1;
					$pagina_posterior = $pagina + 1;
				?>
				<nav aria-label="Page navigation example">
				  <ul class="pagination">
				    <li class="page-item">
				      <?php
						if($pagina_anterior != 0){ ?>	
				      <a class="page-link" href="geral-resultado.php?pagina=<?php echo $pagina_anterior; ?>" aria-label="Previous">
				        <i class="fas fa-angle-left"></i>
				      </a>
				      <?php }else{ ?>
				      	 <a href="#" class="page-link"><i class="fas fa-angle-left "></i></a>
				      <?php }  ?>	 
				    </li>
				    <?php 
					//Apresentar a paginacao
					for($i = 1; $i < $num_pagina + 1; $i++){ ?>
						<li class="page-item"><a class="page-link" href="geral-resultado.php?pagina=<?php echo $i; ?>"><?php echo $i; ?></a></li>
					<?php } ?>
				    
				   
				    <li class="page-item">
				    	<?php
						if($pagina_posterior <= $num_pagina){ ?>
				      <a class="page-link" href="geral-resultado.php?pagina=<?php echo $pagina_posterior; ?>" aria-label="Next">
				        <i class="fas fa-angle-right"></i>
				      </a>
				      <?php }else{ ?>
				      	<a href="#" class="page-link"><i class="fas fa-angle-right"></i></a>
				      <?php }  ?> 	
				    </li>
				  </ul>
				</nav>
			</div><!-- col-sm-4-->
			<div class="col-sm-5"></div>
		</div><!-- row -->	
	</div>
</main>
<?php
	require_once("footer.php");
?>