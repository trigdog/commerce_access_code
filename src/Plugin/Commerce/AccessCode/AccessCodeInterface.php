<?php

namespace Drupal\commerce_access_code\Plugin\Commerce\AccessCode;

use Drupal\Component\Plugin\ConfigurablePluginInterface;
use Drupal\Core\Plugin\PluginFormInterface;
use Drupal\entity\BundlePlugin\BundlePluginInterface;

/**
 * Defines an interface for Access code plugins.
 */
interface AccessCodeInterface extends BundlePluginInterface, ConfigurablePluginInterface, PluginFormInterface {

  /**
   * Gets the access code label.
   *
   * @return string
   *   The label.
   */
  public function getLabel();

  /**
   * Gets the display label.
   *
   * Shown in the access code form.
   *
   * @return string
   *   The display label.
   */
  public function getDisplayLabel();

  /**
   * Evaluates the access code.
   *
   * @param string $code
   *   The access code entered.
   *
   * @return bool
   *   TRUE if the access code is valid, FALSE otherwise.
   */
  public function evaluateAccessCode(String $code);

}
