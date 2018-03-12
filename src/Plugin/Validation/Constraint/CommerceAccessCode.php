<?php

namespace Drupal\commerce_access_code\Plugin\Validation\Constraint;

use Symfony\Component\Validator\Constraint;

/**
 * Checks that the submitted value is a valid access code
 *
 * @Constraint(
 *   id = "commerce_access_code_validation",
 *   label = @Translation("Validate Commerce Access Code", context = "Validation"),
 * )
 */
class CommerceAccessCode extends Constraint {
  // The message that will be shown if the code is not valid
  public $invalidCode = '%value is not a valid code';
}