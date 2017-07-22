<?php /**
 * @file
 * Contains \Drupal\objective_forms\Controller\DefaultController.
 */

namespace Drupal\objective_forms\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Default controller for the objective_forms module.
 */
class DefaultController extends ControllerBase {

  public function objective_forms_test($form_name) {
    // Load all test files.
    objective_forms_test_load_files();
    // TODO  needs to have $form as its first parameter.
    return \Drupal::formBuilder()->getForm($form_name);
  }

}
