	<?php
		echo $this->Html->script(array('jquery.cycle2.min', 'jquery.cycle2.swipe.min', 'jquery.cycle2.center.min.js'));
	?>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
	<div>
	
		<h1>The Services We Provide</h1>
					
		<p>The Bayside Gardener offers professional consulting, garden maintenance, soft landscaping and plant brokering services. It takes control of all things outside in a property (except swimming pools) and makes sure the client gets TOTAL CARE.</p>

		<h3 class="text-center">Click on the services for more detail</h3>
		
		<div id="accordion">
			<h2>Consultancy</h2>
				<div>
					<p>Michael offers a service of consulting to clients about their gardens and discusses a maintenance regime. He also suggests improvements and is happy to prepare a report.</p>
				</div>
								
			<h2>Maintenance Programs</h2>
				<div>
					<p>The maintenance of a garden can vary greatly. Many gardens are maintained weekly with the client expecting their garden to always look manicured</p>
					<p>Other clients require only two weekly or monthly attendances where general works are performed to keep te enitre garden tidy</p>
					<p>Such additional jobs as pot watering, spout cleaning and pressure washing of paths all come under the firms' scope of works.</p>
				</div>
					
			<h2>Soft Landscaping</h2>
				<div>
					<p>The soft landscaping element part of the company involves visiting sites, deciding on a plan or change of direction in the garden.</p>
					<ul>
						<li>Removing unwanted plants</li>
						<li>Upgrading irrigation systems</li>
						<li>Improving soil quality</li>
						<li>Providing plants plant the plants</li>
						<li>Mulching the beds</li>
					</ul>
					<p>The firm then will maintain these areas to make sure they thrive and it is not money wasted</p>
				</div>
					
			<h2>Plant Brokering Service</h2>
				<div>
					<p>The business can also source plants for a client. This may be particularly benefical to younger relatives of existing clients. These people may not be able to afford the services of the company but are able to ask for plants to be sourced at a whole sale rate to save money.</p>
				</div>
		</div>
			
		<script>
			$(function() {
				$( "#accordion" ).accordion({
					collapsible: true
				});
			});
		</script>

	</div>