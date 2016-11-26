
<?php echo $this->Html->css ('table');?>
<div class='content'>
<h2><?php  echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>

		<dt><?php echo __('Role'); ?></dt>
		<dd>
			<?php echo ($user['Role']['RoleName']); ?>
			&nbsp;
		</dd>
	</dl>
</div>


