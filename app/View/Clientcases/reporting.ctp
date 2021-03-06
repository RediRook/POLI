<?php
echo $this->Html->script('bootstrap-datepicker.js');
echo $this->HTML->css('datepicker');
echo $this->HTML->script('JQueryUser');
?>
<script>
    $(document).ready(function() {
        $('.datepicker').datepicker({
            autoclose: true
        });
    });
</script>
<?php $this->Html->addCrumb('Reporting', '/clientcases/reporting'); ?> 
<h2>Generate Time-Based Reports </h2>
<?php echo $this->Form->create('Clientcase'); ?>
<fieldset>
    <?php echo $this->Form->input('date1', array('label' => 'First date', 'class' => 'datepicker', 'id' => "dpd1")); ?>
    <?php echo $this->Form->input('date2', array('label' => 'Second date', 'class' => 'datepicker', 'id' => "dpd2")); ?>
    <?php
    if ($user['User']['user_group_id'] == 1 || $user['User']['user_group_id'] == 4 ||
            $user['User']['user_group_id'] == 5 || $user['User']['user_group_id'] == 6) {
        echo $this->Form->input('selection', array(
            'options' => array(
                1 => 'Successful enquiries',
                2 => 'Denied enquiries',
                3 => 'Contact notes sent',
                4 => 'Documents uploaded',
                5 => 'Document notes added',
                6 => 'Changed statuses',
                7 => 'No contact notes',
                8 => 'No status changes',
                9 => 'Accepted Quotes',
                10 => 'Payment Plans Created',
                11 => 'Payments Due',
                12 => 'Research Tasks by Employee',
                13 => 'Research Steps by Employee',
                14 => 'All Research Tasks')
        ));
    } else {
        echo $this->Form->input('selection', array(
            'options' => array(
                1 => 'Successful enquiries',
                2 => 'Denied enquiries',
                3 => 'Contact notes sent',
                4 => 'Documents uploaded',
                5 => 'Document notes added',
                6 => 'Changed statuses',
                7 => 'No contact notes',
                8 => 'No status changes',
                9 => 'Accepted Quotes',
                10 => 'Payment Plans Created',
                11 => 'Payments Due')
        ));
    }
    ?>
    <?php echo $this->Form->end(__('Submit')); ?>
</fieldset>

