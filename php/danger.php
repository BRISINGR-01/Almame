<?php
class Danger {
  private $id, $description, $level, $image, $longitude, $latitude;

  public function __construct($id, $description, $level, $image, $longitude, $latitude) {
    $this->id = $id;
    $this->description = $description;
    $this->level = $level;
    $this->image = $image;
    $this->longitude = $longitude;
    $this->latitude = $latitude;
  }

  function getId() {
    return $this->id;
  }

  function getDescription() {
    return $this->description;
  }

  function getLevel() {
    return $this->level;
  }

  function getImage() {
    return $this->image;
  }

  function getLongitude() {
    return $this->longitude;
  }

  function getLatitude() {
    return $this->latitude;
  }
}
?>
