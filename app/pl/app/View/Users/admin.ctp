
<div id="content">
	<div class="row">
		<div class="col-xs-4 col-md-4 text-center">
			<?php 
				echo $this->Html->image("menu/customer.png", array(
					'alt' => "Customer Management",
					'height' => "40%",
					'width' => "40%",
					'style' => "margin-top:20px;",
					'url' => array('controller' => 'customers', 'action' => 'index', 6)
				));
			?>
			<h3 style="float:bottom;margin-top:10px;" class="text-center hidden-xs">Customer Management</h3>
		</div>
		<div class="col-xs-4 col-md-4 text-center">
			<?php 
				echo $this->Html->image("menu/Staff.png", array(
					"alt" => "Staff Management",
					'height' => "40%",
					'width' => "40%",
					'style' => "margin-top:20px;",
					'url' => array('controller' => 'staffs', 'action' => 'index', 6)
				));
			?>
			<h3 style="float:bottom;margin-top:10px;" class="text-center hidden-xs">Staff Management</h3>
		</div>
		<div class="col-xs-4 col-md-4 text-center">
			<?php 
				echo $this->Html->image("menu/Service.png", array(
					"alt" => "Service Management",
					'height' => "40%",
					'width' => "40%",
					'style' => "margin-top:20px;",
					'url' => array('controller' => 'services', 'action' => 'index', 6)
				));
			?>
			<h3 style="float:bottom;margin-top:10px;" class="text-center hidden-xs">Service Management</h3>
		</div>
		<!--<div class="col-xs-4 col-md-4 text-center">
			<?php 
				echo $this->Html->image("menu/Invoice.png", array(
					"alt" => "Invoice Management",
					'height' => "40%",
					'width' => "40%",
					'style' => "margin-top:20px;",
					'url' => array('controller' => 'staffs', 'action' => 'index', 6)
				));
			?>
			<h3 style="float:bottom;margin-top:10px;" class="text-center hidden-xs">Invoice Management</h3>
		</div>-->
		<div class="col-xs-4 col-md-4 text-center">
			<?php 
				echo $this->Html->image("menu/booking.png", array(
					"alt" => "Job Management",
					'height' => "40%",
					'width' => "40%",
					'style' => "margin-top:20px;",
					'url' => array('controller' => 'jobs', 'action' => 'index', 6)
				));
			?>
			<h3 style="float:bottom;margin-top:10px;" class="text-center hidden-xs">Job Management</h3>
		</div>
		<div class="col-xs-4 col-md-4 text-center">
			<?php 
				echo $this->Html->image("menu/Web Management.png", array(
					"alt" => "Web Management",
					'height' => "40%",
					'width' => "40%",
					'style' => "margin-top:20px;",
					'url' => array('controller' => 'pagecontents', 'action' => 'index', 6)
				));
			?>
			<h3 style="float:bottom;margin-top:10px;" class="text-center hidden-xs">Web Management</h3>
		</div>
		<div class="col-xs-4 col-md-4 text-center">
			<?php 
				echo $this->Html->image("menu/User.png", array(
					"alt" => "User Management",
					'height' => "40%",
					'width' => "40%",
					'style' => "margin-top:20px;",
					'url' => array('controller' => 'users', 'action' => 'index', 6)
				));
			?>
			<h3 style="float:bottom;margin-top:10px;" class="text-center hidden-xs">User Management</h3>
		</div>
		<div class="col-xs-4 col-md-4 text-center">
			<?php 
				echo $this->Html->image("menu/news.png", array(
					"alt" => "News Management",
					'height' => "40%",
					'width' => "40%",
					'style' => "margin-top:20px;",
					'url' => array('controller' => 'news', 'action' => 'index', 6)
				));
			?>
			<h3 style="float:bottom;margin-top:10px;" class="text-center hidden-xs">News Management</h3>
		</div>
		<div class="col-xs-4 col-md-4 text-center">
			<?php 
				echo $this->Html->image("menu/promotion.png", array(
					"alt" => "Promotion Management",
					'height' => "40%",
					'width' => "40%",
					'style' => "margin-top:20px;",
					'url' => array('controller' => 'promotions', 'action' => 'index', 6)
				));
			?>
			<h3 style="float:bottom;margin-top:10px;" class="text-center hidden-xs">Promotion Management</h3>
		</div>
	</div>