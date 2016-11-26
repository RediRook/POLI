<?php
    /* /app/View/Helper/LinkHelper.php */
    App::uses('AppHelper', 'View/Helper');

class PLANPDFHelper extends AppHelper
{
function ColouredTable($header,$data)
{
    
// Header
$w = array(545, 243,90,115,120,120,120,120,100);
$num_headers = count($header);
$tbl = '<table cellpadding="10" cellspacing="1" border="0">';
$tbl.='<tr bgcolor="white">';
for($i = 0; $i < $num_headers; ++$i)
{
$tbl.='<td class="heading" width="'.$w[$i].'">'.$header[$i].'</td>';
}
$tbl.="</tr>";

//$fill=0;
$columnCount=0;

foreach($data as $row)
{
 if($columnCount%2==0)
{
$tbl.='<tr valign="top" bgcolor="white">';
}
else
{
$tbl.='<tr valign="top">';
}

//$tbl.="<td>Applicant Name</td><td>".$row['Applicant'][0]['first_name'].' '.$row['Applicant'][0]['middle_name'].' '.$row['Applicant'][0]['surname']."</td></tr><tr>";
$tbl.="<td>Installment Price</td><td>".$row['PaymentPlan']['installment_price1']."</td></tr><tr>";
$tbl.="<td>Numbers of Installment</td><td>".$row['PaymentPlan']['No_installment']."</td></tr><tr>";
$tbl.="<td>Installment Rate</td><td>".$row['PaymentPlan']['interest_rate']."</td></tr><tr>";
$tbl.="<td>The first Installment Date </td><td>".$row['PaymentPlan']['installment_date1']."</td></tr><tr>";
$tbl.="<td>GST</td><td>".$row['Quote']['GST']."</td></tr><tr>";
$tbl.="<td>Total</td><td>".$row['PaymentPlan']['total']."</td>";
}
$tbl.="</tr>";





$tbl.="</table>";
  

return $tbl;
//$this->Cell(array_sum($w), 0, '', 'T');
}

}

?>