<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8" />
		
	<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDMUZuGG5mn-OjhnKLMAuCxOPj9CWwqfQ4&sensor=false"></script>
		
	<!--Google Maps API-->
		<!--Google Map For Office-->
		<script>
			var myCenter=new google.maps.LatLng(-37.924491,145.059562);

			function initialize()	{
				var mapProp = {
				center:myCenter,
				zoom:15,
				mapTypeId:google.maps.MapTypeId.ROADMAP
				};

				var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

				var marker=new google.maps.Marker(	{
				  position:myCenter,
				});

				marker.setMap(map);
			}

			google.maps.event.addDomListener(window, 'load', initialize);
		</script>
		
		<!--Google Map For Depot-->
		<script>
			var myCenter2=new google.maps.LatLng(-37.857589,145.039912);

			function initialize()	{
				var mapProp = {
				center:myCenter2,
				zoom:15,
				mapTypeId:google.maps.MapTypeId.ROADMAP
				};

				var map2=new google.maps.Map(document.getElementById("googleMap2"),mapProp);

				var marker=new google.maps.Marker(	{
				  position:myCenter2
				});

				marker.setMap(map2);
			}

			google.maps.event.addDomListener(window, 'load', initialize);
		</script>
	
			<div id="row">
				<h1>Contact Us</h1>
				
				<div class="col-md-4 text-center">
					<table border="0" align="left">
						<tr>
							<td>
								<div id="googleMap" style="width:300px;height:300px;"></div>
								<p style="max-width:300px;">Main Office: <br>5 Amiriya Street, Bentleigh East, Victoria, 3165</p>
							</td>
						</tr>
						<tr>
							<td>
								<div id="googleMap2" style="width:300px;height:300px;"></div>
								<p style="max-width:300px;">Depot: <br>1A Cawkwell Street, Malvern, Victoria, 3144</p>
							</td>
						</tr>
					</table>
				</div>
				<div class="col-md-8">
					<h3>Contact Michael Amerena</h3>
					<h3>Mobile: 0419 527 752</h3>
				
			
					<?php
						echo $this->Form->create('Contactform.Contactform');

						echo $this->Form->input('Contactform.Name', array('class'=>'form-control', 'style' => "margin-bottom:10px;", 'label' => __d('contactform', 'Name'), 'placeholder' => 'Your Name (Required)'));
						echo $this->Form->input('Contactform.Mail', array('class'=>'form-control', 'style' => "margin-bottom:10px;", 'label' => __d('contactform', 'Email'), 'placeholder' => 'Your Email (Required)'));
						echo $this->Form->input('Contactform.Message', array('class'=>'form-control', 'style' => "margin-bottom:10px;", 'type' => 'textarea', 'label' => __d('contactform', 'Message'), 'placeholder' => 'Your Question/Inquiry (Required)'));


						echo $this->Form->submit('Submit', array('class' => "btn btn-primary", 'style' => "margin-top:10px;", 'label' => __d('contactform', 'submit')));

						echo $this->Form->end();?>
				</div>
			</div>
		
		<script>
		  $(document).ready(function(){
			$('.carousel').carousel({
			  interval: 5000
			});
		  });
		</script>