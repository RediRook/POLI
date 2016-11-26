  <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
  
  <script>
  $(document).ready(function() {
    $("#d1").datepicker();
    $("#d2").datepicker();
    $("#d3").datepicker();
    $("#d4").datepicker();
    $("#d5").datepicker();
    $("#d6").datepicker();
  });
  </script>
<script type="text/javascript"> 
var r = 2;// the number of floated decimal rounding 
function calculate(f) { 

var sum =0; 
var ent = document.getElementById('entries').getElementsByTagName('input');//new entries collection 
var ent1 = document.getElementById('entries1').getElementsByTagName('input');//Payment form entries collection 
var date = document.getElementById('date').getElementsByTagName('input');//date form entries collection 
 if (Number(ent[2].value) >=-0.1 && Number(ent[1].value)<=6 && Number(ent[1].value)>=1 && Number(ent[0].value)>=0 ){


for(var i =0; i<6;i++)
{ent1[i].value= "";
} 
sum=Number(ent[0].value)*Math.pow(10,r)*(Number(ent[2].value)/100+1)*Math.pow(10,r)//fixes the CPU binary rounding possible error 

f.averageBox.value = ((sum/Math.pow(10,r))/(Number(ent[1].value)*Math.pow(10,r))).toFixed(r);//rounds to r decimals 


for(var i = 0; i<Number(ent[1].value);i++)
{ent1[i].value= f.averageBox.value;
ent1[i+9].value=date[i].value;

}
ent1[6].value= ent[2].value;
ent1[7].value= sum/10000;
 
}
else {
 alert("The Value of Total Payment must be greater than 0, Number of Installments must from 1 to 6 and the Interest Rate must be equal or greater than 0");}
} 

function calFunction(f) { 
  
 Number(f.rate.value)
f.total.value =(Number(f.installment1.value)+Number(f.installment2.value)+Number(f.installment3.value)+Number(f.installment4.value)+Number(f.installment5.value)+Number(f.installment6.value)) ; 
 } 
</script> 

    <div class="paymentplan-form">
        <h3>Calculate Each Installment</h3>
        <form id="numbersForm" name="numbersForm">
        <table>
            <tr>
                <th>
                    <h1><b>Total Payment without Interest:</b></h1>
                </th>
                <th>
                    <h1><b>Number of Installments</b></h1>
                </th>
                <th>
                    <h1><b>Percentage Interest Rate</b></h1>
                </th>
            </tr>
            <tr>
                <td>
                    <input type="text" name="payment" id="total" size="5" value="<?php echo $quote['Quote']['total']?>">
                </td>
                <td>
                    <input type="text" name="Implement" id="installments" size="5">
                </td>
                <td>
                    <input type="text" name="Interest" id="interest" size="5" ><br> 
                </td>
            </tr>
            <tr>
                <td width="20%">
                    <input type="button" value="Calculate" onclick ="calculate(this.form)"> 
                </td>
                <td>
                    <h1><b>The value of each installment is:</b></h1>
                    <input type="text" name="averageBox" id="averageBox" size="6">
                </td>
            </tr>
        </table>
        </form>
        
<?php echo $this->Form->create('PaymentPlan', array('novalidate' => true, 'div' => array('class' => 'div-class'))); ?>
   <p>* means mandatory</p>
        <div id="entries1">           
            <table>
                <tr>
                    <th>Installment Amount</th>
                    <th>Installment Dates</th>
                </tr>
                <tr>
                    <td>
                        <?php
                        echo $this->Form->input('installment_price1', array('id' => 'installment1', 'label' => 'Installment price 1 *'));
                        echo $this->Form->input('installment_price2', array('id' => 'installment2', 'label' => 'Installment price 2 *'));
                        echo $this->Form->input('installment_price3', array('id' => 'installment3', 'label' => 'Installment price 3'));
                        echo $this->Form->input('installment_price4', array('id' => 'installment4', 'label' => 'Installment price 4'));
                        echo $this->Form->input('installment_price5', array('id' => 'installment5', 'label' => 'Installment price 5'));
                        echo $this->Form->input('installment_price6', array('id' => 'installment6', 'label' => 'Installment price 6'));   
                        ?>
                    <td>
                        <?php
                        echo $this->Form->input('installment_date1', array('id' => 'd1', 'type' => 'text', 'label' => 'Installment date 1 *'));
                        echo $this->Form->input('installment_date2', array('id' => 'd2', 'type' => 'text', 'label' => 'Installment date 2 *'));
                        echo $this->Form->input('installment_date3', array('id' => 'd3', 'type' => 'text', 'label' => 'Installment date 3'));
                        echo $this->Form->input('installment_date4', array('id' => 'd4', 'type' => 'text', 'label' => 'Installment date 3'));
                        echo $this->Form->input('installment_date5', array('id' => 'd5', 'type' => 'text', 'label' => 'Installment date 3'));
                        echo $this->Form->input('installment_date6', array('id' => 'd6', 'type' => 'text', 'label' => 'Installment date 3'));            
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php
                        echo $this->Form->input('interest_rate', array('id' => 'rate',   'label' => '<b>Additional Interest *</b>'));
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $this->Form->input('total', array('id' => 'total',  'label' => '<b>Total Payment *</b>'));
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php 				
                        echo '<input type="button" value="Total Payment   " onclick ="calFunction(this.form)"> ';
                        ?>
                    </td>
                </tr>
            </table>
        </div>
   <!-- QUOTE ID -->
     <div class="submit">
         <?php echo $this->Form->submit(__('Submit', true), array('name' => 'PaymentButton', 'div' => false)); ?>
         <?php echo $this->Form->submit(__('Cancel', true), array('name' => 'PaymentButton','div' => false)); ?>
     </div>
        <?php echo $this->Form->end();?>
    </div>