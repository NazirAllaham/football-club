<?php 

if(isset($_GET['id']))
    $posts = $app['database']->where("posts", ["id" => $_GET['id']]);
else 
    $posts = $app['database']->selectAllPosts("posts");

require ('views/index.view.php');
?>