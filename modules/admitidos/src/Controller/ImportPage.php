<?php

namespace Drupal\admitidos\Controller;
use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Request;
use Drupal\Core\Access\AccessResult; 
use Drupal\Core\Form\FormInterface;

class ImportPage extends ControllerBase {
  /**
   * Display the markup.
   *
   * @return array
   */
  public function content(Request $request) {

    $form = \Drupal::formBuilder()->getForm('Drupal\admitidos\Form\ImportForm');
    
    return $form;
  }
}