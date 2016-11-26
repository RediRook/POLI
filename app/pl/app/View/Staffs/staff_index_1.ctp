
<?php echo $this->Html->css ('jquery.dataTables.css');?>
<?php echo $this->Html->script('jquery.dataTables'); ?>
<script type="text/javascript" charset="utf-8">

    //http://www.datatables.net/index


    $(document).ready(function() {
        $('#e').dataTable( {
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

<h1><?php echo __('Staffs'); ?>

</h1>
<table cellpadding="2" cellspacing="2" width="100%" id='e'>
    <thead>
    <tr class='list'>
		<th class='heading'><?php echo $this->Paginator->sort('lastName'); ?></th>
        <th class='heading'><?php echo $this->Paginator->sort('firstName'); ?></th>

        <th class='heading'><?php echo $this->Paginator->sort('email'); ?></th>
        <th class='heading'></th>
    </tr>
    </thead>
    <?php foreach ($staffs as $staff): ?>
        <tr class='listeven'>

			<td><?php echo h($staff['Staff']['lastName']); ?>&nbsp;</td>
            <td><?php echo h($staff['Staff']['firstName']); ?>&nbsp;</td>

            <td><?php echo h($staff['Staff']['email']); ?>&nbsp;</td>
           	<td>
           			<?php echo $this->Html->image("View.png", array('url'=>(array('controller'=>'staffs','action' => 'staffView', $staff['Staff']['id']))));?>
                       </td>


    <?php endforeach; ?>
</table>






