<div class="row">
	<div id="myCarousel" class="carousel slide col-md-12" style="margin-top:-20px;">
		
		<!-- Wrapper for slides -->
		<div class="carousel-inner">
			<div class="item active">
				<img src="img/carousel/1.jpg">
			</div>
			<div class="item">
				<img src="img/carousel/2.jpg">
			</div>
			<div class="item">
				<img src="img/carousel/3.jpg">
			</div>
		</div>

	</div>
</div>

<div class="row">					
	<div class="col-md-12">
		<?php echo $content['Pagecontent']['content'];?>
	</div>
</div>
	
	<script>
		  $(document).ready(function(){
			$('.carousel').carousel({
			  interval: 5000
			});
		  });
	</script>