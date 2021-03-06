<?php
	require_once("header.php");
	$entrevistas = $conn->query("select id_entrevista, tbl_entrevistas.titulo, descricao, tbl_entrevistas.ativo, url from tbl_entrevistas left join tbl_videos on tbl_entrevistas.id_video = tbl_videos.id_video
where tbl_entrevistas.ativo = 1") or trigger_error($conn->error);
?>
<main>
	<div class="container-fluid capa">
		<div class="row">
			<img src="img/entrevistas.png">
		</div><!-- row -->
	</div><!-- container -->
	<div class="container default">
		<div class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-10 interview">
			<div class="row">
			  <div class="col-12 col-sm-4">
			    <div class="list-group" id="list-tab" role="tablist">
			      <?php if ($entrevistas && $entrevistas->num_rows > 0) {
					  		while($noticia = $entrevistas->fetch_object()) {
					  		$menu .='<a class="list-group-item list-group-item-action '. ($noticia->id_entrevista == 1 ? "active" : "") .'" data-toggle="list" href="#entrevista'.$noticia->id_entrevista.'" role="tab" aria-controls="home"><i class="fas fa-angle-right"></i>'.$noticia->titulo.' </a>';

					  		$cont .='<div class="tab-pane fade show '. ($noticia->id_entrevista == 1 ? "active" : "") .'" id="entrevista'.$noticia->id_entrevista.'" role="tabpanel" aria-labelledby="'.$noticia->id_entrevista.'">
			      	<div class="card card-default mb-3">
					  <div class="row no-gutters">				    
					    <div class="col-md-12">
					      <div class="card-body">
					        <h5 class="card-title headline">'.$noticia->titulo.'</h5>					        
					        <p class="card-text">L'.nl2br (substr ($noticia->descricao, 0)).'</p>				
					        <p>'.$noticia->url.'</p>	        
					      </div>
					    </div>
					  </div>
					</div>
			      </div>';
			      	}
			  	}		
				?>
				<?php echo $menu; ?>
			      <!--<a class="list-group-item list-group-item-action active" data-toggle="list" href="#service1" role="tab" aria-controls="home"><i class="fas fa-angle-right"></i>Lorem ipsum </a>
			      <a class="list-group-item list-group-item-action" data-toggle="list" href="#service2" role="tab" aria-controls="profile"><i class="fas fa-angle-right"></i>Lorem ipsum</a>
			      <a class="list-group-item list-group-item-action" data-toggle="list" href="#service3" role="tab" aria-controls="messages"><i class="fas fa-angle-right"></i>Lorem ipsum </a>
			      <a class="list-group-item list-group-item-action" data-toggle="list" href="#service4" role="tab" aria-controls="settings"><i class="fas fa-angle-right"></i>Lorem ipsum</a>-->
			    </div>
			  </div>
			  <div class="col-12 col-sm-8">
			    <div class="tab-content" id="nav-tabContent">
			    	<?php echo $cont; ?>
			      <!--<div class="tab-pane fade show active" id="service1" role="tabpanel" aria-labelledby="list-home-list">
			      	<div class="card card-default mb-3">
					  <div class="row no-gutters">				    
					    <div class="col-md-12">
					      <div class="card-body">
					        <h5 class="card-title headline">Lorem ipsum</h5>
					        <p class="card-title headline-sub">Subtitulo</p>
					        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel ipsum nec erat congue vulputate nec at mauris. Nunc pulvinar mi elit, nec lacinia elit egestas nec. Curabitur auctor ante a massa ultrices egestas. Duis a est ligula. Cras at sem sed libero vestibulum gravida non non leo. Vestibulum venenatis molestie tincidunt. Maecenas purus tellus, dictum bibendum semper ut, malesuada sit amet ex. Maecenas lacinia elementum tortor, eu mollis ex convallis ac. Proin interdum tempor orci non pretium. Quisque odio 
					        tellus, rhoncus vitae quam vitae, elementum mattis eros.</p>				        
					        <p class="card-title headline-sub">Subtitulo</p>
					        <p class="card-text">Praesent fermentum ligula ac nisi bibendum faucibus. Suspendisse pretium erat at massa tempor, vel vestibulum nibh molestie. In in maximus lorem. Quisque dapibus vulputate accumsan. Aenean tincidunt metus nec dui tempus, et vestibulum eros pellentesque. Nulla molestie dolor a consequat aliquet. Duis lobortis vestibulum iaculis.</p>
					      </div>
					    </div>
					  </div>
					</div>
			      </div>
			      <div class="tab-pane fade" id="service2" role="tabpanel" aria-labelledby="list-profile-list">2</div>
			      <div class="tab-pane fade" id="service3" role="tabpanel" aria-labelledby="list-messages-list">3</div>
			      <div class="tab-pane fade" id="service4" role="tabpanel" aria-labelledby="list-settings-list">4</div>-->
			    </div>
			  </div>
			</div>	
			</div><!-- col-sm-10-->
		</div><!-- row -->
	</div><!--container -->
</main>
<?php
	require_once("footer.php");
?>