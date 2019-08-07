<?php
	require_once("header.php");
	$servicos = $conn->query("select * from tbl_servicos where ativo = 1") or trigger_error($conn->error);
?>
<main>
	<div class="container-fluid capa">
		<div class="row">
			<img src="img/servicos.png">
		</div><!-- row -->
	</div><!-- container -->
	<div class="container default">
		<div class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-10 services">
			<div class="row">
				<div class="col-12 col-sm-4">
			    	<div class="list-group" id="list-tab" role="tablist">
			    		<?php if ($servicos && $servicos->num_rows > 0) {
					  		while($service = $servicos->fetch_object()) {											
					  		$menu .= '<a class="list-group-item list-group-item-action '. ($service->id == 1 ? "active" : "") .'" id="'.$service->id.'" data-toggle="list" href="#service'.$service->id.'" role="tab" aria-controls="home">'.$service->nome.' <i class="fas fa-angle-right"></i></a>';

							$cont .= '<div class="tab-pane fade show '. ($service->id == 1 ? "active" : "") .'" id="service'.$service->id.'" role="tabpanel" aria-labelledby="'.$service->id.'">
					      			<div class="card card-default mb-3">
						  				<div class="row no-gutters">
								    		<div class="col-md-12">
								      			<img src="img/servicos/'.$service->img.'" class="card-img" alt="...">
								    		</div>
						    				<div class="col-md-12">
						      					<div class="card-body">
						        					<h5 class="card-title headline">'.$service->nome.'</h5>
						        					<p class="card-text">'.nl2br (substr ($service->descricao, 0)).'</p>
						      					</div>
						    				</div>
						    				
						  				</div>
									</div>
								</div>';
			  				}
			  			}		
				 		?>
			      		
			      		<?php echo $menu; ?>
			      		
			    	</div>
			  	</div>
			  	<div class="col-12 col-sm-8">
			   		<div class="tab-content" id="nav-tabContent">
			      		<?php echo $cont; ?>
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