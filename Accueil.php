<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accueil extends MY_Controller {

	public function index()
	{
        $this->load->model('commerce_model');
        $this->load->model('ville_model');

        $villes = $this->commerce_model->get_villes();

        foreach($villes as $ville){
            $data['villes'][] = $this->ville_model->get_by_id($ville['ville_id']);
        }

        $this->load->model('type_model');

        $data['types'] = $this->type_model->get();

        $data['total_commerces'] = $this->commerce_model->total_commerces();
        $data['total_villes'] = $this->commerce_model->total_villes();

		$this->load->view('index', $data);

        /**
         * Je rajoute une ligne
         */
    }
}
