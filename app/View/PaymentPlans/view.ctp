<div class="paymentPlans view">
    <?php
    $this->Html->addCrumb('Case List', '/clientcases');
    $this->Html->addCrumb('View Case', '/clientcases/view/' . $applicant['Clientcase']['id']);
    $this->Html->addCrumb('View Quote', '/paymentplans/view/' . $id);
    ?>
    <h2><?php echo __('Payment Plan'); ?></h2>
    <table border='1'>
        <tbody>
            <tr>
                <td><b>Applicants: </b> <h3><?php echo $applicant['Applicant']['first_name'] . ' ' . $applicant['Applicant']['middle_name'] . ' ' . $applicant['Applicant']['surname']; ?></h3></td>
            </tr>
            <tr>
                <td><b>Number of installments:</b></td>
                <td><?php echo $plan['PaymentPlan']['No_installment'] ?></td>

            </tr>        
            <tr>
                <td><b>Installment 1:</b></td>
                <td><?php echo $plan['PaymentPlan']['installment_price1'] ?></td>
                <td><b>Installment Date 1:</b></td>
                <td><?php echo $plan['PaymentPlan']['installment_date1'] ?></td>
            </tr>
            <tr>
                <td><b>Installment 2:</b></td>
                <td><?php echo $plan['PaymentPlan']['installment_price2'] ?></td>
                <td><b>Installment Date 2:</b></td>
                <td><?php echo $plan['PaymentPlan']['installment_date2'] ?></td>
            </tr>
            <?php
            if ($plan['PaymentPlan']['installment_price3'] != null && $plan['PaymentPlan']['installment_date3'] != null) {
                ?>
                <tr>
                    <td><b>Installment 3:</b></td>
                    <td><?php echo $plan['PaymentPlan']['installment_price3'] ?></td>
                    <td><b>Installment Date 3:</b></td>
                    <td><?php echo $plan['PaymentPlan']['installment_date3'] ?></td>
                </tr>
                <?php
            }
            ?>
            <?php
            if ($plan['PaymentPlan']['installment_price4'] != null && $plan['PaymentPlan']['installment_date4'] != null) {
                ?>
                <tr>
                    <td><b>Installment 4:</b></td>
                    <td><?php echo $plan['PaymentPlan']['installment_price4'] ?></td>
                    <td><b>Installment Date 4:</b></td>
                    <td><?php echo $plan['PaymentPlan']['installment_date4'] ?></td>
                </tr>
    <?php
}
?>
            <?php
            if ($plan['PaymentPlan']['installment_price5'] != null && $plan['PaymentPlan']['installment_date5'] != null) {
                ?>
                <tr>
                    <td><b>Installment 5:</b></td>
                    <td><?php echo $plan['PaymentPlan']['installment_price5'] ?></td>
                    <td><b>Installment Date 5:</b></td>
                    <td><?php echo $plan['PaymentPlan']['installment_date5'] ?></td>
                </tr>
    <?php
}
?>
            <?php
            if ($plan['PaymentPlan']['installment_price6'] != null && $plan['PaymentPlan']['installment_date6'] != null) {
                ?>
                <tr>
                    <td><b>Installment 6:</b></td>
                    <td><?php echo $plan['PaymentPlan']['installment_price6'] ?></td>
                    <td><b>Installment Date 6:</b></td>
                    <td><?php echo $plan['PaymentPlan']['installment_date6'] ?></td>
                </tr>
    <?php
}
?>
            <tr>
                <td><b>Interest Rate:</b></td>
                <td><?php echo $plan['PaymentPlan']['interest_rate'] ?></td>
                <td><b>Total:</b></td>
                <td>$<?php echo $plan['PaymentPlan']['total'] ?></td>
            </tr>
        </tbody>
    </table>
    <br>
    <div class="actions">
<?php
echo $this->Html->link(
        'Delete', array('controller' => 'Paymentplans', 'class' => 'button', 'action' => 'delete', $plan['PaymentPlan']['id']), array('confirm' => 'Are you sure you want to delete the payment plan of ' . $applicant['Applicant']['first_name'] . ' ' . $applicant['Applicant']['surname'] . '?'));
?>


        <?php echo $this->form->create('empty'); ?>
        <div class="submit">
<?php echo $this->Form->Submit(__('Cancel', true), array('name' => 'PaymentButton', 'div' => false)); ?>
            <font color="white"></font>
        <?php echo $this->Form->Submit(__('View Payment Plan pdf', true), array('name' => 'PaymentButton', 'div' => false)); ?>

        </div>

    </div>
</div>