
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
	<h1><?php echo __('Customers'); ?></h1>
	<table cellpadding="2" cellspacing="2" width="100%" id='example'>
		<thead>
		<tr class='list'>
				<th class='heading'><?php echo $this->Paginator->sort('lastName'); ?></th>
				<th class='heading'><?php echo $this->Paginator->sort('firstName'); ?></th>
				<th class='heading'><?php echo $this->Paginator->sort('address'); ?></th>
				<th class='heading'><?php echo $this->Paginator->sort('email'); ?></th>
			<th class='heading'></th>
		</tr>
		</thead>
		<?php foreach ($customers as $customer): ?>
			<tr class='listeven'>

			<td><?php echo h($customer['Customer']['lastName']); ?>&nbsp;</td>
			<td><?php echo h($customer['Customer']['firstName']); ?>&nbsp;</td>
			<td><?php echo h($customer['Customer']['address']); ?>&nbsp;</td>
			<td><?php echo h($customer['Customer']['email']); ?>&nbsp;</td>
			<td>
				<?php echo $this->Html->image("View.png", array('url'=>(array('controller'=>'customers','action' => 'customerView', $customer['Customer']['id']))));?>
				</td>
		</tr>
	<?php endforeach; ?>
		</table>
</div>



