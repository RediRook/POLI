<?php 
$this->Html->addCrumb('Admin Dashboard', '/dashboard');
$this->Html->addCrumb('Template Tasks', '/TemplateTasks');
$this->Html->addCrumb('View Template Task', '/TemplateTasks/view/'.$id);
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
                    <div class="TemplateTasks view">
                        <h2><?php echo __('Research Task'); ?></h2>
                        <dl>
                            <dt><?php echo __('Title'); ?></dt>
                            <dd>
                                <?php echo h($templateTask['TemplateTask']['title']); ?>
                                &nbsp;
                            </dd>
                            <dt><?php echo __('Description'); ?></dt>
                            <dd>
                                <?php echo h($templateTask['TemplateTask']['description']); ?>
                                &nbsp;
                            </dd>
                            <dt><?php echo __('Desired Outcome'); ?></dt>
                            <dd>
                                <?php echo h($templateTask['TemplateTask']['desired_outcome']); ?>
                                &nbsp;
                            </dd>
                        </dl>
                    </div>
                    <div class="actions">
                        <br>
                        <ul>
                                <!--<li><?php echo $this->Html->link(__('Edit Research Task'), array('action' => 'edit', $templateTask['TemplateTask']['id'])); ?> </li>-->
                                <!--<li><?php echo $this->Form->postLink(__('Delete Research Task'), array('action' => 'delete', $templateTask['TemplateTask']['id']), null, __('Are you sure you want to delete # %s?', $templateTask['TemplateTask']['id'])); ?> </li>-->
                            <li><?php echo $this->Html->link(__('Back to List'), array('action' => 'index')); ?> </li>
                            <!--<li><?php echo $this->Html->link(__('New Research Task'), array('action' => 'add')); ?> </li>-->
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
