<?php 
$this->Html->addCrumb('Admin Dashboard', '/dashboard');
$this->Html->addCrumb('Client Prices', '/ClientPrices');
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

                    <div class="clientprices index">
                        <h2><?php echo __('Clientprices'); ?></h2>
                        <table cellpadding="0" cellspacing="0">
                            <tr>
                                <th><?php echo $this->Paginator->sort('id'); ?></th>
                                <th><?php echo $this->Paginator->sort('title'); ?></th>
                                <th><?php echo $this->Paginator->sort('amount'); ?></th>
                                <th class="actions"><?php echo __('Actions'); ?></th>
                            </tr>
                            <?php foreach ($clientprices as $clientprice): ?>
                                <tr>
                                    <td><?php echo h($clientprice['Clientprice']['id']); ?>&nbsp;</td>
                                    <td><?php echo h($clientprice['Clientprice']['title']); ?>&nbsp;</td>
                                    <td><?php echo h($clientprice['Clientprice']['amount']); ?>&nbsp;</td>
                                    <td class="actions">
                                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $clientprice['Clientprice']['id'])); ?>                                    </td>
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
                            <!--<li><?php echo $this->Html->link(__('New Clientprice'), array('action' => 'add')); ?></li>-->
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