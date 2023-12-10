<?php

namespace Drupal\user_menu_avatar\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Defines our form class.
 */
class UserMenuAvatarConfigurationForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'user_menu_avatar_form';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'user_menu_avatar.settings',
    ];
  }

  /**
   * {@inheritdoc}
   *
   * @SuppressWarnings(PHPMD.NPathComplexity)
   * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
   * phpcs:disable Generic.Metrics.CyclomaticComplexity
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $config = $this->config('user_menu_avatar.settings');

    $avatar_shape_options = [
      'circle' => $this->t('Circle'),
      'square' => $this->t('Square'),
    ];

    $avatar_yes_no_options = [
      'yes' => $this->t('Yes'),
      'no' => $this->t('No'),
    ];

    $form['logged_in_user_wrapper'] = [
      '#type' => 'fieldset',
      '#title' => $this->t('Authenticated User Settings'),
      '#attributes' => [
        'class' => [
          'logged-in-user-wrapper',
        ],
      ],
    ];

    $form['logged_in_user_wrapper']['display_menu_avatar'] = [
      '#type' => 'radios',
      '#title' => $this->t('Display Avatar'),
      '#required' => TRUE,
      '#options' => $avatar_yes_no_options,
      '#description' => $this->t('Choose to display the user avatar.'),
      '#default_value' => $config->get('display_menu_avatar') ?? 'no',
    ];

    $form['logged_in_user_wrapper']['avatar_shape'] = [
      '#type' => 'radios',
      '#title' => $this->t('Avatar Shape'),
      '#required' => TRUE,
      '#options' => $avatar_shape_options,
      '#description' => $this->t('Choose the shape of the avatar.'),
      '#default_value' => $config->get('avatar_shape') ?? 'circle',
      '#states' => [
        'visible' => [
          ':input[name="display_menu_avatar"]' => ['value' => 'yes'],
        ],
      ],
    ];

    $form['logged_in_user_wrapper']['avatar_size'] = [
      '#type' => 'number',
      '#title' => $this->t('Avatar Size (px)'),
      '#field_suffix' => 'px',
      '#required' => TRUE,
      '#description' => $this->t('Set the size of the avatar in "pixels". Applies to both width and height. Numeric value only.'),
      '#maxlength' => 4,
      '#size' => 4,
      '#default_value' => $config->get('avatar_size') ?? '50',
      '#states' => [
        'visible' => [
          ':input[name="display_menu_avatar"]' => ['value' => 'yes'],
        ],
      ],
    ];

    $form['logged_in_user_wrapper']['avatar_image_style'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Avatar Image Style'),
      '#required' => TRUE,
      '#description' => $this->t('Set the image style (machine_name) for the avatar. Default is "medium".'),
      '#default_value' => $config->get('avatar_image_style') ?? 'medium',
      '#states' => [
        'visible' => [
          ':input[name="display_menu_avatar"]' => ['value' => 'yes'],
        ],
      ],
    ];

    $form['logged_in_user_wrapper']['avatar_image_field'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Avatar field name'),
      '#required' => TRUE,
      '#description' => $this->t('Set the field name to use for the avatar. Default is "user_picture".'),
      '#maxlength' => 140,
      '#size' => 60,
      '#default_value' => $config->get('avatar_image_field') ?? 'user_picture',
      '#states' => [
        'visible' => [
          ':input[name="display_menu_avatar"]' => ['value' => 'yes'],
        ],
      ],
    ];

    $form['logged_in_user_wrapper']['display_user_name'] = [
      '#type' => 'radios',
      '#title' => $this->t('Display User Name'),
      '#required' => TRUE,
      '#options' => $avatar_yes_no_options,
      '#description' => $this->t('Choose to visually display the user name. Default is "getDisplayName()". The user name will always be available to screen readers.'),
      '#default_value' => $config->get('display_user_name') ?? 'no',
    ];

    $form['logged_in_user_wrapper']['avatar_custom_name_field'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Custom name field name (optional)'),
      '#required' => FALSE,
      '#description' => $this->t('Use a custom field for the user menu name by entering the fields machine name. Leave blank to use default "getDisplayName()" value.'),
      '#maxlength' => 140,
      '#size' => 60,
      '#default_value' => $config->get('avatar_custom_name_field') ?? '',
      '#states' => [
        'visible' => [
          ':input[name="display_user_name"]' => ['value' => 'yes'],
        ],
      ],
    ];

    $form['logged_in_user_wrapper']['avatar_custom_display_text'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Custom display text (optional)'),
      '#required' => FALSE,
      '#description' => $this->t('Use custom text instead of the user menu name, e.g. "My Account". A value here overrides the name fields above.'),
      '#maxlength' => 140,
      '#size' => 60,
      '#default_value' => $config->get('avatar_custom_display_text') ?? '',
      '#states' => [
        'visible' => [
          ':input[name="display_user_name"]' => ['value' => 'yes'],
        ],
      ],
    ];

    $form['anonymous_user_wrapper'] = [
      '#type' => 'fieldset',
      '#title' => $this->t('Anonymous User Settings'),
      '#attributes' => [
        'class' => [
          'anonymous-user-wrapper',
        ],
      ],
    ];

    $form['anonymous_user_wrapper']['display_anonymous_avatar'] = [
      '#type' => 'radios',
      '#title' => $this->t('Display Anonymous Avatar'),
      '#required' => TRUE,
      '#options' => $avatar_yes_no_options,
      '#description' => $this->t('Choose to display the anonymous user avatar.'),
      '#default_value' => $config->get('display_anonymous_avatar') ?? 'no',
    ];

    $form['anonymous_user_wrapper']['anonymous_user_avatar'] = [
      '#type' => 'managed_file',
      '#title' => $this->t('Anonymous User Avatar'),
      // '#required' => FALSE,
      '#description' => $this->t('Set an avatar for anonymous users. Allowed formats: "gif, png, jpg, jpeg, svg"'),
      '#theme' => 'image_widget',
      '#preview_image_style' => 'medium',
      '#upload_validators' => [
        'file_validate_is_image' => [],
        'file_validate_extensions' => ['gif png jpg jpeg svg'],
        'file_validate_size' => [25600000],
      ],
      '#upload_location' => 'public://user-menu-avatar/anonymous-avatar',
      '#default_value' => $config->get('anonymous_user_avatar') ?? NULL,
    ];

    $form['anonymous_user_wrapper']['display_anonymous_text'] = [
      '#type' => 'radios',
      '#title' => $this->t('Display Anonymous Text'),
      '#required' => TRUE,
      '#options' => $avatar_yes_no_options,
      '#description' => $this->t('Choose to visually display the anonymous text.'),
      '#default_value' => $config->get('display_anonymous_text') ?? 'no',
    ];

    $form['anonymous_user_wrapper']['custom_anonymous_text'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Anonymous Text'),
      '#required' => TRUE,
      '#description' => $this->t('This text will always be available to screen readers. The default is "Log in".'),
      '#maxlength' => 255,
      '#size' => 60,
      '#default_value' => $config->get('custom_anonymous_text') ?? 'Log in',
      '#states' => [
        'visible' => [
          ':input[name="display_anonymous_text"]' => ['value' => 'yes'],
        ],
      ],
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $values = $form_state->getValues();

    $this->configFactory->getEditable('user_menu_avatar.settings')
      ->set('avatar_shape', $values['avatar_shape'])
      ->set('avatar_size', $values['avatar_size'])
      ->set('avatar_image_style', $values['avatar_image_style'])
      ->set('avatar_image_field', $values['avatar_image_field'])
      ->set('display_menu_avatar', $values['display_menu_avatar'])
      ->set('display_user_name', $values['display_user_name'])
      ->set('avatar_custom_name_field', $values['avatar_custom_name_field'])
      ->set('avatar_custom_display_text', $values['avatar_custom_display_text'])
      ->set('display_anonymous_avatar', $values['display_anonymous_avatar'])
      ->set('anonymous_user_avatar', $values['anonymous_user_avatar'])
      ->set('display_anonymous_text', $values['display_anonymous_text'])
      ->set('custom_anonymous_text', $values['custom_anonymous_text'])
      ->save();

    parent::submitForm($form, $form_state);

  }

}
