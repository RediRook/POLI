<?php 
$this->Html->addCrumb('Admin Dashboard', '/dashboard');
$this->Html->addCrumb('Template Steps', '/TemplateSteps');
?>
<div class="umtop">
    <?php echo $this->Session->flash(); ?>
    <?php echo $this->element('dashboard'); ?>
    <div class="um_box_up"></div>
    <div class="um_box_mid">
        <div class="um_box_mid_content">
            <div class="um_box_mid_content_top">
                <span class="umstyle1"><?php echo __('Research Step Templates'); ?></span>
                <div style="clear:both"></div>
            </div>
            <div class="umhr"></div>
            <div class="um_box_mid_content_mid">
                <div class="um_box_mid_content_mid_left">
                    <div class="templatesteps index">
                        <h2><?php echo __('Template steps'); ?></h2>
                        <table cellpadding="0" cellspacing="0">
                            <tr>
                                <th><?php echo $this->Paginator->sort('id'); ?></th>
                                <th><?php echo $this->Paginator->sort('title'); ?></th>
                                <th><?php echo $this->Paginator->sort('description'); ?></th>
                                <th><?php echo $this->Paginator->sort('desired_outcome'); ?></th>
                                <th class="actions"><?php echo __('Actions'); ?></th>
                            </tr>
                            <?php foreach ($templatesteps as $templatestep): ?>
                                <tr>
                                    <td><?php echo h($templatestep['Templatestep']['id']); ?>&nbsp;</td>
                                    <td><?php echo h($templatestep['Templatestep']['title']); ?>&nbsp;</td>
                                    <td><?php echo h($templatestep['Templatestep']['description']); ?>&nbsp;</td>
                                    <td><?php echo h($templatestep['Templatestep']['desired_outcome']); ?>&nbsp;</td>
                                    <td class="actions">
                                        <?php echo $this->Html->link(__('View'), array('action' => 'view', $templatestep['Templatestep']['id'])); ?>
                                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $templatestep['Templatestep']['id'])); ?>
                                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $templatestep['Templatestep']['id']), null, __('Are you sure you want to delete '.$templatestep['Templatestep']['title'].'?', $templatestep['Templatestep']['id'])); ?>
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
                        <br>
                        <ul>
                            <li><?php echo $this->Html->link(__('New Templatestep'), array('action' => 'add')); ?></li>
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
