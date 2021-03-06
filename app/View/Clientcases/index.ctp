<?php
echo $this->HTML->script('JQueryUser');


$this->Html->addCrumb('Case List', '/clientcases');
?>

<div class="clientcases index">
    <h2><?php echo __('Client Case List'); ?></h2>

    <table id=filter>
        <?php
        echo $this->Form->create('Clientcases');
        ?>
        <tbody>
        <tr>
            <td id='filterbox'><?php echo $this->Form->input('status_id', array('empty' => 'All', 'options' => $statuses, 'label' => 'Status Filter', 'default' => $id)); ?> </td>
            <td id='filterbutton'><?php echo $this->Form->end(__('Filter')); ?></td>
        </tr>
        </tbody>
    </table>
    <br>
    <table id="data">
        <thead>
        <tr>
            <th class="heading">Applicant Name</th>
            <th class="heading">Status</th>
            <th class="heading">Archive Name</th>
            <th class="heading">Open or Closed</th>
            <th class="heading">Date Created</th>
            <th class="heading">View</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($clientcases as $clientcase): ?>

            <tr class="list">
                <td valign="top">
                    <?php echo h($clientcase['Applicant']['first_name'].' '.$clientcase['Applicant']['surname']); ?>
                </td>
                <td valign="top">
                    <?php if($clientcase['Clientcase']['status_id'] == 0){?>
                        <?php echo h('Denied'); ?>
                    <?php } else {?>
                        <?php echo h($clientcase['Status']['status_type']); ?>
                    <?php } ?>
                </td>
                <td valign="top">
                    <?php echo h($clientcase['Archive']['archive_name']); ?>
                </td>
                <td valign="top"><?php echo h($clientcase['Clientcase']['open_or_closed']); ?>&nbsp;</td>
                <td valign="top"><?php echo h($this->Time->format('d-m-Y', $clientcase['Clientcase']['created'])); ?>&nbsp;</td>
                <td class="actions">
                    <?php if($clientcase['Clientcase']['status_id'] == 0){?>
                        <?php echo $this->Html->link(__('View'), array('action' => 'denied', $clientcase['Clientcase']['id'])); ?>
                    <?php } else {?>
                        <?php echo $this->Html->link(__('View'), array('action' => 'view', $clientcase['Clientcase']['id'])); ?>
                    <?php } ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <p>
</div>

