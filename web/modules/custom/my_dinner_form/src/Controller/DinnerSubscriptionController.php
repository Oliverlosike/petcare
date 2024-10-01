<?php

namespace Drupal\my_dinner_form\Controller;

use Drupal\Core\Controller\ControllerBase;

class DinnerSubscriptionController extends ControllerBase {

  /**
   * Displays the confirmation page after form submission.
   *
   * @param string $fav_food
   *   The user's favourite food choice.
   *
   * @return array
   *   Render array.
   */
  public function confirmationPage($fav_food) {
    return [
      '#markup' => $this->t('Thank you for your dinner subscription. Your favourite choice is @food.', [
        '@food' => $fav_food
      ]),
    ];
  }
}
