<?php
$this->Html->addCrumb('Case List', '/clientcases');
$this->Html->addCrumb('View Case', '/clientcases/view/' . $task['ResearchTask']['clientcase_id'] . '#tab8');
$this->Html->addCrumb('View Task', '/ResearchTasks/view/' . $task['ResearchTask']['id']);
$this->Html->addCrumb('View Research Step', '/ResearchSteps/view/' . $id);
?>
<div class="researchSteps view">
    <h2><?php echo __('Research Step'); ?></h2>
    <dl>
        <dt><?php echo __('Status'); ?></dt>
        <dd>
            <?php echo h($researchStep['ResearchStep']['status']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Created By'); ?></dt>
        <dd>
            <?php echo h($createdBy['Employee']['first_name'] . ' ' . $createdBy['Employee']['surname']); ?>
        </dd>
        <dt><?php echo __('Assigned To'); ?></dt>
        <dd>
            <?php echo h($responsibleFor['Employee']['first_name'] . ' ' . $responsibleFor['Employee']['surname']); ?>
        </dd>
        <dt><?php echo __('Description'); ?></dt>
        <dd>
            <div class="wrap"><?php echo h($researchStep['ResearchStep']['description']); ?></div>
            &nbsp;
        </dd>
        <dt><?php echo __('Creation Date'); ?></dt>
        <dd>
            <?php echo h($researchStep['ResearchStep']['creation_date']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Expected Completion Date'); ?></dt>
        <dd>
            <?php echo h($researchStep['ResearchStep']['expected_completion_date']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Completion Date'); ?></dt>
        <dd>
            <?php echo h($researchStep['ResearchStep']['completion_date']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Desired Outcome'); ?></dt>
        <dd>
            <div class="wrap"><?php echo h($researchStep['ResearchStep']['desired_outcome']); ?></div>
            &nbsp;
        </dd>
        <dt><?php echo __('Actual Outcome'); ?></dt>
        <dd>
            <div class="wrap"><?php echo h($researchStep['ResearchStep']['actual_outcome']); ?></div>
            &nbsp;
        </dd>
    </dl>
</div>
<?php echo $this->form->create('empty'); ?>
<div class="submit">
    <?php echo $this->Form->submit(__('Cancel', true), array('name' => 'Button', 'div' => false)); ?>
</div>
<?php echo $this->form->end(); ?>
