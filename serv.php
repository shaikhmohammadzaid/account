<?php

// Connection 1

$link = mysqli_connect('localhost', 'namastej_acco', 'admin@123');  //edited out the access details for security
mysqli_select_db('namastej_acco', $link) or die("Can't connect to first database");



// Connection 2
$dBIP='XXXAddressOfSecondServerXXXX';
$dBADN='XXXXUserofSecondServerXXXX';
$dBPWD='XXXXPWofSecondServer';
$dBDBS="XXXXDBnameXXXX";

$CONNECTW=mysqli_connect($dBIP,$dBADN,$dBPWD);
mysqli_select_db($dBDBS, $CONNECTW)  or die("Can't connect to second database");;


$query = "SELECT t.entry_id, t.title, t.year, t.month, t.day, d.field_id_1, d.field_id_2, d.field_id_3 FROM sfi_db.exp_channel_titles t LEFT JOIN sfi_db.exp_channel_data d ON t.entry_id = d.entry_id WHERE d.field_id_5='Latest-Updates'";
$results=mysqli_query($query,$link); 
while($row=mysqli_fetch_row($results)){
    $id=$row[0];
    $title = $row[1];
    $year = $row[2];
    $month = $row[3];
    $day = $row[4];
    $summary = $row[5];
    $body = $row[6];
    $image = $row[7];


    mysqli_query("INSERT INTO $dBDBS.newsimport (id,title,year,month,day,summary,body,image_url) VALUES ('$id','$title','$year','$month','$day','$summary','$body','$image')",$CONNECTW);

    }
    
    ?>
    