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

$archiveName = $case['Archive']['archive_name'];

$top = <<<EOD
   <table>
        <tr>
        <td>
        QUOTE
        </td>
        </tr>
        <tr>
        <td>
        $archiveName
        </td>
        </tr>
   </table>
EOD;
$pdf->writeHTML($top, true, true, true, true, true, true, true, true, '');

$pdf->SetFont('helvetica', '', 10, '', false);
$pdf->setCellPaddings (5, 0, 5, 0);
//Applicant details
$name = $quote[0]['Applicant'][0]['first_name'] . " " . $quote[0]['Applicant'][0]['surname'];
$email = $quote[0]['Applicant'][0]['email'];
$phone = $quote[0]['Applicant'][0]['landline_number'];
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
if ($quote['CcAndRegistration']['total'] != null) {
    $ccRegistration = $quote['CcAndRegistration']['total'];
    $ccRegistration = "$" . $ccRegistration;
} else {
    $ccRegistration = "$" . 0;
}

if ($quote['PeselAndAppointment']['pesel_and_appointments_total'] != null) {
    $peselAppointment = $quote['PeselAndAppointment']['pesel_and_appointments_total'];
    $peselAppointment = "$" . $peselAppointment;
} else {
    $peselAppointment = "$" . 0;
}

if ($quote['QuoteResearch']['research_total'] != null) {
    $research = $quote['QuoteResearch']['research_total'];
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

$gst = $quote[0]['Quote']['GST'];
$gst = "$" . $gst;

$total = $quote[0]['Quote']['total'];
$total = "$" . $total;

$grandTotal = $quote[0]['Quote']['total'] + $quote[0]['Quote']['GST'];
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
EOD;
ob_clean();

$pdf->writeHTML($table3, true, true, true, true, true, true, true, true, '');


$pdf->SetFont('helvetica', '', 15, '', false);

$validity = <<<EOD
        <table>
        <tr>
        <td>
        Quote valid until
        $dateValid
        </td>
        </tr>
        </table>
EOD;
   
$pdf->writeHTML($validity, true, true, true, true, true, true, true, true, '');

$pdf->setCellMargins(15, 10, 1, 1);

// set color for background
$pdf->SetFillColor(255, 255, 204);

$pdf->SetFont('helvetica', '', 8, '', false);

// set some text for example
$txt = '                                                                                       IMPORTANT NOTES 
This quote includes administration & research fees, filing fees, project management, folio & acquisition fees, translation, notarization, legalization & certification fees, as well as postage, courier & photocopying, as they are known to us at the time of preparation of the quote. It does not however include fees where clients are required to order documents directly from relevant authorities.
This quote is subject to changes depending on amendments to Polish legislation, document legalization requirements and the occurrence of unforeseeable events beyond its scope or our control. You will be advised in writing of any changes or additional requirements introduced by the Polish government should they occur, and the applicable fees. To avoid delays and complications, please provide us with all required documents as soon as possible. 
In line with international regulations, Polaron will require a Letter of Authority from each applicant witnessed by a Notary Public or the Polish Consulate, payable by the client directly. Polaron will prepare the Letter of Authority in the Polish and English languages at no cost.We look forward to assisting you with your application for Confirmation of Polish Citizenship and Polish Passport.';
$pdf->Write(0, ' ', '', 0, 'C', true, 0, false, false, 0);

// Multicell test
$pdf->MultiCell(182, 2, $txt, 1, 'L', 1, 0, '', '', true);
 
// move pointer to last page
//$pdf->lastPage();
//Close and output PDF document 
$pdf->Output('QuoteInfo.pdf', 'I');
exit();
?> 