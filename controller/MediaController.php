<?php

require_once( 'model/media.php' );

/***************************
* ----- LOAD HOME PAGE -----
***************************/

function mediaPage() {

  $search = isset( $_GET['titl'] ) ? $_GET['titl'] : null;
  $medias = Media::filterMedias( $search );
  $series = Media::filterSeries( $search );

  require('view/mediaListView.php');

}

function afficheunfilm(){

  if(isset($_GET['film'])){
  $idfilm = $_GET['film'];
  $media = new media($idfilm);
  $getFilm = $media->getMediaById($idfilm);
  }
  elseif(isset($_GET['series'])){
  $idserie = $_GET['series'];
  $media = new media($idserie);
  $getserie = $media->getMediaById($idserie);
  $getSaison = $media ->getSaisonById($idserie);

  }
 
  require('view/mediaListView.php');
}