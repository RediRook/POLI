<?php
App::import('Vendor', 'xtcpdf');
//Column titles 
$header = array(' ', ' ');
// create new PDF document 
//$pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true); 
$pdf = new XTCPDF('V', PDF_UNIT, PDF_PAGE_FORMAT, true);

// set document information
// set document information 
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING, array(0, 0, 0), array(100, 0, 0));

// set header and footer fonts 
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', 10));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));


// set default monospaced font 
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED, '', 12);

//set margins 
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks 
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor 
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);


// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('helvetica', '', 20, '', false);

// Add a page
// This method has several options, check the source code documentation for more information.
// set text shadow effect
$pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));
// set font 
// add a page 

$pdf->AddPage();

$pdf->Ln();

$pdf->SetFillColor(114, 155, 120);

$archiveName = $archive['Archive']['archive_name'];

$top = <<<EOD
   <table>
        <tr>
        <td>
        Payment Plan
        </td>
        <td>
        $archiveName
        </td>
        </tr>
   </table>
        <br />
        <br />
EOD;
$pdf->writeHTML($top, true, true, true, true, true, true, true, true, '');

$pdf->SetFont('helvetica', '', 10, '', false);
$pdf->setCellPaddings (5, 0, 5, 0);

//Applicant details
$name = $applicant['Applicant']['first_name'] . " " . $applicant['Applicant']['surname'];
$email = $applicant['Applicant']['email'];
$phone = $applicant['Applicant']['landline_number'];
$street = $address['Address']['address_line'];
$suburb = $address['Address']['suburb'];
$state = $address['Address']['state'];
$postCode = $address['Address']['postcode'];
$state = $address['Address']['state'];
$country = $address['Country']['country_name'];

$table = <<<EOD
<table cellspacing="0" cellpadding="1" border="">
    <tr>
        <td rowspan="0"><br />
        $name<br />
        $email<br />
        $phone<br />
        </td>
        <td><br />
        $street<br />
        $suburb<br />
        $state  $postCode<br />
        $country<br />
        </td>
    </tr>
</table>
        <br />
        <br />
        <br />
EOD;

$w = 10;
$h = 10;

$pdf->writeHTML($table, true, true, true, true, true, true, true, true, '');

$linestyle = array('width' => 0.1, 'cap' => 'butt', 'join' => 'miter', 'dash' => '', 'phase' => 0, 'color' => array(0,0,0));
$pdf->Line(102, 162, 207, 162, $linestyle);

//Quote stuff
if ($plan['Quote']['CcAndRegistration']['total'] != 0) {
    $ccRegistration = $plan['Quote']['CcAndRegistration']['total'];
    $ccRegistration = "$" . $ccRegistration;
} else {
    $ccRegistration = "$" . 0;
}

if ($plan['Quote']['PeselAndAppointment']['pesel_and_appointments_total'] != 0) {
    $peselAppointment = $plan['Quote']['PeselAndAppointment']['pesel_and_appointments_total'];
    $peselAppointment = "$" . $peselAppointment;
} else {
    $peselAppointment = "$" . 0;
}

if ($plan['Quote']['QuoteResearch']['research_total'] != 0) {
    $research = $plan['Quote']['QuoteResearch']['research_total'];
    $research = "$" . $research;
} else {
    $research = "$" . 0;
}

//golden lines
$pdf->SetDrawColor(238,232,170);
$pdf->SetFillColor(238,232,170);
$pdf->Rect(0, 87, 300, 10, 'DF', null);
$pdf->Rect(0, 100, 300, 10, 'DF', null);
$pdf->Rect(0, 113, 300, 10, 'DF', null);
$pdf->Rect(0, 215, 300, 6, 'DF', null);
$pdf->Rect(0, 228, 300, 6, 'DF', null);
$pdf->Rect(0, 242, 300, 6, 'DF', null);

$pdf->SetDrawColor(0, 0, 0);
$pdf->SetFont('helvetica', '', 15, '', false);
$table2 = <<<EOD
        <table>
        <tr>
        <td><br />
        Research<br /><br />
        Confirmation of Citizenship & Registration<br /><br />
        Pesel fee & appointment<br /><br />
        </td>
        <td align="right"><br />
        $research<br /><br />
        $ccRegistration<br /><br />
        $peselAppointment<br /><br />
        </td>
        </tr>
        </table>
        <br />
        <br />
        <br />
EOD;

$pdf->writeHTML($table2, true, true, true, true, true, true, true, true, '');

$gst = $plan['Quote']['GST'];
$gst = "$" . $gst;

$total = $plan['Quote']['total'];
$total = "$" . $total;

$grandTotal = $plan['Quote']['total'] + $plan['Quote']['GST'];
$grandTotal = "$" . $grandTotal;
$table3 = <<<EOD
    <table>
        <tr>
        <td>
        </td>
        <td>
        </td>
        <td><br />
        Total<br />
        GST<br />
        Grand Total<br />
        </td>
        <td align="right"><br />
        $total<br />
        $gst<br />
        $grandTotal<br />
        </td>
        </tr>
        </table>
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
EOD;
ob_clean();

