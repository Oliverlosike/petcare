
<?php

namespace Drupal\modules\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\Attribute\Block;
use Drupal\Core\StringTranslation\TranslatableMarkup;

/**
 * This is a demo block.
 */
#[Block(
id: "goodbye_block",
admin_label: new TranslatableMarkup("My goodbye block"),
category: new TranslatableMarkup("My Block Demo")
)]

class GoodbyeBlock extends BlockBase {

    /**
     * {@inhertitdoc}
     */
  public function build() {
    return [
        '#markup' => ("Goodbye World"),
        ];
    }
}