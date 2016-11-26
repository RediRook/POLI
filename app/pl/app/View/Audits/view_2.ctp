
<div class="row col-sm-12">
    <h1><?php  echo __('Audit'); ?></h1>
    <div class="col-sm-6">
        <table class="table table-striped">
            <tr>
                <td><?php echo __('Created'); ?></td>
                <td><?php echo h($audit['Audit']['created']); ?> </td>
            </tr>
            <tr>
                <td><?php echo __('Event'); ?></td>
                <td><?php echo h($audit['Audit']['event']); ?></td>
            </tr>
            <tr>
                <td><?php echo __('Source ID'); ?></td>
                <td><?php echo h($audit['Audit']['source_id']); ?></td>
            </tr>
            <tr>
                <td><?php echo __('Details'); ?></td>
                <td><?php echo $audit['Audit']['json_object']; ?></td>
            </tr>
            <tr>
                <td><?php echo __('Section'); ?></td>
                <td><?php echo  h($audit['Audit']['model']); ?></td>
            </tr>
            <tr>
                <td><?php echo __('Property'); ?></td>
                <td><?php echo  h($audit['AuditDelta']['property_name']); ?></td>
            </tr>
            <tr>
                <td><?php echo __('Old value'); ?></td>
                <td><?php echo  h($audit['AuditDelta']['old_value']); ?></td>
            </tr>
            <tr>
                <td><?php echo __('New value'); ?></td>
                <td><?php echo  h($audit['AuditDelta']['new_value']); ?></td>
            </tr>
        </table>

    </div>
</div>
<div class="row col-sm-12">


    <?php $url = array('controller'=>'audits', 'action'=>'index');
    echo $this->Form->button('Cancel',array('class'=>'btn btn-primary','type'=>'button','onclick'=> "location.href='".$this->Html->url($url)."'"));
    ?>
</div>