<?php

namespace Drupal\commerce_access_code\Annotation;

use Drupal\Component\Annotation\Plugin;

/**
 * Defines an access code item annotation object.
 *
 * Plugin namespace: Plugin\Commerce\AccessCode.
 *
 * @see plugin_api
 *
 * @Annotation
 */
class AccessCode extends Plugin {


  /**
   * The plugin ID.
   *
   * @var string
   */
  public $id;

  /**
   * The label of the plugin.
   *
   * @var \Drupal\Core\Annotation\Translation
   *
   * @ingroup plugin_translatable
   */
  public $label;

}
