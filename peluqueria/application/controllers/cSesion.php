<?php
class cSesion extends CI_Controller
{
	function __construct()
	{
	parent::__construct();
     $this->load->helper(array('form','url'));
     $this->load->library('form_validation');
     $this->load->library("plantilla");
     $this->load->model("mPeluqueria");

     $this->titulo= $this->plantilla->devolverTitulo() . "<br>" . $this->plantilla->devolverFechaHora();
     $this->enlaces= $this->plantilla->devolverMenu();
     //$this->pie= $this->plantilla->devolverPie();
     
     $this->datos=array(
            'titulo'=>  $this->titulo,
            'enlaces'=> $this->enlaces,
            //'pie'=>  $this->pie
            );
	}
	public function index()
    {
       $this->datos['contenido']="<h2>Inicio de sesión</h2>";
       $this->load->view('vSesion',  $this->datos);
    }
     public function iniciarSesion()
    {
      $this->form_validation->set_rules('txtemail', 'email','trim|required');  
      $this->form_validation->set_rules('txtclave', 'clave','trim|required');
      
        if($this->form_validation->run()==FALSE)
        {
          $this->index();  
        }
        else
        {
          $reg=array(
               "email"=>$this->input->post("txtemail"),
               "clave"=>$this->input->post("txtclave")
              ); 
          $result=$this->mPeluqueria->validarIngreso($reg);
          
           if($result->num_rows()==0)
           {
            $this->datos["contenido"]="<h2 aling='center'>Inicio de sesión de la tienda del peluquero crisman</h2>
                                        <script>
                                         alert('Usuario o contraseña incorrecta');
                                        </script>";  
           
            $this->load->view('vSesion',$this->datos);
           }
           else
           {
           	$this->session->set_userdata($reg);
            $this->session->set_userdata($reg);
            $email=$this->input->post("txtemail");
            $contenido="<p>Bienvenido a la tienda del peluquero crisman<p>
                        <script>
                            alert('$email inició sesión correctamente');
                        </script>
             <p>Usuario conectado: " . $this->session->userdata['email'] . "</p>";
            
            $this->datos["contenido"]=$contenido;  
            $this->load->view('vInicio',  $this->datos);
           }
       
        }
    }
    public function cerrarSesion()
 	{
  		$this->session->sess_destroy(); 
  		$contenido="<p>Bienvenido a la tiena del peluquero crisman<p>
              <script>
                alert('Sesión finalizada');
              </script>";
  		$this->datos["contenido"]=$contenido;
  	$this->load->view('vSesion',  $this->datos);
 	}
  
}
?>