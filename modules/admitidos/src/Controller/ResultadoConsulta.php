<?php

namespace Drupal\admitidos\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Request;
use Drupal\Core\Access\AccessResult; 
use Drupal\Core\Form\FormInterface;

class ResultadoConsulta extends ControllerBase {
	/**
	 * Display the markup.
	 *
	 * @return array
	 */
	
	public function consulta_resultado($documento = null) {

		$contenido = array();

		$connection = \Drupal::database();  
		
		$contenido['linea1'] = array(
			'#markup' => '<strong> No hay resultados!!! </strong><br><br>',
		);

		if ($documento <> null) {
			$query = $connection->query("SELECT Estado, Carrera, Id FROM {aspirantes} asp WHERE Documento = '".$documento."' order by Id desc limit 1");

			if ($query) {
				$row = $query->fetchAssoc();
				$estado = $row['Estado'];
				$carrera = $row['Carrera'];
				$id = $row['Id'];

				if ($estado =='ADMITIDO') {
					$contenido['linea1'] =  array(
						'#markup' => '<div class="respuestaConsulta">La Fundación Universitaria de Ciencias de la Salud – FUCS desea informarle <strong>que ha sido admitido</strong> al programa de '.$carrera.'. Le brindamos la bienvenida a nuestra institución deseándole el mayor de los éxitos en esta nueva etapa de su vida; juntos asumiremos con responsabilidad la formación integral con fundamentos de excelencia académica, sentido ético, social y científico.<br><br><br><a href="http://131.0.170.174:8082/fucsalud/academusoft/academico/liquidaciones/ind_liq_pub_seguro.jsp" target="_blank"><img src="/sites/default/files/admitidosBoton.png"></a></div>' ,
					);
				}
				else
					if ($estado =='NO ADMITIDO') {
						$contenido['linea1'] =  array(
							'#markup' => '<div class="respuestaConsulta">Estimado aspirante, la <strong>Fundación Universitaria de Ciencias de la Salud – FUCS</strong> desea informarle que <strong>no ha sido Admitido</strong> al programa de '.$carrera.'. Agradecemos su interés por nuestra institución y esperamos que en un futuro pueda ser parte de ella.</div>' ,
						);
					}
				} //if ($query) {
			} //if ($documento <> null) {

			return $contenido;
		}
	}