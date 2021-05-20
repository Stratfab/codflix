<?php
// on importe tous les controllers
$controllers = scandir('controller');
unset($controllers[0]);
unset($controllers[1]);
foreach($controllers as $controller){
  require_once( 'controller/'.$controller);
}

// require_once( 'controller/homeController.php' );
// require_once( 'controller/loginController.php' );
// require_once( 'controller/signupController.php' );
// require_once( 'controller/mediaController.php' );

/**************************
* ----- HANDLE ACTION -----
***************************/

// si il y à un paramètre action dans l'url ( action = ...)

if ( isset( $_GET['action'] ) ):

  switch( $_GET['action']):

    // si action = login

    case 'login':
      // si il y a un post (formulaire) on appelle la methode login

      if ( !empty( $_POST ) ) login( $_POST );
      // sinon on appelle la methode loginPage
      else loginPage();

    break;

    case 'signup':

      signupPage();
      if ( !empty( $_POST ) ) signup( $_POST );
        else signupPage();

    break;

    case 'media':
      
  
        if(isset($_GET['film']) || isset($_GET['series'])): 
            afficheunfilm();
        
        
  
        else:

     mediaPage();
        endif;
      

    break;

    case 'logout':

      logout();

    break;

  endswitch;

else:
 // on créer une variable qui contient l'id de sesssion
 //si il y a une session id alors $user_id = la session, sinon $user_id = false

  $user_id = isset( $_SESSION['user_id'] ) ? $_SESSION['user_id'] : false;

  // si il y a une session (si true)
  if( $user_id ):
    // alors on appelle mediapage/ methode de recherche
    mediaPage();
    // sinon
  else:
  // on appelle la methode Homepage : va chercher les infos user
    homePage();
  endif;

endif;
