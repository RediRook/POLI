
<div id="content">

	<div class="row">
		<div class="col-md-4 text-center">
			<?php
				echo $this->Html->image("menu/Customer.png", array(
					"alt" => "Customer Management",
					'height' => "40%",
					'width' => "40%",
					'url' => array('controller' => 'customers', 'action' => 'customerIndex', 6)
				));
			?>
			<h3 style="float:bottom;margin-top:10px;" class="text-center">Customer Management</h3>
		</div>


		<div class="col-md-4 text-center">
			<?php
				echo $this->Html->image("menu/booking.png", array(
					"alt" => "Job Management",
					'height' => "40%",
					'width' => "40%",
					'url' => array('controller' => 'jobs', 'action' => 'index', 6)
				));
			?>
			<h3 style="float:bottom;margin-top:10px;" align="text-center">Job Management</h3>
		</div>

	</div>