
<?php



require 'autoload.php';
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\PrintBuffers\ImagePrintBuffer;
use Mike42\Escpos\GdEscposImage;

/* Open the printer; this will change depending on how it is connected */
$connector= new WindowsPrintConnector("XP-58C");
$printer = new Printer($connector);

/* Information for the receipt */
/*$items = array(
    new item("Rexona Women 5ml", "4.00"),
    new item("Wings 5ml", "3.50"),
    new item("Key Chain 10ml", "1.00"),
    new item("Woodlock 40ml", "4.45"),
);*/
$hostname="localhost";
$user="root";
$password="";
$database="pos";       


$link=mysqli_connect($hostname,$user,$password) or die ("Error Connection");
mysqli_select_db($link, $database) or die ("Error creating database");
$resultTransaction=mysqli_query($link, "SELECT * FROM transactions");
for($i=0; $i<$num_row=mysqli_fetch_array($resultTransaction);$i++){
$invoice=$num_row["transaction_id"];
$total=$num_row["total_amount"];
$payment=$num_row["payment"];
$change=$num_row["change"];
$cashier=$num_row["cashier"];
}
$result=mysqli_query($link, "SELECT * FROM cart where quantity != 0");

/* Date is kept the same for testing */
// $date = date('l jS \of F Y h:i:s A');


/* Start the printer */
$logo = EscposImage::load("resources/4.png");
$printer = new Printer($connector);

/* Print top logo */
$printer->setJustification(Printer::JUSTIFY_CENTER);
/* Print top logo */
$printer -> setJustification(Printer::JUSTIFY_CENTER);
$printer -> bitImageColumnFormat($logo);

/* Name of shop */
$printer -> selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
$printer -> text("Technology Hub.\n");
$printer -> selectPrintMode();
$printer -> text("");
$printer -> feed();

date_default_timezone_set("Asia/Hong_Kong");

// Prints something like: Monday 8th of August 2005 03:12:46 PM
$rr=date('l,F j,Y h:i a');
$acedate=date('l,F j,Y');
$acetime=date('h:i a');

/* Title of receipt */
$printer -> setEmphasis(true);
$printer -> text("SALES INVOICE\n");
$printer -> setEmphasis(false);
$printer -> selectPrintMode(Printer::JUSTIFY_LEFT);
$printer -> text("Invoice #: $invoice\n");
$printer -> text("Cashier: $cashier\n");
$printer -> selectPrintMode(Printer::JUSTIFY_LEFT);
$printer -> text("Date:$acedate\n");
$printer -> selectPrintMode(Printer::JUSTIFY_LEFT);
$printer -> text("Time:$acetime\n");
$printer -> text("================================\n");
$printer -> text("Purchases\n");
for($i=0; $i<$num_rows=mysqli_fetch_array($result);$i++){
$name=$num_rows["cart_name"];
$price=$num_rows["product_price"];
$description=$num_rows["cart_description"];
$quantity=$num_rows["quantity"];
$amount=$num_rows["total_amount"];
$printer -> setJustification(Printer::JUSTIFY_LEFT);
$printer -> text("$name  $description\n");
$printer -> text("     $price       $quantity     $amount\n");
$printer -> setJustification(Printer::JUSTIFY_LEFT);
}
/* Items
$printer -> setJustification(Printer::JUSTIFY_LEFT);
$printer -> setEmphasis(true);
$printer -> text(new item('', ''));
$printer -> setEmphasis(false);
}

//foreach ($items as $item) {
    //$printer -> text($item);
//} */


$printer -> text("\n");
$printer -> text("================================\n");
/* Tax and total */

$printer -> text("Total Amount:           $total\n");
$printer -> text("Payment Cash:           $payment\n");
$printer -> text("Change Due  :           $change\n");




/* Footer */
$printer -> feed();

$printer -> selectPrintMode();
$printer -> setJustification(Printer::JUSTIFY_CENTER);
$printer -> text("THIS SERVE AS YOUR PRODUCT\n");
$printer -> text("RECEIPT\n");
$printer -> feed();
$printer -> text("POS provider:\n");
$printer -> text("AKIAE Web-Based Solutions\n");
$printer -> text("Thank you for buying at\n");
$printer -> text("D'Courtyard Technology Hub\n");
$printer -> text("Come Again!\n");
$printer -> feed();
$printer -> text("\n\n");

/* Cut the receipt and open the cash drawer 
$printer -> cut();
$printer -> pulse();*/

$printer -> close();

    $update_query = "UPDATE sales SET invoice_number='$invoice' WHERE invoice_number=0";
    mysqli_query($link, $update_query);
    $turncateCart = "TRUNCATE TABLE cart";
    mysqli_query($link, $turncateCart) or die(mysql_error());
    $message = "Payment successfull!";
    echo "<script type='text/javascript'>alert('$message'); window.location.assign('pos.php')</script>";
/* A wrapper to do organise item names & prices into columns 
class item
{
    private $name;
    private $price;
    private $dollarSign;

    public function __construct($name = '', $price = '', $dollarSign = false)
    {
        $this -> name = $name;
        $this -> price = $price;
        $this -> dollarSign = $dollarSign;
    }

    public function __toString()
    {
        $rightCols = 10;
        $leftCols = 38;
        if ($this -> dollarSign) {
            $leftCols = $leftCols / 2 - $rightCols / 2;
        }
        $left = str_pad($this -> name, $leftCols) ;

        $sign = ($this -> dollarSign ? 'Php' : '');
        $right = str_pad($sign . $this -> price, $rightCols, ' ', STR_PAD_LEFT);
        return "$left$right\n";
    }
}*/
?>