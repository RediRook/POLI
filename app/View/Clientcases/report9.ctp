<?php
$this->PhpExcel->createWorksheet();
$this->PhpExcel->setDefaultFont('Calibri', 12);

// define table cells
if ($options['Clientcase']['created/complete'] == 'creation') {
    $table = array(
        array('label' => __('Task Name'), 'width' => 'auto', 'filter' => true),
        array('label' => __('Creation Date'), 'width' => 50, 'wrap' => true),
        array('label' => __('Expected Completion Date'), 'width' => 'auto'),
        array('label' => __('Person Responsible'), 'width' => 'auto'),
        array('label' => __('Desired Outcome'), 'width' => 'auto')
    );
} elseif ($options['Clientcase']['created/complete'] == 'completion') {
    $table = array(
        array('label' => __('Task Name'), 'width' => 'auto', 'filter' => true),
        array('label' => __('Creation Date'), 'width' => 50, 'wrap' => true),
        array('label' => __('Completion Date'), 'width' => 'auto'),
        array('label' => __('Person Responsible'), 'width' => 'auto'),
        array('label' => __('Outcome'), 'width' => 'auto')
    );
}
$this->PhpExcel->addTableHeader($table, array('name' => 'Cambria', 'bold' => true));

if ($options['Clientcase']['created/complete'] == 'creation') {
    foreach ($data as $d) {
        $this->PhpExcel->addTableRow(array(
            $d['ResearchTask']['description'],
            $d['ResearchTask']['creation_date'],
            $d['ResearchTask']['expected_completion_date'],
            $d['responsibleEmployee']['first_name'].' '.$d['responsibleEmployee']['surname'],
            $d['ResearchTask']['desired_outcome']
        ));
    }
}

if ($options['Clientcase']['created/complete'] == 'completion') {
    foreach ($data as $d) {
        $this->PhpExcel->addTableRow(array(
            $d['ResearchTask']['description'],
            $d['ResearchTask']['creation_date'],
            $d['ResearchTask']['completion_date'],
            $d['responsibleEmployee']['first_name'].' '.$d['responsibleEmployee']['surname'],
            $d['ResearchTask']['actual_outcome']
        ));
    }
}

$this->PhpExcel->addTableFooter();
$this->PhpExcel->output();
?>