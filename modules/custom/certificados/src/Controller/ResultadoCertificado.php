<?php

namespace Drupal\certificados\Controller;

require_once DRUPAL_ROOT .'/libraries/dompdf/source/dompdf/autoload.inc.php';

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Request;
use Drupal\Core\Access\AccessResult; 
use Drupal\Core\Form\FormInterface;
use Drupal\Core\DrupalKernel;
use Dompdf\Dompdf;
use Dompdf\Options;

class ResultadoCertificado extends ControllerBase {
	/**
	 * Display the markup.
	 *
	 * @return array
	 */
	
	public function consulta_resultado($documento = null) {//certificados asistencia

		$connection = \Drupal::database();

		if ($documento <> null) {
			$query = $connection->query("SELECT Nombre, Tipo, Documento, Evento, Fecha, Id FROM {certificado_asistencia} cert WHERE Documento = '".$documento."' order by Id desc limit 1");

			if ($query) {
				$row = $query->fetchAssoc();
				$nombre = $row['Nombre'];
				$tipo = $row['Tipo'];
				$documento = $row['Documento'];
				$evento = $row['Evento'];
				$fecha = $row['Fecha'];
				$id = $row['Id'];

				$markup = '<head>
											<link rel="stylesheet" href="'.DRUPAL_ROOT .'/modules/custom/certificados/css/normalize.css">
											<link rel="stylesheet" href="'.DRUPAL_ROOT .'/modules/custom/certificados/css/style.css">
										</head>
										<body>
											<table style="table-layout: fixed; width: 1056px">
												<colgroup>
													<col style="width: 528px">
													<col style="width: 528px">
												</colgroup>
											  <tr>
											    <td colspan="4"><img src="'.DRUPAL_ROOT.'/modules/custom/certificados/css/images/logo.png" class="imgLogo"></td>
											  </tr>
											  <tr>
											    <td colspan="4"><h2 class="titulo">FUNDACIÓN UNIVERSITARIA DE CIENCIAS DE LA SALUD - FUCS</h2></td>
											  </tr>
											  <tr>
											    <td colspan="4"><p class="certifica">Certifica que:</p></td>
											  </tr>
											  <tr>
											    <td colspan="4"><p class="nombre">'.$nombre.'</p></td>
											  </tr>
											  <tr>
											    <td colspan="4"><p class="documento">'.$tipo.' '.$documento.'</p></td>
											  </tr>
											  <tr>
											    <td colspan="4"><p class="asistio">Asistió al</p></td>
											  </tr>
											  <tr>
											    <td colspan="4"><p class="evento">'.$evento.'</p></td>
											  </tr>
											  <tr>
											    <td colspan="4"><p class="fecha">Realizado en Bogotá, D.C., Colombia, '.$fecha.'</p></td>
											  </tr>
											  <tr>
											    <td colspan="4"><p class="constancia">En constancia firman:</p></td>
											  </tr>
											  <tr>
													<td></td>
											    <td><img src="'.DRUPAL_ROOT .'/modules/custom/certificados/css/images/firma1.png" class="imgFirma"></td>
											    <td><img src="'.DRUPAL_ROOT .'/modules/custom/certificados/css/images/firma2.png" class="imgFirma"></td>
													<td></td>
											  </tr>
											  <tr>
											  	<td colspan="4"><img src="'.DRUPAL_ROOT.'/modules/custom/certificados/css/images/franja.png" style="width: 100%"></td>
											  </tr>
											</table>
										</body>';

				$dompdf = new Dompdf();
				$dompdf->loadHtml($markup);

				// (Optional) Setup the paper size and orientation
				$dompdf->setPaper('letter', 'landscape');

				// Render the HTML as PDF
				$dompdf->render();

				// Output the generated PDF to Browser
				$dompdf->stream("certificado", array("Attachment" => 0));

			}

			else {
				$contenido = array();
				$contenido['linea1'] = array(
					'#markup' => '<strong> No hay resultados!!! </strong><br><br>',
				);
			}
		}

		else {
			$contenido = array();
			$contenido['linea1'] = array(
				'#markup' => '<strong> No hay resultados!!! </strong><br><br>',
			);
		}

		return $contenido;
	}