$pdf->writeHTML($table3, true, true, true, true, true, true, true, true, '');

$date1 = $plan['PaymentPlan']['installment_date1'];
$date2 = $plan['PaymentPlan']['installment_date2'];

$price1 = $plan['PaymentPlan']['installment_price1'];
$price1 = "$" . $price1;
$price2 = $plan['PaymentPlan']['installment_price2'];
$price2 = "$" . $price2;

if($plan['PaymentPlan']['installment_date3'] != null)
{
    $date3 = $plan['PaymentPlan']['installment_date3'];
    $price3 = $plan['PaymentPlan']['installment_price3'];
    $price3 = "$" . $price3;
}

if($plan['PaymentPlan']['installment_date4'] != null)
{
    $date4 = $plan['PaymentPlan']['installment_date4'];
    $price4 = $plan['PaymentPlan']['installment_price4'];
    $price4 = "$" . $price4;
}

if($plan['PaymentPlan']['installment_date5'] != null)
{
    $date5 = $plan['PaymentPlan']['installment_date5'];
    $price5 = $plan['PaymentPlan']['installment_price5'];
    $price5 = "$" . $price5;
}

if($plan['PaymentPlan']['installment_date6'] != null)
{
    $date6 = $plan['PaymentPlan']['installment_date6'];
    $price6 = $plan['PaymentPlan']['installment_price6'];
    $price6 = "$" . $price6;
}

if($plan['PaymentPlan']['installment_date6'] != null){
    $dateTable = <<<EOD
            <table>
            <tr>
                <td>Installment 1:</td><td>$date1</td><td>$price1</td>
            </tr>
            <tr>
                <td>Installment 2:</td><td>$date2</td><td>$price2</td>
            </tr>
            <tr>
                <td>Installment 3:</td><td>$date3</td><td>$price3</td>
            </tr>
            <tr>
                <td>Installment 4:</td><td>$date4</td><td>$price4</td>
            </tr>
            <tr>
                <td>Installment 5:</td><td>$date5</td><td>$price5</td>
            </tr>
            <tr>
                <td>Installment 6:</td><td>$date6</td><td>$price6</td>
            </tr>
            </table>
EOD;
} elseif($plan['PaymentPlan']['installment_date5'] != null){
        $dateTable = <<<EOD
            <table>
            <tr>
                <td>Installment 1:</td><td>$date1</td><td>$price1</td>
            </tr>
            <tr>
                <td>Installment 2:</td><td>$date2</td><td>$price2</td>
            </tr>
            <tr>
                <td>Installment 3:</td><td>$date3</td><td>$price3</td>
            </tr>
            <tr>
                <td>Installment 4:</td><td>$date4</td><td>$price4</td>
            </tr>
            <tr>
                <td>Installment 5:</td><td>$date5</td><td>$price5</td>
            </tr>
            </table>
EOD;
}elseif($plan['PaymentPlan']['installment_date4'] != null){
       $dateTable = <<<EOD
            <table>
            <tr>
                <td>Installment 1:</td><td>$date1</td><td>$price1</td>
            </tr>
            <tr>
                <td>Installment 2:</td><td>$date2</td><td>$price2</td>
            </tr>
            <tr>
                <td>Installment 3:</td><td>$date3</td><td>$price3</td>
            </tr>
            <tr>
                <td>Installment 4:</td><td>$date4</td><td>$price4</td>
            </tr>
            </table>
EOD;
}elseif($plan['PaymentPlan']['installment_date3'] != null){
       $dateTable = <<<EOD
            <table>
            <tr>
                <td>Installment 1:</td><td>$date1</td><td>$price1</td>
            </tr>
            <tr>
                <td>Installment 2:</td><td>$date2</td><td>$price2</td>
            </tr>
            <tr>
                <td>Installment 3:</td><td>$date3</td><td>$price3</td>
            </tr>
            </table>
EOD;
}elseif($plan['PaymentPlan']['installment_date2'] != null){
       $dateTable = <<<EOD
            <table>
            <tr>
                <td>Installment 1:</td><td>$date1</td><td>$price1</td>
            </tr>
            <tr>
                <td>Installment 2:</td><td>$date2</td><td>$price2</td>
            </tr>
            </table>
EOD;
}

$pdf->writeHTML($dateTable, true, true, true, true, true, true, true, true, '');

$pdf->SetFont('helvetica', '', 15, '', false);

$pdf->setCellMargins(15, 10, 1, 1);

// set color for background
$pdf->SetFillColor(255, 255, 204);

$pdf->SetFont('helvetica', '', 6, '', false);
 
// move pointer to last page
//$pdf->lastPage();
//Close and output PDF document 
$pdf->Output('QuoteInfo.pdf', 'I');
exit();
?>