<?php
  // vérifier si les valeurs sont envoyées par le formulaire
  // print '<pre>';
  // var_dump($_POST);
  // print '</pre>';

  if ($_POST['password1'] != $_POST['password2'] ){
    header('Location: ../views/user_account.php');
}

  elseif ( $_POST['password1'] == $_POST['password2']) {
        //connecter à la db
        include('../../../db.php');
        $query = $db->prepare("
              INSERT INTO user(email, password, role)
              VALUES (:email, :password, :role)
          ");

    // lier les valeurs de la formule à la db
    $query->bindValue(':email', $_POST['email']);
    $query->bindValue(':password', $_POST['password2']);
    $query->bindValue(':role', $_POST['role']);
    // On exécute la requête.
    $execute = $query->execute();

   // Débuggage.
  //    print '<pre>';
  //  var_dump($query->errorInfo());
  //    print '</pre>';
  //    print '<pre>';
  //  var_dump($query);
  //    print '</pre>';
  //    print '<pre>';
  //  var_dump($execute);
  //    print '</pre>';

      header('Location: ../views/administration.php');
    }
 ?>
