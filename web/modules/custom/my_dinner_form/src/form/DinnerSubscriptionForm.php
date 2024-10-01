<?php

namespace Drupal\my_dinner_form\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class DinnerSubscriptionForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'dinner_subscription_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    // Add form fields
    $form['first_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('First Name'),
      '#required' => TRUE,
    ];

    $form['last_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Last Name'),
      '#required' => TRUE,
    ];

    $form['number_of_guests'] = [
      '#type' => 'select',
      '#title' => $this->t('Number of Guests'),
      '#options' => range(1, 10),
      '#required' => TRUE,
    ];

    $form['meat_fish_choices'] = [
      '#type' => 'number',
      '#title' => $this->t('Number of Meat/Fish Choices'),
      '#min' => 0,
      '#required' => TRUE,
    ];

    $form['vegetarian_choices'] = [
      '#type' => 'number',
      '#title' => $this->t('Number of Vegetarian Choices'),
      '#min' => 0,
      '#required' => TRUE,
    ];

    $form['vegan_choices'] = [
      '#type' => 'number',
      '#title' => $this->t('Number of Vegan Choices'),
      '#min' => 0,
      '#required' => TRUE,
    ];

    $form['alcohol_free'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Would you like an alcohol-free table?'),
    ];

    // Submit button
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    // Example validation: No more than 10 guests in total
    $total_guests = $form_state->getValue('number_of_guests');
    if ($total_guests > 10) {
      $form_state->setErrorByName('number_of_guests', $this->t('You cannot have more than 10 guests.'));
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Redirect to the confirmation page
    $fav_food = 'your_choice';  // For example, this could be one of the fields in the form.
    $form_state->setRedirect('my_dinner_form.dinner_subscription', ['fav_food' => $fav_food]);
  }
}
