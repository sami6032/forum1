<?php 
// session_start();
require('actions/database.php'); 

if(isset($_POST['validate'])){

    if(!empty($_POST['title']) AND !empty($_POST['description']) AND !empty($_POST['content']))
      $question_title = htmlspecialchars($_POST['title']);
      $question_description = nl2br(htmlspecialchars($_POST['description']));
      $question_contenu = nl2br(htmlspecialchars($_POST['content']));
      $question_date = date('d/m/y');
      $question_id_auteur = $_SESSION['id'];
      $question_pseudo_auteur = $_SESSION['pseudo'];
      
      $insertQuestionOnwebsite = $bdd->prepare('INSERT INTO questions(titre, description, contenu, id_auteur, pseudo_auteur, date_publication)VALUES(?, ?, ?, ?, ?, ?)');
      $insertQuestionOnwebsite->execute(
        array(
            $question_title,
            $question_description,
            $question_contenu,  
            $question_id_auteur, 
            $question_pseudo_auteur, 
            $question_date
        )
     );

     $_successMsg = "votre question a bien été publié sur le site";
     
  }else{
         $_errorMsg = "veuillez compléter tous les champs...";
}



?>