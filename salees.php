<?php
session_start();
include_once("connection.php");
include_once('libs/fpdf.php');

 $db = new PDO('mysql:host=localhost;dbname=id5580644_testingesp','id5580644_testingesp','123456789');
 
 
class myPDF extends FPDF
{

function Header()
{

    $start_date = $_SESSION['payroll_start_date'];
	$end_date = $_SESSION['payroll_end_date'];
    $this->SetFont('Times','',12);
	
	
    $this->SetFont('Arial','B',12);

    $this->Cell(100);

	
    $this->Cell(150,10,'St. Peter Life Plan, Inc.',50,20,'C');
	$this->Ln(-5);
	$this->Cell(100);
	$this->SetFont('Arial','B',10);
    $this->Cell(150,10,'Ground Floor Sarmiento Bldg., Centro 1, Ingles St. Tagbilaran City',10,10,'C');
    $this->Cell(150,5,"Period: $start_date - $end_date",10,10,'C');
	$this->SetFont('Arial','B',30);
    $this->Cell(150,15,'Payroll Sheet',10,10,'C');
	$this->Ln(-5);
	$this->Cell(100);
	/*$db = new PDO('mysql:host=localhost;dbname=id5580644_testingesp','id5580644_testingesp','123456789');
	$stmt=$db->query('SELECT *FROM payrollsheet where id = 1');
	while ($data1=$stmt->fetch(PDO::FETCH_OBJ))
	{
		$this->Cell(150,10,$data1->period,0,0,'C');
	}
	*/
    $this->Ln(10);
	/////SITE NAME//////

	
	
	$this->Ln(10);
	//////////
	$this->Ln(5);
	$this->SetFont('Arial','B',10);
	$this->SetTextColor(0,0,0);
	
	
	
	
	
	
	$this->Cell(3);
	$this->Cell(40,10,' Employee Name',0,0);
	$this->Ln(0);
	/*
	$this->Cell(22);
	$this->Cell(20,10,'Position',0,0,'C');
	$this->Ln(0);
*/
	$this->Cell(46.5);
	$this->Cell(16,10,'Daily Rate',0,0,'C');
	$this->Ln(-5);

	$this->Cell(71);
	$this->Cell(16,10,'Day(s)',0,0,'C');
	$this->Ln(5);

	$this->Cell(71);
	$this->Cell(16,10,'Worked',0,0,'C');
	$this->Ln(0);

	$this->Cell(90);
	$this->Cell(25,10,'Amount',0,0,'C');
	$this->Ln(0);

	$this->Cell(117);
	$this->Cell(16,10,'Time',0,0,'C');
	$this->Ln(-5);
	
	$this->Cell(117);
	$this->Cell(16,10,'OT',0,0,'C');
	$this->Ln(0);

	$this->Cell(142);
	$this->Cell(16,10,'OT',0,0,'C');
	$this->Ln(5);
	
	$this->Cell(142);
	$this->Cell(16,10,'Amt',0,0,'C');
	$this->Ln(0);

	$this->Cell(166);
	$this->Cell(16,10,'Holiday',0,0,'C');
	$this->Ln(0);
	
	$this->Cell(190);
	$this->Cell(16,10,'Incentive',0,0,'C');
	$this->Ln(0);

	$this->Cell(213);
	$this->Cell(20,10,'Amount',0,0,'C');
	$this->Ln(0);

	$this->Cell(238);
	$this->Cell(16,10,'Gross Salary',0,0,'C');
	$this->Ln(0);

	


	$this->Cell(260);
	$this->Cell(22,10,'Deduction',0,0,'C');
	$this->Ln(0);

	$this->Cell(287);
	$this->Cell(13,10,'Net Pay',0,0,'C');
	$this->Ln(0);

    
    $this->Cell(315-5);
	$this->Cell(40,-2+10,'Received by:',0,0);
	$this->Ln(0);
	
	$this->Cell(315-5);
	$this->Cell(40,10+10,'(Signature)',0,0);
	$this->Ln(0);

	
	$this->Ln(5);
	$this->Ln();
	
}
	

 
function Footer()
{
	
	
	
    $this->SetY(-20);
    $this->SetFont('Arial','I',8);    
    $this->Cell(250+40,5,'Checked and Endorsed for Approval by:',0,0,'C');
	
	$this->SetY(-20);
    $this->SetFont('Arial','B',9);    
    $this->Cell(250+40,20,'nameeeeee',0,0,'C');
	
	$this->SetY(-20);
    $this->SetFont('Arial','I',8);    
    $this->Cell(250+40,27,'position',0,0,'C');
	///
	 $this->SetY(-20);
    $this->SetFont('Arial','I',8);    
    $this->Cell(360+134,5,'Approved by:',0,0,'C');
	
	$this->SetY(-20);
    $this->SetFont('Arial','B',9);    
    $this->Cell(400+100,20,'nameeeeeeeeeeeeeeeeeeee',0,0,'C');
	
	$this->SetY(-20);
    $this->SetFont('Arial','I',8);    
    $this->Cell(400+100,27,'Managing Director',0,0,'C');
	///
   
               /* 
                $this->SetY(-15);
                $this->SetFont('Arial','I',8);    
                $this->Cell(150-50,-5,'Prepared by:',0,0,'C');

                $this->SetY(-15);
                $this->SetFont('Arial','B',9);    
                $this->Cell(147-50,10,"nameeee",0,0,'C');

                $this->SetY(-15);
                $this->SetFont('Arial','I',8);    
                $this->Cell(150-50,17,"Position",0,0,'C');
                ///
                $this->SetY(-15);
                $this->SetFont('Arial','I',8);    
                $this->Cell(600,10,'Page'.$this->PageNo().'/{nb}',0,0,'C');
			
	*/
    
}

function headerTable(){
	
	$this->Ln(-5);
}
function viewTable($db){

	////
$link = mysqli_connect('localhost','root','','thesis');
				  		
		
	////
	$this->SetFont('Times','',12);
	$sql1 = mysqli_query($link,"SELECT *FROM payroll where jobStatus ='active'");
	$temp1 = 0;
	$temp2 = 0;
	$temp3 = 0;
	$temp4 = 0;
	$temp5 = 0;
	$temp6 = 0;
	$temp7 = 0;
	$temp8 = 0;
	$temp9 = 0;
	$temp10 = 0;
	$temp11 = 0;
	$temp12 = 0;
	
	$amount1 = 0;
	$overtime_amt = 0;
	$holiday_amt = 0;
	$ps_incentive = 0;
	$amount2 = 0;
	$ps_grossSalary = 0;
	$ps_totalDeduction = 0;
	$ps_netPay = 0;
	for($a = 1 ; $a < $num_rows = mysqli_fetch_array($sql1) ; $a++ )
	{
		$ps_fullName = $num_rows['fullName'];
		$ps_position = $num_rows['position'];
		$ps_dailyRate = $num_rows['dailyRate'];
		$ps_daysWorked = $num_rows['daysWorked'];
		$ps_overtime = $num_rows['overtime'];
		$ps_holiday = $num_rows['holiday'];
		$ps_holiday_amt = $num_rows['holiday_amt'];
		$ps_incentive = $num_rows['incentive'];
		$ps_totalDeduction = $num_rows['totalDeduction'];
		$ps_grossSalary = $num_rows['grossSalary'];
		$ps_netPay = $num_rows['netPay'];
		
		$amount1 = $ps_daysWorked * $ps_dailyRate;
		$overtime_amt = (($ps_overtime*60)/480)*$ps_dailyRate;
		$holiday_amt = ((($ps_holiday*60)/480)*$ps_dailyRate)*2;
		$amount2 = $overtime_amt + $holiday_amt + $ps_incentive;
		
			if($a % 13 == 0)
		{
		  $this->AddPage();  
		}
		/////300 rate///
		
	
			$this->Cell(-5);
			$this->SetFont('Arial','',8);
			$this->Cell(48,10,strtoupper($ps_fullName),1,0,'L');
			
		
			$this->SetFont('Arial','',10);
			$this->Cell(24,10,number_format((float)$ps_dailyRate, 2, '.', ','),1,0,'C');
			$this->Cell(24,10,$ps_daysWorked,1,0,'C');
			$this->Cell(24,10,number_format((float)$amount1, 2, '.', ','),1,0,'C');
			$this->Cell(24,10,$ps_overtime,1,0,'C');
			$this->Cell(24,10,$overtime_amt,1,0,'C');
			$this->Cell(24,10,number_format((float)$holiday_amt, 2, '.', ','),1,0,'C');
			$this->Cell(24,10,$ps_incentive,1,0,'C');
			$this->Cell(24,10,number_format((float)$amount2, 2, '.', ','),1,0,'C');
			$this->Cell(24,10,number_format((float)$ps_grossSalary, 2, '.', ','),1,0,'C');
			$this->Cell(24,10,number_format((float)$ps_totalDeduction, 2, '.', ','),1,0,'C');
			$this->Cell(24,10,number_format((float)$ps_netPay, 2, '.', ','),1,0,'C');
			
            $this->Cell(35,10,'',1,0,'C');
			$this->Ln();
			$temp1 = $temp1 + $amount1;
		$temp2 = $temp2 + $overtime_amt;
		$temp3 = $temp3 + $holiday_amt;
		$temp4 = $temp4 + $ps_incentive;
		$temp5 = $temp5 + $amount2;
		$temp6 = $temp6 + $ps_grossSalary;
		$temp7 = $temp7 + $ps_totalDeduction;
		$temp8 = $temp8 + $ps_netPay;
			
		}
		
		
		
		
		
	
		
		
		
	
	
    

		
	
		$this->SetFont('Times','B',12);
		$this->Cell(-5);
		$this->Cell(15,10,'GRAND TOTAL',0,0,'L');
		$this->Cell(20,10,'',0,0,'C');
		$this->Cell(16,10,'',0,0,'C');
		$this->Cell(35,10,'',0,0,'C');
		$this->Cell(40,10,number_format((float)$temp1, 2, '.', ','),0,0,'C');
		$this->Cell(60,10,number_format((float)$temp2, 2, '.', ','),0,0,'C');
		$this->Cell(-10,10,number_format((float)$temp3, 2, '.', ','),0,0,'C');
		$this->Cell(55,10,number_format((float)$temp4, 2, '.', ','),0,0,'C');
		$this->Cell(-5,10,number_format((float)$temp5, 2, '.', ','),0,0,'C');
		$this->Cell(50,10,number_format((float)$temp6, 2, '.', ','),0,0,'C');
		$this->Cell(-1,10,number_format((float)$temp7, 2, '.', ','),0,0,'C');
		$this->Cell(50,10,number_format((float)$temp8, 2, '.', ','),0,0,'C');
		
		$this->Cell(23,10,'',0,1,'C');
	
}

}
 


 
$pdf = new myPDF('L','mm',array(355.6,215.9));


$pdf->AddPage();

$pdf->AliasNbPages();

$pdf->SetFont('Arial','B',8,'C');
$pdf->headerTable();
$pdf->viewTable($db);  
$pdf->headerTable();
$pdf->Output();

?>