	public function consulta_resultado_conferencista($documento = null) {//certificados conferencista

		$connection = \Drupal::database();

		if ($documento <> null) {
			$query = $connection->query("SELECT Nombre, Tipo, Documento, Ponencia, Evento, Fecha, Id FROM {certificado_conferencista} cert WHERE Documento = '".$documento."' order by Id desc limit 1");

			if ($query) {
				$row = $query->fetchAssoc();
				$nombre = $row['Nombre'];
				$tipo = $row['Tipo'];
				$documento = $row['Documento'];
				$ponencia = $row['Ponencia'];
				$evento = $row['Evento'];
				$fecha = $row['Fecha'];
				$id = $row['Id'];

				$markup = '<head>
											<link rel="stylesheet" href="'.DRUPAL_ROOT .'/modules/custom/certificados/css/normalize.css">
											<link rel="stylesheet" href="'.DRUPAL_ROOT .'/modules/custom/certificados/css/style-conferencista.css">
										</head>
										<body>
											<table style="table-layout: fixed; width: 1056px">
												<colgroup>
													<col style="width: 528px">
													<col style="width: 528px">
												</colgroup>
											  <tr>
											    <td colspan="4"><img src="'.DRUPAL_ROOT.'/modules/custom/certificados/css/images/logo.png" class="imgLogo"></td>
											  </tr>
											  <tr>
											    <td colspan="4"><h2 class="titulo">FUNDACIÓN UNIVERSITARIA DE CIENCIAS DE LA SALUD - FUCS</h2></td>
											  </tr>
											  <tr>
											    <td colspan="4"><p class="certifica">Certifica que:</p></td>
											  </tr>
											  <tr>
											    <td colspan="4"><p class="nombre">'.$nombre.'</p></td>
											  </tr>
											  <tr>
											    <td colspan="4"><p class="documento">'.$tipo.' '.$documento.'</p></td>
											  </tr>
											  <tr>
											    <td colspan="4"><p class="asistio">Participó como conferencista con la ponencia:</p></td>
											  </tr>
											  <tr>
											    <td colspan="4"><p class="ponencia">'.$ponencia.'</p></td>
											  </tr>
											  <tr>
											    <td colspan="4"><p class="evento">'.$evento.'</p></td>
											  </tr>
											  <tr>
											    <td colspan="4"><p class="fecha">Realizado en Bogotá, D.C., Colombia, '.$fecha.'</p></td>
											  </tr>
											  <tr>
											    <td colspan="4"><p class="constancia">En constancia firman:</p></td>
											  </tr>
											  <tr>
											  	<td></td>
											    <td><img src="'.DRUPAL_ROOT .'/modules/custom/certificados/css/images/firma1.png" class="imgFirma"></td>
											    <td><img src="'.DRUPAL_ROOT .'/modules/custom/certificados/css/images/firma2.png" class="imgFirma"></td>
											    <td></td>
											  </tr>
											  <tr>
											  	<td colspan="4"><img src="'.DRUPAL_ROOT.'/modules/custom/certificados/css/images/franja.png" style="width: 100%"></td>
											  </tr>
											</table>
										</body>';

				$dompdf = new Dompdf();
				$dompdf->loadHtml($markup);

				// (Optional) Setup the paper size and orientation
				$dompdf->setPaper('letter', 'landscape');

				// Render the HTML as PDF
				$dompdf->render();

				// Output the generated PDF to Browser
				$dompdf->stream("certificado", array("Attachment" => 0));

			}

			else {
				$contenido = array();
				$contenido['linea1'] = array(
					'#markup' => '<strong> No hay resultados!!! </strong><br><br>',
				);
			}
		}

		else {
			$contenido = array();
			$contenido['linea1'] = array(
				'#markup' => '<strong> No hay resultados!!! </strong><br><br>',
			);
		}

		return $contenido;
	}

