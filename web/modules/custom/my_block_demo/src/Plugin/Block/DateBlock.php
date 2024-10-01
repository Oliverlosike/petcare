<?php

namespace Drupal\my_block_demo\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * The description of the block goes here.
 *
 * @Block(
 *   id = "my__demo",
 *   admin_label = @Translation("my dates"),
 * )
 */


class DateBlock extends BlockBase {

 
  public function build() {
    $current_date = \Drupal::service('date.formatter')->format(time(), 'custom', 'Hi, today is l of week W of Y. The time is H:i:s.');
    
    return [
      '#markup' => $current_date,
    ];
  }

 
  public function getCacheMaxAge() {
    return 0;
  }
}
