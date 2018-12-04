<?php
//load the database configuration file
include 'dbConfig.php';

if(!empty($_GET['status'])){
    switch($_GET['status']){
        case 'succ':
            $statusMsgClass = 'alert-success';
            $statusMsg = 'Members data has been inserted successfully.';
            break;
        case 'err':
            $statusMsgClass = 'alert-danger';
            $statusMsg = 'Some problem occurred, please try again.';
            break;
        case 'invalid_file':
            $statusMsgClass = 'alert-danger';
            $statusMsg = 'Please upload a valid CSV file.';
            break;
        default:
            $statusMsgClass = '';
            $statusMsg = '';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Import CSV File Data into MySQL Database using PHP by CodexWorld</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
    .panel-heading a{float: right;}
  </style>
</head>
<body>

<div class="container">
    <h2>Go to site <a href="index">Click Here</a></h2>
    <?php if(!empty($statusMsg)){
        echo '<div class="alert '.$statusMsgClass.'">'.$statusMsg.'</div>';
    } ?>
    <div class="panel panel-default">
        <div class="panel-body">
            <form action="csv.php" method="post" enctype="multipart/form-data">
                <input type="file" name="file" />
				
                <input type="submit" class="btn btn-primary" name="importSubmit" value="IMPORT">
            </form>
        </div>
    </div>
</div>

</body>
</html>