
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

<h1><?php echo __('Services'); ?>

</h1>
<table cellpadding="2" cellspacing="2" width="100%" id='example'>
    <thead>
    <tr class='list'>
        <th class='heading'><?php echo $this->Paginator->sort('name'); ?></th>
        <th class='heading'><?php echo $this->Paginator->sort('description'); ?></th>
        <th class='heading'><?php echo $this->Paginator->sort('price'); ?></th>

	</tr>
    </thead>
	<?php foreach ($services as $service): ?>
        <tr class='listeven'>
            <td><?php echo h($service['Service']['name']); ?>&nbsp;</td>
		<td><?php echo h($service['Service']['description']); ?>&nbsp;</td>
		<td><?php echo h($service['Service']['price']); ?>&nbsp;</td>


	</tr>
<?php endforeach; ?>
	</table>