	public function consulta_resultado_jurado($documento = null) {//certificados jurado

		$connection = \Drupal::database();

		if ($documento <> null) {
			$query = $connection->query("SELECT Nombre, Tipo, Documento, Evento, Fecha, Id FROM {certificado_jurado} cert WHERE Documento = '".$documento."' order by Id desc limit 1");

			if ($query) {
				$row = $query->fetchAssoc();
				$nombre = $row['Nombre'];
				$tipo = $row['Tipo'];
				$documento = $row['Documento'];
				$evento = $row['Evento'];
				$fecha = $row['Fecha'];
				$id = $row['Id'];

				$markup = '<head>
											<link rel="stylesheet" href="'.DRUPAL_ROOT .'/modules/custom/certificados/css/normalize.css">
											<link rel="stylesheet" href="'.DRUPAL_ROOT .'/modules/custom/certificados/css/style-jurado.css">
										</head>
										<body>
											<table style="table-layout: fixed; width: 1056px">
												<colgroup>
													<col style="width: 528px">
													<col style="width: 528px">
												</colgroup>
											  <tr>
											    <td colspan="4"><img src="'.DRUPAL_ROOT.'/modules/custom/certificados/css/images/logo.png" class="imgLogo"></td>
											  </tr>
											  <tr>
											    <td colspan="4"><h2 class="titulo">FUNDACIÓN UNIVERSITARIA DE CIENCIAS DE LA SALUD - FUCS</h2></td>
											  </tr>
											  <tr>
											    <td colspan="4"><p class="certifica">Certifica que:</p></td>
											  </tr>
											  <tr>
											    <td colspan="4"><p class="nombre">'.$nombre.'</p></td>
											  </tr>
											  <tr>
											    <td colspan="4"><p class="documento">'.$tipo.' '.$documento.'</p></td>
											  </tr>
											  <tr>
											    <td colspan="4"><p class="asistio">Participó como jurado</p></td>
											  </tr>
											  <tr>
											    <td colspan="4"><p class="evento">'.$evento.'</p></td>
											  </tr>
											  <tr>
											    <td colspan="4"><p class="fecha">Realizado en Bogotá, D.C., Colombia, '.$fecha.'</p></td>
											  </tr>
											  <tr>
											    <td colspan="4"><p class="constancia">En constancia firman:</p></td>
											  </tr>
											  <tr>
													<td></td>
											    <td><img src="'.DRUPAL_ROOT .'/modules/custom/certificados/css/images/firma1.png" class="imgFirma"></td>
											    <td><img src="'.DRUPAL_ROOT .'/modules/custom/certificados/css/images/firma2.png" class="imgFirma"></td>
													<td></td>
											  </tr>
											  <tr>
											  	<td colspan="4"><img src="'.DRUPAL_ROOT.'/modules/custom/certificados/css/images/franja.png" style="width: 100%"></td>
											  </tr>
											</table>
										</body>';

				$dompdf = new Dompdf();
				$dompdf->loadHtml($markup);

				// (Optional) Setup the paper size and orientation
				$dompdf->setPaper('letter', 'landscape');

				// Render the HTML as PDF
				$dompdf->render();

				// Output the generated PDF to Browser
				$dompdf->stream("certificado", array("Attachment" => 0));

			}

			else {
				$contenido = array();
				$contenido['linea1'] = array(
					'#markup' => '<strong> No hay resultados!!! </strong><br><br>',
				);
			}
		}

		else {
			$contenido = array();
			$contenido['linea1'] = array(
				'#markup' => '<strong> No hay resultados!!! </strong><br><br>',
			);
		}

		return $contenido;
	}

