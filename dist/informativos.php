<?php
	require_once("header.php");
	/*$informativos = $conn->query("select titulo, descricao, data_postagem, tbl_informativos.ativo, nome from tbl_informativos inner join tbl_informativos_img on tbl_informativos.id_img = tbl_informativos_img.id_img
where tbl_informativos.ativo = 1") or trigger_error($conn->error);*/

	$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
	$result_blog = "select id_info, titulo, descricao, data_postagem, tbl_informativos.ativo, nome from tbl_informativos inner join tbl_informativos_img on tbl_informativos.id_img = tbl_informativos_img.id_img
where tbl_informativos.ativo = 1";

	$resultado_blog = mysqli_query($conn, $result_blog) or trigger_error($conn->error);
	$total_blogs = mysqli_num_rows($resultado_blog);
	$quantidade_pg = 6;
	$num_pagina = ceil($total_blogs/$quantidade_pg);
	$inicio = ($quantidade_pg*$pagina)-$quantidade_pg;

	$result_blogs = "select id_info, titulo, descricao, data_postagem, tbl_informativos.ativo, nome from tbl_informativos inner join tbl_informativos_img on tbl_informativos.id_img = tbl_informativos_img.id_img
where tbl_informativos.ativo = 1 limit $inicio, $quantidade_pg";

	$informativos = mysqli_query($conn, $result_blogs) or trigger_error($conn->error);
?> <main><div class="container-fluid capa"><div class="row"><img src="img/informativos.png"></div><!-- row --></div><!-- container --><div class="container informative"><div class="row"> <?php								
				if ($informativos && $informativos->num_rows > 0) {
			  	while($info = $informativos->fetch_object()) {	
		 	?> <div class="col-sm-4"><div class="card card-default"><div class="row no-gutters"><div class="col-md-12"><div class="card-body"><div class="row"><div class="col-sm-5"><img src="img/informativos/<?php echo $info->nome; ?>"></div><div class="col-sm-7"><h5 class="card-title headline"><?php echo $info->titulo; ?></h5><p class="card-title date"><?php if($info->data_postagem != null) {$timestamp = strtotime($info->data_postagem); echo date('d/m/Y', $timestamp);} else {echo 'Sem data';} ?></p></div><div class="col-sm-12"><p class="card-text"><?php echo nl2br (substr ($info->descricao, 0, 450)); ?> <a href="info.php?id=<?php echo $info->id_info; ?>" class="blog-link">[...]</a></p></div></div><!-- row --></div></div></div></div></div><!-- col-sm-4--> <?php } ?> <?php } ?> </div><div class="row"><div class="col-sm-4"></div><div class="col-sm-4 pagination-nav"> <?php				
					$pagina_anterior = $pagina - 1;
					$pagina_posterior = $pagina + 1;
				?> <nav aria-label="Page navigation example"><ul class="pagination"><li class="page-item"> <?php
						if($pagina_anterior != 0){ ?> <a class="page-link" href="informativos.php?pagina=<?php echo $pagina_anterior; ?>" aria-label="Previous"><i class="fas fa-angle-left"></i> </a> <?php }else{ ?> <a href="#" class="page-link"><i class="fas fa-angle-left"></i></a> <?php }  ?> </li> <?php 
					//Apresentar a paginacao
					for($i = 1; $i < $num_pagina + 1; $i++){ ?> <li class="page-item"><a class="page-link" href="informativos.php?pagina=<?php echo $i; ?>"><?php echo $i; ?></a></li> <?php } ?> <li class="page-item"> <?php
						if($pagina_posterior <= $num_pagina){ ?> <a class="page-link" href="informativos.php?pagina=<?php echo $pagina_posterior; ?>" aria-label="Next"><i class="fas fa-angle-right"></i> </a> <?php }else{ ?> <a href="#" class="page-link"><i class="fas fa-angle-right"></i></a> <?php }  ?> </li></ul></nav></div><!-- col-sm-4--><div class="col-sm-4"><form action="info-resultado.php" method="POST"><div class="input-group"><input class="form-control info-search" type="search" name="pesquisar" id="pesquisar" placeholder="Buscar por assunto" aria-label="Search" style="border-right: none; color: #8dadb6; font-size: 13px;"><div class="input-group-append"><div class="input-group-text info-search" style="color: #8dadb6"><i class="fas fa-search"></i></div></div></div></form></div></div><!-- row --></div><!--container --></main> <?php
	require_once("footer.php");
?>