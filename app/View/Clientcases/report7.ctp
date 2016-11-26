<?php

$this->PhpExcel->createWorksheet();
$this->PhpExcel->setDefaultFont('Calibri', 12);

// define table cells
$table = array(
    array('label' => __('Applicant Name'), 'width' => 'auto', 'filter' => true),
    array('label' => __('Grand Total'), 'width' => 'auto'),
    array('label' => __('GST'), 'width' => 'auto'),
    array('label' => __('Interest Rate'), 'width' => 'auto', 'filter' => true),
    array('label' => __('Date Created'), 'width' => 50, 'wrap' => true),
    array('label' => __('Installment Date 1'), 'width' => 'auto'),
    array('label' => __('Installment Date 2'), 'width' => 'auto'),
    array('label' => __('Installment Date 3'), 'width' => 'auto'),
    array('label' => __('Installment Date 4'), 'width' => 'auto'),
    array('label' => __('Installment Date 5'), 'width' => 'auto'),
    array('label' => __('Installment Date 6'), 'width' => 'auto')
);

// heading
$this->PhpExcel->addTableHeader($table, array('name' => 'Cambria', 'bold' => true));

// data

foreach ($data as $d) {
    if ($d['PaymentPlan']['installment_date6'] != null) {
        $this->PhpExcel->addTableRow(array(
            $d['Quote']['Applicant'][0]['first_name'] . ' ' . $d['Quote']['Applicant'][0]['surname'],
            $d['PaymentPlan']['total'],
            $d['Quote']['GST'],
            $d['PaymentPlan']['interest_rate'],
            $this->Time->format('d-m-Y', $d['PaymentPlan']['date_created']),
            $this->Time->format('d-m-Y', $d['PaymentPlan']['installment_date1']),
            $this->Time->format('d-m-Y', $d['PaymentPlan']['installment_date2']),
            $this->Time->format('d-m-Y', $d['PaymentPlan']['installment_date3']),
            $this->Time->format('d-m-Y', $d['PaymentPlan']['installment_date4']),
            $this->Time->format('d-m-Y', $d['PaymentPlan']['installment_date5']),
            $this->Time->format('d-m-Y', $d['PaymentPlan']['installment_date6'])
        ));
    } elseif ($d['PaymentPlan']['installment_date5'] != null) {
        $this->PhpExcel->addTableRow(array(
            $d['Quote']['Applicant'][0]['first_name'] . ' ' . $d['Quote']['Applicant'][0]['surname'],
            $d['PaymentPlan']['total'],
            $d['Quote']['GST'],
            $d['PaymentPlan']['interest_rate'],
            $this->Time->format('d-m-Y', $d['PaymentPlan']['date_created']),
            $this->Time->format('d-m-Y', $d['PaymentPlan']['installment_date1']),
            $this->Time->format('d-m-Y', $d['PaymentPlan']['installment_date2']),
            $this->Time->format('d-m-Y', $d['PaymentPlan']['installment_date3']),
            $this->Time->format('d-m-Y', $d['PaymentPlan']['installment_date4']),
            $this->Time->format('d-m-Y', $d['PaymentPlan']['installment_date5'])
        ));
    } elseif ($d['PaymentPlan']['installment_date4'] != null) {
        $this->PhpExcel->addTableRow(array(
            $d['Quote']['Applicant'][0]['first_name'] . ' ' . $d['Quote']['Applicant'][0]['surname'],
            $d['PaymentPlan']['total'],
            $d['Quote']['GST'],
            $d['PaymentPlan']['interest_rate'],
            $this->Time->format('d-m-Y', $d['PaymentPlan']['date_created']),
            $this->Time->format('d-m-Y', $d['PaymentPlan']['installment_date1']),
            $this->Time->format('d-m-Y', $d['PaymentPlan']['installment_date2']),
            $this->Time->format('d-m-Y', $d['PaymentPlan']['installment_date3']),
            $this->Time->format('d-m-Y', $d['PaymentPlan']['installment_date4'])
        ));
    } elseif ($d['PaymentPlan']['installment_date3'] != null) {
        $this->PhpExcel->addTableRow(array(
            $d['Quote']['Applicant'][0]['first_name'] . ' ' . $d['Quote']['Applicant'][0]['surname'],
            $d['PaymentPlan']['total'],
            $d['Quote']['GST'],
            $d['PaymentPlan']['interest_rate'],
            $this->Time->format('d-m-Y', $d['PaymentPlan']['date_created']),
            $this->Time->format('d-m-Y', $d['PaymentPlan']['installment_date1']),
            $this->Time->format('d-m-Y', $d['PaymentPlan']['installment_date2']),
            $this->Time->format('d-m-Y', $d['PaymentPlan']['installment_date3'])
        ));
    } else {
        $this->PhpExcel->addTableRow(array(
            $d['Quote']['Applicant'][0]['first_name'] . ' ' . $d['Quote']['Applicant'][0]['surname'],
            $d['PaymentPlan']['total'],
            $d['Quote']['GST'],
            $d['PaymentPlan']['interest_rate'],
            $this->Time->format('d-m-Y', $d['PaymentPlan']['date_created']),
            $this->Time->format('d-m-Y', $d['PaymentPlan']['installment_date1']),
            $this->Time->format('d-m-Y', $d['PaymentPlan']['installment_date2'])
        ));
    }
}

$this->PhpExcel->addTableFooter();
$this->PhpExcel->output();
?>