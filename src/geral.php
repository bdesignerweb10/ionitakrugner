<?php
	require_once("header.php");
	$id = $_GET["id"];
	$geral = $conn->query("SELECT * FROM (SELECT @rownum := @rownum + 1 AS id, QRYJOIN.*
  FROM (select id_blog as id_geral, nome AS NOME, descricao AS DESCRICAO from tbl_blog union select id_entrevista AS ID_GERAL,titulo AS NOME, descricao AS DESCRICAO from tbl_entrevistas union select id_info AS ID_GERAL,titulo AS NOME, descricao AS DESCRICAO from tbl_informativos union select id_jurisprudencia AS ID_GERAL,nome AS NOME, descricao AS DESCRICAO from tbl_jurisprudencia) AS QRYJOIN,
       (SELECT @rownum := 0) r) AS PESQUISA WHERE ID = $id") or trigger_error($conn->error);
?>
<main>
	<div class="container-fluid capa">
		<!--<div class="row">
			<img src="img/informativos.png">
		</div><!-- row -->
	</div><!-- container -->
	<div class="container default">
		<div class="row">
			<div class="col-sm-6"></div>
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
				if ($geral && $geral->num_rows > 0) {
			  	while($g = $geral->fetch_object()) {	
		 	?>
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<h5 class="card-title headline"><?php echo $g->NOME; ?></h5>
				</div>					
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<p class="post-text"><?php echo nl2br (substr ($g->DESCRICAO, 0)) ?></p>
				</div>							
				<?php } ?> 
			<?php } ?>
		</div><!-- row -->	
	</div>
</main>
<?php
	require_once("footer.php");
?>