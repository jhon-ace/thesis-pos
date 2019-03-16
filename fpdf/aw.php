
<?php


require "fpdf.php";
$db = new PDO('mysql:host=localhost;dbname=pos','root','');

class myPDF extends FPDF{
	/*function header(){
		$this->Image('logo.png',10,10,-220);
		$this->SetFont('Arial','B',10);
		$this->Cell(75,5,'POINT OF SALE',0,0,'R');
		$this->Ln();
		$this->Cell(136,5,'WEEKLY SALES REPORT',0,0,'C');
		
		$this->Ln(5);
		
		
		


	}*/
	

	
	function displaydate($db){
	
	
	}
	function displaydate2($db){
		$this->SetFont('Arial','B',10);
		
		date_default_timezone_set('Asia/Manila');
		$date  = date('l,F j,Y');		
	
		$stmt = $db->query('SELECT * FROM sales WHERE DATE(transaction_time) > CURDATE() - INTERVAL 7 DAY order by Date(transaction_time) DESC limit 1 ');

		
		///////////
		/*
		$link = mysqli_connect('localhost','root','','pos');
	
		$sql = mysqli_query($link,"SELECT *FROM sales ORDER by transaction_time ASC");
		for($a = 0 ; $a < $num_rows = mysqli_fetch_array($sql) ; $a++ )
			{
				$transaction_time = $num_rows['transaction_time'];;
				
				$fdate = date_create($transaction_time);
				date_add($fdate, date_interval_create_from_date_string('6 days'));
			
				$this->Cell(163,5,'End date:',0,0,'R');
				$this->Cell(30,5,date_format($fdate, 'Y-m-d'),0,0,'L');
					
			break;
			
				
			}
			/* */ 
		///////////	
		
	
	}


	






	function headerTable(){
		
	}
	function viewTable($db){
		$this->Image('logo.png',10,10,-220);
		$this->SetFont('Arial','',12);
		date_default_timezone_set('Asia/Manila');
		
		
		$this->SetFont('Arial','B',10);

		$this->SetFont('Arial','B',10);

		$this->Cell(74,5,'POINT OF SALE',0,0,'R');
		$this->Ln();
		$this->Cell(134,5,'WEEKLY SALES REPORT',0,0,'C');
		$this->Ln(15);

	
		$link = mysqli_connect('localhost','root','','pos');
	
		$sql = mysqli_query($link,"SELECT *FROM sales ORDER by transaction_time ASC");
		for($a = 0 ; $a < $num_rows = mysqli_fetch_array($sql) ; $a++ )
			{
				$transaction_time = $num_rows['transaction_time'];;
				
			
				/////
				$fdate = date_create($transaction_time);
				date_add($fdate, date_interval_create_from_date_string('0 days'));
			
				$this->Cell(28,5,'Beginning date:',0,0,'R');
				$this->Cell(61,5,date_format($fdate, 'Y-m-d'),0,0,'L');
				
				/////
				$_SESSION['date'] = date_format($fdate, 'Y-m-d');
				
			break;
			
				
			}
		
			$sql = mysqli_query($link,"SELECT *FROM sales ORDER by transaction_time ASC");
			for($a = 0 ; $a < $num_rows = mysqli_fetch_array($sql) ; $a++ )
			{
				$transaction_time = $num_rows['transaction_time'];;
				
			
				/////
				$fdate2 = date_create($transaction_time);
				date_add($fdate2, date_interval_create_from_date_string('6 days'));
			
				$this->Cell(140,5,'End date:',0,0,'R');
				$this->Cell(20,5,date_format($fdate2, 'Y-m-d'),0,0,'R');
				
				$_SESSION['date1'] = date_format($fdate2, 'Y-m-d');
				/////
				
			break;
			
				
			}
		
	
		
		
		
		$this->Ln(10);
		$this->SetFont('Arial','B',13);
		$this->Cell(25,10,'Invoice #',1,0,'C');
		$this->Cell(40,10,'Product',1,0,'C');
		$this->Cell(43,10,'Description',1,0,'C');
		$this->Cell(20,10,'Price',1,0,'C');
		$this->Cell(15,10,'Qty',1,0,'C');
		$this->Cell(32,10,'Total Amount',1,0,'C');
		$this->Cell(50,10,'Cashier',1,0,'C');
		$this->Cell(50,10,'Transaction Time',1,0,'C');
		$this->Ln(10);
	
		
		$link = mysqli_connect('localhost','root','','pos');
	
		$sql = mysqli_query($link,"SELECT *FROM sales ORDER by transaction_time ASC");
		for($a = 0 ; $a < $num_rows = mysqli_fetch_array($sql) ; $a++ )
		{
			$invoice_number = $num_rows['invoice_number'];
			$purchase_name = $num_rows['purchase_name'];
			$product_description = $num_rows['product_description'];
			$product_price = $num_rows['product_price'];
			$quantity = $num_rows['quantity'];
			$total_amount = $num_rows['total_amount'];
			$cashier = $num_rows['cashier'];
			$transaction_time = $num_rows['transaction_time'];
			
			$transac_session =  $transaction_time;
			////////////////////////////////////////////////////////////////////////////////
			
			$first = $_SESSION['date'];
			$second = $_SESSION['date1'];
			
			$transac_session = strtotime($transac_session);
			//echo $paymentDate; // echos today! 
			$contractDateBegin = strtotime($first);
			$contractDateEnd = strtotime($second);
			///////////////////////////////////
			if (($transac_session >= $contractDateBegin) && ($transac_session <= $contractDateEnd))
			{
				$this->SetFont('Arial','',12);
				$this->Cell(25,10,$invoice_number,1,0,'C');
				$this->Cell(40,10,$purchase_name,1,0,'C');
				$this->Cell(43,10,$product_description,1,0,'C');
				$this->Cell(20,10,$product_price,1,0,'C');
				$this->Cell(15,10,$quantity,1,0,'C');
				$this->Cell(32,10,$total_amount,1,0,'C');
				$this->Cell(50,10,$cashier,1,0,'C');
				$this->Cell(50,10,$transaction_time,1,0,'C');
				$this->Ln(10);
			}
			else
			{
				
 			}
			
		}
	}
	function footer(){
		$this->SetY(-15);
		$this->SetFont('Arial','',8);
		$this->Cell(0,10,'Page'.$this->PageNo().'/{nb}',0,0,'C');
	}

}

$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);


$pdf->displaydate($db);
$pdf->displaydate2($db);

$pdf->headerTable();
$pdf->viewTable($db);

$pdf->Output("Weekly Sales Report",'I');

?>