<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

	class Main extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			session_start();
			$this->load->helper('form');
			$this->load->model('Main_Model');
		}

		/*public function index($email = '')
		{
			if ( !empty( $email ) ) {
				if ( filter_var($email, FILTER_VALIDATE_EMAIL) ) {
					$customer = $this->Main_Model->getCustomerByEmail($email);

					if ( $customer ) {
				        $data['email'] = $email;
				        $data['name'] = $customer->name;
				        $data['empresa'] = $customer->empresa;
					} else {
						$data['email'] = $email;
					}
				}
			}

			$data['title'] = 'Agencia Watson';
			$data['main_content'] = 'main/index';
		    $this->load->view('themes/front/template.php', $data);
		}*/

		/*public function register()
		{
			$name = $this->input->post('txtName');
			$email = $this->input->post('txtEmail');
			// $telefono = $this->input->post('txtTelefono');
			// $empresa = $this->input->post('txtEmpresa');

			$customer = $this->Main_Model->getCustomerByEmail($email);

			if ( !$customer ) {
				$codigo = substr($name, 0, 4);
				// $codigo .= substr($telefono, 0, 2);

				$data = array(
					'name'		=>	$name,
					'email'		=>	$email,
					// 'telefono'	=>	$telefono,
					// 'empresa'	=>	$empresa,
					'codigo'	=>	$codigo
				);

				$id_usuario = $this->Main_Model->addCustomer($data);
				$user = $this->Main_Model->getCustomer($id_usuario);

				// if ($id_usuario) {
				// 	$this->session->set_userdata('id_usuario', $id_usuario);
				// 	redirect('main/displayQuestions');
				// } else {
				// 	echo 'Hubo un problema con el registro del usuario';
				// }

				$dominio = explode('@', $email);
				$dominio = explode('.', $dominio[1]);
				$dominio = $dominio[0];

				$dominios = $this->config->item('dominios');

				if (in_array($dominio, $dominios)) {
					$premio = $this->Main_Model->randomPremio(1);
				} else {
					$premio = $this->Main_Model->randomPremio(2);
				}

				$data = array(
					'id_customer'		=>	$user->id_customer,
					'id_premio'			=>	$premio->id_premio,
					'codigo'			=>	$user->codigo . $premio->codigo,
				);

				$id_premio_user = $this->Main_Model->addCustomerPremio($data);
				$codigo_premio = $this->Main_Model->getPremioCustomer($id_premio_user);

				$codigoPremio = $codigo_premio->codigo;

				// Enviamos el email con los datos de su premio al usuario
				$this->load->helper('funciones');
				$this->load->library('email');

				$subject = 'Watson - Expomarketing 2015: Verificación de premio';

				$body = '<tr>'
						.'<td class="bodycopy" style="color: #484848; font-family: Arial, sans-serif; font-size: 14px; line-height: 22px; text-align: center; padding: 50px 50px 50px 50px;">'
                		.'Hola ' . $user->name . ', gracias por participar en nuestro juego y visitarnos en la Expomarketing 2015. <br />'
                		.'Tú ganaste: ' . $premio->premio . ' con código de canje ' . $codigo_premio->codigo . '<br />'
                		.'Recuerda que también tienes una <strong> Consultoría para Estrategia y Comunicación Digital para tu marca<strong><br /><br />'
                		.'Premio válido hasta el 31 de Julio del 2015'
                		.'</td>'
                		.'</tr>';
				$message = body_email($user->name, $body);
				send_email($user->email, $subject, $message);

				// $this->_sendEmail($user->email, $codigo_premio->codigo, $user->name, $premio->premio);
			} else {
				$premioUser = $this->Main_Model->getCustomerPremio($customer->id_customer);
				$codigoPremio = $premioUser->codigo;

				$premio = $this->Main_Model->getPremio($premioUser->id_premio);
			}

			$data['title']  = 'Agencia Watson';
			$data['premio'] = $premio;
			$data['codigo']	= $codigoPremio;

			$data['main_content'] = 'main/displayPremio';
			$this->load->view('themes/front/template.php', $data);
		}*/

		// public function displayQuestions()
		public function index()
		{
			// session_destroy(); exit;
			// Debemos determinar cuando se recargar la página

			if (!isset($_SESSION['questions'])) {
				$questions = $this->Main_Model->getQuestions();
				$_SESSION['questions'] = $questions;
			}

			$question = array_pop($_SESSION['questions']);
			$alternativas = $this->Main_Model->getAlternativasByQuestion($question->id_question);

			$data['question'] = $question;
			$data['alternativas'] = $alternativas;

			$data['title'] = 'Agencia Watson';
	        $data['main_content'] = 'main/displayQuestions';
	        $this->load->view('themes/front/template.php', $data);
		}

		public function displayOtherQuestion()
		{
			if (isset($_SESSION['questions']) && count($_SESSION['questions'])) {
				$question = array_pop($_SESSION['questions']);
				$alternativas = $this->Main_Model->getAlternativasByQuestion($question->id_question);

				$data['question'] = $question;
				$data['alternativas'] = $alternativas;

		        $this->load->view('main/question_ajax', $data);
			} else {
				session_destroy();
				/*$user = $this->Main_Model->getCustomer($this->session->userdata('id_usuario'));
				$email = $user->email;
				$dominio = explode('@', $email);
				$dominio = explode('.', $dominio[1]);
				$dominio = $dominio[0];

				$dominios = $this->config->item('dominios');

				if (in_array($dominio, $dominios)) {
					$premio = $this->Main_Model->randomPremio(1);
				} else {
					$premio = $this->Main_Model->randomPremio(2);
				}

				$data = array(
					'id_customer'		=>	$user->id_customer,
					'id_premio'			=>	$premio->id_premio,
					'codigo'			=>	$user->codigo . $premio->codigo,
				);

				$id_premio_user = $this->Main_Model->addCustomerPremio($data);

				$codigo_premio = $this->Main_Model->getPremioCustomer($id_premio_user);

				// Enviamos el email con los datos de su premio al usuario
				$this->load->library('email');
				$this->_sendEmail($user->email, $codigo_premio->codigo, $user->name, $premio->premio);

				$data['premio'] = $premio;
				$data['codigo']	= $codigo_premio->codigo;*/

				// $this->load->view('main/displayPremio', $data);
				$this->load->view('main/displayPremio');
			}
		}

		public function displayPremio()
		{
			$data['premio'] = 'Un carro';
			$data['codigo']	= 'AB12';

			//$this->load->view('main/displayPremio', $data);

			$data['title'] = 'Agencia Watson';
	        $data['main_content'] = 'main/displayPremio';
	        $this->load->view('themes/front/template.php', $data);
		}

		/**
		 * Nos permitirá enviar email para validación de usuario.
		 * @access private
		 */
    	public function _sendEmail($to, $code, $name, $premio)
	    {
	        // Enviamos correo al nuevo usuario para que active su cuenta
	        $this->email->from('no-reply@ad-inspector.com', 'Watson');
	        $this->email->reply_to('info@watson.pe', 'Watson Info');
	        $this->email->to($to);
	        //$this->email->cc('jolupeza@gmail.com');
	        //$this->email->bcc('them@their-example.com');
	        $this->email->subject('Premio: Watson');
	        $message = "Hola $name gracias por participar en el juego de Watson en la Expomarketing 2016.<br /><br />"
	        			."Tu premio es: <br /><br />"
	        			."$premio <br /><br />"
	        			."y tu código es: $code<br /><br />"
	        			."Sitio Web: <a href='http://watson.pe' target='blank'>Agencia Watson</a><br />"
	        			."Correo: <a href='mailto:info@watson.pe'>info@watson.pe</a><br />"
	        			."Teléfono: 652 - 1114<br /><br /><br />"
	        			."Esperamos verte pronto en nuestra oficina<br />";
	        			/*."Tienes hasta el jueves 31/07/15 para recoger tu premio, recuerda que por participar de nuestro juego en el Expomarketing también "
	        			."participas por media beca para el <strong>DIPLOMADO DE NEUROCIENCIA APLICADO AL MARKETING</strong> en la Universidad Cayetano Heredia que se inicia en agosto.<br /><br />"*/
	        $this->email->message($message);
	        //$this->email->message('Hola ' . $name . ', usted participó en nuestro concurso. Su código de premio es: ' . $code);
	        $this->email->send();
	    }

	}

	/* End of file main.php */
	/* Location: ./application/controllers/main.php */