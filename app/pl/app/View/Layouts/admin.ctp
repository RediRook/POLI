<!DOCTYPE html>
<html>
	<head>
		<title>Bayside Gardener</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		    <?php
				echo $this->Html->meta('icon');
				echo $this->Html->css('bootstrap');
				echo $this->Html->script('jquery');
			?>

	</head>

	<body>
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="brand hidden-sm">
						<img height="100%" width="100%" src="<?php echo $this->webroot; ?>img/header.png">
					</div>
				
						<noscript>
							<div class="noscript">
								<p align="center"><strong>You Need Javascript Enabled for this Site For Optimal Experience</strong><p>
							</div>
						</noscript>
						
						<nav class="navbar navbar-default" role="navigation">
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								<a class="navbar-brand" href="#">TBG</a>
							</div>

							<!-- Collect the nav links, forms, and other content for toggling -->
							<div class="collapse navbar-collapse navbar-ex1-collapse">
								<ul class="nav navbar-nav">
									<li><?php echo $this->Html->link('Home','/users/admin');?></li>
									<li><?php echo $this->Html->link('Service','/services/index');?></li>
									<li><?php echo $this->Html->link('Staff','/staffs/index');?></li>
									<li><?php echo $this->Html->link('Customer','/customers/index');?></li>
									<li><?php echo $this->Html->link('User','/users/index');?></li>
									<li><?php echo $this->Html->link('Job','/jobs/index');?></li>
                                    <li><?php echo $this->Html->link('News','/news/index');?></li>
                                    <li><?php echo $this->Html->link('Web management','/pagecontents/index');?></li>
                                    <li><?php echo $this->Html->link('Promotions','/promotions/index');?></li>
								</ul>
								<ul class="nav navbar-nav navbar-right">
									<li><?php echo $this->Html->link('Logout',array ('controller'=>'users', 'action'=> 'logout'));?></li>
								</ul>
							</div><!-- /.navbar-collapse -->
						</nav>
						
						<div id="row">
							<div class="col-12">
								<?php echo $this->Session->flash();?>
								<?php echo $this->fetch('content');?>
							</div>
						</div>

						<div class="text-center" style="margin-top:20px;">
							<p>&copy; Bayside Gardener Pty Ltd 2013</p>
						</div>
					</div>
				</div>
			</div>
			<?php
				echo $this->Html->script('bootstrap.js');
				echo $this->Html->script('collapse');
				echo $this->Html->script('modal');
				echo $this->Html->script('carousel');
				echo $this->Html->script('transition');
			?>
	</body>						
						

</html>
