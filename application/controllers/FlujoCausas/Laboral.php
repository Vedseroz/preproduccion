<?php defined ('BASEPATH') OR exit ('No direct script access allowed');

class Laboral extends CI_Controller{
    private $data = array();

    public function __construct(){
        parent::__construct();
        //sesión
        $this->ion_auth->redirectLoginIn();

        //models
        $this->load->model('Laboral_model');

        //librerias
        $this->load->library('upload');
        //helpers
        $this->load->helper(array('date','download','file','html'));

        $this->data['menu_items'] = array(
            'causas'
        );
        $this->load->helper('array');
        $this->load->helper('form');

        //errores
        $this->data['errors'] = array();
        $this->data['title'] = 'FALSE';

    }

    public function index(){

    }

    public function ordinario(){
         $this->data['breadcrumb'] = array(
            array(
                'name' => 'Laboral Ordinario',
                'link' => site_url('ordinario/index')
            )
        );
        $this->view_handler->view('juridica/Flujoscausa/Laboral','Ordinario',$this->data);
    }

    public function monitorio(){
        $this->data['title'] = 'FALSE';
		$this->data['subtitle'] = 'Página en blanco';
        
        $this->data['breadcrumb'] = array(
            array(
                'name' => 'Laboral Monitorio',
                'link' => site_url('monitorio/index')
            )
        );
        $this->view_handler->view('juridica/Flujoscausa/Laboral','Monitorio',$this->data);


    }

    public function insertar_monitorio(){
        //form validation

        $this->form_validation->set_rules('n_demandante','<b>Nombre del Demandante</b>','trim|required');
        $this->form_validation->set_rules('rut','<b>RUT del Demandante</b>','trim|required');
        $this->form_validation->set_rules('rol','<b>RIT/ROL</b>','trim|required');
        $this->form_validation->set_rules('fecha_not','<b>Fecha de Notificación</b>','trim|required');
        $this->form_validation->set_rules('fecha_res','<b>Fecha de Respuesta</b>','trim|required');

        //creacion de array de datos.
        
        $rol = $this->input->post('rol');
        $tipo = explode("-",$rol);
        $n_archivo = $this->name();  //nombre del archivo

        $datos = array(
            'n_demandante' => $this->input->post('n_demandante'),
            'rut' => $this->input->post('rut'),
            'rol' => $this->input->post('rol'),
            'fecha_not' => $this->input->post('fecha_not'),
            'tribunal' => $this->input->post('tribunal'),
            'fecha_res' => $this->input->post('fecha_res'),
            'tipo' => $tipo[0],
            'id_asignado' => 96,
            'archivo' => $n_archivo,
            'etapa' => 1
        );
        
        $config['upload_path'] = './files/juridica/LaboralM/';
        $config['allowed_types'] = '*';
        $config['overwrite'] = true;
        //subida del archivo
        
        if($this->upload->initialize($config)){
        
        $this->upload->do_upload('documento_fl');
        }
        else{
            echo "no cargo el config";
        }
        //inserta en el model el array

        $this->Laboral_model->insertar_monitorio($datos);
        
        $this->status();
        
    }

    public function name(){
        return basename($_FILES["documento_fl"]["name"]);
    }

    //mostrar los datos por el id de la fila
    public function mostrar_monitorio_id($id = null){
        $data = $this->Laboral_model->getbyid($id);
        $this->view_handler->view('juridica/Flujoscausa/Laboral','MonitorioMostrar',$data);
    }

    //edita la información que recibe
    public function editar_monitorio($id = null){  //recibe el id a partir del URI, desde la tabla del inicio.
        $this->form_validation->set_rules('fecha_not','<b>Fecha de Notificación</b>','trim|required');
        $this->form_validation->set_rules('n_demandante','<b>Nombre de Demandante</b>','trim|required');
        $this->form_validation->set_rules('rut','<b>RUT del Demandante</b>','trim|required');
        $this->form_validation->set_rules('rol','<b>RIT/ROL</b>','trim|required');

        $datos = array(
            'id' => $id, 
            'n_demandante' => $this->input->post('n_demandante'),       
            'rut' => $this->input->post('rut'),
            'rol' => $this->input->post('rol'),   
            'fecha_res' => $this->input->post('fecha_res')
        );

        $this->Laboral_model->editar_monitorio($datos);
        redirect(site_url('inicio/index'));
    }



    //mostrar informacion en inputs.
    public function status(){
       $this->view_handler->view('juridica/','status'); 
    }
    




}