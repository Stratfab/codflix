<?php

require_once( 'model/User.php' );

/***************************
* ----- LOAD HOME PAGE -----
***************************/

// si il y a une session (utilisateur en base) on va chercher les infos et on affiche le dashboard

function homePage() {

  $user_id = isset( $_SESSION['user_id'] ) ? $_SESSION['user_id'] : false;

  if( $user_id ):

    $user_data  = User::getUserById( $user_id );

    require('view/dashboardView.php');

    // sinon on renvoie vers le formulaire de login / inscription
  else:
    require('view/homeView.php');
  endif;

}
