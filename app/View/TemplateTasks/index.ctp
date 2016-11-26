<?php 
$this->Html->addCrumb('Admin Dashboard', '/dashboard');
$this->Html->addCrumb('Template Tasks', '/TemplateTasks');
?>
<div class="umtop">
    <?php echo $this->Session->flash(); ?>
    <?php echo $this->element('dashboard'); ?>
    <div class="um_box_up"></div>
    <div class="um_box_mid">
        <div class="um_box_mid_content">
            <div class="um_box_mid_content_top">
                <span class="umstyle1"><?php echo __('Research Task Templates'); ?></span>
                <div style="clear:both"></div>
            </div>
            <div class="umhr"></div>
            <div class="um_box_mid_content_mid">
                <div class="um_box_mid_content_mid_left">

                    <div class="templatetasks index">
                        <table cellpadding="0" cellspacing="0">
                            <tr>
                                <th><?php echo $this->Paginator->sort('title'); ?></th>
                                <th><?php echo $this->Paginator->sort('description'); ?></th>
                                <th><?php echo $this->Paginator->sort('desired_outcome'); ?></th>
                                <th class="actions"><?php echo __('Actions'); ?></th>
                            </tr>
                            <?php foreach ($templateTasks as $templatetask): ?>
                                <tr>
                                    <td><?php echo h($templatetask['TemplateTask']['title']); ?>&nbsp;</td>
                                    <td><?php echo h($templatetask['TemplateTask']['description']);
                            ; ?>&nbsp;</td>
                                    <td><?php echo h($templatetask['TemplateTask']['desired_outcome']);
                            ; ?>&nbsp;</td>
                                    <td class="actions">
                                        <?php echo $this->Html->link(__('View'), array('action' => 'view', $templatetask['TemplateTask']['id'])); ?>
    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $templatetask['TemplateTask']['id'])); ?>		
                                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $templatetask['TemplateTask']['id']), null, __('Are you sure you want to delete ' . $templatetask['TemplateTask']['title'] . '?', $templatetask['TemplateTask']['id'])); ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                        <p>
                            <?php
                            echo $this->Paginator->counter(array(
                                'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
                            ));
                            ?>	</p>
                        <div class="paging">
                            <?php
                            echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
                            echo $this->Paginator->numbers(array('separator' => ''));
                            echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
                            ?>
                        </div>
                    </div>
                    <div class="actions">
                        <h3><?php echo __('Actions'); ?></h3>
                        <ul>
                            <li><?php echo $this->Html->link(__('New Task Template'), array('action' => 'add')); ?></li>
                        </ul>
                    </div>

                </div>
                <div class="um_box_mid_content_mid_right" align="right"></div>
                <div style="clear:both"></div>
            </div>
        </div>
    </div>
    <div class="um_box_down"></div>
</div>
