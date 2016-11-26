<?php
$this->Html->addCrumb('Case List', '/clientcases');
$this->Html->addCrumb('View Case', '/clientcases/view/' . $task['ResearchTask']['clientcase_id'] . '#tab8');
$this->Html->addCrumb('View Research Task', '/ResearchTasks/view/' . $id);
?>
<div class="researchTasks view">
    <h2><?php echo __('Research Task'); ?></h2>
    <dl>
        <dt><?php echo __('Applicant'); ?></dt>
        <dd>
            <?php echo $case['Applicant']['first_name'] . " " . $case['Applicant']['surname']; ?>
        </dd>
        <dt><?php echo __('Status'); ?></dt>
        <dd>
            <?php echo h($researchTask['ResearchTask']['status']); ?>
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
            <div class="wrap"><?php echo h($researchTask['ResearchTask']['description']); ?></div>
            &nbsp;
        </dd>
        <dt><?php echo __('Creation Date'); ?></dt>
        <dd>
            <?php echo h($researchTask['ResearchTask']['creation_date']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Expected Completion Date'); ?></dt>
        <dd>
            <?php echo h($researchTask['ResearchTask']['expected_completion_date']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Completion Date'); ?></dt>
        <dd>
            <?php
            if ($researchTask['ResearchTask']['completion_date'] != null) {
                echo h($researchTask['ResearchTask']['completion_date']);
            } else {
                echo "Not yet complete";
            }
            ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Desired Outcome'); ?></dt>
        <dd>
            <div class="wrap"><?php echo h($researchTask['ResearchTask']['desired_outcome']); ?></div>
            &nbsp;
        </dd>
        <dt><?php echo __('Actual Outcome'); ?></dt>
        <dd>
            <div class="wrap"><?php echo h($researchTask['ResearchTask']['actual_outcome']); ?></div>
            &nbsp;
        </dd>
    </dl>
</div>
<?php echo $this->form->create('empty'); ?>
<div class="submit">
    <?php echo $this->Form->submit(__('Add a Step', true), array('name' => 'Button', 'div' => false)); ?>
    <?php echo $this->Form->submit(__('Cancel', true), array('name' => 'Button', 'div' => false)); ?>
</div>
<?php echo $this->form->end(); ?>
<table>
    <td>
        <h3>Steps to be Completed</h3>
    </td>
    <td>
    <td><b><p>Tasks Complete:</p><?php echo $completedStepCount; ?>/<?php echo $totalStepCount; ?></b></td>
</td>
</table>
<table>
    <tr>
        <th>Description</th>
        <th>Expected Completion Date</th>
        <th>Status</th>
    </tr>
    <?php foreach ($researchSteps as $researchStep): ?>
        <tr>
            <td><?php echo $this->text->truncate($researchStep['ResearchStep']['description'], 50, array('ellipses' => '...')); ?></td>
            <td><?php echo $researchStep['ResearchStep']['expected_completion_date']; ?></td>
            <td><?php echo $researchStep['ResearchStep']['status']; ?></td>
            <td class="actions">
                <?php echo $this->Html->link(__('View'), array('controller' => 'ResearchSteps', 'action' => 'view', $researchStep['ResearchStep']['id'])); ?>
                <?php echo $this->Html->link(__('Edit'), array('controller' => 'ResearchSteps', 'action' => 'edit', $researchStep['ResearchStep']['id'])); ?>
                <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'ResearchSteps', 'action' => 'delete', $researchStep['ResearchStep']['id']), null, __('Are you sure you want to delete # %s?', $researchStep['ResearchStep']['id'])); ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>