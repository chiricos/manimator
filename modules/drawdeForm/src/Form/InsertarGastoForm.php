<?php
//mi_modulo/src/Form/InsertarGastoForm.php

namespace Drupal\drawdeForm\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Component\Utility\UrlHelper;

/**
 * Desarrollo de un formulario en drupal 8
 * @author Ignacio Farré
 */
class InsertarGastoForm extends FormBase {

    /**
     * {@inheritdoc}
     */
    public function getFormId() {
        return 'insertar_gasto_form';
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(array $form, FormStateInterface $form_state) {
        $form['cantidad'] = [
            '#type'     => 'number',
            '#title'    => $this->t('Cantidad'),
            '#required' => TRUE,
        ];
        $form['fecha'] = [
            '#type'     => 'date',
            '#title'    => $this->t('Fecha'),
            '#required' => TRUE,
        ];
        $form['descripcion'] = [
            '#type'          => 'textfield',
            '#title'         => $this->t('Descripción'),
            '#default_value' => $this->t('Un gasto mas.'),
            '#required'      => TRUE,
        ];
        $form['submit'] = [
            '#type'  => 'submit',
            '#value' => $this->t('Insertar'),
        ];
        return $form;
    }

    /**
     * {@inheritdoc}
     */
    public function validateForm(array &$form, FormStateInterface $form_state) {
        if ($form_state->getValue('cantidad') < 1) {
            $form_state->setErrorByName('cantidad', $this->t('La cantidad tiene que ser mayor que 1'));
        }
    }

    /**
     * {@inheritdoc}
     */
    public function submitForm(array &$form, FormStateInterface $form_state) {
        // Display result.
        foreach ($form_state->getValues() as $key => $value) {
            drupal_set_message($key . ': ' . $value);
        }
    }
}

?>