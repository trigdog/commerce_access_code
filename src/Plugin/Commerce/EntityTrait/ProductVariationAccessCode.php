<?php

namespace Drupal\commerce_access_code\Plugin\Commerce\EntityTrait;

use Drupal\commerce\Plugin\Commerce\EntityTrait\EntityTraitBase;
use Drupal\entity\BundleFieldDefinition;

/**
 * Provides an entity trait for Commerce Product Variation entities.
 *
 * Product variations that want to restrict access to the purchase through
 * the use of access codes must enable this trait.
 *
 * @CommerceEntityTrait(
 *  id = "commerce_access_code",
 *  label = @Translation("Provides an access code field"),
 *  entity_types = {"commerce_product_variation"}
 * )
 */
class ProductVariationAccessCode extends EntityTraitBase {

  /**
   * {@inheritdoc}
   */
  public function buildFieldDefinitions() {
    // Builds the field definitions.
    $fields = [];
    $fields['access_code'] = BundleFieldDefinition::create('commerce_plugin_item:access_code')
      ->setLabel(t('Access Code'))
      ->setCardinality(1)
      ->setRequired(TRUE)
      ->setDisplayOptions('form', [
        'type' => 'commerce_plugin_select',
        'weight' => 20,
      ]);
    return $fields;
  }

}