	public function consulta_resultado_ganador($documento = null) {//certificados ganadores

		$connection = \Drupal::database();

		if ($documento <> null) {
			$query = $connection->query("SELECT Nombre_autores, Nombre_trabajo, Evento, Posicion, Modalidad, Tipo, Documento, Fecha, Id FROM {certificado_ganador} cert WHERE Documento = '".$documento."' order by Id desc limit 1");

			if ($query) {
				$row = $query->fetchAssoc();
				$nombre_autores = $row['Nombre_autores'];
				$nombre_trabajo = $row['Nombre_trabajo'];
				$evento = $row['Evento'];
				$modalidad = $row['Modalidad'];
				$posicion = $row['Posicion'];
				$tipo = $row['Tipo'];
				$documento = $row['Documento'];
				$fecha = $row['Fecha'];
				$id = $row['Id'];

				$markup = '<head>
											<link rel="stylesheet" href="'.DRUPAL_ROOT .'/modules/custom/certificados/css/normalize.css">
											<link rel="stylesheet" href="'.DRUPAL_ROOT .'/modules/custom/certificados/css/style-ganador.css">
										</head>
										<body>
											<table style="table-layout: fixed; width: 1056px">
												<colgroup>
													<col style="width: 528px">
													<col style="width: 528px">
												</colgroup>
											  <tr>
											    <td colspan="4"><img src="'.DRUPAL_ROOT.'/modules/custom/certificados/css/images/logo.png" class="imgLogo"></td>
											  </tr>
											  <tr>
											    <td colspan="4"><h2 class="titulo">FUNDACIÓN UNIVERSITARIA DE CIENCIAS DE LA SALUD - FUCS</h2></td>
											  </tr>
											  <tr>
											    <td colspan="4"><p class="certifica">Certifica que el trabajo titulado:</p></td>
											  </tr>
											  <tr>
											    <td colspan="4"><p class="nombre">'.$nombre_trabajo.'</p></td>
											  </tr>
											  <tr>
											    <td colspan="4"><p class="asistio">Realizado por los siguientes autores:</p></td>
											  </tr>
											  <tr>
											    <td colspan="4"><p class="autores">'.$nombre_autores.'</p></td>
											  </tr>
											  <tr>
											    <td colspan="4"><p class="posicion">Ocupó el: '.$posicion.'       en la modalidad: '.$modalidad.'</p></td>
											  </tr>
											  <tr>
											    <td colspan="4"><p class="evento">'.$evento.'</p></td>
											  </tr>
											  <tr>
											    <td colspan="4"><p class="fecha">Realizado en Bogotá, D.C., Colombia, '.$fecha.'</p></td>
											  </tr>
											  <tr>
											    <td colspan="4"><p class="constancia">En constancia firman:</p></td>
											  </tr>
											  <tr>
													<td></td>
											    <td><img src="'.DRUPAL_ROOT .'/modules/custom/certificados/css/images/firma1.png" class="imgFirma"></td>
											    <td><img src="'.DRUPAL_ROOT .'/modules/custom/certificados/css/images/firma2.png" class="imgFirma"></td>
													<td></td>
											  </tr>
											  <tr>
											  	<td colspan="4"><img src="'.DRUPAL_ROOT.'/modules/custom/certificados/css/images/franja.png" style="width: 100%"></td>
											  </tr>
											</table>
										</body>';

				$dompdf = new Dompdf();
				$dompdf->loadHtml($markup);

				// (Optional) Setup the paper size and orientation
				$dompdf->setPaper('letter', 'landscape');

				// Render the HTML as PDF
				$dompdf->render();

				// Output the generated PDF to Browser
				$dompdf->stream("certificado", array("Attachment" => 0));

			}

			else {
				$contenido = array();
				$contenido['linea1'] = array(
					'#markup' => '<strong> No hay resultados!!! </strong><br><br>',
				);
			}
		}

		else {
			$contenido = array();
			$contenido['linea1'] = array(
				'#markup' => '<strong> No hay resultados!!! </strong><br><br>',
			);
		}

		return $contenido;
	}

