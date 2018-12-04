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
        var saveDoc = $('#saveDoc');
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

        saveDoc.click(function (e) {
            e.preventDefault();
            var id = $('#update').val();
            if (id === '')
            {
                alert('Please Enter type');
                return;
            }
            var content = getContent();

            if (content === '') {
                alert('Please Enter Text');
                return;
            }

            var typeDoc = $('#typeDoc').val();
            $.ajax({
                url: 'server.php',
                method: 'POST',
                data: {
                    action: 'update',
                    id: id,
                    type: typeDoc,
                    content: content,
					status: status
                },
                dataType: 'json',
                success: function (d) {
                    console.log(d);
                    if (d.status === true) {
                        alert('successfully saved');
//                        window.location.reload();
                    } else {
                        alert('Error');
                    }
                    return true;
                },
                error: function (jqXHR, textStatus, errorThrown) {
//                    console.log(jqXHR);
//                    console.log(textStatus);
//                    console.log(errorThrown);
                    alert('something wrong');
                },
            });
            return false;
        });
		
		saveDoc.click(function (e) {
            e.preventDefault();
            var idd = $('#updated').val();
            if (idd === '')
            {
                alert('Please Enter type');
                return;
            }
            var content = getContent();

            if (content === '') {
                alert('Please Enter Text');
                return;
            }

            var typeDoc = $('#typeDoc').val();
            $.ajax({
                url: 'server.php',
                method: 'POST',
                data: {
                    action: 'update',
                    id: id,
                    type: typeDoc,
                    content: content,
					st: st
                },
                dataType: 'json',
                success: function (d) {
                    console.log(d);
                    if (d.status === true) {
                        alert('successfully saved');
//                        window.location.reload();
                    } else {
                        alert('Error');
                    }
                    return true;
                },
                error: function (jqXHR, textStatus, errorThrown) {
//                    console.log(jqXHR);
//                    console.log(textStatus);
//                    console.log(errorThrown);
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
    <select id="update" name="id">
        <option value="0">Select</option>
        <?php foreach ($option as $op): ?>
            <option value="<?= $op['id'] ?>"><?= $op['type'] ?></option>
        <?php endforeach; ?>
    </select>
	<br></br>
	<select value="Select Status" name="status" id="st">
	<option value="0">Select status</option>
	<option value="Applied">Applied</option>
	<option value="Pending">Pending</option>
	</select>
	<input type="submit" value=" Save as pdf" />
	</form>
    <br/> <br/>
    <button id="saveDoc">Save Changes</button>
    <!--    <button onclick="update()">Update It</button> <- For Update Content(html) into the editor
        <br>
        <button onclick="newDoc()">New</button> <- Make Blank for new Content(html)
        <br>
        <button id="saveDoc">Save</button> <- Get the value of Editor Content(html) <br/>
    
        <label>Enter Type</label> <br/>
        <input type="text" id="type">
        <br/><br/>-->
    <form method="post" action="somepage">
        <textarea name="content" style="width:100%"></textarea>
    </form>


</div>


 <?php include('footer.php'); ?>