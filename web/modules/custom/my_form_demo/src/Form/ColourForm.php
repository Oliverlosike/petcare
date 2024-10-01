<?php

namespace Drupal\my_form_demo\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a Colour Selection form.
 */
class ColourForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'colour_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['colour'] = [
      '#type' => 'select',
      '#title' => $this->t('Choose a colour'),
      '#options' => [
        'red' => $this->t('Red'),
        'blue' => $this->t('Blue'),
        'green' => $this->t('Green'),
      ],
      '#default_value' => 'red',
      '#description' => $this->t('The colour must be red, green, or blue.'),
    ];

    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
      '#button_type' => 'primary',
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    $allowed_colours = ['red', 'green', 'blue'];
    $submitted_colour = $form_state->getValue('colour');

    // Check if the submitted colour is one of the allowed values.
    if (!in_array($submitted_colour, $allowed_colours)) {
      // Set an error on the 'colour' field if it's not valid.
      $form_state->setErrorByName('colour', $this->t('The colour must be red, green, or blue.'));
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Get the submitted colour value
    $submitted_colour = $form_state->getValue('colour');

    // Redirect the user to /colour/<favourite-colour>
    $form_state->setRedirect('my_form_demo.colour_page', ['fav' => $submitted_colour]);
  }

}
