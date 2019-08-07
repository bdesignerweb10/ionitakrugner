<?php
	require_once('header.php');
	$blog = $conn->query("select id_blog, tbl_blog.nome, descricao, tbl_blog.ativo, destaque, data_publicacao, tbl_blog.id_cat, tbl_blog_cat.nome as categoria from tbl_blog inner join tbl_blog_cat on tbl_blog.id_cat = tbl_blog_cat.id_cat order by id_blog") or trigger_error($conn->error);
	$categoria = $conn->query("select * from tbl_blog_cat order by nome") or trigger_error($conn->error);
?>
<main class="maintable">
	<div class="container">
		<div class="row ger-default">
			<div class="col-sm-8"></div>
			<div class="col-sm-4">
				<button type="button" class="btn btn-default btn-lg btn-add" id="btn-add-blog"><i class="fas fa-plus"></i> Novo Post</button>
			</div><!-- col-sm-4-->
			<div class="col-sm-12 ger-servicos">
				<table class="table table-hover">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Título do post</th>
				      <th scope="col">Categoria</th>
				      <th scope="col">Data postagem</th>
				      <th scope="col">Destaque?</th>
				      <th scope="col">Ativo</th>
				      <th scope="col">Opções</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php if ($blog && $blog->num_rows > 0) {
			    		while($post = $blog->fetch_object()) {
			    		$id = $post->id_blog;
				    ?>
				    <tr>
				      <th scope="row"><?php echo $post->id_blog; ?></th>
				      <td><?php echo $post->categoria; ?></td>
				      <td><?php echo $post->nome; ?></td>
				      <td><?php if($post->data_publicacao != null) {$timestamp = strtotime($post->data_publicacao); echo date('d/m/Y', $timestamp);} else {echo 'Sem data';} ?></td>
				      <?php if ($post->destaque == 1) { 
			        	$destaque ='fas fa-check text-success'; 
				      	} else { 
				      		$destaque ='fas fa-times text-danger';
				      	} 
				      ?>	
				      <td><span><i class='<?php echo $destaque; ?>'></span></td>
				      <?php if ($post->ativo == 1) { 
			        	$ativo ='fas fa-check text-success'; 
				      	} else { 
				      		$ativo ='fas fa-times text-danger';
				      	} 
				      ?>
				      <td><span><i class='<?php echo $ativo; ?>'></span></td>				      
				      <td>
				      	<span><a href="" class="text-primary btn-edit-blog" data-id="<?php echo $id;?>" alt="Editar Blog<?php echo $post->id_blog; ?>" title="Editar blog <?php echo $post->id_blog; ?>"><i class="fas fa-edit"></i></a></span>
				      	<span><a href="" class="text-danger btn-del-blog" data-id="<?php echo $id;?>" alt="Remover blog <?php echo $post->id_blog; ?>" title="Remover blog <?php echo $post->id_blog; ?>"><i class="fas fa-trash-alt"></i></a></span>
				      </td>
				    </tr>
				    <?php } ?>			        	
						<?php } else { ?>					
							<tr>
					        	<td colspan="7" align="center">Não há dados a serem exibidos para a listagem.</td>
				            </tr>
					<?php } ?>
				  </tbody>
				</table>
			</div><!-- col-sm-12-->
		</div><!-- row -->
	</div><!-- container-->
</main>

<main class="mainform">
	<div class="container">
		<div class="row ger-default">
			<div class="col-sm-8"></div>
			<div class="col-sm-4">
				<button type="button" class="btn btn-default btn-lg btn-voltar" id="btn-voltar-blog"><i class='fa fa-arrow-left'></i> Voltar</button>
			</div><!-- col-sm-4-->	
			<div class="col-sm-8 form-border">	
				<h3>Gerenciamento de postagens do blog</h3>			
				<form class="form-row" id="form-blog" data-toggle="validator" action="acts/acts.blogs.php" method="POST">
					<div class="form-group col-sm-1">
						<label for="id">ID</label>
				    	<input type="number" class="form-control" id="id" name="id" aria-describedby="id" maxlength="11" disabled />
					</div>	
					<div class="form-group col-sm-4">
				    	<label for="grupo">Categoria</label>
				      	<select id="grupo" name="grupo" class="form-control">				      	
					      	<?php if ($categoria && $categoria->num_rows > 0) {
				    			while($cat = $categoria->fetch_object()) {
				    			$id = $cat->id_cat;
					   		?>
					        <option value="<?php echo $id; ?>"><?php echo $cat->nome; ?></option>
					        	<?php } ?>			        	
							<?php }?>
				      	</select>
			      	</div>
			      	<div class="form-group col-sm-7">
						<label for="formGroupExampleInput">Titulo do post</label>
					    <input type="text" class="form-control" id="nome" name="nome" placeholder="Titulo do post" required>
					</div>
					<div class="form-group col-sm-12">
					    <label for="img">Imagem do Slide</label>
					    <input type="file" class="form-control-file" id="img" name="img" aria-describedby="img" placeholder="Insira a imagem" required>				    
					</div>				  
				  	<div class="form-group col-sm-12">
				    	<textarea class="form-control" id="descricao" name="descricao" rows="5" placeholder="Descrição do post" required></textarea>
				  	</div>
				  	<div class="form-group col-sm-12">				      
				    	<div class="checkbox" style="margin-left: 20px;">
							<label>
								<input type="checkbox" id="ativo" name="ativo" data-toggle="toggle" data-on="Sim" data-off="Não" data-onstyle="success" data-offstyle="danger">
							Se o estiver ativo, aparecerá na página inicial do site
							</label>
					   	</div>
			      	</div>
			      	<div class="form-group col-sm-12">				      
				    	<div class="checkbox" style="margin-left: 20px;">
							<label>
								<input type="checkbox" id="destaque" name="destaque" data-toggle="toggle" data-on="Sim" data-off="Não" data-onstyle="success" data-offstyle="danger">
							Se o estiver como destaque sim, aparecerá no top da página blog
							</label>
					   	</div>
			      	</div>
				  	<div class="col-sm-8"></div>
				  	<div class="col-sm-8"></div>
				  	<div class="col-sm-4">
				  		<button type="submit" class="btn btn-form btn-primary mb-2" id="btn-salvar-blog">Salvar Post</button>
				  	</div>
				</form>
			</div><!-- col-sm-8-->
			<div class="col-sm-4 access">
				<?php
					require_once('acesso-rapido.php');
				?>
			</div>
		</div><!-- row -->
	</div><!-- container-->
</main>
<?php
	require_once('footer.php');
?>