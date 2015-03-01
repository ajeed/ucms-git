<?php
App::import('Vendor','xtcpdf');
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('UCMS');
$pdf->SetTitle('CAR LIST');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');
$date = date("F j, Y");
// set default header data
$pdf->SetHeaderData(null, null, PDF_HEADER_TITLE, PDF_HEADER_STRING . $date);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', 'B', 20);

// add a page
$pdf->AddPage();
$date = date("F j, Y");
//$pdf->Write(0, 'List of available cars as for ' . $date, '', 0, 'L', true, 0, false, false, 0);

$pdf->SetFont('helvetica', '', 8);

// -----------------------------------------------------------------------------

$tbl = <<<EOD
<table width="100%" cellspacing="0" cellpadding="2" border="1">
	<tr>
		<td width="5%" align="center">No.</td>
		<td align="center">Title</td>
		<td align="center">Year</td>
		<td align="center">Buying Price</td>
		<td align="center">Reg No</td>
		<td align="center">Date</td>
	</tr>

EOD;
$i = 1;
foreach ( $rows as $row ) {
	$tbl .= '<tr>';
	$tbl .= '<td align="center">'.$i.'</td>';
	$tbl .= '<td align="left">' . strtoupper ( $row ['Make'] ['name'] ) . " " . strtoupper ( $row ['Mod'] ['name'] ) . " " . strtoupper ( $row ['Store'] ['title'] ) . '</td>';
	$tbl .= '<td align="center">' . $row ['Store'] ['year'] . '</td>';
	$tbl .= '<td align="center">' . $this->Number->format ( $row ['Store'] ['price'], array ('places' => 2, 'before' => 'MYR', 'decimals' => '.', 'thousands' => ',' ) ) . '</td>';
	$tbl .= '<td align="center">' . $row ['Store'] ['reg_no'] . '</td>';
	$tbl .= '<td align="center">' . date ( 'Y-m-d', strtotime ( $row ['Store'] ['date'] ) ) . '</td>';
	$tbl .= '</tr>';
$i++;
}
$tbl .= "</table>";

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------

//Close and output PDF document

$pdf->Output(date('Ymd').'_list.pdf', 'I');
