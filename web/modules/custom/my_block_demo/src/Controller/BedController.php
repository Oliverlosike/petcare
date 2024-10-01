<?php

namespace Drupal\my_block_demo\Controller;

use Drupal\Core\Controller\ControllerBase;

class BedController extends ControllerBase {

 
  public function small() {
    return [
      '#markup' => 'This is a small bed',
    ];
  }


  public function medium() {
    return [
      '#markup' => 'This is a medium bed',
    ];
  }


  public function large() {
    return [
      '#markup' => 'This is a large bed',
    ];
  }
}