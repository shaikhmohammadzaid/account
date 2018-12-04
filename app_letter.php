<?php include('header.php'); ?>
<?php include('sidebar.php'); 

?>
<script>
    $(document).ready(
            function () {
                $("#add_report").click(function () {
                    $("#report_form").fadeToggle();
                });
            });
    $(document).ready(
            function () {
                $("#view_meeting").click(function () {
                    $("#view_form").fadeToggle();
                });
            });
</script>




<link rel="stylesheet" type="text/css" media="all" href="jsDatePick_ltr.min.css" />
<!-- 
        OR if you want to use the calendar in a right-to-left website
        just use the other CSS file instead and don't forget to switch g_jsDatePickDirectionality variable to "rtl"!
        
        <link rel="stylesheet" type="text/css" media="all" href="jsDatePick_ltr.css" />
-->
<script type="text/javascript" src="jsDatePick.min.1.3.js"></script>
<!-- 
        After you copied those 2 lines of code , make sure you take also the files into the same folder :-)
    Next step will be to set the appropriate statement to "start-up" the calendar on the needed HTML element.
    
    The first example of Javascript snippet is for the most basic use , as a popup calendar
    for a text field input.
-->
<script type="text/javascript">
    window.onload = function () {
        new JsDatePick({
            useMode: 2,
            target: "inputField",
            dateFormat: "%d-%M-%Y"
                 
        });
    };
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#example-1').timeselect({
            'step': 15,
            autocompleteSettings: {
                autoFocus: true
            }
        });

        $('#example-2').timeselect({
            'step': 15,
            'maxResults': 5,
            autocompleteSettings: {
                autoFocus: true
            }
        });

        $('#example-3').timeselect({
            'step': 15,
            'format': 'HH:mm',
            autocompleteSettings: {
                autoFocus: true
            }
        });
    });
</script>
<style>
    .a{
        padding-left:600px;	

    }
</style>	





</div><!--/row-->

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-user"></i> File Management</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>

                </div>




            </div>

        </div>
        

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


        var saveDoc = $('#saveDoc');

        saveDoc.click(function (e) {
            e.preventDefault();

            var content = getContent();

            if (content === '') {
                alert('Please Enter Text');
                return;
            }

            var typeDoc = $('#typeDoc').val();

            if (typeDoc === '')
            {
                alert('Please Enter Latter Type');
                return;
            }
			
			var typeBranch = $('#typeBranch').val();

            if (typeBranch === '')
            {
                alert('Please Enter Branch Names');
                return;
            }
			
			var typeto = $('#typeto').val();

            if (typeto === '')
            {
                alert('Please Enter Correact Email Id');
                return;
            }
			
			var typesubject = $('#typesubject').val();

            if (typesubject === '')
            {
                alert('Please Enter Branch Names');
                return;
            }
			
            $.ajax({
                url: 'server.php',
                method: 'POST',
                data: {
                    action: 'new',
                    type: typeDoc,
					content: content,
				    typeBranch: typeBranch,
					typeto: typeto,
					typesubject: typesubject,
                },
                dataType: 'json',
                success: function (d) {
//                    console.log(d);
                    if (d.status === true) {
                        alert('successfully saved');
                        window.location.reload();
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

    <h1></h1>
    <a href="show_latter.php">Show all latter</a><br/>
    <input type="text" id="typeDoc" value="" placeholder="Latter Name">
	<input type="text" id="typeBranch" value="" placeholder="Branch Name">
	<input type="email" id="typeto" value="" placeholder="Send To" >
	<input type="text" id="typesubject" value="" placeholder="Subject">
    <br/> <br/>
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

    <button id="saveDoc">Save Changes</button>


</div>


        <!--/span-->

    </div><!--/row-->

    <!--Add Contact Model -->


    <!--Model End-->






 <?php include('footer.php'); ?>