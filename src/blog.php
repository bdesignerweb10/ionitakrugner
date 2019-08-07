<?php
	require_once("header.php");
	$categorias = $conn->query("select * from tbl_blog_cat where ativo = 1") or trigger_error($conn->error);
	$destaque = $conn->query("select id_blog, tbl_blog.nome as titulo, img, descricao, tbl_blog.ativo, destaque, data_publicacao, tbl_blog_cat.nome as categoria from tbl_blog inner join tbl_blog_cat on tbl_blog.id_cat = tbl_blog_cat.id_cat where tbl_blog.ativo = 1 and destaque = 1 order by id_blog desc LIMIT 1") or trigger_error($conn->error);
	$blog = $conn->query("select id_blog, tbl_blog.nome as titulo, img, descricao, tbl_blog.ativo, destaque, data_publicacao, tbl_blog_cat.nome as categoria from tbl_blog inner join tbl_blog_cat on tbl_blog.id_cat = tbl_blog_cat.id_cat where tbl_blog.ativo = 1 LIMIT 6") or trigger_error($conn->error);
?>
<main>
	<div class="container-fluid capa">
		<div class="row">
			<img src="img/blog.jpg">
		</div><!-- row -->
	</div><!-- container -->
	<div class="container default">
		<div class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-4">
				<div class="input-group">
					<input class="form-control info-search" type="search" placeholder="Buscar por assunto" aria-label="Search" style="border-right: none; border-color: #1b5a6c; font-size: 13px; padding: 18px 10px;">
					<div class="input-group-append">
						<div class="input-group-text info-search" style="border-color: #1b5a6c">
							<i class="fas fa-search"></i>
						</div>
					</div>
				</div>
			</div><!--col-sm-4-->
			<div class="col-sm-4"></div>
			<div class="col-sm-2">
				<div class="form-group">
					<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="GET">				    
					    <select class="form-control categoria" id="exampleFormControlSelect1">				    	
					    	<option>CATEGORIAS</option>
						    	<?php								
									if ($categorias && $categorias->num_rows > 0) {
							  		while($cat = $categorias->fetch_object()) {	
						 	  	?>	
					 	  		<option value="<?php echo $cat->id_cat; ?>"><?php echo $cat->nome; ?></option>
					 	  			<?php } ?> 
						  		<?php } ?>
					    </select>
				    </form>
				  </div>
			</div><!-- col-sm-4-->
			<div class="col-sm-2"></div>
			<div class="col-sm-10 border">
		</div><!-- row-->		
	</div><!--container -->
	<div class="container">
		<div class="row blog">
			<div class="col-sm-2"></div>
			<div class="col-sm-5">
				<img class="blog-img" src="img/blog/blog-1.jpg">
			</div><!-- col-sm-5-->
			<div class="col-sm-5">
			<p class="card-title headline-sub">Categoria | 19 de julho de 2019</p>
			<h5 class="card-title headline">Lorem ipsum dolor sit amet, consectetur 
adipiscing elit. Vivamus et rutrum nunc, a faucibus purus.</h5>
			<p class="blog-text">Vivamus et rutrum nunc, a faucibus purus. Curabitur non nibh justo. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Curabitur blandit, odio ac sollicitudin hendrerit, mi nunc pretium diam, eu iaculis arcu arcu at felis. Donec consectetur vulputate nunc vitae tempus. Sed in orci ipsum. Aenean a odio tempus, placerat turpis in, cursus nibh. Nam vel lectus quam. Ut a diam sed diam interdum porttitor. Maecenas ante metus, consectetur ultricies commodo […]</p>
			<p><a href="" class="blog-link">Saiba Mais</a></p>
		</div><!-- col-sm-5-->
		</div><!-- row-->		
	</div><!--container-->
	<div class="container">
		<div class="row blog-mini">
			<div class="col-sm-1"></div>
			<div class="col-sm-3">
				<img class="blog-img" src="img/blog/blog-2.jpg">
				<p class="card-title headline-sub">Categoria | 19 de julho de 2019</p>
				<h5 class="card-title headline">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus et rutrum nunc, a faucibus purus.</h5>
				<p><a href="" class="blog-link">Saiba Mais</a></p>
			</div><!--col-sm-4-->
			<div class="col-sm-3">
				<img class="blog-img" src="img/blog/blog-3.jpg">
				<p class="card-title headline-sub">Categoria | 19 de julho de 2019</p>
				<h5 class="card-title headline">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus et rutrum nunc, a faucibus purus.</h5>
				<p><a href="" class="blog-link">Saiba Mais</a></p>
			</div><!--col-sm-4-->
			<div class="col-sm-3">
				<img class="blog-img" src="img/blog/blog-4.jpg">
				<p class="card-title headline-sub">Categoria | 19 de julho de 2019</p>
				<h5 class="card-title headline">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus et rutrum nunc, a faucibus purus.</h5>
				<p><a href="" class="blog-link">Saiba Mais</a></p>
			</div><!--col-sm-4-->
		</div><!-- row-->
		<div class="row blog-mini">
			<div class="col-sm-1"></div>
			<div class="col-sm-3">
				<img class="blog-img" src="img/blog/blog-2.jpg">
				<p class="card-title headline-sub">Categoria | 19 de julho de 2019</p>
				<h5 class="card-title headline">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus et rutrum nunc, a faucibus purus.</h5>
				<p><a href="" class="blog-link">Saiba Mais</a></p>
			</div><!--col-sm-4-->
			<div class="col-sm-3">
				<img class="blog-img" src="img/blog/blog-3.jpg">
				<p class="card-title headline-sub">Categoria | 19 de julho de 2019</p>
				<h5 class="card-title headline">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus et rutrum nunc, a faucibus purus.</h5>
				<p><a href="" class="blog-link">Saiba Mais</a></p>
			</div><!--col-sm-4-->
			<div class="col-sm-3">
				<img class="blog-img" src="img/blog/blog-4.jpg">
				<p class="card-title headline-sub">Categoria | 19 de julho de 2019</p>
				<h5 class="card-title headline">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus et rutrum nunc, a faucibus purus.</h5>
				<p><a href="" class="blog-link">Saiba Mais</a></p>
			</div><!--col-sm-4-->
		</div><!-- row-->
		<div class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-10 border">
		</div>					
	</div><!--container-->
	<div class="container">
		<div class="row">
			<div class="col-sm-5"></div>
			<div class="col-sm-4 pagination-nav">
				<nav aria-label="Page navigation example">
				  <ul class="pagination">
				    <li class="page-item">
				      <a class="page-link" href="#" aria-label="Previous">
				        <i class="fas fa-angle-left"></i>
				      </a>
				    </li>
				    <li class="page-item active"><a class="page-link" href="#">1</a></li>
				    <li class="page-item"><a class="page-link" href="#">2</a></li>
				    <li class="page-item"><a class="page-link" href="#">3</a></li>
				    <li class="page-item"><a class="page-link" href="#">4</a></li>
				    <li class="page-item"><a class="page-link" href="#">5</a></li>
				    <li class="page-item">
				      <a class="page-link" href="#" aria-label="Next">
				        <i class="fas fa-angle-right"></i>
				      </a>
				    </li>
				  </ul>
				</nav>
			</div><!-- col-sm-4-->
			<div class="col-sm-3"></div>
		</div><!-- row -->
	</div><!-- container-->
</main>
<?php
	require_once("footer.php");
?>