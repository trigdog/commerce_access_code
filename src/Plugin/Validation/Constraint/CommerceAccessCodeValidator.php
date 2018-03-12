<?php

namespace Drupal\commerce_access_code\Plugin\Validation\Constraint;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * Validates the Valid Access Code constraint.
 */
class CommerceAccessCodeValidator extends ConstraintValidator  {
  /**
   * {@inheritdoc}
   */
  public function validate($items, Constraint $constraint) {
    /** \Drupal\Core\Field\TypedData\FieldIteDataDefinition $item */
    if (!$item = $items->first()) {
      return;
    }
    /** @var \Drupal\commerce_order\Entity\OrderItem $order_item */
    $order_item = $items->getEntity();
    /** @var \Drupal\commerce_product\Entity\ProductVariation $purchased_entity */
    $purchased_entity = $order_item->getPurchasedEntity();
    if (!$purchased_entity->access_code) {
      return;
    }
    /** @var \Drupal\code_field\Plugin\AccessCode\AccessCodeInterface $access_code_type */
    $access_code_type = $purchased_entity->get('access_code')->first()->getTargetInstance();
    if (!$access_code_type->evaluateAccessCode($item->value)) {
      $this->context->addViolation($constraint->invalidCode, ['%value' => $item->value]);
    }
  }

}