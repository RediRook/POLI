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

                    <div class="clientprices view">
                        <h2><?php echo __('Clientprice'); ?></h2>
                        <dl>
                            <dt><?php echo __('Id'); ?></dt>
                            <dd>
                                <?php echo h($clientprice['Clientprice']['id']); ?>
                                &nbsp;
                            </dd>
                            <dt><?php echo __('Title'); ?></dt>
                            <dd>
                                <?php echo h($clientprice['Clientprice']['title']); ?>
                                &nbsp;
                            </dd>
                            <dt><?php echo __('Amount'); ?></dt>
                            <dd>
                                <?php echo h($clientprice['Clientprice']['amount']); ?>
                                &nbsp;
                            </dd>
                        </dl>
                    </div>
                    <div class="actions">
                        <br>
                        <ul>
                            <li><?php echo $this->Html->link(__('Edit Clientprice'), array('action' => 'edit', $clientprice['Clientprice']['id'])); ?> </li>
                            <li><?php echo $this->Form->postLink(__('Delete Clientprice'), array('action' => 'delete', $clientprice['Clientprice']['id']), null, __('Are you sure you want to delete # %s?', $clientprice['Clientprice']['id'])); ?> </li>
                            <li><?php echo $this->Html->link(__('Back to List'), array('action' => 'index')); ?> </li>
                            <li><?php echo $this->Html->link(__('New Clientprice'), array('action' => 'add')); ?> </li>
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