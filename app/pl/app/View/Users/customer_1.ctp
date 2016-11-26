
 

	<div class="row">

		<div class="col-md-4 text-center">
			<?php
				echo $this->Html->image("menu/Staff.png", array(
					"alt" => "Staff Management",
					'height' => "40%",
					'width' => "40%",
					'url' => array('controller' => 'staffs', 'action' => 'staffIndex', 6)
				));
			?>
			<h3 style="float:bottom;margin-top:10px;" align="text-center">Search Staff</h3>
		</div>
		<div class="col-md-4 text-center">
			<?php
				echo $this->Html->image("menu/Service.png", array(
					"alt" => "Service Management",
					'height' => "40%",
					'width' => "40%",
					'url' => array('controller' => 'services', 'action' => 'serviceIndex', 6)
				));
			?>
			<h3 style="float:bottom;margin-top:10px;" align="text-center">Search Services</h3>
		</div>

		<div class="col-md-4 text-center">
			<?php
				echo $this->Html->image("menu/booking.png", array(
					"alt" => "Job Management",
					'height' => "40%",
					'width' => "40%",
					'url' => array('controller' => 'jobs', 'action' => 'timeTable', 6)
				));
			?>
			<h3 style="float:bottom;margin-top:10px;" align="text-center">Appointments</h3>
		</div>
		<div class="col-md-4 text-center">
			<?php 
				echo $this->Html->image("menu/news.png", array(
					"alt" => "News Management",
					'height' => "40%",
					'width' => "40%",
					'url' => array('controller' => 'news/customerView', 'action' => 'index', 6)
				));
			?>
			<h3 style="float:bottom;margin-top:10px;" align="text-center">News</h3>
		</div>

	</div>