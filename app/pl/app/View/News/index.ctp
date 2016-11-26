
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
	<h1><?php echo __('News'); ?></h1>
	<table cellpadding="2" cellspacing="2" width="100%" id='example'>
	<thead>
	<tr class='list'>

			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('date'); ?></th>

			<th class='heading'></th>
            <th class='heading'></th>
            <th class='heading'></th>

	</tr>
	</thead>
	<?php foreach ($news as $news): ?>
        <tr class='listeven'>
            <td><?php echo h($news['News']['title']); ?>&nbsp;</td>
            <td><?php echo h($news['News']['date']); ?>&nbsp;</td>

            <td>
                           			<?php echo $this->Html->image("View.png", array('url'=>(array('controller'=>'news','action' => 'view', $news['News']['id']))));?>
                                       </td>
                                   <td>
                           			<?php echo $this->Html->image("Edit.jpg", array('url'=>array('controller'=>'news','action' => 'edit', $news['News']['id'])));?>
                                       </td>
                                   <td>
                           		<?php echo $this->Html->link(
                                   			$this->Html->image("Delete.png"),
                                   			array('controller' => 'news', 'action' => 'delete', $news['News']['id'], $news['News']['title']),
                                   			array('escape' => false),
                                   			'Are you sure you want to delete ' . $news['News']['title'] . '?');?>

                           		</td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
<div class="row col-sm-12">
	<?php $urlAdd = array ('controller'=>'/News/','action'=>'add');
		echo $this->Form->button('Add News',array('class'=>'btn btn-primary','onclick' => "location.href='".$this->Html-> url($urlAdd)."'"));
    ?>
</div