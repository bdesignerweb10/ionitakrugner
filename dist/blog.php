<?php
	require_once("header.php");

	$id = $_POST["categoria"];
	if ($id > 0) {
		$blog = $conn->query("select id_blog, tbl_blog.nome as titulo, img, descricao, tbl_blog.ativo, destaque, data_publicacao, tbl_blog_cat.nome as categoria from tbl_blog inner join tbl_blog_cat on tbl_blog.id_cat = tbl_blog_cat.id_cat where tbl_blog.ativo = 1 and tbl_blog.id_cat = $id LIMIT 6") or trigger_error($conn->error);
		$id = '';
	} else {
		$blog = $conn->query("select id_blog, tbl_blog.nome as titulo, img, descricao, tbl_blog.ativo, destaque, data_publicacao, tbl_blog_cat.nome as categoria from tbl_blog inner join tbl_blog_cat on tbl_blog.id_cat = tbl_blog_cat.id_cat where tbl_blog.ativo = 1 LIMIT 6") or trigger_error($conn->error);	
	}
	
	$categorias = $conn->query("select * from tbl_blog_cat where ativo = 1") or trigger_error($conn->error);
	$destaque = $conn->query("select id_blog, tbl_blog.nome as titulo, img, descricao, tbl_blog.ativo, destaque, data_publicacao, tbl_blog.id_cat ,tbl_blog_cat.nome as categoria from tbl_blog inner join tbl_blog_cat on tbl_blog.id_cat = tbl_blog_cat.id_cat where tbl_blog.ativo = 1 and destaque = 1 order by tbl_blog.id_blog desc LIMIT 1") or trigger_error($conn->error);
	
?> <main><div class="container-fluid capa"><div class="row"><img src="img/blog.jpg"></div><!-- row --></div><!-- container --><div class="container default"><div class="row"><div class="col-sm-2"></div><div class="col-sm-4"><form action="blog-resultado.php" method="POST"><div class="input-group"><input class="form-control info-search" type="search" name="pesquisar" id="pesquisar" placeholder="Buscar por assunto" aria-label="Search" style="border-right: none; border-color: #1b5a6c; font-size: 13px; padding: 18px 10px;"><div class="input-group-append"><div class="input-group-text info-search" style="border-color: #1b5a6c"><i class="fas fa-search"></i></div></div></div></form></div><!--col-sm-4--><div class="col-sm-4"></div><div class="col-sm-2"><div class="form-group"><form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST"><select class="form-control categoria" name="categoria" id="categoria"><option>CATEGORIAS</option><option value="0">Todas as Categorias</option> <?php								
									if ($categorias && $categorias->num_rows > 0) {
							  		while($cat = $categorias->fetch_object()) {	
						 	  	?> <option value="<?php echo $cat->id_cat; ?>"><?php echo $cat->nome; ?></option> <?php } ?> <?php } ?> </select></form></div></div><!-- col-sm-4--><div class="col-sm-2"></div><div class="col-sm-10 border"></div><!-- row--></div><!--container --><div class="container"><div class="row blog"><div class="col-sm-2"></div> <?php								
				if ($destaque && $destaque->num_rows > 0) {
			  	while($dest = $destaque->fetch_object()) {	
		 	?> <div class="col-sm-5"><img class="blog-img" src="img/blog/<?php echo $dest->img; ?>"></div><!-- col-sm-5--><div class="col-sm-5"><p class="card-title headline-sub"><?php echo $dest->categoria; ?> | <?php if($dest->data_publicacao != null) {$timestamp = strtotime($dest->data_publicacao); echo date('d/m/Y', $timestamp);} else {echo 'Sem data';} ?></p><h5 class="card-title headline"><?php echo $dest->titulo; ?></h5><p class="blog-text"><?php echo nl2br (substr ($dest->descricao, 0, 650)); ?> [...]</p><p><a href="post.php?id=<?php echo $dest->id_blog; ?>" class="blog-link">Saiba Mais</a></p></div><!-- col-sm-5--> <?php } ?> <?php } ?> </div><!-- row--></div><!--container--><div class="container"><div class="row blog-mini"><div class="col-sm-2"></div><div class="col-sm-10"><div class="row"> <?php								
						if ($blog && $blog->num_rows > 0) {
					  	while($post = $blog->fetch_object()) {	
				 	?> <div class="col-sm-4"><img class="blog-img" src="img/blog/<?php echo $post->img; ?>"><p class="card-title headline-sub"><?php echo $post->categoria; ?> | <?php if($post->data_publicacao != null) {$timestamp = strtotime($post->data_publicacao); echo date('d/m/Y', $timestamp);} else {echo 'Sem data';} ?></p><h5 class="card-title headline"><?php echo $post->titulo; ?></h5><p><a href="post.php?id=<?php echo $post->id_blog; ?>" class="blog-link">Saiba Mais</a></p></div><!--col-sm-3--> <?php } ?> <?php } ?> </div><!-- row --></div><!-- col-sm-10--></div><!-- row--><div class="row"><div class="col-sm-2"></div><div class="col-sm-10 border"></div></div><!--container--><div class="container"><div class="row"><div class="col-sm-5"></div><div class="col-sm-4 pagination-nav"><nav aria-label="Page navigation example"><ul class="pagination"><li class="page-item"><a class="page-link" href="#" aria-label="Previous"><i class="fas fa-angle-left"></i></a></li><li class="page-item active"><a class="page-link" href="#">1</a></li><li class="page-item"><a class="page-link" href="#">2</a></li><li class="page-item"><a class="page-link" href="#">3</a></li><li class="page-item"><a class="page-link" href="#">4</a></li><li class="page-item"><a class="page-link" href="#">5</a></li><li class="page-item"><a class="page-link" href="#" aria-label="Next"><i class="fas fa-angle-right"></i></a></li></ul></nav></div><!-- col-sm-4--><div class="col-sm-3"></div></div><!-- row --></div><!-- container--></div></div></main><script>document.getElementById('categoria').addEventListener('change', function() {
    this.form.submit();
});</script> <?php
	require_once("footer.php");
?>