<!DOCTYPE html>
<html lang="en">
<?php include 'session_destroyer.php'?>
<?php include 'links.php'?>
<?php include 'session_select.php'?>
<body>
    <?php
        if($access=='admin'){
    ?> 
		<div class="navigation">
			<center>
                <img src="img/logo.png">
             </center>
            <ul>
                <li class="active">
                    <a href="dashboard.php">
                        <i class="fa fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="product.php">
                        <i class="fa fa-shopping-bag"></i>
                        <span>Product</span>
                    </a>
                </li>
                <li>
                    <a href="#pagepeople" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-chart-bar"></i> <span>Sales Report</span><b class="caret" style="margin-left: 5%;"></b></a>
                    <ul class="collapse list-unstyled" id="pagepeople">
                        <li class="sales-report-list">
                            <a href="sales_report.php">View all Sales</a>
                        </li>
                        <li class="sales-report-list">
                            <a href="cashier_daily_sales.php">Cashier Daily Sales</a>
                        </li>
                        <li class="sales-report-list">
                            <a href="view_invoices.php">Invoices</a>
                        </li>
                        <li class="divider"></li>
                    </ul>
                </li>
                <li>
                    <a href="employee.php">
                        <i class="fa fa-users"></i>
                        <span>Employee</span>
                    </a>
                </li>
            </ul>
		</div>
    <?php
        }else if($access=='employee'){
    ?>
        <div class="navigation">
            <center>
                <img src="img/logo.png">
             </center>
            <ul>
                <li class="active">
                    <a href="dashboard.php">
                        <i class="fa fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="pos.php">
                        <i class="fa fa-th"></i>
                        <span>POS</span>
                    </a>
                </li>
                <li>
                    <a href="product.php">
                        <i class="fa fa-shopping-bag"></i>
                        <span>Product</span>
                    </a>
                </li>
            </ul>
        </div>
    <?php } ?>
    <?php include 'header.php' ?>
    <div class="main-content">
        <span style="font-size: 22px;"><i class="fas fa-tachometer-alt"></i> Dashboard</span>
        <hr>
        <?php if($access=='admin'){ ?>
         <a href="product.php"><div class="dashboard-squares">
            <div class="dashboard-squares-icon">
                <i class="fa fa-shopping-bag"></i> 
            </div>
            <div class="dashboard-squares-content">
                <?php
                    date_default_timezone_set('Asia/Manila');
                    $date = date('Y-m-d', time());
                    $query = "SELECT count(product_id) as result FROM product ";
                    $result = mysqli_query($link, $query) or die(mysql_error());
                    $row = mysqli_fetch_array($result);
                        echo "<center><h5>Total products</h5></center>";
                        echo "<span style='float: right;'>".$row['result']."</span>";
                ?>
            </div>
        </div></a>
        <a href="cashier_daily_sales.php"><div class="dashboard-squares">
            <div class="dashboard-squares-icon">
                <i class="fa fa-chart-bar"></i>
            </div>
            <div class="dashboard-squares-content">
                <?php
                    $query = "SELECT count(sales_id) as result FROM sales where DATE(transaction_time) = CURDATE()";
                    $result = mysqli_query($link, $query) or die(mysql_error());
                    $row = mysqli_fetch_array($result);
                        echo "<center><h5>Daily Sales Report</h5></center>";
                        echo "<span style='float: right;'>".$row['result']."</span>";
                ?>
            </div>
        </div></a>
        <div class="dashboard-squares">
            <div class="dashboard-squares-icon">
                <i class='fa fa-shopping-cart'></i> 
            </div>
            <div class="dashboard-squares-content">
                <?php
                    $query = "SELECT Sum(total_amount) as result FROM transactions";
                    $result = mysqli_query($link, $query) or die(mysql_error());
                    $row = mysqli_fetch_array($result);

                    ?>
                    <center><h5>Total Sales</h5></center>
                    <?php
                    if($row['result']==0){
                    ?>
                    <span style='float: right;'>₱ 0.00</span>
                    <?php
                    }else{
                    ?>
                    <span style='float: right;'>₱ <?php echo $row['result'];?></span>
                    <?php
                    }
                ?>
            </div>
        </div>
        <?php }else if($access=='employee'){ ?>
        <a href="product.php"><div class="dashboard-squares-employee">
            <div class="dashboard-squares-icon">
                <i class="fa fa-shopping-bag"></i> 
            </div>
            <div class="dashboard-squares-content">
                <?php
                    date_default_timezone_set('Asia/Manila');
                    $date = date('Y-m-d', time());
                    $query = "SELECT count(product_id) as result FROM product ";
                    $result = mysqli_query($link, $query) or die(mysql_error());
                    $row = mysqli_fetch_array($result);
                        echo "<center><h5>Total products</h5></center>";
                        echo "<span style='float: right;'>".$row['result']."</span>";
                ?>
            </div>
        </div></a>
         <a href="cashier_view_daily_sales.php"><div class="dashboard-squares-employee">
            <div class="dashboard-squares-icon">
                <i class="fa fa-chart-bar"></i>
            </div>
            <div class="dashboard-squares-content">
                <?php
                    $query = "SELECT count(sales_id) as result FROM sales where DATE(transaction_time) = CURDATE() and cashier = '$cashier'";
                    $result = mysqli_query($link, $query) or die(mysql_error());
                    $row = mysqli_fetch_array($result);
                        echo "<center><h5>Daily Sales Report</h5></center>";
                        echo "<span style='float: right;'>".$row['result']."</span>";
                ?>
            </div>
        </div></a>
        <?php } ?>

            
    </div>
    <?php include 'footer_links.php' ?>
	</body>
</html>