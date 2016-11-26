<?php 
App::import('Vendor','tcpdf/tcpdf'); 

class XTCPDF  extends TCPDF 
{ 

  
  
    var $xfootertext  = 'Copyright @ Polaron. All Rights Reserved'; 
    var $xfooterfont  = PDF_FONT_NAME_MAIN ; 
    var $xfooter  = PDF_FOOTER_LOGO ; 
    var $xfooterfontsize = 8 ; 
    

    /** 
    * Overwrites the default header 
    * set the text in the view using 
    *    $fpdf->xheadertext = 'YOUR ORGANIZATION'; 
    * set the fill color in the view using 
    *    $fpdf->xheadercolor = array(0,0,100); (r, g, b) 
    * set the font in the view using 
    *    $fpdf->setHeaderFont(array('YourFont','',fontsize)); 
    */ 
   
    /** 
    * Overwrites the default footer 
    * set the text in the view using 
    * $fpdf->xfootertext = 'Copyright ?? %d YOUR ORGANIZATION. All rights reserved.'; 
    */ 
   

    function Footer() 
    { 
        $year = date('Y'); 
        $footertext = sprintf($this->xfootertext, $year); 
        $this->SetY(-20); 
        $this->SetTextColor(0, 0, 0); 
       ;
        $this->Cell(0,8, $footertext,'T',1,'C'); 
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
        } 
} 
?>