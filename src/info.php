<?php
	require_once("header.php");
	$id = $_GET["id"];
	$informativos = $conn->query("select id_info,titulo, descricao, data_postagem, tbl_informativos.ativo, nome from tbl_informativos inner join tbl_informativos_img on tbl_informativos.id_img = tbl_informativos_img.id_img
where tbl_informativos.ativo = 1 and id_info = $id") or trigger_error($conn->error);
?>
<main>
	<div class="container-fluid capa">
		<div class="row">
			<img src="img/informativos.png">
		</div><!-- row -->
	</div><!-- container -->
	<div class="container default">
		<div class="row">
			<div class="col-sm-6"></div>
			<div class="col-sm-5"></div>
			<div class="col-sm-1">
				<a href="informativos.php" class="btn btn-card"> Voltar</a>				
			</div><!-- col-sm-4-->
			<div class="col-sm-2"></div>
			<div class="col-sm-10 border">
		</div><!-- row-->					
	</div><!--container -->	
	<div class="container default">
		<div class="row">
			<?php								
				if ($informativos && $informativos->num_rows > 0) {
			  	while($info = $informativos->fetch_object()) {	
		 	?>
				<div class="col-sm-2"></div>
				<div class="col-sm-7">
					<h5 class="card-title headline"><?php echo $info->titulo; ?></h5>
				</div>
				<div class="col-sm-3" style="text-align: right;">
					<p class="card-title headline-sub"><?php if($info->data_postagem != null) {$timestamp = strtotime($info->data_postagem); echo date('d/m/Y', $timestamp);} else {echo 'Sem data';} ?></p>
				</div>	
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<p class="post-text"><?php echo $info->descricao; ?></p>
				</div>							
				<?php } ?> 
			<?php } ?>
		</div><!-- row -->	
	</div>
</main>
<?php
	require_once("footer.php");
?>