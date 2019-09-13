<?php

    require_once 'includes/init.php';
    
    if(!$session->is_logged_in()) {
        redirect('../login.php');
    }

	
	require_once '../fpdf/fpdf.php';


	$info = new Info(); 
	$other_info = new Other_info();
	$civil = new Civil();
	$details = new Details();


	if(isset($_GET['id'])) {
		$tin_num = $db->fix_string($_GET['id']);

		$info_row = $info->get_for_service_card($tin_num);
		$other_info_row = $other_info->get_for_service_card($tin_num);
		$fetch_civil = $civil->get_for_service_card($tin_num);
		$fetch_details = $details->get_for_service_card($tin_num);
	}else {
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




	$image1 = 'resources/img/background_divoff.png';
	ini_set('memory_limit', '-1');
	$pdf=new PDF_MC_Table('L');
    $pdf->setTitle('Service Card');
	// $pdf = new FPDF('L');

	$pdf->AddPage();
	$pdf->SetFont('Arial','',10);
	$pdf->Image($image1,130,10,40,40);
	$pdf->Cell(200,10,'',0,2);
	$pdf->Cell(190); // To HAVE A SPACE ON THE LEFT SIDE
	$pdf->SetFont('Arial','',11);
	$pdf->Cell(30,9,'Tin :',0,0,'R');
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(30,9,$info_row['tin_num'],'B',1);
	$pdf->Cell(190);
	$pdf->SetFont('Arial','',11);
	$pdf->Cell(30,9,'En :',0,0,'R');
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(30,9,$info_row['employee_id'],'B',1);
	$pdf->Cell(200,10,'',0,2);
	$pdf->SetFont('Times','B',14);
	$pdf->Cell(280,10,'SERVICE CARD',0,2,'C');
	$pdf->Cell(270,2,'',0,2,'C');

	$pdf->SetFont('Arial','B', 11);
	$pdf->Cell(90,7,utf8_for_pdf($info_row['last_name']),'B',0,'C');
	$pdf->Cell(95,7,utf8_for_pdf($info_row['first_name']),'B',0,'C');
	$pdf->Cell(90,7,utf8_for_pdf($info_row['middle_name']),'B',1,'C');
	$pdf->SetFont('Arial','', 8);
	$pdf->Cell(90,5,'(Surname)',0,0,'C');
	$pdf->Cell(95,5,'(Given name)',0,0,'C');
	$pdf->Cell(90,5,'(Material surname)',0,1,'C');

	$pdf->SetFont('Arial','B', 11);
	$pdf->Cell(48,7,utf8_for_pdf($info_row['place_birth']),'B',0,'C');
	$pdf->Cell(47,7,$info_row['birth_date'],'B',0,'C');
	$pdf->Cell(180,7,utf8_for_pdf($info_row['per_address']),'B',1,'C');
	$pdf->SetFont('Arial','', 9);
	$pdf->Cell(48,5,'(Place of Birth)',0,0,'C');
	$pdf->Cell(47,5,'(Date of Birth)',0,0,'C');
	$pdf->Cell(180,5,'(Permanent Address)',0,1,'C');	

	$pdf->SetFont('Arial','B', 11);
	$pdf->Cell(37,7,$info_row['civil_status'],'B',0,'C');
	$pdf->Cell(85,7,utf8_for_pdf($other_info_row['spouse_name']),'B',0,'C');
	$pdf->Cell(45,7,$other_info_row['spouse_occ'],'B',0,'C');
	$pdf->Cell(108,7,utf8_for_pdf($other_info_row['spouse_add']),'B',1,'C');
	$pdf->SetFont('Arial','', 9);
	$pdf->Cell(37,5,'(Civil Status)',0,0,'C');
	$pdf->Cell(85,5,'(Name of Spouse)',0,0,'C');
	$pdf->Cell(45,5,'(Occupation)',0,0,'C');
	$pdf->Cell(108,5,'(Address)',0,1,'C');

	$pdf->SetFont('Arial','B', 11);
	$pdf->Cell(100,7,$other_info_row['high_deg_received'],'B',0,'C');
	$pdf->Cell(50,7,$other_info_row['year_received'],'B',0,'C');
	$pdf->Cell(125,7,utf8_for_pdf($other_info_row['name_of_institution']),'B',1,'C');
	

	$pdf->SetFont('Arial','', 9);
	$pdf->Cell(100,5,'(Highest grade completed or degree received)',0,0,'C');
	$pdf->Cell(50,5,'(Year received)',0,0,'C');
	$pdf->Cell(125,5,'(Name of Institution)',0,1,'C');
	
	$pdf->SetFont('Arial','', 9);
	$pdf->Cell(35,7,'Special qualification',0,0,'C');
	$pdf->SetFont('Arial','B', 11);
	$pdf->Cell(80,7,$other_info_row['spec_qualification'],'B',0);
	$pdf->SetFont('Arial','', 9);
	$pdf->Cell(75,7,'C.S. EXAMINATION',1,0,'C');
	$pdf->Cell(42,7,'PASSED RATING',1,0,'C');
	$pdf->Cell(43,7,'DATE EXAMINATION',1,1,'C');




	$cs_exam = [];
	$cs_passed_rating = [];
	$cs_date_passed = [];

	while($civil_row = $fetch_civil->fetch_array()):

		$cs_exam[] = $civil_row['cs_exam'];
		$cs_passed_rating[] = $civil_row['cs_passed_rating'];
		$cs_date_passed[] = $civil_row['cs_date_passed'];

	endwhile;	

      if(empty($other_info_row['teach_comp_exam_score'])) : 
          $teach_comp_exam = $other_info_row['teach_comp_exam_date'];
      elseif(empty($other_info_row['teach_comp_exam_date'])) :
          $teach_comp_exam = $other_info_row['teach_comp_exam_score'];
      else :    
          $teach_comp_exam = $other_info_row['teach_comp_exam_score'] . " ; " . $other_info_row['teach_comp_exam_date'];
      endif;  



if(empty($cs_exam)) {
	$pdf->SetFont('Arial','', 8);
	$pdf->Cell(35,7,'Previous Experience',0,0,'C');
	$pdf->SetFont('Arial','B', 10);
	$pdf->Cell(80,7,$other_info_row['prev_experience'],'B',0);
	$pdf->Cell(75,7,'',1,0,'C');
	$pdf->Cell(42,7,'',1,0,'C');
	$pdf->Cell(43,7,'',1,1,'C');	

	$pdf->SetFont('Arial','', 9);
	$pdf->Cell(75,7,"Teacher's competitive examination: Score; Date taken",0,0,'C');
	$pdf->SetFont('Arial','B', 11);
	$pdf->Cell(40,7,$teach_comp_exam,'B',0);
	$pdf->Cell(75,7,'',1,0,'C');
	$pdf->Cell(42,7,'',1,0,'C');
	$pdf->Cell(43,7,'',1,1,'C');	

	$pdf->SetFont('Arial','', 9);
	$pdf->Cell(35,6,"G.S.I.S. B.P. No.",0,0,'C');
	$pdf->SetFont('Arial','B', 11);
	$pdf->Cell(80,6,$other_info_row['gsis_no'],'B',0);
	$pdf->Cell(75,6,'',1,0,'C');
	$pdf->Cell(42,6,'',1,0,'C');
	$pdf->Cell(43,6,'',1,1,'C');		
}elseif(count($cs_exam) == 1) {
	$pdf->SetFont('Arial','', 8);
	$pdf->Cell(35,7,'Previous Experience',0,0,'C');
	$pdf->SetFont('Arial','B', 10);
	$pdf->Cell(80,7,$other_info_row['prev_experience'],'B',0);
	$pdf->Cell(75,7,$cs_exam[0],1,0,'C');
	$pdf->Cell(42,7,$cs_passed_rating[0],1,0,'C');
	$pdf->Cell(43,7,$cs_date_passed[0],1,1,'C');

	$pdf->SetFont('Arial','', 9);
	$pdf->Cell(75,7,"Teacher's competitive examination: Score; Date taken",0,0,'C');
	$pdf->SetFont('Arial','B', 11);
	$pdf->Cell(40,7,$teach_comp_exam,'B',0);
	$pdf->Cell(75,7,'',1,0,'C');
	$pdf->Cell(42,7,'',1,0,'C');
	$pdf->Cell(43,7,'',1,1,'C');	

	$pdf->SetFont('Arial','', 9);
	$pdf->Cell(35,6,"G.S.I.S. B.P. No.",0,0,'C');
	$pdf->SetFont('Arial','B', 11);
	$pdf->Cell(80,6,$other_info_row['gsis_no'],'B',0);
	$pdf->Cell(75,6,'',1,0,'C');
	$pdf->Cell(42,6,'',1,0,'C');
	$pdf->Cell(43,6,'',1,1,'C');	
}elseif(count($cs_exam) == 2) {
	$pdf->SetFont('Arial','', 8);
	$pdf->Cell(35,7,'Previous Experience',0,0,'C');
	$pdf->SetFont('Arial','B', 10);
	$pdf->Cell(80,7,$other_info_row['prev_experience'],'B',0);
	$pdf->Cell(75,7,$cs_exam[0],1,0,'C');
	$pdf->Cell(42,7,$cs_passed_rating[0],1,0,'C');
	$pdf->Cell(43,7,$cs_date_passed[0],1,1,'C');

	$pdf->SetFont('Arial','', 9);
	$pdf->Cell(75,7,"Teacher's competitive examination: Score; Date taken",0,0,'C');
	$pdf->SetFont('Arial','B', 11);
	$pdf->Cell(40,7,$teach_comp_exam,'B',0);
	$pdf->Cell(75,7,$cs_exam[1],1,0,'C');
	$pdf->Cell(42,7,$cs_passed_rating[1],1,0,'C');
	$pdf->Cell(43,7,$cs_date_passed[1],1,1,'C');

	$pdf->SetFont('Arial','', 9);
	$pdf->Cell(35,6,"G.S.I.S. B.P. No.",0,0,'C');
	$pdf->SetFont('Arial','B', 11);
	$pdf->Cell(80,6,$other_info_row['gsis_no'],'B',0);
	$pdf->Cell(75,6,'',1,0,'C');
	$pdf->Cell(42,6,'',1,0,'C');
	$pdf->Cell(43,6,'',1,1,'C');		
}else {
	$pdf->SetFont('Arial','', 8);
	$pdf->Cell(35,7,'Previous Experience',0,0,'C');
	$pdf->SetFont('Arial','B', 10);
	$pdf->Cell(80,7,$other_info_row['prev_experience'],'B',0);
	$pdf->Cell(75,7,$cs_exam[0],1,0,'C');
	$pdf->Cell(42,7,$cs_passed_rating[0],1,0,'C');
	$pdf->Cell(43,7,$cs_date_passed[0],1,1,'C');

	$pdf->SetFont('Arial','', 9);
	$pdf->Cell(75,7,"Teacher's competitive examination: Score; Date taken",0,0,'C');
	$pdf->SetFont('Arial','B', 11);
	$pdf->Cell(40,7,$teach_comp_exam,'B',0);
	$pdf->Cell(75,7,$cs_exam[1],1,0,'C');
	$pdf->Cell(42,7,$cs_passed_rating[1],1,0,'C');
	$pdf->Cell(43,7,$cs_date_passed[1],1,1,'C');	

	$pdf->SetFont('Arial','', 9);
	$pdf->Cell(35,6,"G.S.I.S. B.P. No.",0,0,'C');
	$pdf->SetFont('Arial','B', 11);
	$pdf->Cell(80,6,$other_info_row['gsis_no'],'B',0);
	$pdf->Cell(75,6,$cs_exam[2],1,0,'C');
	$pdf->Cell(42,6,$cs_passed_rating[2],1,0,'C');
	$pdf->Cell(43,6,$cs_date_passed[2],1,1,'C');	
}




	$pdf->Cell(275,8,'',0,2); // ta have space line break

	$pdf->SetFont('Arial','', 7);
$pdf->SetWidths(array(40,30,25,25,30,35,30,30,30));
$pdf->Row(array('SPECIAL ORDER NUMBER / NATURE OF APPT.','REG. TEMP. OR SUB.','EFFECTIVE DATE','ANNUAL SALARY','SOURCE OF FUND: NATIONAL OR CAPITAL','STATION / NATURE OF ASSIGN. / SCHOOL','ITEM NUMBER','POSITION','REMARKS'));

	// $pdf->Cell(40,6,'SPECIAL ORDER NUMBER',1,0,'C');
	// $pdf->Cell(35,6,'REG. TEMP. OR SUB.',1,0,'C');
	// $pdf->Cell(30,6,'EFFECTIVE DATE',1,0,'C');
	// $pdf->Cell(30,6,'ANNUAL SALARY',1,0,'C');
	// $pdf->Cell(30,6,'SOURCE OF FUND',1,0,'C');
	// $pdf->Cell(35,6,'NATURE OF ASSIGN.',1,0,'C');
	// $pdf->Cell(30,6,'ITEM NUMBER',1,0,'C');
	// $pdf->Cell(45,6,'POSITION',1,1,'C');

	$pdf->SetFont('Arial','B', 11);

$pdf->SetWidths(array(40,30,25,25,30,35,30,30,30));


	while($details_row = $fetch_details->fetch_array()) :
$pdf->Row(array($details_row['special_order_no'],$details_row['reg_temp_sub'],$details_row['reg_effective_date'],$details_row['annual_salary'],$details_row['source_fund'],$details_row['nature_of_assignment'],$details_row['details_item_number'],$details_row['position'],$details_row['remarks']));
		// $pdf->Cell(40,8,$details_row['special_order_no'],1,0,'C');
		// $pdf->Cell(35,8,$details_row['reg_temp_sub'],1,0,'C');
		// $pdf->Cell(30,8,$details_row['reg_effective_date'],1,0,'C');
		// $pdf->Cell(30,8,$details_row['annual_salary'],1,0,'C');
		// $pdf->Cell(30,8,$details_row['source_fund'],1,0,'C');
		// $pdf->Cell(35,8,$details_row['nature_of_assignment'],1,0,'C');
		// $pdf->Cell(30,8,$details_row['details_item_number'],1,0,'C');
		// $pdf->Cell(45,8,$details_row['position'],1,1,'C');	

	endwhile;	

	$pdf->Output();


	?>




