<?php 
$this->Html->addCrumb('Admin Dashboard', '/dashboard');
$this->Html->addCrumb('Template Steps', '/TemplateSteps');
$this->Html->addCrumb('View Template Steps', '/TemplateSteps/view/'.$id);
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
<div class="templatesteps view">
<h2><?php  echo __('Templatestep'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($templatestep['Templatestep']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($templatestep['Templatestep']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($templatestep['Templatestep']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Desired Outcome'); ?></dt>
		<dd>
			<?php echo h($templatestep['Templatestep']['desired_outcome']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
    <br>
	<ul>
		<!--<li><?php echo $this->Html->link(__('Edit Templatestep'), array('action' => 'edit', $templatestep['Templatestep']['id'])); ?> </li>-->
		<!--<li><?php echo $this->Form->postLink(__('Delete Templatestep'), array('action' => 'delete', $templatestep['Templatestep']['id']), null, __('Are you sure you want to delete # %s?', $templatestep['Templatestep']['id'])); ?> </li>-->
		<li><?php echo $this->Html->link(__('Back to List'), array('action' => 'index')); ?> </li>
		<!--<li><?php echo $this->Html->link(__('New Templatestep'), array('action' => 'add')); ?> </li>-->
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
