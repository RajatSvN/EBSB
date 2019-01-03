

<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="css/lightbox.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Image Gallery</title>
    <style>

    body {

      background: url(sampleImages/galleryWallPaper4.jpg) no-repeat center center fixed ; 

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

    <div class="container" style="margin-top: 50px;">
                       
<?php

// logic for loading of images , no. of images shown = multiple of 3

$link = mysqli_connect("localhost","root","","orrisaimg");

$query = "SELECT * FROM image ";

$res = mysqli_query($link,$query);

$iterations = floor(mysqli_num_rows($res) / 3) ;

$address = array();

$desc = array();

$co = 0;

$total = 0;

$m=0;

while($row = mysqli_fetch_array($res)){
 
    $desc[$m] = $row[1];

    $address[$m] = $row[2];

    $m++;

}

$j=0;

$k=0;

$l=0;

for($i=0 ; $i<$iterations ; $i++){

  echo '<div class="row">
        <div class="col-md-4">
          <a href="'.$address[$j++].'" data-lightbox="image-1" data-title="'.$desc[$l++].'"><img src="'.$address[$k++].'" alt="image" class="img-thumbnail"></a>
        </div>
        <div class="col-md-4">
          <a href="'.$address[$j++].'" data-lightbox="image-1" data-title="'.$desc[$l++].'"><img src="'.$address[$k++].'" alt="image" class="img-thumbnail"></a>
        </div>
        <div class="col-md-4">
          <a href="'.$address[$j++].'" data-lightbox="image-1" data-title="'.$desc[$l++].'"><img src="'.$address[$k++].'" alt="image" class="img-thumbnail"></a>
        </div>
      </div>
      <br><br>' ;

}
?>

      </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="js/lightbox-plus-jquery.js"></script>
    <script>
    lightbox.option({
      'resizeDuration': 200,
      'wrapAround': true
    })
    </script>
    </body>
    </html>