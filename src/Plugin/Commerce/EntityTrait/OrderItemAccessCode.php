<?php

namespace Drupal\commerce_access_code\Plugin\Commerce\EntityTrait;

use Drupal\commerce\Plugin\Commerce\EntityTrait\EntityTraitBase;
use Drupal\entity\BundleFieldDefinition;

/**
 * Provides an entity trait for Commerce Order Item entities.
 *
 * Product variations that require an access code to be purchased need to also
 * enable this order item trait to add the code field to the product.
 *
 * @CommerceEntityTrait(
 *  id = "commerce_access_code_order_item_type",
 *  label = @Translation("Provides an access code field on the order item type."),
 *  entity_types = {"commerce_order_item"}
 * )
 */
class OrderItemAccessCode extends EntityTraitBase {

  /**
   * {@inheritdoc}
   */
  public function buildFieldDefinitions() {
    // Builds the field definitions.
    $fields = [];
    $fields['access_code'] = BundleFieldDefinition::create('string')
      ->setLabel(t('Access Code'))
      ->setDescription(t('A valid access code is required to purchase this product.'))
      ->setRequired(TRUE)
      ->setCardinality(1)
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', FALSE);
    return $fields;
  }

}
