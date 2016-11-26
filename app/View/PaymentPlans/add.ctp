<?php echo $this->Html->css('jquery-ui'); ?>
<?php echo $this->Html->script('jquery.min'); ?>
<?php echo $this->Html->script('jquery-ui.min'); ?>

<script>
    $(document).ready(function() {
        $("#d1").datepicker(
                {changeMonth: true,
                    changeYear: true,
                    yearRange: "-100:+100",
                    showAnim: 'slideDown',
                    dateFormat: "dd/mm/yy"});
        $("#d2").datepicker({dateFormat: "dd/mm/yy"});
        $("#d3").datepicker({dateFormat: "dd/mm/yy"});
        $("#d4").datepicker({dateFormat: "dd/mm/yy"});
        $("#d5").datepicker({dateFormat: "dd/mm/yy"});
        $("#d6").datepicker({dateFormat: "dd/mm/yy"});
    });
</script>
<script type="text/javascript">
    var r = 2;// the number of floated decimal rounding 
    function calculate(f) {

        var sum = 0;
        var ent = document.getElementById('entries').getElementsByTagName('input');//new entries collection 
        var ent1 = document.getElementById('entries1').getElementsByTagName('input');//Payment form entries collection 
        var datepick = document.getElementById('datespick').getElementsByTagName('input');//Dates collection 
        var period = document.getElementById('period').getElementsByTagName('input');//period collection 
        console.log(datepick[0].value);
        if (datepick[0].value!="" && datepick[1].value!="" && Number(ent[2].value) >= 0 && Number(ent[1].value) <= 6 && Number(ent[1].value) >= 2 && Number(ent[0].value) >= 0) {
		
		            var str = datepick[1].value;
            var st = datepick[0].value;
            var res = str.slice(3, 5) + "/" + str.slice(0, 2) + str.slice(5, 10);
            var re = st.slice(3, 5) + "/" + st.slice(0, 2) + st.slice(5, 10);



            var d = new Date(res);
            var di = new Date(re);
			var s=d.getTime()
			var si=di.getTime()
			if (Number(s)>Number(si)){


            for (var i = 0; i < 12; i++)
            {
                ent1[i].value = "";
            }

            sum = Number(ent[0].value) * Math.pow(10, r) * (1 + Number(ent[2].value) / 100) * Math.pow(10, r)//fixes the CPU binary rounding possible error 

            f.averageBox.value = ((sum / Math.pow(10, r)) / (Number(ent[1].value) * Math.pow(10, r))).toFixed(r);//rounds to r decimals 





            var x = document.getElementById("month").checked;

            var p = period[0].value;



            var month = d.getMonth() + 1;
            var day = d.getDate();
            datepick[1].value = (('' + day).length < 2 ? '0' : '') + day + '/' + (('' + month).length < 2 ? '0' : '') + month + '/' + d.getFullYear( );

            for (var i = 2; i < Number(ent[1].value); i++)
            {

                if (x == true)
                {
                    d.setMonth(d.getMonth( ) + p * 1);
                    var monthe = d.getMonth() + 1;
                    var daye = d.getDate();
                    datepick[i].value = (('' + daye).length < 2 ? '0' : '') + daye + '/' + (('' + monthe).length < 2 ? '0' : '') + monthe + '/' + d.getFullYear( );

                }

                else {
                    d.setDate(d.getDate( ) + p * 7);
                    var mm = d.getMonth() + 1;
                    var dd = d.getDate();
                    datepick[i].value = (('' + dd).length < 2 ? '0' : '') + dd + '/' + (('' + mm).length < 2 ? '0' : '') + mm + '/' + d.getFullYear( );
                }
            }

            for (var i = 0; i < Number(ent[1].value) * 2; i = i + 2)
            {
                ent1[i].value = f.averageBox.value;
            }
            ent1[1].value = datepick[0].value;
            ent1[3].value = datepick[1].value;
            ent1[5].value = datepick[2].value;
            ent1[7].value = datepick[3].value;
            ent1[9].value = datepick[4].value;
            ent1[11].value =datepick[5].value;

            ent1[12].value = ent[2].value;
            ent1[13].value = ent[1].value;
            ent1[14].value = p;
            ent1[15].value = sum / 10000;

        }
		else {
		 alert("installment date 1 must be earlier than installment date 2");
		}
		}
        else {
            alert("Please select 1st and 2nd Installments date, The Total Payment must greater than 0, Number of Installments must from 2 to 6 and the Interest Rate must be equal or greater than 1");
        }
    }

    function calFunction(f) {

        Number(rate.value)
        f.total.value = (Number(f.installment1.value) + Number(f.installment2.value) + Number(f.installment3.value) + Number(f.installment4.value) + Number(f.installment5.value) + Number(f.installment6.value));
    }
