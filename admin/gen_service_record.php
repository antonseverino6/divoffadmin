<?php

    require_once 'includes/init.php';
    
    if(!$session->is_logged_in()) {
        redirect('../login.php');
    }

    require_once '../fpdf/fpdf.php';

    if (isset($_GET['id'])) {

    	$date_now = date("F d, Y");

    	$get_tin_num = $db->fix_string($_GET['id']);

    	$info_query = $db->query("SELECT employee_id,tin_num,first_name,middle_name,last_name,place_birth,birth_date FROM info WHERE tin_num = '$get_tin_num'");

    	$info_row = $info_query->fetch_array();


    	$work_exp_query = $db->query("SELECT * FROM work_exp WHERE tin_num = '$get_tin_num'");

    	$service_record_query = $db->query("SELECT * FROM service_record LIMIT 1");

    	$service_record_row = $service_record_query->fetch_array();

    } else {
    	redirect('../login.php'); 
    }

class PDF_MC_Table extends FPDF
{
var $widths;
var $aligns;

function SetWidths($w)
{
    //Set the array of column widths
    $this->widths=$w;
}

function SetAligns($a)
{
    //Set the array of column alignments
    $this->aligns=$a;
}

function Row($data)
{
    //Calculate the height of the row
    $nb=0;
    for($i=0;$i<count($data);$i++)
        $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
    $h=5*$nb;
    //Issue a page break first if needed
    $this->CheckPageBreak($h);
    //Draw the cells of the row
    for($i=0;$i<count($data);$i++)
    {
        $w=$this->widths[$i];
        $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
        //Save the current position
        $x=$this->GetX();
        $y=$this->GetY();
        //Draw the border
        $this->Rect($x,$y,$w,$h);
        //Print the text
        $this->MultiCell($w,5,$data[$i],0,'C');
        //Put the position to the right of the cell
        $this->SetXY($x+$w,$y);
    }
    //Go to the next line
    $this->Ln($h);
}

function CheckPageBreak($h)
{
    //If the height h would cause an overflow, add a new page immediately
    if($this->GetY()+$h>$this->PageBreakTrigger)
        $this->AddPage($this->CurOrientation);
}

function NbLines($w,$txt)
{
    //Computes the number of lines a MultiCell of width w will take
    $cw=&$this->CurrentFont['cw'];
    if($w==0)
        $w=$this->w-$this->rMargin-$this->x;
    $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
    $s=str_replace("\r",'',$txt);
    $nb=strlen($s);
    if($nb>0 and $s[$nb-1]=="\n")
        $nb--;
    $sep=-1;
    $i=0;
    $j=0;
    $l=0;
    $nl=1;
    while($i<$nb)
    {
        $c=$s[$i];
        if($c=="\n")
        {
            $i++;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
            continue;
        }
        if($c==' ')
            $sep=$i;
        $l+=$cw[$c];
        if($l>$wmax)
        {
            if($sep==-1)
            {
                if($i==$j)
                    $i++;
            }
            else
                $i=$sep+1;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
        }
        else
            $i++;
    }
    return $nl;
}
}


	$kagawaran_image = 'resources/img/service_record_kagawaran.png';	
	$division_rizal_image = 'resources/img/background_divoff.png';
    ini_set('memory_limit', '-1');
	$pdf=new PDF_MC_Table;
    $pdf->setTitle('Service Record');

	$pdf->AddPage();
	$pdf->SetFont('Arial','',10);

	// FOR IMAGES
	$pdf->Image($kagawaran_image,20,10,30,30);
	$pdf->Image($division_rizal_image,150,10,30,30);

	// TITLE
	$pdf->Cell(113,5,'Republic of the Philippines',0,1,'R');
	$pdf->SetFont('Arial','',13);
	$pdf->Cell(127,7,'DEPARTMENT OF EDUCATION',0,1,'R');
	$pdf->SetFont('Times','',12);
	$pdf->Cell(122,6,'REGION IV-A CALABARZON',0,1,'R');
	$pdf->SetFont('Times','B',14);
	$pdf->Cell(117,6,'DIVISION OF RIZAL',0,1,'R');

	$pdf->Cell(190,10,'',0,1); // just a space

	// TIN AND EMPLOYEE NUMBER
	$pdf->SetFont('Arial','',11);
	$pdf->Cell(150,8,'Emp. No :',0,0,'R');
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(35,8,$info_row['employee_id'],'B',1);
	$pdf->SetFont('Arial','',11);
	$pdf->Cell(150,8,'Tin # :',0,0,'R');
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(35,8,$info_row['tin_num'],'B',1);

	$pdf->Cell(190,3,'',0,1); // just a space	

	// SERVICE RECORD
	$pdf->SetFont('Arial','B',14);		
	$pdf->Cell(115,7,'SERVICE RECORD',0,1,'R');

	$pdf->Cell(190,5,'',0,1); // just a space

	// FULL NAME
	$pdf->SetFont('Arial','B', 11);
	$pdf->Cell(60,7,utf8_for_pdf($info_row['last_name']),'B',0,'C');
	$pdf->Cell(65,7,utf8_for_pdf($info_row['first_name']),'B',0,'C');
	$pdf->Cell(60,7,utf8_for_pdf($info_row['middle_name']),'B',1,'C');
	$pdf->SetFont('Arial','', 8);
	$pdf->Cell(60,5,'(Surname)',0,0,'C');
	$pdf->Cell(65,5,'(Given name)',0,0,'C');
	$pdf->Cell(60,5,'(Material surname)',0,1,'C');


	// BIRTH DETAILS
	$pdf->SetFont('Arial','B', 11);
	$pdf->Cell(95,7,$info_row['birth_date'],'B',0,'C');
	$pdf->Cell(95,7,utf8_for_pdf($info_row['place_birth']),'B',1,'C');	
	$pdf->SetFont('Arial','', 9);
	$pdf->Cell(95,5,'(Date of Birth)',0,0,'C');
	$pdf->Cell(95,5,'(Place of Birth)',0,1,'C');	

	$pdf->Cell(190,5,'',0,1); // just a space

	// TABLE
	$pdf->SetFont('Arial','', 7);
	// 1st row
	$pdf->SetWidths(array(45,55,45,45));
	$pdf->Row(array('SERVICE','RECORD OF APPOINTMENT','OFFICE/DIVISION','SEPARATION'));
	// 2nd row
	$pdf->SetWidths(array(22.5,22.5,18.3,18.3,18.3,22.5,22.5,22.5,22.5));
	$pdf->Row(array('From','To','Designation','Status','Salary','Station/Place of Assignment','Branch','Lv. of abs. w/o pay', 'Date'));

	$pdf->SetWidths(array(22.5,22.5,18.3,18.3,18.3,22.5,22.5,22.5,22.5));
	$pdf->SetFont('Arial','B', 9);

	while ($work_exp_row = $work_exp_query->fetch_array()) {
		$pdf->Row(array($work_exp_row['exp_date_from'],$work_exp_row['exp_date_to'],$work_exp_row['designation'],
							  $work_exp_row['status'],$work_exp_row['salary'],$work_exp_row['comp_name'],
							  $work_exp_row['branch'],$work_exp_row['leave_abs'],$work_exp_row['leave_abs_date']));
	}


	$pdf->Cell(190,8,'',0,1); // just a space

	// CERTIFIED CORRECT
	$pdf->SetFont('Arial','B',10);		
	$pdf->Cell(111,7,'CERTIFIED CORRECT',0,1,'R');

	$pdf->Cell(190,8,'',0,1); // just a space


	// DATE
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(15,8,'Date :',0,0,'R');
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(35,8,$date_now,'B',0);

	// SIGNATURE

	$pdf->Cell(75,8,'',0,0); // space between date and signature

	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(40,8,utf8_for_pdf($service_record_row['name']),'B',1,'C');
	$pdf->Cell(125,8,'',0,0);
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(40,9,utf8_for_pdf($service_record_row['position']),0,1,'C');

	$pdf->Output();    