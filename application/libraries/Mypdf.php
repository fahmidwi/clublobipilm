<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

include('assets/dompdf/autoload.inc.php');
use Dompdf\Dompdf;
/**
 * 
 */
/*class Mypdf
{
	protected $ci;

 	public function __construct()
	{
		$this->$ci =& get_instance();
	}

	public function generate($view, $data = array(), $filename = 'Laporan', $paper = 'A4', $orientation = 'portrait')
	{
		$dompdf = new Dompdf();
		$html = $this->ci->load->view($view, $data, TRUE);
		$dompdf->loadHtml($html);
		$dompdf->setPaper($paper, $orientation);

		// Render the HTML as PDF
		$dompdf->render();
	    $dompdf->stream($filename . ".pdf", array('Attachment' => FALSE ));
	}
}*/
class Mypdf
{
  protected $ci;

  public function __construct()
  {
        $this->ci =& get_instance();
  }

  public function generate($view, $data = array(), $filename = 'Laporan', $paper = 'A4', $orientation='portrait')
  {
    $dompdf = new Dompdf();
    $html = $this->ci->load->view($view, $data, TRUE);
    $dompdf->loadHtml($html);
    $dompdf->setPaper($paper, $orientation);
    // Render the HTML as PDF
    $dompdf->render();
      $dompdf->stream( $filename . ".pdf", array("Attachment" => FALSE));

  }

}
?>