</script> 

<?php
$this->Html->addCrumb('View Case', '/clientcases/view/' . $case_id[0]);
$this->Html->addCrumb('Create Payment Plans', '/PaymentPlans/add/' . $quote['Quote']['id']);
?>


<div class="paymentplan-form">
    <?php echo $this->Form->create('PaymentPlan', array('novalidates' => true, 'div' => array('class' => 'div-class'))); ?>

    <?php
    $i = 0;
    foreach ($applicants as $applicant)
        
        ?>
    <fieldset>
        <legend>Applicant:</legend>
        <h3><?php echo h($applicant['title'] . ' ' . $applicant['first_name'] . ' ' . $applicant['middle_name'] . ' ' . $applicant['surname']); ?></h3>

    </fieldset> 

    <table>
        <td>  
            <fieldset>     

                <legend><?php echo __('Add Payment Plan'); ?></legend> 


                <a class="btn" data-toggle="modal" href="#modalCalculate">Calculate Each Installment</a>
                <div id="entries1">      

                    <table>

                        <tbody>

                        <h4>The information below is Read Only.</h4>

                        <td>
                            <?php echo $this->Form->input('installment_price1', array('id' => 'installment1')); ?>
                        </td>
                        <td>
                            <h3>installment 1 date: </h3><input type="text" id="Implementd1" Readonly= "true">
                        </td>                
                        <tr>
                            <td>
                                <?php echo $this->Form->input('installment_price2', array('id' => 'installment2')); ?>
                            </td>
                            <td>
                                <h3>installment 2 date: </h3><input type="text" id="Implementd2" Readonly= "true">
                            </td> 
                        </tr>
                        <tr>
                            <td>
                                <?php echo $this->Form->input('installment_price3', array('id' => 'installment3')); ?>
                            </td>
                            <td>
                                <h3>installment 3 date: </h3><input type="text" id="Implementd3" Readonly= "true">
                            </td> 
                        </tr>
                        <tr>
                            <td>
                                <?php echo $this->Form->input('installment_price4', array('id' => 'installment4')); ?>
                            </td>
                            <td>
                                <h3>installment 4 date: </h3><input type="text" id="Implementd4" Readonly= "true">
                            </td> 
                        </tr>
                        <tr>
                            <td>
                                <?php echo $this->Form->input('installment_price5', array('id' => 'installment5')); ?>
                            </td>
                            <td>
                                <h3>installment 5 date: </h3><input type="text" id="Implementd5" Readonly= "true">
                            </td> 
                        </tr>
                        <tr>
                            <td>
                                <?php echo $this->Form->input('installment_price6', array('id' => 'installment6')); ?>
                            </td>
                            <td>
                                <h3>installment 6 date: </h3><input type="text" id="Implementd6" Readonly= "true">
                            </td> 
                        </tr>
                        <tr>
                            <td>
                                <h5>Extra Interest Charge Rate % </h5>
                                <h5>If extra interest charge is 20%, enter 20 </h5>

                                <?php echo $this->Form->input('interest_rate', array('id' => 'rate', 'label' => '', 'Readonly' => 'true')); ?>
                            </td>
                        </tr>
                        <tr>
                            <td>                         
                                <?php echo $this->Form->input('No_installment', array('id' => 'no', 'label' => 'Numbers of installment', 'Readonly' => 'true')); ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="modal hide"> <?php echo $this->Form->input('installment_date_period', array('id' => 'installment_date_period', 'Readonly' => 'true', 'value' => '1', 'label' => 'Installment Date Period by month')); ?></div>
                            </td>
                        </tr>				 
                        <tr>
                            <td>
                                <?php echo $this->Form->input('total', array('id' => 'total', 'Readonly' => 'true', 'label' => 'Total payment')); ?>
                                <div class="modal hide"><?php echo $this->Form->input('date_created'); ?></div>
                            </td>
                        </tr>

                        <tr>


                        </tr>
                        </tbody>
                    </table>	                        
                </div>
            </fieldset>
            <br/>
        </td>
        <tr>
            <td>

                <div class="modal hide" id="modalCalculate"><!-- note the use of "hide" class -->
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal">X</button>
                        <h2>Calculate Each Installment</h2>
                    </div>
                    <div class="modal-body">
                        <fieldset>
                            <table>
                                <tr>
                                <form id="numbersForm" name="numbersForm"> 

                                    <h4>(The Value of Total Payment must be greater than 0, Number of Installments must from 1 to 6 and the Interest Rate must be equal or greater than 1)</h4>

                                    <div id="entries"> 
                                        <h3>Total Payment without extra interest: </h3>$<input type="text" name="payment" size="14" value="<?php echo $quote['Quote']['total'] ?>">
                                        <h3>Numbers of Installments: </h3><input type="text" name="Implement" size="15">
                                        <h3>Extra Interest Charge Rate %: </h3> 
                                        <h4>If extra interest charge is 20%, enter 20 </h4>
                                        <input type="text" name="Interest" value="0" size="15"/> 
                                    </div> 
                                    <p> 
                                    <div class="modal hide"> <h3>The value of each installment is: </h3><input type="text" name="averageBox" size="6"><br> </div>
                            </table>
                        </fieldset>
                        </form>
                        <h3>Period type prefer?<h3><br>
                                <input type="radio" name="period" id="month" checked>Month<br><br>
                                <input type="radio" name="period" id="week">Week<br>


                                <div id="period"><input type="text" name="period" value="1"size="15"> </div>
                                <h4>Please enter the first installment date</h4>
                                <div id="datespick">
                                    <?php
                                    echo $this->Form->input('installment_date1', array('id' => 'd1', 'type' => 'text', 'style' => 'width: 150px', 'label' => 'Installment date 1 '));
                                    echo $this->Form->input('installment_date2', array('id' => 'd2', 'type' => 'text', 'style' => 'width: 150px', 'label' => 'Installment date 2 '));
                                    ?>
                                    <div class="modal hide">

                                        <?php echo $this->Form->input('installment_date3', array('id' => 'd3', 'type' => 'text', 'style' => 'width: 150px', 'label' => 'Installment date 3')); ?>
                                        <?php echo $this->Form->input('installment_date4', array('id' => 'd4', 'type' => 'text', 'style' => 'width: 150px', 'label' => 'Installment date 4')); ?>
                                        <?php echo $this->Form->input('installment_date5', array('id' => 'd5', 'type' => 'text', 'style' => 'width: 150px', 'label' => 'Installment date 5')); ?>
                                        <?php echo $this->Form->input('installment_date6', array('id' => 'd6', 'type' => 'text', 'style' => 'width: 150px', 'label' => 'Installment date 6')); ?>
                                    </div>
                                </div> 

                                </div>
                                <div class="modal-footer">
                                    <input color="balck" type="button" class="close" data-dismiss="modal" value="Calculate each installment" onclick ="calculate(this.form)"> 
                                </div>
                                </div>

                                </td>
                                <td>
                                    <div class="submit">
                                        <?php echo $this->Form->submit(__('Submit', true), array('name' => 'PaymentButton', 'div' => false)); ?>
                                        <?php echo $this->Form->submit(__('Cancel', true), array('name' => 'PaymentButton', 'div' => false)); ?>
                                    </div>
                                </td>
                                </tr>
<?php echo $this->Form->end(); ?>
                                </table>
                                </div>