<?php

/* /app/View/Helper/LinkHelper.php */
App::uses('AppHelper', 'View/Helper');

class PDFHelper extends AppHelper {

    function ColouredTable($header, $data) {

// Header
        $w = array(480, 218, 118, 240, 225, 220, 220, 200);
        $num_headers = count($header);
        $tbl = '<table cellpadding="10" cellspacing="1" border="0">';
        $tbl.='<tr bgcolor="white">';

        for ($i = 0; $i < $num_headers; ++$i) {
            $tbl.='<td class="heading" width="' . $w[$i] . '">' . $header[$i] . '</td>';
        }
        $tbl.="</tr>";

//$fill=0;
        $columnCount = 0;

        foreach ($data as $row) {
            if ($columnCount % 2 == 0) {
                $tbl.='<tr valign="top" bgcolor="white">';
            } else {
                $tbl.='<tr valign="top">';
            }

            $tbl.="<td>Applicant Name</td><td>" . $row['Applicant'][0]['first_name'] . ' ' . $row['Applicant'][0]['middle_name'] . ' ' . $row['Applicant'][0]['surname'] . "</td></tr><tr>";
            $tbl.="<td>Date Created</td><td>" . $row['Quote']['date'] . "</td></tr><tr>";
            if ($row['QuoteResearch']['research_total'] != "") {
                $tbl.="<td>Research Fees</td><td>" . $row['QuoteResearch']['research_total'] . "</td></tr><tr>";
            }
            if ($row['CcAndRegistration']['cc_and_registration_total'] != "") {
                $tbl.="<td>Confirmation of Citizenship & Registration</td><td>" . $row['CcAndRegistration']['cc_and_registration_total'] . "</td></tr><tr>";
            }
            if ($row['CcAndRegistration']['cc_and_registration_total'] != "") {
                $tbl.="<td>Pesel Fee & Appointment</td><td>" . $row['PeselAndAppointment']['pesel_and_appointments_total'] . "</td></tr><tr>";
            }
            if ($row['SetFee']['set_fees_total'] != "") {
                $tbl.="<td>Set Fees</td><td>" . $row['SetFee']['set_fees_total'] . "</td></tr><tr>";
            }
            $tbl.="<td>GST</td><td>" . $row['Quote']['GST'] . "</td></tr><tr>";
            $tbl.="<td>Total</td><td>" . $row['Quote']['total'] . "</td>";
        }
        $tbl.="</tr>";





        $tbl.="</table>";


        return $tbl;
//$this->Cell(array_sum($w), 0, '', 'T');
    }

}

?>