<?php
class cPeluqueria extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$this->load->model('mPeluqueria');
		$this->load->library('plantilla');
	}
	function index()
	{
		
		$datos=array('titulo'=>$this->plantilla->devolverTitulo()."<br>".$this->plantilla->devolverFechaHora(),
			'enlaces'=>$this->plantilla->devolverMenu(),
			'contenido'=>"<h1>Bienvenidos a la tienda del peluquero crisman</h1>"
			);
		$this->load->view('vSesion',$datos);

	}
	function registroClientes()
	{
		$this->form_validation->set_rules('txtidcliente','idcliente','trim|required|min_length[3]|max_length[30]|numeric');

		$this->form_validation->set_rules('txtnombre','nombre','trim|required|min_length[3]|max_length[50]');

		$this->form_validation->set_rules('txtdireccion','direccion','trim|required|min_length[3]|max_length[50]');

		$this->form_validation->set_rules('txttelefono','telefono','trim|required|numeric');

		$this->form_validation->set_rules('txtemail','email','trim|required');
		
		$this->form_validation->set_rules('txtclave','clave','trim|required|numeric');


		if ($this->form_validation->run()==FALSE)
		{
			$datos=array(
			'titulo' => $this->plantilla->devolverTitulo() . "<br>" . $this->plantilla->devolverFechaHora(),
			'enlaces' => $this->plantilla->devolverMenu(),
			'contenido' => "<h2>Registro de usuarios</h2>"
			);
		//Luego ir a las vistas vInicio y vUsuario especificando estos datos dinámicos
		//$this->load->view('vInicio',$datos);
		$this->load->view('vClientesregistro',$datos);	
		}
		else
		{
			//Validar que el registro no exista
			$result = $this->mPeluqueria->consultarclientes('tblcliente','idcliente',$this->input->post('txtidcliente'));
			//Verificar cuantos registros devuelve la consulta
			if ($result->num_rows() == 0)
			{
				//Llamar el modelo para guardar
				$registro=array(
					'idcliente' => $this->input->post('txtidcliente'),
					'nombre' => $this->input->post('txtnombre'),
					'direccion' => $this->input->post('txtdireccion'),
					'telefono' => $this->input->post('txttelefono'),
					'email' => $this->input->post('txtemail'),
					'clave'=>$this->input->post('txtclave')
					);
					$this->mPeluqueria->registroclientes('tblcliente',$registro);

					// //Mostrar los clientes
					 $contenido = $this->mPeluqueria->verClientes('tblcliente');
					 $datos = array(
					 	'titulo' => $this->plantilla->devolverTitulo() . "<br>" . $this->plantilla->devolverFechaHora(),
						'enlaces' => $this->plantilla->devolverMenu(),
					 	'contenido' => $contenido,
						'total_clientes' => $this->mPeluqueria->total_clientes('tblcliente')
				  		);
					// //Cargar la vista que muestra los datos con el parámetro $datos
					 $this->load->view('vClientesguardados',$datos);
			}
			else
			{
				//Devolverlo a la misma vista
				$datos=array(
						'titulo' => $this->plantilla->devolverTitulo() . "<br>" . $this->plantilla->devolverFechaHora(),
						'enlaces' => $this->plantilla->devolverMenu(),
						'contenido' => "<h2>Registro de clientes</h2><b>El cliente ya se encuentra registrado revisa su identificacion!!"
						);
				//Luego ir a las vistas vInicio y vUsuario especificando estos datos dinámicos
				//$this->load->view('vInicio',$datos);
				$this->load->view('vClientesregistro',$datos);	
			}
		}
	}
	function verClientes()
	{
		$contenido = $this->mPeluqueria->verClientes('tblcliente');

		$datos = array(
			'titulo' => $this->plantilla->devolverTitulo() . "<br>" . $this->plantilla->devolverFechaHora(),
			'enlaces' => $this->plantilla->devolverMenu(),
			'contenido' => $contenido,
			'total_clientes' => $this->mPeluqueria->total_clientes('tblcliente')
			 );
		//Cargar la vista que muestra los datos con el parámetro $datos
		$this->load->view('vClientesguardados',$datos); 
		//Recordar ir al archivo autoload.php: $autoload['libraries'] = array('database');
	}
	public function modificarcliente($idcliente="")
    {
     $contenido = $this->mPeluqueria->consultarclientes("tblcliente","idcliente",$idcliente);
       if($contenido->num_rows()!=0)
       {
         $this->datos['contenido']=$contenido;   
       }
       else
       {
        $this->datos['contenido']="<b>No existe registro del cliente</b>";      
       }
 	   $this->load->view("vModificarcli",  $this->datos);
 	   
    }
	function eliminarcliente($idcliente)
	 {
	 	$criterio = array('idcliente' => $idcliente);
	 	$this->mPeluqueria->eliminarcliente('tblcliente',$criterio);
	 	//Redireccionar a la función verUsuarios
	 	redirect("cPeluqueria/verClientes");
	 }
	 public function actualizarcliente()
    {
     $this->form_validation->set_rules('txtidcliente','idcliente','trim|required|min_length[3]|max_length[30]|numeric');

	 	$this->form_validation->set_rules('txtnombre','nombre','trim|required|min_length[3]|max_length[50]');

	 	$this->form_validation->set_rules('txtdireccion','direccion','trim|required');

	 	$this->form_validation->set_rules('txttelefono','telefono','trim|required|numeric');

	 	$this->form_validation->set_rules('txtemail','email','trim|required');

	 	$this->form_validation->set_rules('txtclave','clave','trim|required|numeric');

	 	$idcliente=  $this->input->post("txtidcliente");

       if($this->form_validation->run()==FALSE)
      {
       $contenido = $this->mPeluqueria->consultarclientes("tblcliente","idcliente",$idcliente);   
       $this->datos['contenido']=$contenido;   
       $this->load->view("vModificarcli", $this->datos);
      }
      else 
      {
       $registro=array(
            'nombre'=> $this->input->post("txtnombre"),
            'direccion'=>$this->input->post("txtdireccion"),
            'telefono'=>$this->input->post("txttelefono"),
            'email'=>$this->input->post("txtemail"),
            'clave'=>$this->input->post("txtclave"),
          );
       $this->mPeluqueria->actualizarCliente($registro,"tblcliente","idcliente",$idcliente);
       redirect("/cPeluqueria/verClientes");
      }
   }

   //funciones para realizar el guardado del proovedor 
   function registroProvedor()
    {
    	$this->form_validation->set_rules('txtnit','nit','trim|required|min_length[3]|max_length[30]|numeric');

		$this->form_validation->set_rules('txtrazonsocial','razonsocial','trim|required|min_length[3]|max_length[50]');

		$this->form_validation->set_rules('txtdireccion','direccion','trim|required');

		$this->form_validation->set_rules('txttelefono','telefono','trim|required|numeric');


		if ($this->form_validation->run()==FALSE)
		{
			$datos=array(
			'titulo' => $this->plantilla->devolverTitulo() . "<br>" . $this->plantilla->devolverFechaHora(),
			'enlaces' => $this->plantilla->devolverMenu(),
			'contenido' => "<h2>Registro de proovedores de la peluqueria crisman</h2>"
			);
		//Luego ir a las vistas vInicio y vUsuario especificando estos datos dinámicos
		//$this->load->view('vInicio',$datos);
		$this->load->view('vRegpro',$datos);	
		}
		else
		{
			//Validar que el registro no exista
			$result = $this->mPeluqueria->consultaprovedor('tblprovedor','nit',$this->input->post('txtnit'));
			//Verificar cuantos registros devuelve la consulta
			if ($result->num_rows() == 0)
			{
				//Llamar el modelo para guardar
				$registro=array(
					'nit' => $this->input->post('txtnit'),
					'razonsocial' => $this->input->post('txtrazonsocial'),
					'direccion' => $this->input->post('txtdireccion'),
					'telefono' => $this->input->post('txttelefono')
					);
					$this->mPeluqueria->registroprovedor('tblprovedor',$registro);

					//Mostrar los clientes
					$contenido = $this->mPeluqueria->verproovedor('tblprovedor');
					$datos = array(
						'titulo' => $this->plantilla->devolverTitulo() . "<br>" . $this->plantilla->devolverFechaHora(),
						'enlaces' => $this->plantilla->devolverMenu(),
						'contenido' => $contenido,
						'total_provedor' => $this->mPeluqueria->total_provedor('tblprovedor')
				 		);
					//Cargar la vista que muestra los datos con el parámetro $datos
					$this->load->view('vProguardado',$datos);
			}
			else
			{
				//Devolverlo a la misma vista
				$datos=array(
						'titulo' => $this->plantilla->devolverTitulo() . "<br>" . $this->plantilla->devolverFechaHora(),
						'enlaces' => $this->plantilla->devolverMenu(),
						'contenido' => "El proovedor ya se encuentra registrado revisa su nit!!"
						);
				//Luego ir a las vistas vInicio y vUsuario especificando estos datos dinámicos
				//$this->load->view('vInicio',$datos);
				$this->load->view('vRegpro',$datos);	
			}
		}
    }
    function eliminarprovedor($nit)
	{
		$criterio = array('nit' => $nit);
		$this->mPeluqueria->eliminarproovedor('tblprovedor',$criterio);
		//Redireccionar a la función verUsuarios
		redirect("cPeluqueria/verProvedor");
	}
	function verProvedor()
	{
		$contenido = $this->mPeluqueria->verproovedor('tblprovedor');

		$datos = array(
			'titulo' => $this->plantilla->devolverTitulo() . "<br>" . $this->plantilla->devolverFechaHora(),
			'enlaces' => $this->plantilla->devolverMenu(),
			'contenido' => $contenido,
			'total_provedor' => $this->mPeluqueria->total_provedor('tblprovedor')
			 );
		//Cargar la vista que muestra los datos con el parámetro $datos
		$this->load->view('vProguardado',$datos); 
		//Recordar ir al archivo autoload.php: $autoload['libraries'] = array('database');
	}
	public function modificarprovedor($nit="")
    {
     $contenido = $this->mPeluqueria->consultaprovedor("tblprovedor","nit",$nit);
       if($contenido->num_rows()!=0)
       {
         $this->datos['contenido']=$contenido;   
       }
       else
       {
        $this->datos['contenido']="<b>No existe registro del proovedor</b>";      
       }
 	   $this->load->view("vModificarprovedor",  $this->datos);
 	   
    }
    public function actualizarprovedor()
    {
     $this->form_validation->set_rules('txtnit','nit','trim|required|min_length[3]|max_length[30]|numeric');

	 	$this->form_validation->set_rules('txtrazonsocial','razonsocial','trim|required|min_length[3]|max_length[50]');

	 	$this->form_validation->set_rules('txtdireccion','direccion','trim|required');

	 	$this->form_validation->set_rules('txttelefono','telefono','trim|required|numeric');

	 	$nit=  $this->input->post("txtnit");

       if($this->form_validation->run()==FALSE)
      {
       $contenido = $this->mPeluqueria->consultaprovedor("tblprovedor","nit",$nit);   
       $this->datos['contenido']=$contenido;   
       $this->load->view("vModificarprovedor", $this->datos);
      }
      else 
      {
       $registro=array(
            'razonsocial'=> $this->input->post("txtrazonsocial"),
            'direccion'=>$this->input->post("txtdireccion"),
            'telefono'=>$this->input->post("txttelefono")
          );
       $this->mPeluqueria->actualizarprovedor($registro,"tblprovedor","nit",$nit);
       redirect("/cPeluqueria/verProvedor");
      }
   }
   function registroProducto()
    {
    	$this->form_validation->set_rules('txtreferencia', 'Referencia del producto', 'trim|required|max_length[15]');

      $this->form_validation->set_rules('txtdescripcion', 'Descripcion', 'trim|required');

      $this->form_validation->set_rules('txtnit', 'Nit del proovedor', 'trim|required|numeric');

      $this->form_validation->set_rules('txtexistencia', 'Existencia', 'trim|required|numeric');

      if ($this->form_validation->run()==FALSE)
      {
      	$datos=array(
			    'titulo' => $this->plantilla->devolverTitulo() . "<br>" . $this->plantilla->devolverFechaHora(),
			    'enlaces' => $this->plantilla->devolverMenu(),
			    'contenido' => "<h2>Registro Productos </h2>"
			  );
        $this->load->view('vRegproductos', $datos);
      }
      else
      {
      	 $result = $this->mPeluqueria->consultarproducto('tblproductos', 'referencia', $this->input->post('txtreferencia'));

        if ($result->num_rows() == 0)
        {
        	$result = $this->mPeluqueria->consultaprovedor('tblprovedor', 'nit', $this->input->post('txtnit'));

          if ($result->num_rows() != 0)
          {
          	$registro = array(
  					'referencia' => $this->input->post('txtreferencia'),
  					'descripcion' => $this->input->post('txtdescripcion'),
  					'nit' => $this->input->post('txtnit'),
  					'existencia' => $this->input->post('txtexistencia')
					);
          	$this->mPeluqueria->registroproducto('tblproductos', $registro);

          	$datos = array(
  						'titulo' => $this->plantilla->devolverTitulo() . "<br>" . $this->plantilla->devolverFechaHora(),
  						'enlaces' => $this->plantilla->devolverMenu(),
  						'contenido' => "<h2>Producto guardado</h2>",
            );
            $this->load->view('vRegproductos', $datos);
          }
          else
          {
          	 $datos=array(
  						'titulo' => $this->plantilla->devolverTitulo() . "<br>" . $this->plantilla->devolverFechaHora(),
  						'enlaces' => $this->plantilla->devolverMenu(),
  						'contenido' => "<h2>El nit del proovedor no se encuentra registrado</h2>"
  						);
            $this->load->view('vRegproductos', $datos);
          }
        }
        else
        {
        	$datos=array(
			'titulo' => $this->plantilla->devolverTitulo() . "<br>" . $this->plantilla->devolverFechaHora(),
			'enlaces' => $this->plantilla->devolverMenu(),
			'contenido' => "<h2>La referencia del producto ya existe</h2> "
						);
          $this->load->view('vRegproductos', $datos);
        }
      }
    }
     function registroCitas()
    {
    	$this->form_validation->set_rules('txtidcliente', 'Identificacion del cliente', 'trim|required|max_length[15]');

      $this->form_validation->set_rules('txthora', 'Hora', 'trim|required');

      $this->form_validation->set_rules('txtcitapara', 'Cita para', 'trim|required');

      if ($this->form_validation->run()==FALSE)
      {
      	$datos=array(
			    'titulo' => $this->plantilla->devolverTitulo() . "<br>" . $this->plantilla->devolverFechaHora(),
			    'enlaces' => $this->plantilla->devolverMenu(),
			    'contenido' => "<h2>Registro Citas </h2>"
			  );
        $this->load->view('vCitas', $datos);
      }
      else
      {
      	 $result = $this->mPeluqueria->consultarcita('tblcitas1', 'hora', $this->input->post('txthora'));

        if ($result->num_rows() == 0)
        {
        	$result = $this->mPeluqueria->consultarclientes('tblcliente', 'idcliente', $this->input->post('txtidcliente'));

          if ($result->num_rows() != 0)
          {
          	$registro = array(
  					'idcliente' => $this->input->post('txtidcliente'),
  					'hora' => $this->input->post('txthora'),
  					'citapara' => $this->input->post('txtcitapara')
					);
          	$this->mPeluqueria->registrocita('tblcitas1', $registro);

          	$datos = array(
  						'titulo' => $this->plantilla->devolverTitulo() . "<br>" . $this->plantilla->devolverFechaHora(),
  						'enlaces' => $this->plantilla->devolverMenu(),
  						'contenido' => "<h2>Cita guardada recuerda llegar 10 minutos antes</h2>",
            );
            $this->load->view('vCitas', $datos);
          }
          else
          {
          	 $datos=array(
  						'titulo' => $this->plantilla->devolverTitulo() . "<br>" . $this->plantilla->devolverFechaHora(),
  						'enlaces' => $this->plantilla->devolverMenu(),
  						'contenido' => "<h2>El cliente debe estar registrado para pedir citas por internet</h2>"
  						);
            $this->load->view('vCitas', $datos);
          }
        }
        else
        {
        	$datos=array(
			'titulo' => $this->plantilla->devolverTitulo() . "<br>" . $this->plantilla->devolverFechaHora(),
			'enlaces' => $this->plantilla->devolverMenu(),
			'contenido' => "<h2>A la hora selecionada no hay citas seleciona otra hora para tu cita</h2> "
						);
          $this->load->view('vCitas', $datos);
        }
      }
    }
    function vergaleria()
	{
		//$contenido = $this->mPeluqueria->verproovedor('tblprovedor');

		$datos = array(
			'titulo' => $this->plantilla->devolverTitulo() . "<br>" . $this->plantilla->devolverFechaHora(),
			'enlaces' => $this->plantilla->devolverMenu(),
			//'contenido' => $contenido,
			//'total_provedor' => $this->mPeluqueria->total_provedor('tblprovedor')
			 );
		//Cargar la vista que muestra los datos con el parámetro $datos
		$this->load->view('vGaleria',$datos); 
		//Recordar ir al archivo autoload.php: $autoload['libraries'] = array('database');
	}
}
?>