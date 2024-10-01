<?php

namespace Drupal\my_block_demo\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Cache\Cache;

class BedSizeBlock extends BlockBase {


  public function build() {
    $route_name = \Drupal::routeMatch()->getRouteName();

    $build = [];

    switch ($route_name) {
      case 'my_block_demo.bed_small':
        $build['#markup'] = 'This bed is too small';
        break;

      case 'my_block_demo.bed_medium':
        $build['#markup'] = 'This bed is just right';
        break;

      case 'my_block_demo.bed_large':
        $build['#markup'] = 'This bed is too big';
        break;
    }

    return $build;
  }

 
  public function getCacheContexts() {
    return Cache::mergeContexts(parent::getCacheContexts(), ['route.name']);
  }
}
