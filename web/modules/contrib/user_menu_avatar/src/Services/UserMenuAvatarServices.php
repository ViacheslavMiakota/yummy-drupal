<?php

namespace Drupal\user_menu_avatar\Services;

use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\File\FileUrlGeneratorInterface;
use Drupal\Core\Session\AccountProxyInterface;
use Drupal\field\Entity\FieldConfig;
use Drupal\Core\Entity\EntityRepository;

/**
 * Class UserMenuAvatarServices.
 *
 * Provides helper services to use for the User Menu Avatar module.
 *
 * @SuppressWarnings(PHPMD.ExcessiveClassComplexity)
 */
class UserMenuAvatarServices {

  /**
   * Entity Type Manager.
   *
   * @var Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * File URL generator.
   *
   * @var Drupal\Core\File\FileUrlGeneratorInterface
   */
  protected $fileUrlGeneratorInterface;

  /**
   * File URL generator.
   *
   * @var Drupal\Core\Session\AccountProxyInterface
   */
  protected $accountProxyInterface;

  /**
   * Entity Repository Interface.
   *
   * @var Drupal\Core\Entity\EntityRepository
   */
  protected $entityRepository;

  /**
   * UserMenuAvatarServices constructor.
   *
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entityTypeManager
   *   Entity Type Manager.
   * @param \Drupal\Core\File\FileUrlGeneratorInterface $fileUrlGeneratorInterface
   *   The file URL generator.
   * @param \Drupal\Core\Session\AccountProxyInterface $accountProxyInterface
   *   The user account proxy interface.
   * @param \Drupal\Core\Entity\EntityRepository $entityRepository
   *   The Entity Repository Interface.
   */
  public function __construct(EntityTypeManagerInterface $entityTypeManager, FileUrlGeneratorInterface $fileUrlGeneratorInterface, AccountProxyInterface $accountProxyInterface, EntityRepository $entityRepository) {
    $this->entityTypeManager = $entityTypeManager;
    $this->fileUrlGeneratorInterface = $fileUrlGeneratorInterface;
    $this->accountProxyInterface = $accountProxyInterface;
    $this->entityRepository = $entityRepository;
  }

  /**
   * Get the current usser.
   */
  public function getCurrentUser() {
    $currentUser = $this->accountProxyInterface;
    $currentUserEntity = $this->entityTypeManager->getStorage('user')->load($currentUser->id());
    $displayName = $currentUser->getDisplayName();
    $isAnonymous = $currentUser->isAnonymous();
    $isAuthenticated = $currentUser->isAuthenticated();

    return [
      "currentUser" => $currentUser,
      "currentUserEntity" => $currentUserEntity,
      "displayName" => $displayName,
      "isAnonymous" => $isAnonymous,
      "isAuthenticated" => $isAuthenticated,
    ];
  }

  /**
   * Get image url from field.
   */
  public function getFieldImage($field = NULL, $imageStyle = NULL) {

    // Check for image.
    if ($field && $field->entity) {

      // Get image.
      $image = $field->entity;

      // Get image mime type.
      $imageMimeType = $image->getMimeType();

      // Get image file URI.
      $uri = $image->getFileUri();

      // Set image URL.
      $url = $this->fileUrlGeneratorInterface->generateString($uri);

      // Build image style path.
      if ($imageStyle && $imageMimeType !== "image/svg+xml") {
        $url = $this->entityTypeManager
          ->getStorage('image_style')
          ->load($imageStyle)
          ->buildUrl($uri);
      }

      return $this->fileUrlGeneratorInterface->transformRelative($url);
    }

    // Check for default image.
    if ($field && FieldConfig::loadByName('user', 'user', $field->getName())->getSetting('default_image')['uuid']) {

      // Load the default image settings.
      $imageGetSettings = FieldConfig::loadByName('user', 'user', $field->getName())
        ->getSetting('default_image');

      // Get the default image URI from settings.
      $uri = $this->entityRepository
        ->loadEntityByUuid('file', $imageGetSettings['uuid'])
        ->getFileUri();

      // Set image URL.
      $url = $this->fileUrlGeneratorInterface->generateString($uri);

      // Build image style path.
      if ($imageStyle && $imageMimeType !== "image/svg+xml") {
        $url = $this->entityTypeManager
          ->getStorage('image_style')
          ->load($imageStyle)
          ->buildUrl($uri);
      }

      return $this->fileUrlGeneratorInterface->transformRelative($url);
    }

    return NULL;
  }

  /**
   * Get image url from media item.
   */
  public function getMediaFieldImage($field = NULL, $imageStyle = NULL) {

    // Check for image.
    if ($field && $field->entity) {

      // Get image.
      $mediaImage = $field->entity
        ->get('field_media_image');

      // Get image entity.
      $mediaImageEntity = $mediaImage->entity;

      // Get image mime type.
      $mediaImageMimeType = $mediaImageEntity->getMimeType();

      // Get image file URI.
      $mediaImageEntityUri = $mediaImageEntity->getFileUri();

      // Set image URL.
      $url = $this->fileUrlGeneratorInterface->generateString($mediaImageEntityUri);

      // Set image style URL.
      if ($imageStyle && $mediaImageMimeType !== "image/svg+xml") {
        $url = $this->entityTypeManager
          ->getStorage('image_style')
          ->load($imageStyle)
          ->buildUrl($mediaImageEntityUri);
      }

      return $this->fileUrlGeneratorInterface->transformRelative($url);
    }

    // Check for default image.
    if ($field && FieldConfig::loadByName('user', 'user', $field->getName())->get("default_value")[0]['target_uuid']) {

      // Get field default media entity UUID.
      $defaultFieldMediaUUID = FieldConfig::loadByName('user', 'user', $field->getName())->get("default_value")[0]['target_uuid'];

      // Load default media by UUID.
      $defaultMediaEntity = $this->entityRepository->loadEntityByUuid('media', $defaultFieldMediaUUID);

      if ($defaultMediaEntity && $defaultMediaEntity->get('field_media_image')->entity) {

        // Get media image URI.
        $mediaImageEntityUri = $defaultMediaEntity->get('field_media_image')->entity->getFileUri();

        // Set image URL.
        $url = $this->fileUrlGeneratorInterface->generateString($mediaImageEntityUri);

        // Set image style URL.
        if ($imageStyle && $defaultMediaEntity->get('field_media_image')->entity->getMimeType() !== "image/svg+xml") {
          $url = $this->entityTypeManager
            ->getStorage('image_style')
            ->load($imageStyle)
            ->buildUrl($mediaImageEntityUri);
        }

        return $this->fileUrlGeneratorInterface->transformRelative($url);
      }

    }

    return NULL;
  }

}
