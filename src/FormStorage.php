<?php
namespace Drupal\objective_forms;

use Drupal\Core\Form\FormStateInterface;

/**
 * Stores data in the $form_state['storage'] for use in building/rendering the
 * Form.
 */
class FormStorage {
  /**
   * The root element where we store all the required info.
   */
  const STORAGE_ROOT = 'objective_form_storage';

  /**
   * A reference to $form_state['storage'][STORAGE_ROOT], this is where all
   * persistant data is kept.
   *
   * @var array
   */
  protected $storage;

  protected $form_state;

  /**
   * Creates the FormStorage Singleton.
   *
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The Drupal Form State.
   */
  public function __construct(FormStateInterface $form_state) {
    $this->initializeFormState($form_state);
    $this->storage = $form_state->get(['storage', self::STORAGE_ROOT]);
    $this->form_state = $form_state;
  }

  /**
   * Creates the storage slot in the Drupal form state.
   *
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The Drupal Form State.
   */
  protected function initializeFormState(FormStateInterface $form_state) {
    if (empty($form_state->get(['storage']))) {
      $form_state->set(['storage'], []);
    }
    if (empty($form_state->get(['storage', self::STORAGE_ROOT]))) {
      $form_state->set(['storage', self::STORAGE_ROOT], []);
    }
  }

  /**
   * Checks storage for the existance of a variable.
   *
   * @param string $name
   *   The stored variables name.
   *
   * @return bool
   *   TRUE if the variable exists in storage, FALSE otherwise.
   */
  public function __isset($name) {
    return isset($this->storage[$name]);
  }

  /**
   * Removes a variable from storage.
   *
   * @param string $name
   *   The stored variables name.
   */
  public function __unset($name) {
    unset($this->storage[$name]);
  }

  /**
   * Get a value from storage.
   *
   * @param mixed $name
   *   The stored variables name.
   *
   * @return mixed
   *   The stored variables value.
   */
  public function __get($name) {
    if (isset($this->storage[$name])) {
      return $this->storage[$name];
    }
    return NULL;
  }

  /**
   * Store a value.
   *
   * @param mixed $name
   *   The stored variables name.
   * @param mixed $value
   *   The stored variables value.
   */
  public function __set($name, $value) {
    $this->storage[$name] = $value;
    $this->form_state->set(['storage', self::STORAGE_ROOT, $name], $value);
  }

}
