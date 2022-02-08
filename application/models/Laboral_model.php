<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Laboral_model extends General_model{
    public function __construct(){    
        $table = 'juridica_laboral';
        parent::__construct($table); 
    }

     public function datatable($id_curso = null) {                  //inicializa la base de datos
    	$table = 'juridica_laboral';
    	$primaryKey = 'juridica_laboral.id';
		$columns = array(
			array( 'db' => 'juridica_laboral.id', 'dt' => 'id' ),
			array( 'db' => 'juridica_laboral.n_demandante', 'dt' => 'n_demandante' ),
			array( 'db' => 'juridica_laboral.rut', 'dt' => 'rut' ),
			array( 'db' => 'juridica_laboral.rol', 'dt' => 'rol' ),
			array( 'db' => 'juridica_laboral.fecha_not', 'dt' => 'fecha_not' ),
			array( 'db' => 'juridica_laboral.tribunal', 'dt' => 'tribunal' ),
            array( 'db' => 'juridica_laboral.fecha_res', 'dt' => 'fecha_res' ),
            array( 'db' => 'juridica_laboral.fecha_prep', 'dt' => 'fecha_prep' ),
            array( 'db' => 'juridica_laboral.fecha_juicio', 'dt' => 'fecha_juicio' ),
            array( 'db' =>'juridica_laboral.etapa', 'dt' => 'etapa'),
            array('db' =>'juridica_laboral.tipo','dt' => 'tipo'),
            array('db' =>'juridica_laboral.resolucion','dt' => 'resolucion'),
		);
    	$data = $this->data_tables->complex($_POST , $table, $primaryKey, $columns);
        return $data;
     }


    public function insertar_monitorio($data){      //funcion de insertar a la base de datos juridica_laboral.
        $this->db->insert('juridica_laboral',$data);
    }

    public function editar_monitorio($data){    //funcion que edita el dato que recibe a partir del id, buscandolo en la tabla.
        $this->db->get('juridica_laboral');
        $this->db->where('id',$data['id']);
        $this->db->update('juridica_laboral',$data);
    }

    public function getUsuarios(){
        $query = $this->db->query('SELECT * FROM abogados');
        $data = $query->result();
        return $data;
    }


    public function getbyid($id = null){                    //devuelve la columna de la tabla de datos
        $query = $this->db->query('SELECT * FROM juridica_laboral WHERE juridica_laboral.id = '. $id);
        foreach($query->result() as $value){
            $data['id'] = $value->id;
            $data['n_demandante'] = $value->n_demandante;
            $data['rut'] = $value->rut;
            $data['rol'] = $value->rol;
            $data['fecha_not'] = $value->fecha_not;
            $data['fecha_res'] = $value->fecha_res;
            $data['fecha_prep'] = $value->fecha_prep;
            $data['fecha_juicio'] = $value->fecha_juicio;
            $data['tipo'] = $value->tipo;
            $data['tribunal'] = $value->tribunal;
            $data['id_asignado'] = $value->id_asignado;
            $data['etapa'] = $value->etapa;
            $data['archivo'] = $value->archivo;
            $data['resolucion'] = $value->resolucion;
        }
        return $data;
    }

    public function getMail($id = null){
        $query = $this->db->query('SELECT * FROM users WHERE users.id = '. $id);
        foreach($query->result() as $value){
            $data['email'] = $value->email;
            $data['nombre'] = $value->first_name .' '. $value->last_name; 
        }
        return $data;
    }


    public function sendMail($nombre = null, $email = null){
        $this->load->library('PHPMailer_Lib');
        $mail = $this->phpmailer_lib->load();		
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 465;
		$mail->SMTPSecure = 'ssl';
		$mail->SMTPOptions = array(
            'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
            )
        );
		$mail->SMTPAuth = true;
		$mail->Username = "notificaciones.td@cmvalparaiso.cl";
		$mail->Password = "td456CMV";
		$mail->setFrom('notificaciones.td@cmvalparaiso.cl', 'Notificación TD');
		$mail->addAddress($email, $nombre);
		$mail->Subject = 'Información ingresada';
		$mail->MsgHTML("Datos modificados");
		$mail->CharSet = 'UTF-8';
		
		if(!empty($subject)){
			$mail->Subject = $subject;
		}
		return $mail->send();
	}


}