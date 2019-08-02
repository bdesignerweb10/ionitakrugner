<?php
	require_once("header.php");
	$informativos = $conn->query("select titulo, descricao, data_postagem, tbl_informativos.ativo, nome from tbl_informativos inner join tbl_informativos_img on tbl_informativos.id_img = tbl_informativos_img.id_img
where tbl_informativos.ativo = 0") or trigger_error($conn->error);
?>
<main>
	<div class="container-fluid capa">
		<div class="row">
			<img src="img/informativos.png">
		</div><!-- row -->
	</div><!-- container -->
	<div class="container informative">
		<div class="row">		
			<?php								
				if ($informativos && $informativos->num_rows > 0) {
			  	while($info = $informativos->fetch_object()) {	
		 	?>	
			<div class="col-sm-4">
				<div class="card card-default">
					<div class="row no-gutters">				    
				    	<div class="col-md-12">
				      		<div class="card-body">
				      			<div class="row">
					      			<div class="col-sm-5">
					      				<img src="img/informativos/<?php echo $info->nome; ?>">
					      			</div>
					      			<div class="col-sm-7">
						        		<h5 class="card-title headline"><?php echo $info->titulo; ?></h5>
								        <p class="card-title date"><?php if($info->data_postagem != null) {$timestamp = strtotime($info->data_postagem); echo date('d/m/Y', $timestamp);} else {echo 'Sem data';} ?></p>
								    </div>
								    <div class="col-sm-12">    
								        <p class="card-text"><?php echo nl2br (substr ($info->descricao, 0)) ?></p>
								    </div>    
						    	</div><!-- row -->
				      		</div>
				    	</div>
				  	</div>
				</div>	
			</div><!-- col-sm-4-->
				<?php } ?> 
			<?php } ?>
			
			<div class="col-sm-4"></div>
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
			<div class="col-sm-4">
				<div class="input-group">
					<input class="form-control info-search" type="search" placeholder="Buscar por assunto" aria-label="Search" style="border-right: none; color: #8dadb6; font-size: 13px;">
					<div class="input-group-append">
						<div class="input-group-text info-search" style="color: #8dadb6">
							<i class="fas fa-search"></i>
						</div>
					</div>
				</div>
			</div>
		</div><!-- row -->
	</div><!--container -->
</main>
<?php
	require_once("footer.php");
?>