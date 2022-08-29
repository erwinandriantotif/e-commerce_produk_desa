<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class manggil extends CI_Controller {
	public function __construct(){
		parent::__construct();

		$set = $this->func->getSetting("semua");
    }

    public function index()
    {
        $tujuan = "denih1360@gmail.com";
        $this->func->sendEmailOK($tujuan,$judul,$pesan,$subyek,$pengirim=null);
        
	}
    
}
