<?php
	require_once("header.php");
	$slides = $conn->query("select nome, link, img from tbl_slides where ativo = 1") or trigger_error($conn->error);
	$video = $conn->query("select titulo,url, ativo from tbl_videos where ativo = 1 order by id_video desc limit 1;
") or trigger_error($conn->error);	
	$informativos = $conn->query("select * from tbl_informativos where ativo = 1 order by id_info desc LIMIT 4 ") or trigger_error($conn->error);
	$blog = $conn->query("select * from tbl_blog where ativo = 1 order by id_blog desc LIMIT 3 ") or trigger_error($conn->error);
?>
<main>
	<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
	  <div class="carousel-inner">
	  	<?php 		
	  		$count = 0;								
			if ($slides && $slides->num_rows > 0) {
			  	while($banner = $slides->fetch_object()) {	
		 ?>
	    <div class="carousel-item <?php if($count == 0) echo 'active'; ?>" data-interval="10000">	      	
	      <a href="<?php echo $banner->link; ?>"><img src="img/slides/<?php echo $banner->img; ?>" class="d-block w-100" alt="..."></a>
	    </div>
	    	<?php $count++; } ?> 
		<?php } ?>		    
	  </div>
	  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
	    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	    <span class="sr-only">Previous</span>
	  </a>
	  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
	    <span class="carousel-control-next-icon" aria-hidden="true"></span>
	    <span class="sr-only">Next</span>
	  </a>
	</div>
	<div class="container">
		<div class="row cards">			
			<div class="col-sm-4">
				<div class="card card-index-mob" style="width: 18rem; height: 330px;">
				  <div class="card-body">
				    <h5 class="card-title">Informativos</h5>
				    <?php								
					if ($informativos && $informativos->num_rows > 0) {
					  	while($info = $informativos->fetch_object()) {	
				 	?>				    
				    <div class="row">
				    	<div class="col-sm-1 shape">
				    		<i class="fas fa-angle-right"></i>
				    	</div><!-- col-sm-1-->				    	
				    	<div class="col-sm-10">
				    		<p class="card-text"><a href="info.php?id=<?php echo $info->id_info; ?>"> <?php echo $info->titulo; ?></a></p>
				    	</div>		    	
				    </div><!-- row-->
				    <div class="divider"></div>
				    	<?php } ?> 
				  	<?php } ?>
				  </div>				  
				</div>
				<div class="col-sm-10 btns-card">
					<a href="informativos.php" class="btn btn-card">Veja mais</a>		
				</div>	
			</div><!--col-sm-4-->
			<div class="col-sm-4">
				<div class="card card-index-mob" style="width: 20rem; height: 330px;">
				  <div class="card-body">
				    <h5 class="card-title">Blog</h5>
				    <?php								
					if ($blog && $blog->num_rows > 0) {
					  	while($post = $blog->fetch_object()) {	
				 	?>
				    <div class="row">
				    	<div class="col-sm-5">
				    		<img src="img/blog/<?php echo $post->img; ?>">
				    	</div><!-- col-sm-1-->
				    	<div class="col-sm-7">
				    		<p class="card-text"><a href="post.php?id=<?php echo $post->id_blog; ?>"> <?php echo $post->nome; ?></a></p>
				    	</div>			    	
				    </div><!-- row-->
				    <div class="divider"></div>
				    	<?php } ?> 
				  	<?php } ?>		    
				  </div>
				</div>
				<div class="col-sm-11 btns-card">	
					<a href="blog.php" class="btn btn-card">Acesse</a>
				</div>
			</div><!--col-sm-4-->
			<div class="col-sm-4">
				<div class="card card-video" style="width: 20rem;">
				  <div class="card-body">
				    <h5 class="card-title">Vídeos</h5>
				    <?php								
						if ($video && $video->num_rows > 0) {
						  	while($play = $video->fetch_object()) {	
					 ?>
				    <h6 class="card-subtitle mb-2 text-muted"><?php echo $play->titulo; ?></h6>
				    <?php echo $play->url; ?>
				  </div>
				  	<?php } ?> 
				  <?php } ?>
				 	<div class="col-sm-11 btns-card">	
						<a href="videos.php" class="btn btn-card btn-video">Veja mais</a>
					</div>					
				</div>	
			</div><!--col-sm-3-->
		</div><!-- row-->		
	</div><!-- container -->
	<div class="container">
		<div class="row logos">
			<div class="col-sm-2 offset-sm-1">
				<img src="img/oab-nacional.jpg">
			</div>
			<div class="col-sm-2">
				<img src="img/oab-sp.jpg">
			</div>
			<div class="col-sm-2">
				<img src="img/conselho-nacional.jpg">
			</div>
			<div class="col-sm-2">
				<img src="img/stf.jpg">
			</div>
			<div class="col-sm-2">
				<img src="img/stj.jpg">
			</div>
		</div><!-- row -->
	</div><!--contaier-->	
</main>
<?php
	require_once("footer.php");
?>