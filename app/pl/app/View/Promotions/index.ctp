
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
	<h1><?php echo __('Promotions'); ?></h1>
	<table cellpadding="2" cellspacing="2" width="100%" id='example'>
	<thead>
	<tr>

			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('date'); ?></th>

			<th class='heading'></th>
            <th class='heading'></th>
            <th class='heading'></th>

	</tr>
	</thead>
	<?php foreach ($promotions as $promotion): ?>
        <tr>
            <td><?php echo h($promotion['Promotion']['title']); ?>&nbsp;</td>
            <td><?php echo h($promotion['Promotion']['date']); ?>&nbsp;</td>

            <td>
                           			<?php echo $this->Html->image("View.png", array('url'=>(array('controller'=>'promotions','action' => 'view', $promotion['Promotion']['id']))));?>
                                       </td>
                                   <td>
                           			<?php echo $this->Html->image("Edit.jpg", array('url'=>array('controller'=>'promotions','action' => 'edit', $promotion['Promotion']['id'])));?>
                                       </td>
                                   <td>
                           		<?php echo $this->Html->link(
                                   			$this->Html->image("Delete.png"),
                                   			array('controller' => 'Promotions', 'action' => 'delete', $promotion['Promotion']['id'], $promotion['Promotion']['title']),
                                   			array('escape' => false),
                                   			'Are you sure you want to delete ' . $promotion['Promotion']['title'] . '?');?>

                           		</td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>

<div class="row col-sm-12">
	<?php $urlAdd = array ('controller'=>'/Promotions/','action'=>'add');
        echo $this->Form->button('Add Promotions',array('class'=>'btn btn-primary','onclick' => "location.href='".$this->Html-> url($urlAdd)."'"));
    ?>
</div>