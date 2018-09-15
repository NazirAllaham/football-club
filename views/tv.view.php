<!DOCTYPE html>
<html lang="es">
<head>
    <?php 
    $title = 'Real Madrid &copy;';
    require 'partials\head.view.php';
    ?>
</head>
<body>
    <?php include('partials\header.view.php') ?>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="alert alert-primary col-md-8 mx-auto my-4" role="alert">
                Sorry!, TV not availabl now, we will fix this problem soon .
            </div>
            <video controls height="512px"  class="col-md-8 mx-auto mt-0 mb-4 p-0">
                <source src="">
            </video>
        </div>
    </div>

    <?php include('partials\footer.view.php') ?>
</body>
</html>