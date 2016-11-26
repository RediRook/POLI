<?php
$this->PhpExcel->createWorksheet();
$this->PhpExcel->setDefaultFont('Calibri', 12);

// define table cells
$table = array(
    array('label' => __('Applicant Name'), 'width' => 'auto', 'filter' => true),
    array('label' => __('Description'), 'width' => 'auto', 'filter' => true),
    array('label' => __('Date Created'), 'width' => 50, 'wrap' => true),
    array('label' => __('Total'), 'width' => 'auto')
);

// heading
$this->PhpExcel->addTableHeader($table, array('name' => 'Cambria', 'bold' => true));

// data
foreach ($data as $d) {
    $this->PhpExcel->addTableRow(array(
        $d['Applicant'][0]['first_name'].' '.$d['Applicant'][0]['surname'],
        $d['Quote']['description'],
        $this->Time->format('h:i d-m-Y', $d['Quote']['date']),
        $d['Quote']['total']
    ));
}

$this->PhpExcel->addTableFooter();
$this->PhpExcel->output();

?>