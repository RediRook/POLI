
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

<table cellpadding="2" cellspacing="2" width="100%" id='example'>
    <thead>
    <tr class='list'>
        <th class='heading'>Start Time</th>
        <th class='heading'>Service</th>
        <th class='heading'>Staff</th>
        <th class='heading'>Status</th>
        <th class='heading'></th>
    </tr>
    </thead>
    <?php foreach ($jobs as $job): ?>
        <tr class='listeven'>
            <td><?php echo date("d-m-Y",strtotime($job['Job']['startTime'])); ?>&nbsp;</td>
            <td>
                <?php foreach($job['Service'] as $service): ?>
                    <?php echo $service['name']; ?>
                    &nbsp;
                <?php endforeach; ?>
            </td>
            <td>
                <?php foreach($job['Staff'] as $staff): ?>
                    <?php echo $staff['staff_name']; ?>
                    &nbsp;
                <?php endforeach; ?>
            </td>

            <?php if ($job['Job']['status']=='Finished'):?>
                <td><span class="label label-success">Finished</span></td>
            <?php else:?>
                <td><span class="label label-danger">Not Finished</span></td>
            <?php endif;?>

            <td>
                <?php echo $this->Html->image("View.png", array('url'=>(array('controller'=>'jobs','action' => 'viewJob', $job['Job']['id']))));?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