	public function consulta_resultado_trabajo($documento = null) {//certificados trabajos

		$connection = \Drupal::database();

		if ($documento <> null) {
			$query = $connection->query("SELECT Nombre_autores, Nombre_trabajo, Evento, Modalidad, Tipo, Documento, Fecha, Id FROM {certificado_trabajo} cert WHERE Documento = '".$documento."' order by Id desc limit 1");

			if ($query) {
				$row = $query->fetchAssoc();
				$nombre_autores = $row['Nombre_autores'];
				$nombre_trabajo = $row['Nombre_trabajo'];
				$evento = $row['Evento'];
				$modalidad = $row['Modalidad'];
				$tipo = $row['Tipo'];
				$documento = $row['Documento'];
				$fecha = $row['Fecha'];
				$id = $row['Id'];

				$markup = '<head>
											<link rel="stylesheet" href="'.DRUPAL_ROOT .'/modules/custom/certificados/css/normalize.css">
											<link rel="stylesheet" href="'.DRUPAL_ROOT .'/modules/custom/certificados/css/style-trabajo.css">
										</head>
										<body>
											<table style="table-layout: fixed; width: 1056px">
												<colgroup>
													<col style="width: 528px">
													<col style="width: 528px">
												</colgroup>
											  <tr>
											    <td colspan="4"><img src="'.DRUPAL_ROOT.'/modules/custom/certificados/css/images/logo.png" class="imgLogo"></td>
											  </tr>
											  <tr>
											    <td colspan="4"><h2 class="titulo">FUNDACIÓN UNIVERSITARIA DE CIENCIAS DE LA SALUD - FUCS</h2></td>
											  </tr>
											  <tr>
											    <td colspan="4"><p class="certifica">Certifica que el trabajo titulado:</p></td>
											  </tr>
											  <tr>
											    <td colspan="4"><p class="nombre">'.$nombre_trabajo.'</p></td>
											  </tr>
											  <tr>
											    <td colspan="4"><p class="asistio">Realizado por los siguientes autores:</p></td>
											  </tr>
											  <tr>
											    <td colspan="4"><p class="autores">'.$nombre_autores.'</p></td>
											  </tr>
											  <tr>
											    <td colspan="4"><p class="posicion">Fue presentado en la modalidad: '.$modalidad.'</p></td>
											  </tr>
											  <tr>
											    <td colspan="4"><p class="evento">'.$evento.'</p></td>
											  </tr>
											  <tr>
											    <td colspan="4"><p class="fecha">Realizado en Bogotá, D.C., Colombia, '.$fecha.'</p></td>
											  </tr>
											  <tr>
											    <td colspan="4"><p class="constancia">En constancia firman:</p></td>
											  </tr>
											  <tr>
													<td></td>
											    <td><img src="'.DRUPAL_ROOT .'/modules/custom/certificados/css/images/firma1.png" class="imgFirma"></td>
											    <td><img src="'.DRUPAL_ROOT .'/modules/custom/certificados/css/images/firma2.png" class="imgFirma"></td>
													<td></td>
											  </tr>
											  <tr>
											  	<td colspan="4"><img src="'.DRUPAL_ROOT.'/modules/custom/certificados/css/images/franja.png" style="width: 100%"></td>
											  </tr>
											</table>
										</body>';

				$dompdf = new Dompdf();
				$dompdf->loadHtml($markup);

				// (Optional) Setup the paper size and orientation
				$dompdf->setPaper('letter', 'landscape');

				// Render the HTML as PDF
				$dompdf->render();

				// Output the generated PDF to Browser
				$dompdf->stream("certificado", array("Attachment" => 0));

			}

			else {
				$contenido = array();
				$contenido['linea1'] = array(
					'#markup' => '<strong> No hay resultados!!! </strong><br><br>',
				);
			}
		}

		else {
			$contenido = array();
			$contenido['linea1'] = array(
				'#markup' => '<strong> No hay resultados!!! </strong><br><br>',
			);
		}

		return $contenido;
	}
}