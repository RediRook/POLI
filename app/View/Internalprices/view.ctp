
<div class="umtop">
    <?php echo $this->Session->flash(); ?>
    <?php echo $this->element('dashboard'); ?>
    <div class="um_box_up"></div>
    <div class="um_box_mid">
        <div class="um_box_mid_content">
            <div class="um_box_mid_content_top">
                <span class="umstyle1"><?php echo __('Internal Prices'); ?></span>
                <div style="clear:both"></div>
            </div>
            <div class="umhr"></div>
            <div class="um_box_mid_content_mid">
                <div class="um_box_mid_content_mid_left">

                    <div class="internalprices view">
                        <h2><?php echo __('Internalprice'); ?></h2>
                        <dl>
                            <dt><?php echo __('Id'); ?></dt>
                            <dd>
                                <?php echo h($internalprice['Internalprice']['id']); ?>
                                &nbsp;
                            </dd>
                            <dt><?php echo __('Title'); ?></dt>
                            <dd>
                                <?php echo h($internalprice['Internalprice']['title']); ?>
                                &nbsp;
                            </dd>
                            <dt><?php echo __('Amount'); ?></dt>
                            <dd>
                                <?php echo h($internalprice['Internalprice']['amount']); ?>
                                &nbsp;
                            </dd>
                        </dl>
                    </div>
                    <div class="actions">
                        <br>
                        <ul>
                            <li><?php echo $this->Html->link(__('Edit Internalprice'), array('action' => 'edit', $internalprice['Internalprice']['id'])); ?> </li>
                            <li><?php echo $this->Form->postLink(__('Delete Internalprice'), array('action' => 'delete', $internalprice['Internalprice']['id']), null, __('Are you sure you want to delete # %s?', $internalprice['Internalprice']['id'])); ?> </li>
                            <li><?php echo $this->Html->link(__('Back to List'), array('action' => 'index')); ?> </li>
                            <li><?php echo $this->Html->link(__('New Internalprice'), array('action' => 'add')); ?> </li>
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
