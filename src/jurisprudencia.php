<?php
	require_once("header.php");
	$grupo = $conn->query("select tbl_jurisprudencia.id_grupo,tbl_jurisprudencia_grupo.nome as grupo_nome from tbl_jurisprudencia  inner join tbl_jurisprudencia_grupo on tbl_jurisprudencia.id_grupo = tbl_jurisprudencia_grupo.id_grupo where tbl_jurisprudencia.ativo = 1 group by grupo_nome;") or trigger_error($conn->error);	
?>
<main>
	<div class="container-fluid capa">
		<div class="row">
			<img src="img/jurisprudencia.jpg">
		</div><!-- row -->
	</div><!-- container -->
	<div class="container default">
		<div class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-10 jurisprudence">
			<div class="row">
			  <div class="col-12 col-sm-4">
			    <div class="accordion" id="accordionExample">			      
			      <?php								
					if ($grupo && $grupo->num_rows > 0) {						 
			  		while($g = $grupo->fetch_object()) {

			  			$menu = "";
			  			//$cont = "";			  			
			  			
			  			$id = $g->id_grupo;			  			 
			  			$jurisprudencia = $conn->query("select * from tbl_jurisprudencia where ativo = 1 and id_grupo = $id") or trigger_error($conn->error);	

			  			if ($jurisprudencia && $jurisprudencia->num_rows > 0) {
					  		while($juris = $jurisprudencia->fetch_object()) {
					  							  		
					  		$menu .= '<a class="list-group-item list-group-item-action '. ($juris->id_jurisprudencia == 1 ? "active" : "") .'" id="'.$juris->id_jurisprudencia.'" data-toggle="list" href="#juris'.$juris->id_jurisprudencia.'" role="tab" aria-controls="home">'.$juris->nome.'</a>';
					  		$cont .='<div class="tab-pane fade show '. ($juris->id_jurisprudencia == 1 ? "active" : "") .'" id="juris'.$juris->id_jurisprudencia.'" role="tabpanel" aria-labelledby="'.$juris->id_jurisprudencia.'">
										<div class="card card-default mb-3">
									  		<div class="row no-gutters">				    
									    		<div class="col-md-12">
									      			<div class="card-body">
									        			<div class="row">
										        			<div class="col-sm-9">
										        				<h5 class="card-title headline">'.$juris->nome.'</h5>
										        			</div>
										        			<div class="col-sm-3">
										        				<span class="print"><a href="acts/acts.print.php"> Abrir/Imprimir <i class="fas fa-print"></i></a></span>
										        			</div>
									        			</div>					        					        
									        			<p class="card-text">'.$juris->descricao.'</p>
									      			</div>
									    		</div>
									  		</div>
										</div>
									</div>';	
					  		}					  		
					  	}
		 		  ?>	
				  <div class="card">
				    <div class="card-header" id="headingOne">
				      <h2 class="mb-0">
				        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse<?php echo $g->id_grupo; ?>" aria-expanded="true" aria-controls="collapseOne">
				          <?php echo $g->grupo_nome; ?> 
				        </button>
				      </h2><i class="fas fa-angle-down"></i>
				    </div>

				    <div id="collapse<?php echo $g->id_grupo; ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
				      <div class="row">
						  <div class="col-12">
						    <div class="list-group" id="list-tab" role="tablist">
						      <?php echo $menu; ?>					      
						    </div>
						  </div>
  						</div>
				    </div>
				  </div><?php } ?> 
				  <?php } ?>
				  					  
				</div>
			  </div>			  
			  <div class="col-12 col-sm-8 jurisprudence">			    
			  	<div class="tab-content" id="nav-tabContent">
					<?php echo $cont; ?>					    
				</div>  
			  </div>
			</div><!-- col-sm-10-->
		</div><!-- row -->
	</div><!--container -->
</main>
<?php
	require_once("footer.php");
?>