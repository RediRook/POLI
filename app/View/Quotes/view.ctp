<?php echo $this->Html->css('jquery-ui'); ?>
<?php echo $this->Html->script('jquery.min'); ?>
<?php echo $this->Html->script('jquery-ui.min'); ?>
<script>
    $(document).ready(function() {
        $("#validUntil").datepicker(
                {changeMonth: true,
                    changeYear: true,
                    yearRange: "-0:+10",
                    showAnim: 'slideDown',
                    dateFormat: "dd/mm/yy"});
    });
</script>

<?php
$this->Html->addCrumb('Case List', '/clientcases');
$this->Html->addCrumb('View Case', '/clientcases/view/' . $applicants[0]['clientcase_id'] . '#tab6');
$this->Html->addCrumb('View Quote', '/quotes/view/' . $id);
?>
<div class="quotes-view">
    <h3><?php echo ('Quote'); ?></h3>
    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-target="#QuoteInformation" href="#QuoteInformation">
                        Quotes Information
                    </a></h4>
            </div>
            <div id="QuoteInformation" class="panel-collapse collapse in">
                <div class="panel-body">
                    <table>
                        <tbody>
                            <tr>
                                <td style="width: 200px"><h4><?php echo __('Applicants Quoted'); ?></h4></td> <td><?php
                                    foreach ($applicants as $applicant) {
                                        echo $applicant['first_name'] . " " . $applicant['surname'];
                                        ?><br>
                                                <?php
                                            }
                                            ?></td>
                            </tr>
                            <tr>
                                <td style="width: 200px"><h4><?php echo __('Date Created'); ?></h4></td> <td><?php echo h($quote['Quote']['date']); ?></td>
                            </tr>
                            <tr>
                                <td style="width: 200px"><h4><?php echo __('Description'); ?></h4></td> <td><div class="wrap"><?php echo $quote['Quote']['description']; ?></div></td>
                            </tr>
                            <tr>
                                <td style="width: 200px"><h4><?php echo __('Quote '); ?></h4></td> <td><?php
                                    if ($quote['Quote']['quote_accepted'] == true) {
                                        echo "<b>Accepted</b>";
                                    } else {
                                        echo "Not accepted";
                                    }
                                    ?> </td>
                            </tr>  
                            <tr>
                                <td style="width: 200px"><h4><?php echo __('Research Accepted'); ?></h4></td> <td><?php
                                    if ($quote['Quote']['research_accepted'] == true) {
                                        echo "<b>Accepted</b>";
                                    } else {
                                        echo "Not accepted";
                                    }
                                    ?></td>
                            </tr>
                            <tr>
                                <td style="width: 200px"><h4><?php echo __('Cc Accepted'); ?></h4></td> <td><?php
                                    if ($quote['Quote']['cc_accepted'] == true) {
                                        echo "<b>Accepted</b>";
                                    } else {
                                        echo "Not accepted";
                                    }
                                    ?></td>
                            </tr>
                            <tr>
                                <td style="width: 200px"><h4><?php echo __('GST (10%)'); ?></h4></td> <td><?php echo h('$ ' . $quote['Quote']['GST']); ?></td>
                            </tr>
                            <tr>
                                <td style="width: 200px"><h4><?php echo __('Total (Without GST)'); ?></h4></td> <td><?php echo h('$ ' . $quote['Quote']['total']); ?></td>
                            </tr>
                            <tr>
                                <td style="width: 200px"><h3><?php echo __('Total'); ?></h3></td>
                                <td>
                                    <?php
                                    $grandTotal = $quote['Quote']['total'] + $quote['Quote']['GST'];
                                    echo h('$ ' . $grandTotal);
                                    ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-target="#Research" href="#Research">
                        Research
                    </a></h4>
            </div>

            <div id="Research" class="panel-collapse collapse">
                <div class="panel-body">
                    <table>
                        <tbody>
                            <tr>
                                <td style="width: 270px"><h4><?php echo __('Prep Of Loa Quantity'); ?></h4></td> <td><?php echo $quote['QuoteResearch']['prep_of_loa_quantity']; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 270px"><h4><?php echo __('Prep Of Loa Total'); ?></h4></td> <td><?php echo '$ ' . $quote['QuoteResearch']['prep_of_loa_total']; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 270px"><h4><?php echo __('NAA Quantity'); ?></h4></td> <td><?php echo $quote['QuoteResearch']['NAA_quantity']; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 270px"><h4><?php echo __('NAA Total'); ?></h4></td> <td><?php echo '$ ' . $quote['QuoteResearch']['NAA_total']; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 270px"><h4><?php echo __('ITS Quantity'); ?></h4></td> <td><?php echo $quote['QuoteResearch']['ITS_quantity']; ?></td>
                            </tr>  
                            <tr>
                                <td style="width: 270px"><h4><?php echo __('ITS Total'); ?></h4></td> <td><?php echo '$ ' . $quote['QuoteResearch']['ITS_total']; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 270px"><h4><?php echo __('IPN Quantity'); ?></h4></td> <td><?php echo $quote['QuoteResearch']['IPN_quantity']; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 270px"><h4><?php echo __('IPN Total'); ?></h4></td> <td><?php echo '$ ' . $quote['QuoteResearch']['IPN_total']; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 270px"><h4><?php echo __('POL GER Registy Research Quantity'); ?></h4></td> <td><?php echo $quote['QuoteResearch']['POL_GER_registy_research_quantity']; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 270px"><h4><?php echo __('POL GER Registy Research Total'); ?></h4></td> <td><?php echo '$ ' . $quote['QuoteResearch']['POL_GER_registy_research_total']; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 270px"><h4><?php echo __('Obtaining Docs POL GER Quantity'); ?></h4></td> <td><?php echo $quote['QuoteResearch']['obtaining_docs_POL_GER_quantity']; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 270px"><h4><?php echo __('Obtaining Docs POL GER Total'); ?></h4></td> <td><?php echo '$ ' . $quote['QuoteResearch']['obtaining_docs_POL_GER_total']; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 270px"><h4><?php echo __('Administrative Fees Quantity'); ?></h4></td> <td><?php echo $quote['QuoteResearch']['administrative_fees_quantity']; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 270px"><h4><?php echo __('Administrative Fees Total'); ?></h4></td> <td><?php echo '$ ' . $quote['QuoteResearch']['administrative_fees_total']; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 270px"><h4><?php echo __('Initial Meeting Quantity'); ?></h4></td> <td><?php echo $quote['QuoteResearch']['initial_meeting_quantity']; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 270px"><h4><?php echo __('Initial Meeting Total'); ?></h4></td> <td><?php echo '$ ' . $quote['QuoteResearch']['initial_meeting_total']; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 270px"><h3><?php echo __('Research Total'); ?></h3></td> <td><?php echo '$ ' . $quote['QuoteResearch']['research_total']; ?></td>
                            </tr>                
                        </tbody>
                    </table>                
                </div>   
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-target="#CcAndReg" href="#CcAndReg">
                        Confirmation of Citizenship and Registration
                    </a></h4>
            </div>

            <div id="CcAndReg" class="panel-collapse collapse">
                <div class="panel-body">
                    <table>
                        <tbody>
                            <tr>
                                <td style="width: 270px"><h4><?php echo __('Apostille Quantity'); ?></h4></td> <td><?php echo $quote['CcAndRegistration']['apostille_quantity']; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 270px"><h4><?php echo __('Apostille Total'); ?></h4></td> <td><?php echo '$ ' . $quote['CcAndRegistration']['apostille_total']; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 270px"><h4><?php echo __('Trans German English Quantity'); ?></h4></td> <td><?php echo $quote['CcAndRegistration']['trans_german_english_quantity']; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 270px"><h4><?php echo __('Trans German English Total'); ?></h4></td> <td><?php echo '$ ' . $quote['CcAndRegistration']['trans_german_english_total']; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 270px"><h4><?php echo __('Trans Other Languages Quantity'); ?></h4></td> <td><?php echo $quote['CcAndRegistration']['trans_other_languages_quantity']; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 270px"><h4><?php echo __('Trans Other Languages Total'); ?></h4></td> <td><?php echo '$ ' . $quote['CcAndRegistration']['trans_other_languages_total']; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 270px"><h4><?php echo __('Polish Notary Quantity'); ?></h4></td> <td><?php echo $quote['CcAndRegistration']['polish_notary_quantity']; ?></td>
                            </tr>  
                            <tr>
                                <td style="width: 270px"><h4><?php echo __('Polish Notary Total'); ?></h4></td> <td><?php echo '$ ' . $quote['CcAndRegistration']['polish_notary_total']; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 270px"><h4><?php echo __('Application Attachments Quantity'); ?></h4></td> <td><?php echo $quote['CcAndRegistration']['application_attachments_quantity']; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 270px"><h4><?php echo __('Application Attachments Total'); ?></h4></td> <td><?php echo '$ ' . $quote['CcAndRegistration']['application_attachments_total']; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 270px"><h4><?php echo __('Marriage Cert Reg Quantity'); ?></h4></td> <td><?php echo $quote['CcAndRegistration']['marriage_cert_reg_quantity']; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 270px"><h4><?php echo __('Marriage Cert Reg Total'); ?></h4></td> <td><?php echo '$ ' . $quote['CcAndRegistration']['marriage_cert_reg_total']; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 270px"><h4><?php echo __('Birth Cert Reg Quantity'); ?></h4></td> <td><?php echo $quote['CcAndRegistration']['birth_cert_reg_quantity']; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 270px"><h4><?php echo __('Birth Cert Reg Total'); ?></h4></td> <td><?php echo '$ ' . $quote['CcAndRegistration']['birth_cert_reg_total']; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 270px"><h4><?php echo __('Case Manager Fee Quantity'); ?></h4></td> <td><?php echo $quote['CcAndRegistration']['case_manager_fee_quantity']; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 270px"><h4><?php echo __('Case Manager Fee Total'); ?></h4></td> <td><?php echo '$ ' . $quote['CcAndRegistration']['case_manager_fee_total']; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 270px"><h4><?php echo __('Postage Quantity'); ?></h4></td> <td><?php echo $quote['CcAndRegistration']['postage_quantity']; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 270px"><h4><?php echo __('Postage Total'); ?></h4></td> <td><?php echo '$ ' . $quote['CcAndRegistration']['postage_total']; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 270px"><h3><?php echo __('Cc And Registration Total'); ?></h3></td> <td><?php echo '$ ' . $quote['CcAndRegistration']['cc_and_registration_total']; ?></td>
                            </tr>                
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-target="#PESEL" href="#PESEL">
                        PESEL and Appointments
                    </a></h4>
            </div>

            <div id="PESEL" class="panel-collapse collapse">
                <div class="panel-body">
                    <table>
                        <tbody>
                            <tr>
                                <td style="width: 270px"><h4><?php echo __('Preparing Pesel App Quantity'); ?></h4></td> <td><?php echo $quote['PeselAndAppointment']['preparing_pesel_app_quantity']; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 270px"><h4><?php echo __('Preparing Pesel App Total'); ?></h4></td> <td><?php echo '$ ' . $quote['PeselAndAppointment']['preparing_pesel_app_total']; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 270px"><h4><?php echo __('Appointment Consul Standard Quantity'); ?></h4></td> <td><?php echo $quote['PeselAndAppointment']['appointment_consul_standard_quantity']; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 270px"><h4><?php echo __('Appointment Consul Standard Total'); ?></h4></td> <td><?php echo '$ ' . $quote['PeselAndAppointment']['appointment_consul_standard_total']; ?></td>
                            </tr>                   
                            <tr>
                                <td style="width: 270px"><h4><?php echo __('Appointment Consul Nonstandard Quantity'); ?></h4></td> <td><?php echo $quote['PeselAndAppointment']['appointment_consul_nonstandard_quantity']; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 270px"><h4><?php echo __('Appointment Consul Nonstandard Total'); ?></h4></td> <td><?php echo '$ ' . $quote['PeselAndAppointment']['appointment_consul_nonstandard_total']; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 270px"><h4><?php echo __('Pesel App Apointment Out Aus Quantity'); ?></h4></td> <td><?php echo $quote['PeselAndAppointment']['pesel_app_apointment_out_aus_quantity']; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 270px"><h4><?php echo __('Pesel App Apointment Out Aus Total'); ?></h4></td> <td><?php echo '$ ' . $quote['PeselAndAppointment']['pesel_app_apointment_out_aus_total']; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 270px"><h3><?php echo __('Pesel And Appointments Total'); ?></h3></td> <td><?php echo '$ ' . $quote['PeselAndAppointment']['pesel_and_appointments_total']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>     
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-target="#OtherFees" href="#OtherFees">
                        Other Fees
                    </a></h4>
            </div>

            <div id="OtherFees" class="panel-collapse collapse">
                <div class="panel-body">
                    <table>
                        <tbody>
                            <tr>
                                <td style="width: 270px"><h4><?php echo __('Children Quantity'); ?></h4></td> <td><?php echo $quote['SetFee']['children_quantity']; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 270px"><h4><?php echo __('Children Total'); ?></h4></td> <td><?php echo '$ ' . $quote['SetFee']['children_total']; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 270px"><h4><?php echo __('Relatives Quantity'); ?></h4></td> <td><?php echo $quote['SetFee']['relatives_quantity']; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 270px"><h4><?php echo __('Relatives Total'); ?></h4></td> <td><?php echo '$ ' . $quote['SetFee']['relatives_total']; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 270px"><h4><?php echo __('Reg Birth Marriage Quantity'); ?></h4></td> <td><?php echo $quote['SetFee']['reg_birth_marriage_quantity']; ?></td>
                            </tr>  
                            <tr>
                                <td style="width: 270px"><h4><?php echo __('Reg Birth Marriage Total'); ?></h4></td> <td><?php echo '$ ' . $quote['SetFee']['reg_birth_marriage_total']; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 270px"><h4><?php echo __('Reg Birth Marriage Together Quantity'); ?></h4></td> <td><?php echo $quote['SetFee']['reg_birth_marriage_together_quantity']; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 270px"><h4><?php echo __('Reg Birth Marriage Together Total'); ?></h4></td> <td><?php echo '$ ' . $quote['SetFee']['reg_birth_marriage_together_total']; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 270px"><h4><?php echo __('Standard Fee Quantity'); ?></h4></td> <td><?php echo $quote['SetFee']['standard_fee_quantity']; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 270px"><h4><?php echo __('Standard Fee Total'); ?></h4></td> <td><?php echo '$ ' . $quote['SetFee']['standard_fee_total']; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 270px"><h3><?php echo __('Set Fees Total'); ?></h3></td> <td><?php echo '$ ' . $quote['SetFee']['set_fees_total']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo $this->form->create('empty'); ?>
