<?php
$this->PhpExcel->createWorksheet();
$this->PhpExcel->setDefaultFont('Calibri', 12);

// define table cells
$table = array(
    array('label' => __('Applicant Name'), 'width' => 'auto', 'filter' => true),
    array('label' => __('Payment Date'), 'width' => 50, 'wrap' => true),
    array('label' => __('Payment Due'), 'width' => 'auto')
);

// heading
$this->PhpExcel->addTableHeader($table, array('name' => 'Cambria', 'bold' => true));

if($installment1 != null)
{
    foreach($installment1 as $i1)
    {
        $this->PhpExcel->addTableRow(array(
            $i1['Quote']['Applicant'][0]['first_name'] . ' ' . $i1['Quote']['Applicant'][0]['surname'],
            $i1['PaymentPlan']['installment_date1'],
            $i1['PaymentPlan']['installment_price1']
        ));
    }
}
if($installment2 != null)
{
    foreach($installment2 as $i2)
    {
        $this->PhpExcel->addTableRow(array(
            $i2['Quote']['Applicant'][0]['first_name'] . ' ' . $i2['Quote']['Applicant'][0]['surname'],
            $i2['PaymentPlan']['installment_date1'],
            $i2['PaymentPlan']['installment_price1']
        ));
    }
}
if($installment3 != null)
{
    foreach($installment3 as $i3)
    {
        $this->PhpExcel->addTableRow(array(
            $i3['Quote']['Applicant'][0]['first_name'] . ' ' . $i3['Quote']['Applicant'][0]['surname'],
            $i3['PaymentPlan']['installment_date1'],
            $i3['PaymentPlan']['installment_price1']
        ));
    }
}
if($installment4 != null)
{
    foreach($installment4 as $i4)
    {
        $this->PhpExcel->addTableRow(array(
            $i4['Quote']['Applicant'][0]['first_name'] . ' ' . $i4['Quote']['Applicant'][0]['surname'],
            $i4['PaymentPlan']['installment_date1'],
            $i4['PaymentPlan']['installment_price1']
        ));
    }
}
if($installment5 != null)
{
    foreach($installment5 as $i5)
    {
        $this->PhpExcel->addTableRow(array(
            $i5['Quote']['Applicant'][0]['first_name'] . ' ' . $i5['Quote']['Applicant'][0]['surname'],
            $i5['PaymentPlan']['installment_date1'],
            $i5['PaymentPlan']['installment_price1']
        ));
    }
}
if($installment6 != null)
{
    foreach($installment6 as $i6)
    {
        $this->PhpExcel->addTableRow(array(
            $i6['Quote']['Applicant'][0]['first_name'] . ' ' . $i6['Quote']['Applicant'][0]['surname'],
            $i6['PaymentPlan']['installment_date1'],
            $i6['PaymentPlan']['installment_price1']
        ));
    }
}
$this->PhpExcel->addTableFooter();
$this->PhpExcel->output();

?>