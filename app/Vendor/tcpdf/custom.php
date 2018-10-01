<?php

	// Include the main TCPDF library (search for installation path).
	require_once('tcpdf.php');


	// Extend the TCPDF class to create custom Header and Footer
	class brbPDF extends TCPDF {

		//Page header
		public function Header() {
			// Logo
			//$image_file = K_PATH_IMAGES.'logos/logo-small.jpg';
			//$image_file = 'logos/logo-small.jpg';
			//$this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
			// Set font
			//$this->SetFont('helvetica', 'B', 12);
			// Title
			//$this->Cell(0, 15, '<< TCPDF Example 003 >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
			//$this->Cell(0, 15, 'BINANGONAN RURAL BANK', 0, false, 'C', 0, '', 0, false, 'M', 'M');
			
			//$this->Cell(0, 15, , 0, false, 'C', 0, '', 0, false, 'M', 'M');
			//$this->MultiCell(55, 5, 'Cashout Reports ( May 26, 2018 - June 11, 2018 )', 1, 'C', 0, 0, '', '', true);
			//$this->Cell(0, 0, 'BINANGONAN RURAL BANK <br /> Cashout Reports ( May 26, 2018 - June 11, 2018 )', 0, 0, 'C', 0, '', 0);
			//$this->SetFont('helvetica', 'B', 12);
			//$this->Cell(0, 0, '', 0, 0, 'C', 0, '', 0);
			$this->WriteHTML('<div style="text-align: center; font: bold 12px helvetica">BINANGONAN RURAL BANK <div style="font-size: 10px;"> Cashout Reports ( May 26, 2018 - June 11, 2018 )</div></div>');
			
		}

		// Page footer
		public function Footer() {
			// Position at 15 mm from bottom
			$this->SetY(-15);
			// Set font
			$this->SetFont('helvetica', 'I', 8);
			// Page number
			$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
		}
	}

?>