<?php require('actions/users/loginAction.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>
    <link rel="stylesheet" href="assets/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
<div class="row mt-5 " style= "" >
            <div class="col-md-12 corppage ">
                <div class="card corpform">
                    <!-- <div class="card-header9">
                        <h4>Ajouter 
                            <a href="../index.php" class="btn  float-end"><strong>Retour</strong></a>
                        </h4>
                    </div> -->
                    <div class="card-body" style= "background-color: #0100C3; " >
                        <form action="" method="POST">
                        <?php if(isset($errorMsg)){ echo '<p>'.$errorMsg.'</p>';}?>
                        <div class="mb-3 ff">
                                <!-- <label> pseudo</label> -->
                                <input type="text" name="pseudo" required placeholder="Entrer votre pseudo" class="form-control w-50px text-center">
                            </div>
                            <div class="mb-3">
                                <!-- <label>Date De Naissance</label> -->
                                <input type="password" name="mdp" placeholder="Entrer votre mot de passe" class="form-control text-center">
                            </div>
                           
                            <div class="mb-3 text-center ">
                                <button type="submit" class="btn btn-light text-center" style="width: 130px; height: 40px;" name="validate"><p>Se connecter</p></button>
                            </div>
                            </div>
                            <a href="signup.php"><p>je n'ai pas de compte, je m'inscris</p></a>
                        </form>
                    
                </div>
            </div>
        </div>

</body>
</html>