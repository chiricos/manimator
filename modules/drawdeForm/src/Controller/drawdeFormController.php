<?php

namespace Drupal\drawdeForm\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal;

class drawdeFormController extends ControllerBase {

    public function content() {
        return array(
            '#type' => 'markup',
            '#markup' => $this->t('Hello, World!'),
        );
    }
    public function verPagina() {
        return array(
            '#type' => 'markup',
            '#markup' => $this->t('Hello, World! <br> Esta es mi página...'),
        );
    }

    public function insertarGasto() {
        $form = $this->formBuilder()->getForm('Drupal\mi_modulo\Form\InsertarGastoForm');

        return [
            '#theme' => 'pagina_insertar_gasto',
            '#titulo' => $this->t('Mi formulario'),
            '#descripcion' => 'Insertar formulario',
            '#formulario' => $form
        ];
    }
}
?>