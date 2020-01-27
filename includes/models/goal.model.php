<?php
/**
 * Created by PhpStorm.
 * User: nairav
 * Date: 27/03/2019
 * Time: 16:01
 */

class Goal {

  public static function getAll() {

    $data=[];
    if (isset($_POST)) {
      $data = json_decode($_POST[ "message" ],true);
    }
    /*
    controls the RESTful services
    URL mapping
    */
    if (empty($data)) {
      $rawData = ['error' => 'No data found!'];
    }
    return $data;
  }
}