<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends MY_Controller {
 
    public function __construct() 
    {
		parent::__construct();
		$this->load->model('Noticias_model');
		$this->load->model('Inicio_model');
		/*
			Breadcrumb:
			Por cada nivel que se desee mostrar, se agrega un array con la siguiente estructura 
			array(
			
				'name' => 'Nombre',
				'link' => 'http://www.pagina.com/nombre'
			)
		*/
		$this->data['breadcrumb'] = array(
			array(
				'name' => 'Inicio',
				'link' =>  site_url('inicio/index')
			)
		);
		/*
			Contiene los menú seleccionados
			Ejemplo:
			$data['menu_items'] = array(
				'menu1',
				'submenu1',
				'subsubmenu1'
			);
		*/
		$this->data['menu_items'] = array(
			'inicio',
		);
    }

	public function index(){
		
		$this->data['title'] = 'FALSE';
		$this->data['subtitle'] = 'Sistemas externos';
		$this->data['tabla']   = $this->Inicio_model->verifyDatesFile(); //VERIFICAR Y MOSTRAR LOS FERIADOS
		$this->data['noticias'] = $this->Noticias_model->cardsNoticias();//CARDS CON LAS NOTICIAS DEL AÑO
		$this->data['resumen'] = $this->Inicio_model->getResumen();
		$this->view_handler->view('inicio', 'main', $this->data);
	}

}
