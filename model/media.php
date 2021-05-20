<?php

require_once( 'Database.php' );

class Media  {

  protected $id;
  protected $genre_id;
  protected $title;
  protected $type;
  protected $status;
  protected $release_date;
  protected $summary;
  protected $trailer_url;

  public function __construct( $media ) {
    
    
    $this->setId( isset( $media->id ) ? $media->id : null );
    $this->setGenreId( isset($media->genre_id) ? $media->genre_id : null );
    $this->setTitle( isset($media->title) ? $media->title : null );
  }

  /***************************
  * -------- SETTERS ---------
  ***************************/

  public function setId( $id ) {
    $this->id = $id;
  }

  public function setGenreId( $genre_id ) {
    $this->genre_id = $genre_id;
  }

  public function setTitle( $title ) {
    $this->title = $title;
  }

  public function setType( $type ) {
    $this->type = $type;
  }

  public function setStatus( $status ) {
    $this->status = $status;
  }

  public function setReleaseDate( $release_date ) {
    $this->release_date = $release_date;
  }

  /***************************
  * -------- GETTERS ---------
  ***************************/

  public function getId() {
    return $this->id;
  }

  public function getGenreId() {
    return $this->genre_id;
  }

  public function getTitle() {
    return $this->title;
  }

  public function getType() {
    return $this->type;
  }

  public function getStatus() {
    return $this->status;
  }

  public function getReleaseDate() {
    return $this->release_date;
  }

  public function getSummary() {
    return $this->summary;
  }

  public function getTrailerUrl() {
    return $this->trailer_url;
  }

  /***************************
  * -------- GET LIST --------
  ***************************/

  public static function filterMedias( $title ) {

    // Open database connection
    $db   = init_db();

    $req  = $db->prepare( "SELECT * FROM media WHERE type='film'" );
    $req->execute( array( '%' . $title . '%' ));

    // Close databse connection
    $db   = null;

    return $req->fetchAll();

  }
  public static function filterSeries( $title ) {
    $db   = init_db();
    $req = $db->prepare("SELECT * FROM media WHERE type='series'");
    $req->execute( array( '%' . $title . '%' ));
    
    return $req->fetchAll();
  }

  public function getmediaById($aïdi){
    $db   = init_db();
    $req = $db->prepare("SELECT * FROM media WHERE id=?");
    $req->execute( array($aïdi));
    return $req->fetch();
  }

  public function getSaisonById($serie){
    $db   = init_db();
    $req = $db->prepare("SELECT s.* FROM saison as s, media as m
                                       WHERE s.id_media = m.id
                                       AND s.id_media = ?");
    $req->execute( array($serie));
    return $req->fetchAll(PDO::FETCH_ASSOC);
  }
}
