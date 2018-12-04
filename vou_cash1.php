
<html>
	<head>
		<meta charset="utf-8">
		<title>Invoice</title>
		<style>
		/* reset */
<?php

error_reporting(0);
?>
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

body { box-sizing: border-box; height: 11in; margin: 0 auto; overflow: hidden; padding: 0.5in; width: 8.5in; }
body { background: #FFF; border-radius: 1px; box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5); }

/* header */

header { margin: 0 0 1em; }
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
.col-md-8 {
    width: 80%;
    float: left;	   
}
.row {
    width: 100%;
    float: left;
    
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
	width:66.66%;
	float:left;
}
.col-md-4
{
	width:33.3%;
	float:left;
}
.col-md-3
{
	width:25%;
	float:left;
}
.logo_cl {
    height: 55px;
    border: 1px solid;
}
h1.main_head {
    height: 18px;
    padding: 15px;
    background: lightgray;
    border: 1px solid;
    margin-top: -32px;
}
.op_name {
    width: 70%;
    float: left;
    border: 1px solid;
}
.op_name1 {
    width: 29%;
    border: 1px solid;
    float: left;
}
.main {
    border: 2px solid black;
    
     height: 520px;;
	    padding: 10px;
}
.sub1 {
    border: 2px solid black;
        height: 515px;
    padding: 0px;
}
.logo_l {
    border-right: 1px solid;
    padding: 10px;
    height: 68px;
}
h2.main_head {
    background: #465ea9;
    color: white;
    padding: 15px;
    text-align: center;
    font-size: 22px;
}
h1.bra {
    float: left;
    padding: 10px;
}
h3.heading_rec {
    text-align: center;
    font-weight: bold;
    background: #ed1e24;
    padding: 10px;
    border-bottom: 2px solid black;
    border-top: 2px solid black;
	color: white;
}
h5.pay_heading {
    text-align: left;
}
.p_h {
    padding: 36px;
    height: 60px;
    border-bottom: 2px solid;
}
.logo_l2 {
    padding: 20px;
    border-right: 2px solid;
}
.logo_l5 p {
    text-align: center;   
    margin: 0 auto;
	line-height:28px;
}
.hh {
    border-bottom: 2px solid;
    height: 100px;
}
.logo_l4 {
    border-top: 2px solid;
}
h2.main_head2 {
    text-align: center;
    padding-top: 12px;
    font-size: 18px;
    font-weight: bolder;
}
h5.pay_heading1 {
    padding: 12px;
    font-size: 18px;
    font-weight: bold;
}
.logo_l5 {
    border-right: 2px solid;
	    height: 160px;
}
.hh1 {
    height: 160px;
    border-bottom: 2px solid;
}
h2.main_head3 {
    padding-top: 9px;
    font-size: 20px;
    font-weight: bold;
}
.hh3 {
    height: 40px;
    border-bottom: 2px solid black;
}
h2.pay_heading66 {
    padding: 25px;
    font-size: 18px;
    font-weight: bold;
    
}
.logo_22 {
    padding-top: 20px;
    padding-left: 37px;
}

.logo_l6 h1 {
    margin-top: 70px;
    font-size: 25px;
    padding-left: 12px;
}
strong
{
	font-weight: bold;
}
</style>
	</head>
<?php 
include('config.php');
session_start();
$id=$_GET['id'];
$selectcka=mysqli_query($con,"SELECT * FROM `cash_voucher1` WHERE id='$id'");
$rowcka=mysqli_fetch_array($selectcka);

$dc = $rowcka['id'];
$uid = $rowcka['pname'];

$sid = $_SESSION['id'];
$selectckad=mysqli_query($con,"SELECT * FROM `cash_voucher1` WHERE id='$sid'");
$rowckad=mysqli_fetch_array($selectckad);

$cid=$_GET['cid'];
$selectckab=mysqli_query($con,"SELECT * FROM `cash_voucher1` WHERE id='$cid'");
$rowckab=mysqli_fetch_array($selectckab);

$selectckas=mysqli_query($con,"SELECT * FROM `cash_voucher1`");
$rowckas=mysqli_fetch_array($selectckas);
$sid = $rowcka['login'];

$selectckas1=mysqli_query($con,"SELECT * FROM `tem_emp` where id='$uid'");
$rowckas1=mysqli_fetch_array($selectckas1);
$sid1 = $rowckas1['name'];
function convertNumberToWord($num = false)
{
    $num = str_replace(array(',', ' '), '' , trim($num));
    if(! $num) {
        return false;
    }
    $num = (int) $num;
    $words = array();
    $list1 = array('', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven',
        'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'
    );
    $list2 = array('', 'ten', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety', 'hundred');
    $list3 = array('', 'thousand', 'million', 'billion'
    );
    $num_length = strlen($num);
    $levels = (int) (($num_length + 2) / 3);
    $max_length = $levels * 3;
    $num = substr('00' . $num, -$max_length);
    $num_levels = str_split($num, 3);
    for ($i = 0; $i < count($num_levels); $i++) {
        $levels--;
        $hundreds = (int) ($num_levels[$i] / 100);
        $hundreds = ($hundreds ? ' ' . $list1[$hundreds] . ' hundred' . ( $hundreds == 1 ? '' : 's' ) . ' ' : '');
        $tens = (int) ($num_levels[$i] % 100);
        $singles = '';
        if ( $tens < 20 ) {
            $tens = ($tens ? ' ' . $list1[$tens] . ' ' : '' );
        } else {
            $tens = (int)($tens / 10);
            $tens = ' ' . $list2[$tens] . ' ';
            $singles = (int) ($num_levels[$i] % 10);
            $singles = ' ' . $list1[$singles] . ' ';
        }
        $words[] = $hundreds . $tens . $singles . ( ( $levels && ( int ) ( $num_levels[$i] ) ) ? ' ' . $list3[$levels] . ' ' : '' );
    }
    $commas = count($words);
    if ($commas > 1) {
        $commas = $commas - 1;
    }
    $data= implode(' ', $words);
	return $data." ".'only';
}
?>
	<body>
			<div class="col-md-12">
				<div class="main">
					<div class="sub1">
						<div class="col-md-2">
							<div class="logo_l">
								<img alt="" src="images/logo.png" style="height: 55px;width: 120px;">
							</div>
						</div>
						<div class="col-md-10">
							<h2 class="main_head">Shree Padmavati Online Services Pvt. Ltd.</h2>
							<h1 class="bra">Branch : GEETA MANDIR AHMEDABAD</h1>
						</div>
					<div class="receipt">
						<div class="row">
						<div class="col-md-4">
							 <h3 class="heading_rec"> Trader Type: <?php echo $rowcka['v_for']; ?></h3>
							</div>
							<div class="col-md-4">
							<h3 class="heading_rec">CASH RECEIPT VOUCHER</h3>
							</div>
							<div class="col-md-4">
							<h3 class="heading_rec">Date: <?php echo $rowcka['dte']; ?></h3>
							</div>
						</div>
					</div>
					<div class="row">
						 <div class="hh">
								<div class="col-md-8">
									<div class="logo_l2">
										
										 <h5 class="pay_heading"> <strong>Name: </strong> <span style=" border-bottom: 2px dotted black; padding-bottom: 5px;">
										        <?php echo $sid1; ?> </span></h5>
									</div>
								</div>
								<div class="col-md-4">
									<div class="logo_l3" style="margin-top: -4px;padding: 21px;">
										<h2 class="main_head1">V.no.: <?php echo $rowcka['voucher_no']; ?></h2> 
									</div>	
									<div class="logo_l4">
										<h2 class="main_head2">Amount Rs</h2>
									</div>
									
								</div>
						</div>
					</div>
					<div class="row">
							<div class="hh1">
										<div class="col-md-8">
											<div class="logo_l5">
												 <h5 class="pay_heading1"> Being amount Paid for</h5><br>
												 <p><strong><?php echo $rowcka['amount']; ?></strong>  
												
											</div>
										</div>
										<div class="col-md-2">
											<div class="logo_l6">
												<h1><?php echo $rowcka['amount']; ?> /- </h1>
											</div>
											
										</div>
							</div>
					</div>
					<div class="row">
						<div class="hh3">
								<div class="col-md-8">
									<div class="logo_20">
										 <h5 class="pay_heading66" style="
    padding-top: 10px;
    padding-left: 10px;
"><strong>Rupees:</strong> <?php echo convertNumberToWord($rowcka['amount']); ?></h5><br>
										
									</div>
								</div>
								<div class="col-md-3">
									<div class="logo_21">
										<h2 class="main_head3">Total:  <?php echo $rowcka['amount']; ?> /- </h2>
									</div>
									
								</div>
						</div>
					</div>
				
					<div class="row">
						<div class="hh5">
								<div class="col-md-3">
									<div class="logo_22">
											<p style="
    margin-bottom: 20px;
"><?php echo $rowcka['contact_person']; ?></p>
										 <h5 class="pay_heading3">Operator</h5><br>
										
									</div>
								</div>
								<div class="col-md-2">
									<div class="logo_22">
									<p style="
    margin-bottom: 20px;
"></p>
										<h2 class="pay_heading3">Authorized By</h2>
									</div>
									
								</div>
								<div class="col-md-3">
									<div class="logo_22">
									<p style="
    margin-bottom: 20px;
"></p>
										<h2 class="pay_heading3">Audited By</h2>
									</div>
									
								</div>
								<div class="col-md-3">
									<div class="logo_22">
										<p style="margin-bottom: 20px;">SPOSPL</p>
										<h2 class="pay_heading3">Receiver By</h2>
									</div>
									
								</div>
						</div>
						</div>
						    
						
					
				</div>
			</div>	
	</body>
	
</html>