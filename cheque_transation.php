<html>
	<head>
		<meta charset="utf-8">
		<title>Invoice</title>
		<style>
		/* reset */

*
{
	border: 0;
	box-sizing: content-box;
	color: inherit;
	font-family: inherit;
	font-size: inherit;
	font-style: inherit;
	font-weight: inherit;
	line-height: inherit;
	list-style: none;
	margin: 0;
	padding: 0;
	text-decoration: none;
	vertical-align: top;
}

/* content editable */

*[] { border-radius: 0.25em; min-width: 1em; outline: 0; }

*[] { cursor: pointer; }

*[]:hover, *[]:focus, td:hover *[], td:focus *[], img.hover { background: #DEF; box-shadow: 0 0 1em 0.5em #DEF; }

span[] { display: inline-block; }

/* heading */

h1 { font: bold 100% sans-serif; letter-spacing: 4px; text-align: center; text-transform: uppercase; }

/* table */

table { font-size: 75%; table-layout: fixed; width: 100%; }
table { border-collapse: separate; border-spacing: 2px; }
th, td { border-width: 1px; padding: 0.5em; position: relative; text-align: left; }
th, td { border-radius: 0.25em; border-style: solid; }
th { background: #EEE; border-color: #BBB; }
td { border-color: #DDD; }

/* page */

html { font: 16px/1 'Open Sans', sans-serif; overflow: auto; padding: 0.5in; }
html { background: #999; cursor: default; }

body { box-sizing: border-box; height: 13in; margin: 0 auto; overflow: hidden; padding: 0.5in; width: 8.5in; }
body { background: #FFF; border-radius: 1px; box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5); }

/* header */

header { margin: 0 0 0em; }
header:after { clear: both; content: ""; display: table; }

header h1 { background: #000; border-radius: 0.25em; color: #FFF; margin: 0 0 1em; padding: 20px 0; }
header address { float: left; font-size: 75%; font-style: normal; line-height: 1.25; margin: 0 1em 1em 0; }
header address p { margin: 0 0 0.25em; }
header span, header img { display: block; float: right; }
header span { margin: 0 0 1em 1em; max-height: 25%; max-width: 60%; position: relative; }
header img { max-height: 100%; max-width: 100%; }
header input { cursor: pointer; -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)"; height: 100%; left: 0; opacity: 0; position: absolute; top: 0; width: 100%; }

/* article */

article, article address, table.meta, table.inventory { margin: 0 0 3em; }
article:after { clear: both; content: ""; display: table; }
article h1 { clip: rect(0 0 0 0); position: absolute; }

article address { float: left; font-size: 125%; font-weight: bold; }

/* table meta & balance */

table.meta, table.balance { float: right; width: 36%; }
table.meta:after, table.balance:after { clear: both; content: ""; display: table; }

/* table meta */

table.meta th { width: 40%; }
table.meta td { width: 60%; }

/* table items */

table.inventory { clear: both; width: 100%; }
table.inventory th { font-weight: bold; text-align: center; }

table.inventory td:nth-child(1) { width: 26%; }
table.inventory td:nth-child(2) { width: 38%; }
table.inventory td:nth-child(3) { text-align: right; width: 12%; }
table.inventory td:nth-child(4) { text-align: right; width: 12%; }
table.inventory td:nth-child(5) { text-align: right; width: 12%; }

/* table balance */

table.balance th, table.balance td { width: 50%; }
table.balance td { text-align: right; }

/* aside */

aside h1 { border: none; border-width: 0 0 1px; margin: 0 0 1em; }
aside h1 { border-color: #999; border-bottom-style: solid; }

/* javascript */

.add, .cut
{
	border-width: 1px;
	display: block;
	font-size: .8rem;
	padding: 0.25em 0.5em;	
	float: left;
	text-align: center;
	width: 0.6em;
}

.add, .cut
{
	background: #9AF;
	box-shadow: 0 1px 2px rgba(0,0,0,0.2);
	background-image: -moz-linear-gradient(#00ADEE 5%, #0078A5 100%);
	background-image: -webkit-linear-gradient(#00ADEE 5%, #0078A5 100%);
	border-radius: 0.5em;
	border-color: #0076A3;
	color: #FFF;
	cursor: pointer;
	font-weight: bold;
	text-shadow: 0 -1px 2px rgba(0,0,0,0.333);
}

.add { margin: -2.5em 0 0; }

.add:hover { background: #00ADEE; }

.cut { opacity: 0; position: absolute; top: 0; left: -1.5em; }
.cut { -webkit-transition: opacity 100ms ease-in; }

tr:hover .cut { opacity: 1; }

@media print {
	* { -webkit-print-color-adjust: exact; }
	html { background: none; padding: 0; }
	body { box-shadow: none; margin: 0; }
	span:empty { display: none; }
	.add, .cut { display: none; }
}

@page { margin: 0; }
.col-md-6 {
    width: 49%;
    float: left;
    border: 1px solid #000;
    margin-right: 5px;
	    height: 850px;
}
.row {
    width: 100%;
    float: left;
    margin-bottom: 30px;
}
.text-center {
    text-align: center;
    padding: 10px;
    font-weight: bolder;
    font-size: 19px;
    background: lightgray;
    border: 1px solid #000;
}
.col-md-2
{
	width:20%;
	float:left;
}
.col-md-10
{
	width:80%;
	float:left;
}
.col-md-8
{
	width:70%;
	float:left;
}
.col-md-4
{
	width:30%;
	float:left;
}
.col-md-3
{
	width:25%;
	float:left;
}
</style>
	</head>
<?php 
include('config.php');
session_start();
if(isset($_POST['submit']))
{
	$c_id = $_SESSION['c_id'];
	$tdate=$_POST['date'];
}

include('breport.php');
$dt = date('Y-m-d');
?>
	<body>
		<header>
			<p style="text-align:center;font-weight:bold;margin-bottom: 10px;">$ SHREE AADISHVARAY NAMAH $</p>
			<div class="col-md-2">
			<img alt="" src="images/logo.png" style="height: 50px;width: 120px;margin-right: 15px;">
			</div>
			<div class="col-md-10">
			<h1>Shree Padmavati Online Services Pvt. Ltd.</h1>
			</div>
		</header>
		<div class="row">
			<h1>Cheque Transaction Report</h1>
		</div>
		<div class="row">
			
			
		
			<div class="col-md-12">
				<p style="border-bottom: 1px solid #000;padding-bottom: 8px;text-align: center;">Date :  <?php echo $tdate; ?></p>
			</div>
		</div>
		<article>
			<div class="row">
				<div class="col-md-12">
					<h3 class="text-center">Cheque Transaction</h3>
					<table class="inventory">
						<thead>
							<tr>
							    <th><span >Date</span></th>
								<th><span >Cheque No</span></th>
									<th><span >Bank Name</span></th>
								<th><span >Name</span></th>
								<th><span >Description</span></th>
								<th><span >Amount</span></th>
							    
								
							</tr>
						</thead>
						<tbody>

									<?php
								     echo"<script>alert('".$c_id."')</script>";
								 	$resulty7=mysqli_query($con,"select * from cash_voucher2 WHERE ptype='cheque' AND dte = '$tdate' AND c_name='$c_id'  " );
								while($contacty7=mysqli_fetch_array($resulty7)){
							
													?>
													
							<tr>

								<td><span data-prefix></span><span style="word-break: break-all;"></span><?php
								
							
								
							echo  $mona= $contacty7['dte']; ?></td>
							
							
								<td><span data-prefix></span><span style="word-break: break-all;"></span><?php
								
								echo  $mona1 = $contacty7['check_no'];
								
						?></td>
							<td><span data-prefix></span><span style="word-break: break-all;"></span><?php
								
								  $mona1 = $contacty7['check_no'];
								  
								  
					$resultyrb=mysqli_query($con,"select * from chaquebook  WHERE qrcode ='$mona1'" );
                    $contactyrb=mysqli_fetch_array($resultyrb);
						
						 $m = $contactyrb['bank_id'];
						
							$resultyrbq=mysqli_query($con,"select * from bank  WHERE id ='$m'" );
                    $contactyrbq = mysqli_fetch_array($resultyrbq);
						
					  $mk = $contactyrbq['bank_name'] ;
						  $mkqe = $contactyrbq['ac_number'] ; ?>
					<?php echo $mk; ?> 
				   </br>
					 <?php echo $mkqe; ?> 
						</td>
						
						
							<td><span data-prefix></span><span style="word-break: break-all;"></span><?php
								
								echo  $mona1 = $contacty7['sname'];
								
						?></td>
						
							<td><span data-prefix></span><span style="word-break: break-all;"></span><?php
								
								echo  $mona1 = $contacty7['d_name'];
								
						?></td>
						
							<td><span data-prefix></span><span style="word-break: break-all;"></span><?php
								
								echo  $mona1 = $contacty7['amount'];
								
						?></td>
						
						
						
						
					
								</tr>
							<?php 
								    
								}	
								
								?>
							
							
							
								
									
									
								
								
								
									
								
							
						</tbody>
					</table>
					
						<span data-prefix></span><span style="word-break: break-all;"></span><?php
								
									 $sql111 =mysqli_query($con,"SELECT SUM(amount) AS value_sum FROM cash_voucher2 WHERE ptype='cheque' AND dte = '$tdate' AND c_name='$c_id'  ");  
    
  	$ro = mysqli_fetch_assoc($sql111); 
  $s[]  =$ro['value_sum']; 
  
  
   $rv=array_sum($s);
								
						?>
									
					
					<div class="col-md-12">
					<h3 class="text-center">Total Amount :- <?php  echo $rv;   ?></h3>
					</div
					
				</div>
				
			</div>
		</article>
		<aside>
			<div class="col-md-2">
				<p>Prepared by</p>
			</div>
			<div class="col-md-2">
				<p>Operator By</p>
			</div>
			<div class="col-md-2">
				<p>Authorized by</p>
			</div>
			<div class="col-md-2">
				<p>Account Manager</p>
			</div>
			<div class="col-md-2">
				<p>Audited by</p>
			</div>
		</aside>
	</body>
</html>