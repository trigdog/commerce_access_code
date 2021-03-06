<?php

namespace Drupal\commerce_access_code;

use Drupal\Component\Plugin\Exception\PluginException;
use Drupal\Core\Plugin\DefaultPluginManager;
use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;

/**
 * Provides the Access code plugin manager.
 *
 * @see \Drupal\code_field\Annotation\AccessCode
 * @see plugin_api
 */
class AccessCodeManager extends DefaultPluginManager {


  /**
   * Constructs a new AccessCodeManager object.
   *
   * @param \Traversable $namespaces
   *   An object that implements \Traversable which contains the root paths
   *   keyed by the corresponding namespace to look for plugin implementations.
   * @param \Drupal\Core\Cache\CacheBackendInterface $cache_backend
   *   Cache backend instance to use.
   * @param \Drupal\Core\Extension\ModuleHandlerInterface $module_handler
   *   The module handler to invoke the alter hook with.
   */
  public function __construct(\Traversable $namespaces, CacheBackendInterface $cache_backend, ModuleHandlerInterface $module_handler) {
    parent::__construct(
        'Plugin/Commerce/AccessCode',
        $namespaces,
        $module_handler,
        'Drupal\commerce_access_code\Plugin\Commerce\AccessCode\AccessCodeInterface',
        'Drupal\commerce_access_code\Annotation\AccessCode'
    );

    $this->alterInfo('commerce_access_code_info');
    $this->setCacheBackend($cache_backend, 'commerce_access_code_plugins');
  }

  /**
   * {@inheritdoc}
   */
  public function processDefinition(&$definition, $plugin_id) {
    parent::processDefinition($definition, $plugin_id);

    foreach (['id', 'label', 'display_label'] as $required_property) {
      if (empty($definition[$required_property])) {
        throw new PluginException(sprintf('The access code type %s must define the %s property.', $plugin_id, $required_property));
      }
    }
  }

}
