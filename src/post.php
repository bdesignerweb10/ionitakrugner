<?php
	require_once("header.php");
	$id = $_GET["id"];
	$blog = $conn->query("select id_blog,tbl_blog.nome as titulo,img,descricao,data_publicacao, tbl_blog_cat.nome as categoria from tbl_blog inner join tbl_blog_cat on tbl_blog.id_cat = tbl_blog_cat.id_cat where tbl_blog.ativo = 1 and id_blog = $id") or trigger_error($conn->error);
?>
<main>
	<div class="container-fluid capa">
		<div class="row">
			<img src="img/blog.jpg">
		</div><!-- row -->
	</div><!-- container -->
	<div class="container default">
		<div class="row">
			<div class="col-sm-6"></div>
			<div class="col-sm-5"></div>
			<div class="col-sm-1">
				<a href="blog.php" class="btn btn-card"> Voltar</a>				
			</div><!-- col-sm-4-->
			<div class="col-sm-2"></div>
			<div class="col-sm-10 border">
		</div><!-- row-->					
	</div><!--container -->	
	<div class="container default">
		<div class="row">
			<?php								
				if ($blog && $blog->num_rows > 0) {
			  	while($post = $blog->fetch_object()) {	
		 	?>
				<div class="col-sm-2"></div>
				<div class="col-sm-7">
					<h5 class="card-title headline"><?php echo $post->titulo; ?></h5>
				</div>
				<div class="col-sm-3" style="text-align: right;">
					<p class="card-title headline-sub"><?php echo $post->categoria; ?> | <?php if($post->data_publicacao != null) {$timestamp = strtotime($post->data_publicacao); echo date('d/m/Y', $timestamp);} else {echo 'Sem data';} ?></p>
				</div>	
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<p class="post-text"><?php echo $post->descricao; ?></p>
				</div>
				<div class="col-sm-2"></div>
				<div class="col-sm-10" style="text-align: right;">
					<img class="blog-img" src="img/blog/<?php echo $post->img; ?>">					
				</div>				
				<?php } ?> 
			<?php } ?>
		</div><!-- row -->	
	</div>
</main>
<?php
	require_once("footer.php");
?>