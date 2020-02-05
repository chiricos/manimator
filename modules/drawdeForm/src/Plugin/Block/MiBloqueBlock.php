<?php
namespace Drupal\drawdeForm\Plugin\Block;
use Drupal\Core\Block\BlockBase;
/**
 * Bloque que muestra una tabla con los gastos de este mes agrupados por tipos.
 * @Block(
 *   id = "mi_bloque",
 *   admin_label = @Translation("mi bloque")
 * )
 */
class MiBloqueBlock extends BlockBase {
    /**
     * {@inheritdoc}
     */
    public function build() {
        return array(
            '#theme' => 'drawdeForm',
            '#titulo' => 'Mi titulo super guay',
            '#descripcion' => 'Mi descripción super guay'
        );
    }
}
/*
 * return array(
      '#type' => 'markup',
      '#markup' => $this->configuration['mi bloque por fin!!!!!!!!'],
    );
 */
/**
 * return array(
'#title' => 'This is an awesome title',
'#description' => 'Lorem ipsum dolar sum amet ..'
);
 */