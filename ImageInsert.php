<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Image Upload</title>

    <style>

 body { 

 	background: url(imgs/imageInsertGUI3.jpeg) no-repeat center center fixed ; 

  	-webkit-background-size: cover;

  	-moz-background-size: cover;

  	-o-background-size: cover;

  	background-size: cover;
  }     


  </style>
  </head>
  <body>
  	<nav  class="navbar navbar-expand-lg navbar-light" style="background-color:#FA6405;">
  <a class="navbar-brand" href="index.php" style="color: white;"><b>EBSB</b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      
      <li class="nav-item active">
        <a class="nav-link" href="index.php" style="color: white">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Events.php" style="color: white">Events</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="imageGallery.php" style="color: white">Image Gallery</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="VideoGallery.php" style="color: white">Video Gallery</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="ImageInsert.php" style="color: white">Upload</a>
      </li>
     
    </ul>
  </div>
</nav>
   
    <div class="container" style="text-align:center; margin-top: 220px; width:500px;">
    
      <h1 style="color : white ;">Insert Image in Gallery!</h1><br>
      <form method="POST"  enctype="multipart/form-data"> <!-- multipart for file that is being uploaded-->
        <input type="file" name = "image" id="image" class="btn-light"><br><br>
        <label for="desc">Short Description :</label>
    <input type="text" class="form-control" id="desc" name = "desc" placeholder="description here..."><br><br>
        <button class="btn btn-warning" name="insert" value="insert" id="insert">Insert Image</button>
      </form>
      <br><br>
      <div class="alert alert-danger" role="alert" id="warning"></div>
      <div class="alert alert-success" role="alert" id="success"></div>
    </div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script>
      $("#success").hide();
      $("#warning").hide();
      $(document).ready(function(){
      
        $("#insert").click(function(e){
        
        e.preventDefault();
          var imageName = $("#image").val();
          var desc = $('#desc').val();
          if(imageName == ""){
          
            $("#warning").html('Please select an image file!'); // error messages 
            $("#warning").show();
            $('#success').hide();

            setTimeout(function(){ $("#warning").hide(); }, 4500);
          return false; // to terminate the form submission project
          }else{
          
            var extension = $("#image").val().split('.').pop().toLowerCase(); // getting extension to avoid other than image files
             if(jQuery.inArray(extension,['gif','png','jpg','jpeg']) == -1){
              
               $("#warning").html('Please choose an image file only with extension gif , png , jpg or jpeg only.');
            $("#warning").show();
            $('#success').hide();
               $('#image').val('');
            setTimeout(function(){ $("#warning").hide(); }, 4500);
            
               return false;
             }else{
             if(desc == ""){
             $("#warning").html('Please give a short description!');
             
            $("#warning").show();
            $('#success').hide();
            setTimeout(function(){ $("#warning").hide(); }, 4500);
            
             return false;
             }else{
               if( desc.length > 80){
               $("#warning").html('Description too long!');
               
            $("#warning").show();

            $('#success').hide();
            setTimeout(function(){ $("#warning").hide(); }, 4500);
                 return false;
               }else{
               $("#warning").hide();
               
    
     var formData = $("form").submit(function(e){
            return ;
        });

var formData = new FormData(formData[0]); // Used FormData to send both image and description through same form
 
 // ajax request to send the data

    $.ajax({
        url: "action.php" ,
        type: 'POST',
        data: formData,
        success: function (data) {
            if(data=="1"){
            	$("#success").html('Image successfully inserted in database.');
            	$("#warning").hide();
               $('#success').show();
               setTimeout(function(){ $("#success").hide(); }, 4500);

            }else{
            	$("#warning").html('OOPS! There was some trouble uploading your file. Please try again later');
            	$("#success").hide();
               $('#warning').show();
               setTimeout(function(){ $("#warning").hide(); }, 4500);
            }
        },
        cache: false,
        contentType: false,
        processData: false
    });

               
                 $('#desc').val(''); // clearing the fields
                 $('#image').val('');
         
               }
             }
             }
          
          }
          
        
        })
      
      })
      
    </script>
  </body>
</html>