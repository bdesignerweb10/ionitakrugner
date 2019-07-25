<?php
	require_once("header.php");
?>
<main>
	<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
	  <div class="carousel-inner">
	    <div class="carousel-item active">
	      <img src="img/slides/banner.jpg" class="d-block w-100" alt="...">
	    </div>
	    <div class="carousel-item">
	      <img src="img/slides/banner.jpg" class="d-block w-100" alt="...">
	    </div>
	    <div class="carousel-item">
	      <img src="img/slides/banner.jpg" class="d-block w-100" alt="...">
	    </div>
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
				<div class="card" style="width: 18rem; height: 330px;">
				  <div class="card-body">
				    <h5 class="card-title">Informativos</h5>				    
				    <div class="row">
				    	<div class="col-sm-1 shape">
				    		<i class="fas fa-angle-right"></i>
				    	</div><!-- col-sm-1-->
				    	<div class="col-sm-10">
				    		<p class="card-text"><a href=""> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></p>
				    	</div>			    	
				    </div><!-- row-->
				    <div class="divider"></div>
				    <div class="row">
				    	<div class="col-sm-1 shape">
				    		<i class="fas fa-angle-right"></i>
				    	</div><!-- col-sm-1-->
				    	<div class="col-sm-10">
				    		<p class="card-text"><a href="">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></p>
				    	</div>			    	
				    </div><!-- row-->
				    <div class="divider"></div>
				    <div class="row">
				    	<div class="col-sm-1 shape">
				    		<i class="fas fa-angle-right"></i>
				    	</div><!-- col-sm-1-->
				    	<div class="col-sm-10">
				    		<p class="card-text"><a href="">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></p>
				    	</div>			    	
				    </div><!-- row-->
				    <div class="divider"></div>
				    <div class="row">
				    	<div class="col-sm-1 shape">
				    		<i class="fas fa-angle-right"></i>
				    	</div><!-- col-sm-1-->
				    	<div class="col-sm-10">
				    		<p class="card-text"><a href="">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></p>
				    	</div>			    	
				    </div><!-- row-->
				  </div>				  
				</div>
				<div class="col-sm-10 btns-card">
					<a href="" class="btn btn-card">Veja mais</a>		
				</div>	
			</div><!--col-sm-4-->
			<div class="col-sm-4">
				<div class="card" style="width: 20rem; height: 330px;">
				  <div class="card-body">
				    <h5 class="card-title">Blog</h5>
				    <div class="row">
				    	<div class="col-sm-5">
				    		<img src="img/blog/blog.jpg">
				    	</div><!-- col-sm-1-->
				    	<div class="col-sm-7">
				    		<p class="card-text"><a href=""> Lorem ipsum dolor sit amet, consectetur</a></p>
				    	</div>			    	
				    </div><!-- row-->
				    <div class="divider"></div>
				    <div class="row">
				    	<div class="col-sm-5">
				    		<img src="img/blog/blog.jpg">
				    	</div><!-- col-sm-1-->
				    	<div class="col-sm-7">
				    		<p class="card-text"><a href=""> Lorem ipsum dolor sit amet, consectetur</a></p>
				    	</div>			    	
				    </div><!-- row-->
				    <div class="divider"></div>
				    <div class="row">
				    	<div class="col-sm-5">
				    		<img src="img/blog/blog.jpg">
				    	</div><!-- col-sm-1-->
				    	<div class="col-sm-7">
				    		<p class="card-text"><a href=""> Lorem ipsum dolor sit amet, consectetur</a></p>
				    	</div>			    	
				    </div><!-- row-->				    
				  </div>
				</div>
				<div class="col-sm-11 btns-card">	
					<a href="" class="btn btn-card">Acesse</a>
				</div>
			</div><!--col-sm-4-->
			<div class="col-sm-4">
				<div class="card card-video" style="width: 20rem;">
				  <div class="card-body">
				    <h5 class="card-title">Vídeos</h5>
				    <h6 class="card-subtitle mb-2 text-muted">Delegacia da Mulher: OAB reivindica expediente 24 hs</h6>
				    <iframe width="280" height="157" src="https://www.youtube.com/embed/SxrR4zrstbs" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				  </div>
				 	<div class="col-sm-11 btns-card">	
						<a href="" class="btn btn-card btn-video">Veja mais</a>
					</div>					
				</div>	
			</div><!--col-sm-3-->
		</div><!-- row-->		
	</div><!-- container -->
	<div class="container">
		<div class="row logos">
			<div class="col-sm-2 offset-1">
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