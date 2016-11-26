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
    <h1><?php echo __('Audits'); ?></h1>
    <table cellpadding="2" cellspacing="2" width="100%" id='example'>
        <thead>
        <tr class='list'>
            <th class='heading'><?php echo $this->Paginator->sort('created'); ?></th>
            <th class='heading'><?php echo $this->Paginator->sort('event'); ?></th>
            <th class='heading'><?php echo $this->Paginator->sort('source_id'); ?></th>
            <th class='heading'></th>
        </tr>
        </thead>
        <?php foreach ($audits as $audit): ?>
            <tr class='listeven'>

                <td><?php echo h($audit['Audit']['created']); ?>&nbsp;</td>
                <td><?php echo h($audit['Audit']['event']); ?>&nbsp;</td>
                <td><?php echo h($audit['Audit']['source_id']); ?>&nbsp;</td>
                <td>
                    <?php echo $this->Html->image("View.png", array('url'=>(array('controller'=>'audits','action' => 'view', $audit['Audit']['id']))));?>
                </td>

            </tr>
        <?php endforeach; ?>
    </table>
</div>
<?php $url = array('controller'=>'users', 'action'=>'index');
echo $this->Form->button('Back',array('class'=>'btn btn-primary','type'=>'button','onclick'=> "location.href='".$this->Html->url($url)."'"));   ?>