<div class="submit">
    <?php echo $this->Form->submit(__('Cancel', true), array('name' => 'QuoteButton', 'div' => false)); ?>
    <font color="white"></font>
    <?php /*echo $this->Form->Submit(__('View Quote pdf', true), array('name' => 'QuoteButton', 'div' => false));*/ ?>
    <a class="btn" data-toggle="modal" href="#quoteValid">Create Quote pdf</a>

    <?php
    if ($planCount == 0) {
        echo $this->Form->Submit(__('Make Payment Plan', true), array('name' => 'QuoteButton', 'div' => false));
    }
    ?>


    <?php
    if ($planCount > 0) {
        echo $this->Form->Submit(__('View Payment Plan', true), array('name' => 'QuoteButton', 'div' => false));
    }
    ?>       

    <font color="white"></font>
    <?php
    if ($oldPlanCount > 0) {
        echo $this->Form->submit(__('Old Payment Plans', true), array('name' => 'QuoteButton', 'div' => false));
    }
    ?>
</div>

<div class="modal hide" id="quoteValid">
    <div class="modalheader">
        <button class="close" data-dismiss="modal">X</button>
        <h2>Choose a date for the quote to expire</h2>
        <?php echo $this->form->input('validUntil', array('id' => 'validUntil', 'type' => 'text', 'label' => 'Valid for 2 weeks unless specified otherwise')); ?>
        <?php echo $this->Form->Submit(__('Create Quote pdf', true), array('name' => 'QuoteButton', 'div' => false)); ?>
    </div>
</div>