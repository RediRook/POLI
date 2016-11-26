<?php 
$this->Html->addCrumb('Admin Dashboard', '/dashboard');
$this->Html->addCrumb('Client Prices', '/ClientPrices');
$this->Html->addCrumb('Edit Client Prices', '/ClientPrices/edit/'.$id);
?>
<div class="umtop">
    <?php echo $this->Session->flash(); ?>
    <?php echo $this->element('dashboard'); ?>
    <div class="um_box_up"></div>
    <div class="um_box_mid">
        <div class="um_box_mid_content">
            <div class="um_box_mid_content_top">
                <span class="umstyle1"><?php echo __('Client Prices'); ?></span>
                <div style="clear:both"></div>
            </div>
            <div class="umhr"></div>
            <div class="um_box_mid_content_mid">
                <div class="um_box_mid_content_mid_left">

                    <div class="clientprices form">
                        <?php echo $this->Form->create('Clientprice'); ?>
                        <fieldset>
                            <legend><?php echo __('Edit Clientprice'); ?></legend>
                            <?php
                            echo $this->Form->input('id');
                            echo $this->Form->input('title');
                            echo $this->Form->input('amount');
                            ?>
                        </fieldset>
                        <?php echo $this->Form->end(__('Submit')); ?>
                    </div>
                    <div class="actions">
                        <br>
                        <ul>
                            <li><?php echo $this->Html->link(__('Back to List'), array('action' => 'index')); ?></li>
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