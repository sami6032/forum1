<?php
   require('actions/users/securityAction.php');
 require('actions/questions/publishQuestionAction.php');


 ?>
 <?php 
   
    include "includes/head.php";
     include "includes/navbar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="assets/publish.css">
</head>
<body>

<form class="container" method="POST">
    <?php 
    if(isset($_errorMsg)){
        echo '<p>'.$_errorMsg.'<p>';
      }elseif(isset($_successMsg)){
        echo '<p>'.$_successMsg.'<p>';
      }


          ?>
        <label>Titre de la question</label>
        <input type="text" name ="title">
        <label>Description de la question</label>
        <input type="text" name ="description">
        <label>Contenu de la question</label>
        <input type="text" name ="content">

        <button type="submit" href="" name="validate"> Publier la question</button>
    </form>
</body>
</html>