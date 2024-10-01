<?php

namespace Drupal\my_form_demo\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Response;

/**
 * Controller for displaying the favourite colour.
 */
class ColourController extends ControllerBase {

  /**
   * Show the selected favourite colour.
   */
  public function show($fav) {
    return ['#markup' =>$this->t('Your favourite colour is @colour', ['@colour' => $fav])];
  }

}
