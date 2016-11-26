<div class="oldPaymentPlans index">
    <?php
    $this->Html->addCrumb('Case List', '/clientcases');
    $this->Html->addCrumb('View Case', '/clientcases/view/' . $quote['Applicant'][0]['clientcase_id'] . '#tab6');
    $this->Html->addCrumb('View Quote', '/quotes/view/' . $quote['Quote']['id']);
    $this->Html->addCrumb('Old Payment Plans', '/oldpaymentplans/index/' . $id);
    ?>
    <h2><?php echo __('Old Payment Plans'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('No_installments'); ?></th>
            <th><?php echo $this->Paginator->sort('installment_date_period'); ?></th>
            <th><?php echo $this->Paginator->sort('total'); ?></th>
            <th><?php echo $this->Paginator->sort('interest_rate'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        <?php foreach ($oldPaymentPlans as $oldPaymentPlan): ?>
            <tr>
                <td><?php echo h($oldPaymentPlan['OldPaymentPlan']['No_installment']); ?>&nbsp;</td>
                <td><?php echo h($oldPaymentPlan['OldPaymentPlan']['installment_date_period']); ?>&nbsp;</td>
                <td><?php echo h('$'.$oldPaymentPlan['OldPaymentPlan']['total']); ?>&nbsp;</td>
                <td><?php echo h($oldPaymentPlan['OldPaymentPlan']['interest_rate'].'%'); ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $oldPaymentPlan['OldPaymentPlan']['id'])); ?>
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
<br>
<div class="actions">
    <?php echo $this->Html->link(__('View'), array('action' => 'view', $oldPaymentPlan['OldPaymentPlan']['quote_id'])); ?>
</div>