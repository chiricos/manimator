<?php
namespace Drupal\compras\Controller;
use Drupal\Core\Controller\ControllerBase;

class ComprasController {
	session_start();
	$usuario = $_SESSION['usuario'];

	public function mostrarCompra() {
		return array(
			'#title' => 'Carrito de compras',
			'markup' => $usuario;
		);
	}
}