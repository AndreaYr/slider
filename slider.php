<?php
    $conn = new mysqli("localhost", "root", "admin", "slider");
    $msg = '';

    if(isset($_POST['upload'])){
        $image = $_FILES['image']['name'];

        $path = 'img/'.$image;

        $sql = $conn->query("INSERT INTO carousel (image_path) VALUES ('$path')");
        if($sql){
            move_uploaded_file($_FILES['image']['tmp_name'], $path);
            $msg = 'Imagen Cargada con exito';
        }else{
            $msg = 'Imagen no cargada';
        }
    }

    $result = $conn->query("SELECT img_path FROM carousel")
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
   
</head>
<body>
    
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-10">
                 <div id="demo" class="carousel slide" data-ride="carousel">

                        <!-- Indicators -->
                        <ul class="carousel-indicators">
                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                        <li data-target="#demo" data-slide-to="1"></li>
                        <li data-target="#demo" data-slide-to="2"></li>
                        </ul>

                        <!-- The slideshow -->
                        <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="la.jpg" alt="Los Angeles">
                        </div>
                        <div class="carousel-item">
                            <img src="chicago.jpg" alt="Chicago">
                        </div>
                        <div class="carousel-item">
                            <img src="ny.jpg" alt="New York">
                        </div>
                    </div>

                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                    </a>

                </div>
            </div>

        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4 bg-dark rounded px-4">
                <h4 class="text-center text-light p-1">imagen</h4>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="file" name="image" class="form-control p1" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="upload" class="btn btn-warning btn-block" value="Upload Image">
                    </div>

                    <div class="form-group">
                        <h5 class="text-center text-light"><?= $msg; ?></h5>
                    </div>
                </form>
            </div>
        </div>
    </div>

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 