<?php include('header.php'); ?>
<?php include('sidebar.php'); 

?>
<?php
$onpage = true;
require_once './server.php';

$class = new TransactionDemo();



$option = $class->getOptions();

//print_r($option);
?>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script type="text/javascript">
    tinymce.init({
        selector: "textarea",
        height: 500,
//        width: 600,
        plugins: [
            "advlist autolink lists link image charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu  print",
        ],
        toolbar: 'fontsizeselect',
        fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt'
//        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
    });



    //get Html from database or else
    function getHtml()
    {
        return "<h1 style='text-align: center;'><strong>Appointment</strong></h1>" +
                "<p style='text-align: justify;'><strong>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</strong></p>";
    }



    //For Update Value With Derived from Database or else;
    function updateDoc(html)
    {
        return tinyMCE.activeEditor.setContent(html);
    }



    //For Create New Doc Editor shuld be blank
    function newDoc()
    {
        return tinyMCE.activeEditor.setContent('')
    }


    //Get the created content from editor and save in database or else;
    function getContent()
    {
        var content = tinyMCE.activeEditor.getContent();

        return content;
//        if (content === '') {
//            alert('Please Enter Text');
//            return;
//        }
//        alert(content);
//        return;
    }


    $(document).ready(function () {

        var update = $('#update');
      
		var updated = $('#updated');
        update.change(function (e) {
            e.preventDefault();
            var id = $(this).val();

            if (id == 0)
            {
                alert('Please Select type of latter');
                newDoc();
                return;
            }
			
		

            $.ajax({
                url: 'server.php',
                method: 'POST',
                data: {
                    action: 'get',
                    id: id
                },
                dataType: 'json',
                success: function (data) {
//                    console.log(data.data);
                    if (data.status === true) {
                        updateDoc(data.data.html);
                        $('#typeDoc').val(data.data.type);
                    } else {
                        alert('Error');
                    }
                    return true;
                },
                error: function () {
                    alert('something wrong');
                },
            });
            return false;
        });


        var saveDoc = $('#saveDoc');

        saveDoc.click(function (e) {
            e.preventDefault();

            var content = getContent();

            if (content === '') {
                alert('Please Enter Text');
                return;
            }

           
			
			var typeto = $('#typeto').val();

            if (typeto === '')
            {
                alert('Please Enter Correact Email Id');
                return;
            }
			
		
			
            $.ajax({
                url: 'server1.php',
                method: 'POST',
                data: {
                    action: 'new',
                   
					content: content,
				
					typeto: typeto,
				
                },
                dataType: 'json',
                success: function (d) {
//                    console.log(d);
                    if (d.status === true) {
                        alert('successfully saved');
                        
                    } else {
                        alert('Error');
                    }
                    return true;
                },
                error: function () {
                    alert('something wrong');
                },
            });
            return false;
        });

    });


</script>

<div style="width: 60%;margin:auto;">

   
	  
    <a href="app_latter.php">Make new latter</a><br/>
	
	<form method="Post" action="latter_pdf.php">
	
    <input type="hidden" id="typeDoc" value="">
    
    	<div class="form-group row">
											
											
    <select id="update" name="id">
        <option value="0">Select</option>
        <?php foreach ($option as $op): ?>
            <option value="<?= $op['id'] ?>"><?= $op['type'] ?></option>
        <?php endforeach; ?>
    </select>
    </div>
    

	<input type="submit" value=" Save as pdf" />
	</form>
    <br/> <br/>
    <!--    <button onclick="update()">Update It</button> <- For Update Content(html) into the editor
        <br>
        <button onclick="newDoc()">New</button> <- Make Blank for new Content(html)
        <br>
        <button id="saveDoc">Save</button> <- Get the value of Editor Content(html) <br/>
    
        <label>Enter Type</label> <br/>
        <input type="text" id="type">
        <br/><br/>-->
        		<div ng-app="myApp" ng-controller="myCtrl">
        		    
											<select  id="typeto[]" ng-model="name"  class="select2 m-b-10 select2-multiple" multiple="multiple"  data-placeholder="Choose">
											
											<?php
											$resultab=mysqli_query($con,"select * from sales_module");
											while($contactab=mysqli_fetch_array($resultab))
											
											{
											?>
											<option value="<?php echo $contactab['e_mail']; ?>"><?php echo $contactab['c_name']; ?></option>
											<?php } ?>
												
												</select>

        <h2  ng-model="nameee">To: {{name}}</h2>
    <form method="post" action="somepage">
        <textarea name="content" style="width:100%" ng-bind="nameee">
  
    </textarea>
    </form>
      <button id="saveDoc">Save Changes</button>
</div>
</div>
<script>

var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope) {
    $scope.name = "hiii";
      $scope.nameee = "Process";
       $scope.today = new Date();
});
</script>


 <?php include('footer.php'); ?>