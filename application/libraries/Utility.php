<?php 
Class Utility{

	protected $ci;

	function __construct()
	{
		$this->ci =& get_instance();
	}

	function user_login()
	{
		$this->ci->load->model('user_m');
		$user_id = $this->ci->session->userdata('id_user');
		return $this->ci->user_m->getUser($user_id)->row();
	}
	function print($html, $filename, $paper, $orientation)
	{
		$dompdf = new Dompdf\Dompdf;
		$dompdf->loadHTML($html);
		$dompdf->setPaper($paper, $orientation);
		$dompdf->render();
		$dompdf->stream($filename, array('Attachment' => 0));

	}

}

?>