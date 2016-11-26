
<?php echo $this->Html->css ('jquery.dataTables.css');?>
<?php echo $this->Html->script('jquery.dataTables'); ?>
<script type="text/javascript" charset="utf-8">

    //http://www.datatables.net/index

    $(document).ready(function() {
        $('#example').dataTable( {
                  "bPaginate": true,
                  "sPaginationType": "full_numbers",
                  "bLengthChange": true,
                  "bSort": false,
                  "bInfo": true,
                  "bAutoWidth": true,
                  "bStateSave": true
              } );
    } );
</script>

<div class="row col-sm-12">
	<h1><?php echo __('Users'); ?></h1>
	<table cellpadding="2" cellspacing="2" width="100%" id='example'>
		<thead>
	<tr class='list'>

				<th class='heading'><?php echo $this->Paginator->sort('username'); ?></th>

				<th class='heading'><?php echo $this->Paginator->sort('role_id'); ?></th>
				<th class='heading'></th>
		</tr>
	</thead>
		<?php foreach ($users as $user): ?>
		<tr class='listeven'>

			<td><?php echo ($user['User']['username']); ?>&nbsp;</td>

			<td>
				<?php echo ($user['Role']['role_name']); ?>
			</td>
			<td>
				<?php echo $this->Html->link(
						$this->Html->image("Delete.png"),
						array('controller' => 'users', 'action' => 'delete', $user['User']['id'], $user['User']['username']),
						array('escape' => false),
						'Are you sure you want to delete ' . $user['User']['username'] . '?');?>

			</td>
		</tr>
	<?php endforeach; ?>
		</table>
</div>

<div class="row col-sm-12">		
	<?php $urlAdd = array ('controller'=>'/Users/','action'=>'add');
	echo $this->Form->button('Add Admin',array('class'=>'btn btn-primary','onclick' => "location.href='".$this->Html-> url($urlAdd)."'"));
	?>
	
	<?php $urlLog = array ('controller'=>'/Audits/','action'=>'index');
	echo $this->Form->button('View Logs',array('class'=>'btn btn-primary','onclick' => "location.href='".$this->Html-> url($urlLog)."'"));
	?>
</div>