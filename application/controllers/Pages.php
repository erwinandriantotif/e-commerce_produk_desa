<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {
	/*public function __construct(){
		parent::__construct();

		if($this->func->maintenis() == TRUE) {
			include(APPPATH.'views/maintenis.php');

			die();
		}
	}*/

	public function tentangkami()
    {
        $this->load->view('header');
        $this->load->view('pages/about');
        $this->load->view('footer');
    }

    public function kontak()
    {
        $this->load->view('header');
        $this->load->view('pages/contact');
        $this->load->view('footer');
    }
}
