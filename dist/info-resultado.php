<?php
	require_once("header.php");
	$pesquisar = $_POST['pesquisar'];
	$informativos = $conn->query("SELECT id_info, titulo, descricao, data_postagem, nome FROM tbl_informativos 
inner join tbl_informativos_img on tbl_informativos.id_img = tbl_informativos_img.id_img 
WHERE tbl_informativos.ativo = 1 and descricao LIKE '%$pesquisar%'") or trigger_error($conn->error);
?> <main><div class="container-fluid capa"><div class="row"><img src="img/informativos.png"></div><!-- row --></div><!-- container --><div class="container default"><div class="row"><div class="col-sm-2"></div><div class="col-sm-4"><h5 class="card-title headline">Resultado da pesquisa</h5></div><div class="col-sm-5"></div><div class="col-sm-1"><a href="informativos.php" class="btn btn-card">Voltar</a></div><!-- col-sm-4--><div class="col-sm-2"></div><div class="col-sm-10 border"></div><!-- row--></div><!--container --><div class="container default"><div class="row"> <?php								
				if ($informativos && $informativos->num_rows > 0) {
			  	while($info = $informativos->fetch_object()) {	
		 	?> <div class="col-sm-2"></div><div class="col-sm-1"><img class="blog-img" src="img/informativos/<?php echo $info->nome; ?>"></div><div class="col-sm-9"><h5 class="card-title headline"><?php echo $info->titulo; ?></h5><p class="post-text"><?php echo nl2br (substr ($info->descricao, 0, 250)); ?> [...]</p><p><a href="info.php?id=<?php echo $info->id_info; ?>" class="blog-link">Saiba Mais</a></p></div><div class="col-sm-10 offset-2"><hr></div> <?php } ?> <?php } ?> </div><!-- row --></div></div></main> <?php
	require_once("footer.php");
?>