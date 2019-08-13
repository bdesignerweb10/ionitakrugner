<?php
	require_once('header.php');
	$videos = $conn->query("select * from tbl_videos where ativo = 1") or trigger_error($conn->error);	
?>
<main>
	<div class="container default-videos">
		<div class="row">
		<div class="col-sm-12">
			<div class="row">
				<?php if ($videos && $videos->num_rows > 0) {
			    	while($play = $videos->fetch_object()) {
			    	$id = $play->id_video;
				?>
				<div class="col-sm-4">
					<div class="card card-videos">
					<?php echo $play->url; ?>	
				    <blockquote class="blockquote mb-0 card-body">
				      <p><?php echo $play->titulo; ?></p>
				    </blockquote>
				  </div>
				</div><!--col-sm-4-->
					<?php } ?> 
				<?php } ?>					
			</div><!-- row -->
		</div><!--col-sm-10-->
		</div><!--row -->
	</div><!-- container-->
</main>
<?php
	require_once('footer.php');
?>