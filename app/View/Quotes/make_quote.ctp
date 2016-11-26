<?php
$this->Html->addCrumb('Case List', '/clientcases');
$this->Html->addCrumb('View Case', '/clientcases/view/' . $case . '#tab5');
?>
<h3>Applicants being quoted</h3>
<?php
foreach ($applicants as $applicant) {
    echo $applicant['Applicant']['first_name'] . " " . $applicant['Applicant']['surname'];
    ?>

    <br>
    <?php
}
?>
<?php echo $this->Form->create('Quote', array('novalidate' => true)); ?>

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

    function this_total(for_what)
    {
        var this_row = for_what.parentElement.parentElement;
        var qty = this_row.getElementsByTagName("td")[1].getElementsByTagName("input")[0].value;
        var up = this_row.getElementsByTagName("td")[3].getElementsByTagName("input")[0].value;
        var total = qty * up;
        this_row.getElementsByTagName("td")[4].getElementsByTagName("input")[0].value = total;
        return;
    }
</script>

<div class="clientcases view">
    <script>
        $(function() {
            var hash = window.location.hash;
            hash && $('ul.nav a[href="' + hash + '"]').tab('show');

            $('.nav-tabs a').click(function(e) {
                $(this).tab('show');
                var scrollmem = $('body').scrollTop();
                window.location.hash = this.hash;
                $('html,body').scrollTop(scrollmem);
            });
        });
    </script>

    <div id="clientcases">
        <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
            <li class="active"><a href="#tab1" data-toggle="tab">Quote Info</a></li>
            <li><a href="#tab2" data-toggle="tab">Research</a></li>
            <li><a href="#tab3" data-toggle="tab">CC and Registration</a></li>
            <li><a href="#tab4" data-toggle="tab">PESEL and appointment</a></li>
            <li><a href="#tab5" data-toggle="tab">Other Fees</a></li>

        </ul>
        <div id="my-tab-content" class="tab-content">
            <div class="tab-pane active" id="tab1">
                <p>
                <h3>Quote Information</h3>
                <p>
                <fieldset>
                    <div class="modal hide"><?php echo $this->Form->input('date', array('type' => 'date', 'dateFormat' => 'DMY')); ?></div>
                    <?php
                    echo $this->Form->input('description', array('type' => 'textarea', 'style' => 'width: 800px'));
                    ?>

                    <div  class="modal hide">
                        <?php
                        echo $this->Form->input('quote_accepted', array('type' => 'checkbox'));
                        echo $this->Form->input('research_accepted', array('type' => 'checkbox'));
                        echo $this->Form->input('cc_accepted', array('type' => 'checkbox'));
                        echo $this->Form->input('pesel_accepted', array('type' => 'checkbox'));
                        echo $this->Form->input('setfees_accepted', array('type' => 'checkbox'));
                        ?>
                    </div>
                    
                    <?php echo $this->Form->input('includeGST', array('type' => 'checkbox', 'label' => 'Include GST?')) ?>
                    <?php echo $this->Form->input('total', array('id' => 'qtotal', 'value' => '0')); ?>
                    <br>
                    <?php foreach ($applicants as $applicant) { ?>
                        <div class="modal hide"><?php echo $this->Form->input('Applicant.id', array('value' => $applicant['Applicant']['id'], 'type' => 'text')); ?></div>

                        <?php
                    }
                    ?>
                </fieldset>
            </div>

            <div class="tab-pane" id="tab2">
                <h3><?php echo __('Research'); ?></h3>

                <table cellpadding="0" cellspacing="0">
                    <tbody>
                        <tr>
                            <th>Item</th>
                            <th>Quantity<font color="red">*</font></th>
                            <th>Internal Price</th>
                            <th>Client Price<font color="red">*</font></th>
                            <th>Total</th>
                        </tr>
                        <tr>
                            <td><h5>Preparation of LOA</h5></td>
                            <td><input class="num" name="data[QuoteResearch][prep_of_loa_quantity]" onChange="this_total(this)" value ="0" ></td>
                            <td><?php echo $internal[0]['Internalprice']['amount'] ?></td>
                            <td><input class="num" name="data[QuoteResearch][prep_of_loa_price]" onChange="this_total(this)" value ="<?php echo $client[0]['Clientprice']['amount'] ?>" ></td>           
                            <td> <input class="txt" type="text" readonly="true" name="data[QuoteResearch][prep_of_loa_total]"
                                        value="0" > </td>     
                        </tr>

                        <tr>
                            <td><h5>NAA/document</h5></td>
                            <td> <input class="num" name="data[QuoteResearch][NAA_quantity]" onChange="this_total(this)" value ="0" ></td>
                            <td><?php echo $internal[25]['Internalprice']['amount'] ?></td>
                            <td> <input class="num" name="data[QuoteResearch][NAA_price]" onChange="this_total(this)" value ="<?php echo $client[25]['Clientprice']['amount'] ?>"" ></td>
                            <td> <input class="txt" type="text" readonly="true" name="data[QuoteResearch][NAA_total]"
                                        value="0" > </td>   

                        </tr>

                        <tr>
                            <td><h5>ITS</h5></td>
                            <td> <input class="num" name="data[QuoteResearch][ITS_quantity]" onChange="this_total(this)" value ="0" ></td>
                            <td><?php echo $internal[1]['Internalprice']['amount'] ?></td>
                            <td> <input class="num" name="data[QuoteResearch][ITS_price]" onChange="this_total(this)" value ="<?php echo $client[1]['Clientprice']['amount'] ?>"" ></td>
                            <td> <input class="txt" type="text" readonly="true" name="data[QuoteResearch][ITS_total]"
                                        value="0" > </td>   
                        </tr>

                        <tr>
                            <td><h5>IPN</h5></td>
                            <td> <input class="num" name="data[QuoteResearch][IPN_quantity]" onChange="this_total(this)" value ="0" ></td>
                            <td><?php echo $internal[2]['Internalprice']['amount'] ?></td>
                            <td> <input class="num" name="data[QuoteResearch][IPN_price]" onChange="this_total(this)" value ="<?php echo $client[2]['Clientprice']['amount'] ?>"" ></td>
                            <td> <input class="txt" type="text" readonly="true" name="data[QuoteResearch][IPN_total]"
                                        value="0" > </td>   
                        </tr>

                        <tr>
                            <td> <h5>Poland and Germany archives and Registry Offices Research</h5></td>
                            <td> <input class="num" name="data[QuoteResearch][POL_GER_registy_research_quantity]" onChange="this_total(this)" value ="0" ></td>
                            <td><?php echo $internal[3]['Internalprice']['amount'] ?></td>
                            <td> <input class="num" name="data[QuoteResearch][POL_GER_registy_research_price]" onChange="this_total(this)" value ="<?php echo $client[3]['Clientprice']['amount'] ?>"" ></td>
                            <td> <input class="txt" type="text" readonly="true" name="data[QuoteResearch][POL_GER_registy_research_total]"
                                        value="0" > </td>  
                        </tr>

                        <tr>
                            <td> <h5>Obtaining documents from Poland/Germany</h5></td>
                            <td> <input class="num" name="data[QuoteResearch][obtaining_docs_POL_GER_quantity]" onChange="this_total(this)" value ="0" ></td>
                            <td><?php echo $internal[4]['Internalprice']['amount'] ?></td>
                            <td> <input class="num" name="data[QuoteResearch][obtaining_docs_POL_GER_price]" onChange="this_total(this)" value ="<?php echo $client[4]['Clientprice']['amount'] ?>"" ></td>
                            <td> <input class="txt" type="text" readonly="true" name="data[QuoteResearch][obtaining_docs_POL_GER_total]"
                                        value="0" > </td>
                        </tr>

                        <tr>
                            <td> <h5>Polaron Administrative Fees</h5></td>
                            <td> <input class="num" name="data[QuoteResearch][administrative_fees_quantity]" onChange="this_total(this)" value ="0" ></td>
                            <td><?php echo $internal[5]['Internalprice']['amount'] ?></td>
                            <td> <input class="num" name="data[QuoteResearch][administrative_fees_price]" onChange="this_total(this)" value ="<?php echo $client[5]['Clientprice']['amount'] ?>"" ></td>
                            <td> <input class="txt" type="text" readonly="true" name="data[QuoteResearch][administrative_fees_total]"
                                        value="0" > </td>
                        </tr>

                        <tr>
                            <td> <h5>Initial Meeting</h5></td>
                            <td> <input class="num" name="data[QuoteResearch][initial_meeting_quantity]" onChange="this_total(this)" value ="0" ></td>
                            <td><?php echo $internal[6]['Internalprice']['amount'] ?></td>
                            <td> <input class="num" name="data[QuoteResearch][initial_meeting_price]" onChange="this_total(this)" value ="<?php echo $client[6]['Clientprice']['amount'] ?>"" ></td>
                            <td> <input class="txt" type="text" readonly="true" name="data[QuoteResearch][initial_meeting_total]"
                                        value="0" > </td>
                        </tr>
                        <tr>

                            <td><h3>Research total</h3></td>
                            <td></td>
                            <td align="center"> </td>
                            <td></td>
                            <td align="center"><?php echo $this->Form->input('QuoteResearch.research_total', array('id' => 'rtotal', 'label' => '', 'class' => 'sum')); ?></td>

                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane" id="tab3">
                <p>
                <h3><?php echo __('Confirmation of Citizenship and Registration'); ?></h3>
                <table cellpadding="0" cellspacing="0">
                    <tbody>
                        <tr>
                            <th>Item</th>
                            <th>Quantity<font color="red">*</font></th>
                            <th>Internal Price</th>
                            <th>Client Price<font color="red">*</font></th>
                            <th>Total</th>
                        </tr>
                        <tr>
                            <td><h5>Apostille</h5></td>
                            <td> <input class="num" name="data[CcAndRegistration][apostille_quantity]" onChange="this_total(this)" value ="0" ></td>
                            <td><?php echo $internal[7]['Internalprice']['amount'] ?></td>
                            <td> <input class="num" name="data[CcAndRegistration][apostille_price]" onChange="this_total(this)" value ="<?php echo $client[7]['Clientprice']['amount'] ?>"" > </td>
                            <td> <input class="txt1" type="text" readonly="true" name="data[CcAndRegistration][apostille_total]"
                                        value="0" ></td>
                        </tr>
                        <tr>
                            <td><h5>Translation (German and English)</h5></td>
                            <td> <input class="num" name="data[CcAndRegistration][trans_german_english_quantity]" onChange="this_total(this)" value ="0" > </td>
                            <td><?php echo $internal[8]['Internalprice']['amount'] ?></td>
                            <td> <input class="num" name="data[CcAndRegistration][trans_german_english_price]" onChange="this_total(this)" value ="<?php echo $client[8]['Clientprice']['amount'] ?>"" > </td>
                            <td> <input class="txt1" type="text" readonly="true" name="data[CcAndRegistration][trans_german_english_total]"
                                        value="0" ></td>
                        </tr>
                        <tr>
                            <td><h5>Translation other Languages</h5></td>
                            <td> <input class="num" name="data[CcAndRegistration][trans_other_languages_quantity]" onChange="this_total(this)" value ="0" > </td>
                            <td><?php echo $internal[9]['Internalprice']['amount'] ?></td>
                            <td> <input class="num" name="data[CcAndRegistration][trans_other_languages_price]" onChange="this_total(this)" value ="<?php echo $client[9]['Clientprice']['amount'] ?>"" > </td>
                            <td> <input class="txt1" type="text" readonly="true" name="data[CcAndRegistration][trans_other_languages_total]"
                                        value="0" ></td>
                        </tr>
                        <tr>
                            <td><h5>Polish Notary Copies</h5></td>
                            <td> <input class="num" name="data[CcAndRegistration][polish_notary_quantity]" onChange="this_total(this)" value ="0" > </td>
                            <td><?php echo $internal[10]['Internalprice']['amount'] ?></td>
                            <td> <input class="num" name="data[CcAndRegistration][polish_notary_price]" onChange="this_total(this)" value ="<?php echo $client[10]['Clientprice']['amount'] ?>"" > </td>
                            <td> <input class="txt1" type="text" readonly="true" name="data[CcAndRegistration][polish_notary_total]"
                                        value="0" ></td>
                        </tr>
                        <tr>
                            <td><h5>Application and Attachments</h5></td>
                            <td> <input class="num" name="data[CcAndRegistration][application_attachments_quantity]" onChange="this_total(this)" value ="0" > </td>
                            <td><?php echo $internal[11]['Internalprice']['amount'] ?></td>
                            <td> <input class="num" name="data[CcAndRegistration][application_attachments_price]" onChange="this_total(this)" value ="<?php echo $client[11]['Clientprice']['amount'] ?>"" > </td>
                            <td> <input class="txt1" type="text" readonly="true" name="data[CcAndRegistration][application_attachments_total]"
                                        value="0" ></td>
                        </tr>
                        <tr>
                            <td><h5>Marriage Certificate Registration Fee</h5></td>
                            <td> <input class="num" name="data[CcAndRegistration][marriage_cert_reg_quantity]" onChange="this_total(this)" value ="0" > </td>
                            <td><?php echo $internal[12]['Internalprice']['amount'] ?></td>
                            <td> <input class="num" name="data[CcAndRegistration][marriage_cert_reg_price]" onChange="this_total(this)" value ="<?php echo $client[12]['Clientprice']['amount'] ?>"" > </td>
                            <td> <input class="txt1" type="text" readonly="true" name="data[CcAndRegistration][marriage_cert_reg_total]"
                                        value="0" ></td>
                        </tr>
                        <tr>
                            <td><h5>Birth Certificate Registration Fee</h5></td>
                            <td> <input class="num" name="data[CcAndRegistration][birth_cert_reg_quantity]" onChange="this_total(this)" value ="0" > </td>
                            <td><?php echo $internal[13]['Internalprice']['amount'] ?></td>
                            <td> <input class="num" name="data[CcAndRegistration][birth_cert_reg_price]" onChange="this_total(this)" value ="<?php echo $client[13]['Clientprice']['amount'] ?>"" > </td>
                            <td> <input class="txt1" type="text" readonly="true" name="data[CcAndRegistration][birth_cert_reg_total]"
                                        value="0" ></td>
                        </tr>
                        <tr>
                            <td><h5>Case Manager Fees</h5></td>
                            <td> <input class="num" name="data[CcAndRegistration][case_manager_fee_quantity]" onChange="this_total(this)" value ="0" > </td>
                            <td><?php echo $internal[14]['Internalprice']['amount'] ?></td>
                            <td> <input class="num" name="data[CcAndRegistration][case_manager_fee_price]" onChange="this_total(this)" value ="<?php echo $client[14]['Clientprice']['amount'] ?>"" > </td>
                            <td> <input class="txt1" type="text" readonly="true" name="data[CcAndRegistration][case_manager_fee_total]"
                                        value="0" ></td>
                        </tr>
                        <tr>
                            <td><h5>Postage</h5></td>
                            <td> <input class="num" name="data[CcAndRegistration][postage_quantity]" onChange="this_total(this)" value ="0" > </td>
                            <td><?php echo $internal[15]['Internalprice']['amount'] ?></td>
                            <td> <input class="num" name="data[CcAndRegistration][postage_price]" onChange="this_total(this)" value ="<?php echo $client[15]['Clientprice']['amount'] ?>"" > </td>
                            <td> <input class="txt1" type="text" readonly="true" name="data[CcAndRegistration][postage_total]"
                                        value="0" ></td>
                        </tr>
                        <tr>

                            <td> CC Fees total</td>
                            <td></td>
                            <td align="center"> </td>
                            <td></td>
                            <td align="center"><?php echo $this->Form->input('CcAndRegistration.cc_and_registration_total', array('id' => 'ctotal', 'label' => '', 'class' => 'sum')); ?></td>

                        </tr>
                    </tbody>
                </table>
            </div>


            <div class="tab-pane" id="tab4">

                <h3><?php echo __('Pesel and Appointments'); ?></h3>
                <table cellpadding="0" cellspacing="0">
                    <tbody>
                        <tr>
                            <th>Item</th>
                            <th>Quantity<font color="red">*</font></th>
                            <th>Internal Price</th>
                            <th>Client Price<font color="red">*</font></th>
                            <th>Total</th>
                        </tr>
                        <tr>
                            <td><h5>Preparing PESEL Application</h5></td>
                            <td> <input class="num" name="data[PeselAndAppointment][preparing_pesel_app_quantity]" onChange="this_total(this)" value ="0" > </td>
                            <td><?php echo $internal[16]['Internalprice']['amount'] ?></td>
                            <td> <input class="num" name="data[PeselAndAppointment][preparing_pesel_app_price]" onChange="this_total(this)" value ="<?php echo $client[16]['Clientprice']['amount'] ?>"" > </td>
                            <td> <input class="txt2" type="text" readonly="true" name="data[PeselAndAppointment][preparing_pesel_app_total]"
                                        value="0" ></td>
                        </tr>
                        <tr>
                            <td><h5>Appointment with Consulate (Standard)</h5></td>
                            <td> <input class="num" name="data[PeselAndAppointment][appointment_consul_standard_quantity]" onChange="this_total(this)" value ="0" > </td>
                            <td><?php echo $internal[17]['Internalprice']['amount'] ?></td>
                            <td> <input class="num" name="data[PeselAndAppointment][appointment_consul_standard_price]" onChange="this_total(this)" value ="<?php echo $client[17]['Clientprice']['amount'] ?>"" > </td>
                            <td> <input class="txt2" type="text" readonly="true" name="data[PeselAndAppointment][appointment_consul_standard_total]"
                                        value="0" ></td>
                        </tr>
                        <tr>
                            <td><h5>Appointment with Consulate (Non-Standard)</h5></td>
                            <td> <input class="num" name="data[PeselAndAppointment][appointment_consul_nonstandard_quantity]" onChange="this_total(this)" value ="0" > </td>
                            <td><?php echo $internal[18]['Internalprice']['amount'] ?></td>
                            <td> <input class="num" name="data[PeselAndAppointment][appointment_consul_nonstandard_price]" onChange="this_total(this)" value ="<?php echo $client[18]['Clientprice']['amount'] ?>"" > </td>
                            <td> <input class="txt2" type="text" readonly="true" name="data[PeselAndAppointment][appointment_consul_nonstandard_total]"
                                        value="0" ></td>
                        </tr>
                        <tr>
                            <td><h5>PESEL Application and Appointment outside of Australia</h5></td>
                            <td> <input class="num" name="data[PeselAndAppointment][pesel_app_apointment_out_aus_quantity]" onChange="this_total(this)" value ="0" > </td>
                            <td><?php echo $internal[19]['Internalprice']['amount'] ?></td>
                            <td> <input class="num" name="data[PeselAndAppointment][pesel_app_apointment_out_aus_price]" onChange="this_total(this)" value ="<?php echo $client[19]['Clientprice']['amount'] ?>"" > </td>
                            <td> <input class="txt2" type="text" readonly="true" name="data[PeselAndAppointment][pesel_app_apointment_out_aus_total]"
                                        value="0" ></td>
                        </tr>
                        <tr>

                            <td> PESEL Fees total</td>
                            <td></td>
                            <td align="center"> </td>
                            <td></td>
                            <td align="center"><?php echo $this->Form->input('PeselAndAppointment.pesel_and_appointments_total', array('id' => 'ptotal', 'label' => '', 'class' => 'sum')); ?></td>

                        </tr>
                    </tbody>
                </table>

            </div>
            <div class="tab-pane" id="tab5">
                <h3><?php echo __('Other Fees'); ?></h3>
                <table>
                    <tbody>
                        <tr>
                            <th>Item</th>
                            <th>Quantity<font color="red">*</font></th>
                            <th>Internal Price</th>
                            <th>Client Price<font color="red">*</font></th>
                            <th>Total</th>
                        </tr>
                        <tr>
                            <td><h5>Children under 18</h5></td>
                            <td> <input class="num" name="data[SetFee][children_quantity]" onChange="this_total(this)" value ="0" > </td>
                            <td><?php echo $internal[20]['Internalprice']['amount'] ?></td>
                            <td> <input class="num" name="data[SetFee][children_price]" onChange="this_total(this)" value ="<?php echo $client[20]['Clientprice']['amount'] ?>"" > </td>
                            <td> <input class="txt3" type="text" readonly="true" name="data[SetFee][children_total]"
                                        value="0" ></td>
                        </tr>
                        <tr>
                            <td><h5>Relatives of Confirmed Citizens</h5></td>
                            <td> <input class="num" name="data[SetFee][relatives_quantity]" onChange="this_total(this)" value ="0" > </td>
                            <td><?php echo $internal[21]['Internalprice']['amount'] ?></td>
                            <td> <input class="num" name="data[SetFee][relatives_price]" onChange="this_total(this)" value ="<?php echo $client[21]['Clientprice']['amount'] ?>"" > </td>
                            <td> <input class="txt3" type="text" readonly="true" name="data[SetFee][relatives_total]"
                                        value="0" ></td>
                        </tr>
                        <tr>
                            <td><h5>Registration of One Birth or Marriage Certificate</h5></td>
                            <td> <input class="num" name="data[SetFee][reg_birth_marriage_quantity]" onChange="this_total(this)" value ="0" > </td>
                            <td><?php echo $internal[22]['Internalprice']['amount'] ?></td>
                            <td> <input class="num" name="data[SetFee][reg_birth_marriage_price]" onChange="this_total(this)" value ="<?php echo $client[22]['Clientprice']['amount'] ?>"" > </td>
                            <td> <input class="txt3" type="text" readonly="true" name="data[SetFee][reg_birth_marriage_total]"
                                        value="0" ></td>
                        </tr>
                        <tr>
                            <td><h5>Registration of Birth and Marriage Certificate Altogether</h5></td>
                            <td> <input class="num" name="data[SetFee][reg_birth_marriage_together_quantity]" onChange="this_total(this)" value ="0" > </td>
                            <td><?php echo $internal[23]['Internalprice']['amount'] ?></td>
                            <td> <input class="num" name="data[SetFee][reg_birth_marriage_together_price]" onChange="this_total(this)" value ="<?php echo $client[23]['Clientprice']['amount'] ?>"" > </td>
                            <td> <input class="txt3" type="text" readonly="true" name="data[SetFee][reg_birth_marriage_together_total]"
                                        value="0" ></td>
                        </tr>
                        <tr>
                            <td><h5>Standard Fees</h5></td>
                            <td> <input class="num" name="data[SetFee][standard_fee_quantity]" onChange="this_total(this)" value ="0" > </td>
                            <td><?php echo $internal[24]['Internalprice']['amount'] ?></td>
                            <td> <input class="num" name="data[SetFee][standard_fee_price]" onChange="this_total(this)" value ="<?php echo $client[24]['Clientprice']['amount'] ?>"" > </td>
                            <td> <input class="txt3" type="text" readonly="true" name="data[SetFee][standard_fee_total]"
                                        value="0" ></td>
                        </tr>
                        <tr>
                            <td><h5><input name="data[SetFee][additional1_name]"   ></h5></td>
                            <td> <input  class="num" name="data[SetFee][additional1_quantity]" onChange="this_total(this)" value ="0" > </td>
                            <td><?php echo 0.0; ?></td>
                            <td> <input class="num" name="data[SetFee][additional1_price]" onChange="this_total(this)" value ="0.0" > </td>
                            <td> <input class="txt3" type="text" readonly="true" name="data[SetFee][additional1_total]"
                                        value="0" ></td>
                        </tr>
                        <tr>
                            <td><h5><input name="data[SetFee][additional2_name]"   ></h5></td>
                            <td> <input  class="num" name="data[SetFee][additional2_quantity]" onChange="this_total(this)" value ="0" > </td>
                            <td><?php echo 0.0; ?></td>
                            <td> <input class="num" name="data[SetFee][additional2_price]" onChange="this_total(this)" value ="0"> </td>
                            <td> <input class="txt3" type="text" readonly="true" name="data[SetFee][additional2_total]"
                                        value="0" ></td>
                        </tr>
                        <tr>

                            <td> Other Fees total</td>
                            <td></td>
                            <td align="center"></td>
                            <td></td>
                            <td align="center"><?php echo $this->Form->input('SetFee.set_fees_total', array('id' => 'ototal', 'label' => '', 'class' => 'sum')); ?></td>
                        </tr>
                    </tbody>

                </table>
            </div>
            <div class="submit">
                <p>Only click submit once all desired fields are filled out</p>
                <?php echo $this->Form->submit(__('Submit', true), array('name' => 'QuoteButton', 'div' => false)); ?>
                <?php echo $this->Form->submit(__('Cancel', true), array('name' => 'QuoteButton', 'div' => false)); ?>
            </div>
            <script>
                   $(document).ready(function() {

                       //iterate through each textboxes and add keyup
                       //handler to trigger sum event
                       $(".txt").each(function() {

                           $(".num").change(function() {
                               calculateSum();
                           });
                       });
                       $(".txt1").each(function() {

                           $(".num").change(function() {
                               calculateSum();
                           });
                       });
                       $(".txt2").each(function() {

                           $(".num").change(function() {
                               calculateSum();
                           });
                       });
                       $(".txt3").each(function() {

                           $(".num").change(function() {
                               calculateSum();
                           });
                       });
                   });

                   function calculateSum() {

                       var sum = 0;
                       var sum1 = 0;
                       var sum2 = 0;
                       var sum3 = 0;
                       var sum4 = 0;
                       //iterate through each textboxes and add the values
                       $(".txt").each(function() {

                           //add only if the value is number
                           if (!isNaN(this.value) && this.value.length != 0) {
                               sum += parseFloat(this.value);
                           }

                       });
                       //.toFixed() method will roundoff the final sum to 2 decimal places
                       $("#sum").html(sum.toFixed(2));
                       document.getElementById('rtotal').value = sum;

                       $(".txt1").each(function() {

                           //add only if the value is number
                           if (!isNaN(this.value) && this.value.length != 0) {
                               sum1 += parseFloat(this.value);
                           }

                       });
                       //.toFixed() method will roundoff the final sum to 2 decimal places
                       $("#sum1").html(sum1.toFixed(2));
                       document.getElementById('ctotal').value = sum1;

                       $(".txt2").each(function() {

                           //add only if the value is number
                           if (!isNaN(this.value) && this.value.length != 0) {
                               sum2 += parseFloat(this.value);
                           }

                       });
                       //.toFixed() method will roundoff the final sum to 2 decimal places
                       $("#sum2").html(sum2.toFixed(2));
                       document.getElementById('ptotal').value = sum2;

                       $(".txt3").each(function() {

                           //add only if the value is number
                           if (!isNaN(this.value) && this.value.length != 0) {
                               sum3 += parseFloat(this.value);
                           }

                       });
                       //.toFixed() method will roundoff the final sum to 2 decimal places
                       $("#sum3").html(sum3.toFixed(2));
                       document.getElementById('ototal').value = sum3;

                       $(".sum").each(function() {

                           //add only if the value is number
                           if (!isNaN(this.value) && this.value.length != 0) {
                               sum4 += parseFloat(this.value);
                           }

                       });
                       //.toFixed() method will roundoff the final sum to 2 decimal places
                       $("#sum4").html(sum4.toFixed(2));
                       document.getElementById('qtotal').value = sum4;

                   }
            </script>
            <?php echo $this->Form->end(); ?>	
        </div>
    </div>
</div>