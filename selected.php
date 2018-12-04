<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php include('config.php'); 



$id1=$_GET['id'];


//echo"<script>alert('".$id."')</script>";
$insert=mysqli_query($con,"UPDATE `interview` SET `status`='1' WHERE id='$id1'");





 
if($insert)
{

echo '<script>alert("Candidate was Approved")</script>';
echo '<script>window.location.href = "interview_list";</script>';

require_once('bin/class.phpmailer.php');

require("bin/class.smtp.php");  
$id1=$_GET['id'];
$tday = date('Y-m-d');
$chknum=mysqli_query($con,"SELECT * FROM `interview` WHERE id = '$id1' ");
$numrand=mysqli_fetch_array($chknum);
$fname=$numrand['email'];
$name=$numrand['c_name'];


 
$mail = new PHPMailer();

$name1 = "info@namasteji.co.in";
$email = "info@namasteji.co.in";
$message = 'Namsasteji Offer Letter';
$subject = 'Congratulations...!!!';
$pdfimage = 'pdfimage';
$body = '
<html>
	<head>
		<meta charset="utf-8">
		<title>Offer Letter Template | New Employee</title>
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

html { font: 16px/1 , sans-serif; overflow: auto; padding: 0.5in; }
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
    height: 100%;
    padding: 40px;
    border: 1px solid;

}
.sub1 {
    border: 2px solid black;
        height: 515px;
    padding: 0px;
}
h4.main_head {
    color: black;
    padding: 3px;
    text-align: center;
    font-size: 12px !important;
    font-weight: bold;
    line-height: 16px;
}
h2.heading_rec {
    text-align: center;
    font-weight: bold;
    font-size: 18px;
    padding-top: 0px;
    padding-bottom: 5px;
}
h5.pay_heading {
    text-align: left;
}
.p_h {
    padding: 36px;
    height: 60px;
    border-bottom: 2px solid;
}

.hh {
    border-bottom: 2px solid;
    height: 100px;
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

strong
{
	font-weight: bold;
}
h6.head_sub {
    font-size: 12px;
    font-weight: bold;
    text-align: center;
    line-height: 16px;
}
hr {
    display: block;
    margin-top: 1.5em;
    margin-bottom: 0.5em;
    margin-left: auto;
    margin-right: auto;
    border-style: inset;
    border-width: 1px;
}
h4.desc_fam {
    font-weight: bold;
    font-size: 15px;
    line-height: 20px;
    padding-top: 30px;
}
h5.desc {
    
    font-size: 14px;
    line-height: 28px;
    padding-top: 10px;
    text-align: justify;
}
.paragraph h5 {
    padding-top: 50px;
    padding-bottom: 22px;
    padding-left: 20px;
    padding-right: 20px;
}
.paragraph p {
    padding-bottom: 35px;
    padding-left: 20px;
    padding-right: 20px;
    text-align: justify;
    line-height: 35px;
}
.sub1 {
    height: 99%;
    padding: 0px;
}
</style>
	</head>
	<body>
			<div class="col-md-12">
				<div class="main" style="border: 1px solid black;padding-left:40px;padding-right:50px;padding-bottom:60px;">
				<div class="sub1">
				   	<div class="col-md-12">
							<h2 class="heading_rec" style="text-align:center;">PRITECH ENTERPRISE</h3>
							  <h4 class="main_head" style="text-align:center;">A-304, 3 RD FLOOR, HUBTOWN (GSRTC), NEAR ASTODIA GATE, GITA MANDIR,<br/>AHMEDABAD, GUJARAT – 380022</h4>
						<h4 class="main_head" style="text-align:center;" >E-mail: <a href="">info@pritechenterprise.com</a> | <a href="">pritech.enterprise@gmail.com</a><br/>Website: pritechenterprise.com</h4>
						</div>
				<hr>
					
				    
				    
				    <h2 class="heading_rec" style="padding-top:50px;text-align:center;">OFFER LETTER </h2>
				    
				    <h4 class="main_head">To,<br/>'   .$name.   '<br/>Ahmedabad</h5>
				    
				    <h4 class="main_head">Dear  ' .  $name.',</h5>
				    
				    <h4 class="main_head" style="text-align:justify;">With reference to your application and subsequent interview conducted at our Corporate Office. Management is pleased to appoint you as <strong>Developer</strong> to work in our organization, on a Yearly salary of Rs <strong>144000</strong>/- CTC as per rules.<br/>
This position is offered subject to satisfactory reference and pre-employment checks and completion of the six-month probationary period during which time your performance will be reviewed. Your joining date will be from _________, 2018 and you will be having your training of 15 days in which no salary will be provided to you. Your salary will be considered once you start your work on board after your training.<br/>
Kindly return the duplicate copy of this offer (enclosed herewith), duly signed, as a token of acceptance of this offer.<br/></h5>
 <h4 class="main_head">Thanks and Regards,</h5>
						
				 <h4 class="main_head">'.$name.'<br/>khushbu parikh</h5>
				
			</div>	
			</div>
	</body>
	
</html>';
 
$mail->IsSMTP(); 
$mail->SMTPSecure = "ssl";
 
$mail->Host  = "server1.namasteji.co.in"; 
$mail->Port = 465;
//$mail->SMTPAuth = true; 
$mail->Username='info@namasteji.co.in';
$mail->Password='admin@123';
$mail->From  =$email;
$mail->AddAddress($fname);

//$mail->AddAttachment('expirepass/'.$fname);
//$mail->AddAddress("$email");  
$mail->AddReplyTo($email);
$mail->Subject  = $subject;
$mail->Body     = $body;
$mail->IsHTML(true); 
$mail->WordWrap = 120;
if(!$mail->Send()) 
{
  //echo 'Message was not sent.';
 // echo 'Mailer error: ' . $mail->ErrorInfo;
} 
else {

  //echo 'mail send ok';
}

}
?>