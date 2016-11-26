<?php
$this->Html->addCrumb('Case List', '/clientcases');
$this->Html->addCrumb('View Case', '/clientcases/view/' . $appQuote['Applicant']['clientcase_id'] . '#tab6');
$this->Html->addCrumb('View Quote', '/quotes/view/' . $appQuote['Quote']['id']);
$this->Html->addCrumb('Old Payment Plans', '/oldpaymentplans/index/' . $appQuote['Quote']['id']);
$this->Html->addCrumb('View Old Payment Plans', '/oldpaymentplans/view/' . $oldPaymentPlan['OldPaymentPlan']['id']);
?>
<div class="oldPaymentPlans view">
    <h2><?php echo __('Old Payment Plan'); ?></h2>
    <dl>
        <dt><?php echo __('Number of Installments'); ?></dt>
        <dd>
            <?php echo h($oldPaymentPlan['OldPaymentPlan']['No_installment']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Installment Date Period'); ?></dt>
        <dd>
            <?php echo h($oldPaymentPlan['OldPaymentPlan']['installment_date_period']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Installment Price1'); ?></dt>
        <dd>
            <?php echo h('$' . $oldPaymentPlan['OldPaymentPlan']['installment_price1']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Installment Date1'); ?></dt>
        <dd>
            <?php echo h($oldPaymentPlan['OldPaymentPlan']['installment_date1']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Installment Price2'); ?></dt>
        <dd>
            <?php echo h('$' . $oldPaymentPlan['OldPaymentPlan']['installment_price2']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Installment Date2'); ?></dt>
        <dd>
            <?php echo h($oldPaymentPlan['OldPaymentPlan']['installment_date2']); ?>
            &nbsp;
        </dd>
        <?php
        if ($oldPaymentPlan['OldPaymentPlan']['installment_price3'] != null) {
            ?>
            <dt><?php echo __('Installment Price3'); ?></dt>
            <dd>
                <?php echo h('$' . $oldPaymentPlan['OldPaymentPlan']['installment_price3']); ?>
                &nbsp;
            </dd>
            <?php
        }
        if ($oldPaymentPlan['OldPaymentPlan']['installment_date3'] != null) {
            ?>
            <dt><?php echo __('Installment Date3'); ?></dt>
            <dd>
                <?php echo h($oldPaymentPlan['OldPaymentPlan']['installment_date3']); ?>
                &nbsp;
            </dd>
            <?php
        }
        if ($oldPaymentPlan['OldPaymentPlan']['installment_price4'] != null) {
            ?>
            <dt><?php echo __('Installment Price4'); ?></dt>
            <dd>
                <?php echo h('$' . $oldPaymentPlan['OldPaymentPlan']['installment_price4']); ?>
                &nbsp;
            </dd>
            <?php
        }
        if ($oldPaymentPlan['OldPaymentPlan']['installment_date4']) {
            ?>
            <dt><?php echo __('Installment Date4'); ?></dt>
            <dd>
                <?php echo h($oldPaymentPlan['OldPaymentPlan']['installment_date4']); ?>
                &nbsp;
            </dd>
            <?php
        }
        if ($oldPaymentPlan['OldPaymentPlan']['installment_price5'] != null) {
            ?>
            <dt><?php echo __('Installment Price5'); ?></dt>
            <dd>
                <?php echo h('$' . $oldPaymentPlan['OldPaymentPlan']['installment_price5']); ?>
                &nbsp;
            </dd>
            <?php
        }
        if ($oldPaymentPlan['OldPaymentPlan']['installment_date5']) {
            ?>
            <dt><?php echo __('Installment Date5'); ?></dt>
            <dd>
                <?php echo h($oldPaymentPlan['OldPaymentPlan']['installment_date5']); ?>
                &nbsp;
            </dd>
            <?php
        }
        if ($oldPaymentPlan['OldPaymentPlan']['installment_price6']) {
            ?>
            <dt><?php echo __('Installment Price6'); ?></dt>
            <dd>
                <?php echo h('$' . $oldPaymentPlan['OldPaymentPlan']['installment_price6']); ?>
                &nbsp;
            </dd>
            <?php
        }
        if ($oldPaymentPlan['OldPaymentPlan']['installment_date6']) {
            ?>
            <dt><?php echo __('Installment Date6'); ?></dt>
            <dd>
                <?php echo h($oldPaymentPlan['OldPaymentPlan']['installment_date6']); ?>
                &nbsp;
            </dd>
            <?php
        }
        ?>
        <dt><?php echo __('Total'); ?></dt>
        <dd>
            <?php echo h('$' . $oldPaymentPlan['OldPaymentPlan']['total']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Interest Rate'); ?></dt>
        <dd>
            <?php echo h($oldPaymentPlan['OldPaymentPlan']['interest_rate'] . '%'); ?>
            &nbsp;
        </dd>
    </dl>
</div>
<br>
<div class="actions">

    <ul>
        <li><?php echo $this->Html->link(__('Back'), array('controller' => 'Oldpaymentplans', 'action' => 'index', $oldPaymentPlan['OldPaymentPlan']['id'])); ?> </li>
    </ul>
</div>