<?php if ($selected == 1) {
    ?>
    <h3>Successful Enquiries</h3>
    <?php
    echo $this->Form->create('Clientcase', array('action' => 'report'));
    echo $this->Form->hidden('date1', array('default' => $date1));
    echo $this->Form->hidden('date2', array('default' => $date2));
    echo $this->Form->end(__('Excel Report'));
    ?>
    <br>
    <table id="data">
        <thead>
            <tr>
                <th class="heading">Archive</th>
                <th class="heading">Applicant Name</th>
                <th class="heading">Status</th>
                <th class="heading">Date Created</th>
                <th class="heading"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clientcases as $clientcase): ?>
                <tr class="list">
                    <td valign="top">
                        <?php echo h($clientcase['Archive']['archive_name']); ?>
                    </td>
                    <td valign="top">
                        <?php echo h($clientcase['Applicant']['first_name'] . ' ' . $clientcase['Applicant']['surname']); ?>
                    </td>
                    <td valign="top">
                        <?php echo h($clientcase['Status']['status_type']); ?>
                    </td>
                    <td valign="top"><?php echo h($this->Time->format('h:i d-m-Y', $clientcase['Clientcase']['created'])); ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View'), array('action' => 'view', $clientcase['Clientcase']['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php
} else if ($selected == 2) {
    ?>
    <h3>Denied Enquiries</h3>
    <?php
    echo $this->Form->create('Clientcase', array('action' => 'report2'));
    echo $this->Form->hidden('date1', array('default' => $date1));
    echo $this->Form->hidden('date2', array('default' => $date2));
    echo $this->Form->end(__('Excel Report'));
    ?>
    <br>
    <table id="data">
        <thead>
            <tr>
                <th class="heading">Applicant Name</th>
                <th class="heading">Date Created</th>
                <th class="heading"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($deniedcases as $deniedcase): ?>
                <tr class="list">
                    <td valign="top">
                        <?php echo h($deniedcase['Applicant']['first_name'] . ' ' . $deniedcase['Applicant']['surname']); ?>
                    </td>
                    <td valign="top"><?php echo h($this->Time->format('h:i d-m-Y', $deniedcase['Clientcase']['created'])); ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View'), array('action' => 'denied', $deniedcase['Clientcase']['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php
} else if ($selected == 3) {
    ?>
    <h3>Contact notes sent</h3>
    <?php
    echo $this->Form->create('Casenote', array('controller' => 'casenotes', 'action' => 'report'));
    echo $this->Form->hidden('date1', array('default' => $date1));
    echo $this->Form->hidden('date2', array('default' => $date2));
    echo $this->Form->end(__('Excel Report'));
    ?>
    <table id="data">
        <thead>
            <tr>
                <th class="heading">Archive</th>
                <th class="heading">Author</th>
                <th class="heading">Client</th>
                <th class="heading">Subject</th>
                <th class="heading">Created</th>
                <th class="actions"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($casenotes as $casenote): ?>
                <tr>
                    <td valign="top">
                        <?php echo h($casenote['Archive']['archive_name']); ?>
                    </td>
                    <td valign="top">
                        <?php
                        if (!empty($casenote['Employee']['first_name'])) {
                            echo h($casenote['Employee']['first_name'] . ' ' . $casenote['Employee']['surname']);
                        } else {
                            echo h($casenote['Applicant']['first_name'] . ' ' . $casenote['Applicant']['surname']);
                        }
                        ?>
                    </td>
                    <td valign="top">
                        <?php echo h($casenote['Applicant']['first_name'] . ' ' . $casenote['Applicant']['surname']); ?>
                    </td>
                    <td valign="top">
                        <?php echo h($casenote['Casenote']['subject']); ?>
                    </td>
                    <td valign="top">
                        <?php echo h($this->Time->format('h:i d-m-Y', $casenote['Casenote']['created'])); ?>
                    </td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View'), array('controller' => 'clientcases', 'action' => 'view', $casenote['Casenote']['clientcase_id'], '#' => 'tab4')); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php
} else if ($selected == 4) {
    ?>
    <h3>Documents uploaded</h3>
    <?php
    echo $this->Form->create('Document', array('controller' => 'documents', 'action' => 'report'));
    echo $this->Form->hidden('date1', array('default' => $date1));
    echo $this->Form->hidden('date2', array('default' => $date2));
    echo $this->Form->end(__('Excel Report'));
    ?>
    <table id="data">
        <thead>
            <tr>
                <th class="heading">Archive</th>
                <th class="heading">Client</th>
                <th class="heading">Type</th>
                <th class="heading">Filename</th>
                <th class="heading">Uploaded</th>
                <th class="actions"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($documents as $document): ?>
                <tr class="list">
                    <td>
                        <?php echo h($document['Archive']['archive_name']); ?>
                    </td>
                    <td>
                        <?php echo h($document['Applicant']['first_name'] . ' ' . $document['Applicant']['surname']); ?>
                    </td>
                    <td valign="top">
                        <?php echo h($document['Documenttype']['type']); ?>
                    </td>
                    <td valign="top"><?php echo h($document['Document']['filename']); ?></td>
                    <td valign="top"><?php echo h($this->Time->format('h:i d-m-Y', $document['Document']['created'])); ?></td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View'), array('controller' => 'clientcases', 'action' => 'view', $document['Clientcase']['id'], '#' => 'tab5')); ?>
                        <?php
                        if ($document['Document']['copy_type'] == 'Digital') {
                            echo $this->Html->link(__('Download'), array('controller' => 'documents', 'action' => 'sendFile', $document['Document']['id']));
                        }
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php
} else if ($selected == 5) {
    ?>
    <h3>Document notes sent</h3>
    <?php
    echo $this->Form->create('Docnote', array('controller' => 'docnotes', 'action' => 'report'));
    echo $this->Form->hidden('date1', array('default' => $date1));
    echo $this->Form->hidden('date2', array('default' => $date2));
    echo $this->Form->end(__('Excel Report'));
    ?>
    <table id="data">
        <thead>
            <tr>
                <th class="heading">Archive</th>
                <th class="heading">Author</th>
                <th class="heading">Client</th>
                <th class="heading">Created</th>
                <th class="heading"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($docnotes as $docnote): ?>
                <tr>
                    <td valign="top">
                        <?php echo h($docnote['Archive']['archive_name']); ?>
                    </td>
                    <td valign="top">
                        <?php
                        if (!empty($docnote['Docnote']['employee_id'])) {
                            echo h($docnote['Employee']['first_name'] . ' ' . $docnote['Employee']['surname']);
                        } else {
                            echo h($docnote['Applicant']['first_name'] . ' ' . $docnote['Applicant']['surname']);
                        }
                        ?>
                    </td>
                    <td valign="top">
                        <?php echo h($docnote['Applicant']['first_name'] . ' ' . $docnote['Applicant']['surname']); ?>
                    </td>
                    <td valign="top">
                        <?php echo h($this->Time->format('h:i d-m-Y', $docnote['Docnote']['created'])); ?>
                    </td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View'), array('controller' => 'docnotes', 'action' => 'notes', $docnote['Docnote']['document_id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php
} else if ($selected == 6) {
    ?>
    <h3>Cases with status changes</h3>
    <?php
    echo $this->Form->create('Clientcase', array('action' => 'report3'));
    echo $this->Form->hidden('date1', array('default' => $date1));
    echo $this->Form->hidden('date2', array('default' => $date2));
    echo $this->Form->end(__('Excel Report'));
    ?>
    <br>
    <table id="data">
        <thead>
            <tr>
                <th class="heading">Archive</th>
                <th class="heading">Applicant Name</th>
                <th class="heading">Status</th>
                <th class="heading">Date Created</th>
                <th class="heading"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($changedcases as $changedcase): ?>
                <tr class="list">
                    <td valign="top">
                        <?php echo h($changedcase['Archive']['archive_name']); ?>
                    </td>
                    <td valign="top">
                        <?php echo h($changedcase['Applicant']['first_name'] . ' ' . $changedcase['Applicant']['surname']); ?>
                    </td>
                    <td valign="top">
                        <?php echo h($changedcase['Status']['status_type']); ?>
                    </td>
                    <td valign="top"><?php echo h($this->Time->format('h:i d-m-Y', $changedcase['Clientcase']['created'])); ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View'), array('action' => 'view', $changedcase['Clientcase']['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php
} else if ($selected == 7) {
    ?>
    <h3>No contact notes created</h3>
    <?php
    echo $this->Form->create('Clientcase', array('action' => 'report4'));
    echo $this->Form->hidden('date1', array('default' => $date1));
    echo $this->Form->hidden('date2', array('default' => $date2));
    echo $this->Form->end(__('Excel Report'));
    ?>
    <br>
    <table id="data">
        <thead>
            <tr>
                <th class="heading">Archive</th>
                <th class="heading">Applicant Name</th>
                <th class="heading">Date Created</th>
                <th class="heading"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($nocasenotes as $nocasenote): ?>
                <tr class="list">
                    <td valign="top">
                        <?php echo h($nocasenote['Archive']['archive_name']); ?>
                    </td>
                    <td valign="top">
                        <?php echo h($nocasenote['Applicant']['first_name'] . ' ' . $nocasenote['Applicant']['surname']); ?>
                    </td>
                    <td valign="top"><?php echo h($this->Time->format('h:i d-m-Y', $nocasenote['Clientcase']['created'])); ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View'), array('action' => 'view', $nocasenote['Clientcase']['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php
} else if ($selected == 8) {
    ?>
    <h3>Cases without status changes</h3>
    <?php
    echo $this->Form->create('Clientcase', array('action' => 'report5'));
    echo $this->Form->hidden('date1', array('default' => $date1));
    echo $this->Form->hidden('date2', array('default' => $date2));
    echo $this->Form->end(__('Excel Report'));
    ?>
    <br>
    <table id="data">
        <thead>
            <tr>
                <th class="heading">Archive</th>
                <th class="heading">Applicant Name</th>
                <th class="heading">Status</th>
                <th class="heading">Date Created</th>
                <th class="heading"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($nochangedcases as $nochangedcase): ?>
                <tr class="list">
                    <td valign="top">
                        <?php echo h($nochangedcase['Archive']['archive_name']); ?>
                    </td>
                    <td valign="top">
                        <?php echo h($nochangedcase['Applicant']['first_name'] . ' ' . $nochangedcase['Applicant']['surname']); ?>
                    </td>
                    <td valign="top">
                        <?php echo h($nochangedcase['Status']['status_type']); ?>
                    </td>
                    <td valign="top"><?php echo h($this->Time->format('h:i d-m-Y', $nochangedcase['Clientcase']['created'])); ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View'), array('action' => 'view', $nochangedcase['Clientcase']['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php
} else if ($selected == 9) {
    ?>
    <h3>Accepted Quotes</h3>
    <?php
    echo $this->form->create('Clientcase', array('action' => 'report6'));
    echo $this->form->hidden('date1', array('default' => $date1));
    echo $this->form->hidden('date2', array('default' => $date2));
    echo $this->form->end(__('Excel Report'));
    ?>
    <br>
    <table id='data'>
        <thead>
            <tr>
                <th class="heading">Applicant Name</th>
                <th class="heading">Description</th>
                <th class="heading">Date Created</th>
                <th class="heading">Total</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($quotes as $quote): ?>
                <tr class='list'>
                    <td valign="top"><?php echo $quote['Applicant'][0]['first_name'] . ' ' . $quote['Applicant'][0]['surname']; ?></td>
                    <td valign="top"><?php echo h($this->text->truncate($quote['Quote']['description'], 50, array('ellipsis' => '...'))); ?></td>
                    <td valign="top"><?php echo $quote['Quote']['date']; ?></td>
                    <td valign="top"><?php echo $quote['Quote']['total']; ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
<?php } else if ($selected == 10) {
    ?>
    <h3>Payment Plans Created</h3>
    <?php
    echo $this->form->create('Clientcase', array('action' => 'report7'));
    echo $this->form->hidden('date1', array('default' => $date1));
    echo $this->form->hidden('date2', array('default' => $date2));
    echo $this->form->end(__('Excel Report'));
    ?>
    <br>
    <table id='data'>
        <thead>
            <tr>
                <th class="heading">Applicant Name</th>
                <th class="heading">Grand Total</th>
                <th class="heading">GST</th>
                <th class="heading">Interest Rate</th>
                <th class="heading">Date Created</th>
                <th class="heading">Installment 1 Date</th>
                <th class="heading">Installment 2 Date</th>
                <th class="heading">Installment 3 Date</th>
                <th class="heading">Installment 4 Date</th>
                <th class="heading">Installment 5 Date</th>
                <th class="heading">Installment 6 Date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($plans as $plan): ?>
                <tr class='list'>
                    <td valign="top"><?php echo $plan['Quote']['Applicant'][0]['first_name'] . ' ' . $plan['Quote']['Applicant'][0]['surname']; ?></td>
                    <td valign="top"><?php echo $plan['PaymentPlan']['total']; ?></td>
                    <td valign="top"><?php echo $plan['Quote']['GST']; ?></td>
                    <td valign="top"><?php echo $plan['PaymentPlan']['interest_rate']; ?></td>
                    <td valign="top"><?php echo $plan['PaymentPlan']['date_created']; ?></td>
                    <td valign="top"><?php echo $plan['PaymentPlan']['installment_date1']; ?></td>
                    <td valign="top"><?php echo $plan['PaymentPlan']['installment_date2']; ?></td>
                    <td valign="top">
                        <?php
                        if ($plan['PaymentPlan']['installment_date3'] != null) {
                            echo $plan['PaymentPlan']['installment_date3'];
                        } else {
                            echo 'Empty';
                        }
                        ?>
                    </td>
                    <td valign="top">
                        <?php
                        if ($plan['PaymentPlan']['installment_date4'] != null) {
                            echo $plan['PaymentPlan']['installment_date4'];
                        } else {
                            echo 'Empty';
                        }
                        ?>
                    </td>
                    <td valign="top">
                        <?php
                        if ($plan['PaymentPlan']['installment_date5'] != null) {
                            echo $plan['PaymentPlan']['installment_date5'];
                        } else {
                            echo 'Empty';
                        }
                        ?>
                    </td>
                    <td valign="top">
                        <?php
                        if ($plan['PaymentPlan']['installment_date6'] != null) {
                            echo $plan['PaymentPlan']['installment_date6'];
                        } else {
                            echo 'Empty';
                        }
                        ?>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
<?php } elseif ($selected == 11) { ?>
    <h3>Installments Due</h3>
    <?php
    echo $this->form->create('Clientcase', array('action' => 'report8'));
    echo $this->form->hidden('date1', array('default' => $date1));
    echo $this->form->hidden('date2', array('default' => $date2));
    echo $this->form->end(__('Excel Report'));
    ?>
    <br>
    <table id='data'>
        <thead>
            <tr>
                <th class="heading">Applicant Name</th>
                <th class="heading">Payment Date</th>
                <th class="heading">Amount Due</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($installment1 as $i1): ?>
                <tr class='list'>
                    <td valign="top"><?php echo $i1['Quote']['Applicant'][0]['first_name'] . ' ' . $i1['Quote']['Applicant'][0]['surname']; ?></td>
                    <td valign="top"><?php echo $i1['PaymentPlan']['installment_date1']; ?></td>
                    <td valign="top"><?php echo $i1['PaymentPlan']['installment_price1']; ?></td>
                </tr>
            <?php endforeach ?>
            <?php foreach ($installment2 as $i2): ?>
                <tr class='list'>
                    <td valign="top"><?php echo $i2['Quote']['Applicant'][0]['first_name'] . ' ' . $i2['Quote']['Applicant'][0]['surname']; ?></td>
                    <td valign="top"><?php echo $i2['PaymentPlan']['installment_date1']; ?></td>
                    <td valign="top"><?php echo $i2['PaymentPlan']['installment_price1']; ?></td>
                </tr>
            <?php endforeach ?>
            <?php foreach ($installment3 as $i3): ?>
                <tr class='list'>
                    <td valign="top"><?php echo $i3['Quote']['Applicant'][0]['first_name'] . ' ' . $i3['Quote']['Applicant'][0]['surname']; ?></td>
                    <td valign="top"><?php echo $i3['PaymentPlan']['installment_date1']; ?></td>
                    <td valign="top"><?php echo $i3['PaymentPlan']['installment_price1']; ?></td>
                </tr>
            <?php endforeach ?>
            <?php foreach ($installment4 as $i4): ?>
                <tr class='list'>
                    <td valign="top"><?php echo $i4['Quote']['Applicant'][0]['first_name'] . ' ' . $i4['Quote']['Applicant'][0]['surname']; ?></td>
                    <td valign="top"><?php echo $i4['PaymentPlan']['installment_date1']; ?></td>
                    <td valign="top"><?php echo $i4['PaymentPlan']['installment_price1']; ?></td>
                </tr>
            <?php endforeach ?>
            <?php foreach ($installment5 as $i5): ?>
                <tr class='list'>
                    <td valign="top"><?php echo $i5['Quote']['Applicant'][0]['first_name'] . ' ' . $i5['Quote']['Applicant'][0]['surname']; ?></td>
                    <td valign="top"><?php echo $i5['PaymentPlan']['installment_date1']; ?></td>
                    <td valign="top"><?php echo $i5['PaymentPlan']['installment_price1']; ?></td>
                </tr>
            <?php endforeach ?>
            <?php foreach ($installment6 as $i6): ?>
                <tr class='list'>
                    <td valign="top"><?php echo $i6['Quote']['Applicant'][0]['first_name'] . ' ' . $i6['Quote']['Applicant'][0]['surname']; ?></td>
                    <td valign="top"><?php echo $i6['PaymentPlan']['installment_date1']; ?></td>
                    <td valign="top"><?php echo $i6['PaymentPlan']['installment_price1']; ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
<?php } ?>