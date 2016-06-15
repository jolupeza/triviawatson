<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main_Model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

    /**
    * Agregar un nuevo cliente a la baes de datos
    *
    * @access public
    * @param    $data         Array con los datos del usuario a agregar.
    * @return   Boolean       True en caso de agregar correctamente el cliente, caso contrario devuelve false.
    */
    public function addCustomer($data)
    {
        $this->db->insert('customers', $data);
        return $this->db->insert_id();
    }

    public function getQuestions()
    {
        $this->db->order_by('id_question', 'random');
        $this->db->limit(3);
        return $this->db->get('questions')->result();
    }

    public function getAlternativasByQuestion($id)
    {
        $this->db->where('id_question', $id);
        $this->db->order_by('id_alternativa', 'random');
        return $this->db->get('alternativas')->result();
    }

    public function getCustomer($id)
    {
        $this->db->where('id_customer', $id);
        return $this->db->get('customers')->row();
    }

    public function randomPremio($nivel)
    {
        $this->db->where('nivel', $nivel);
        $this->db->where('active', 1);
        $this->db->order_by('id_premio', 'random');
        return $this->db->get('premios', 1)->row();
    }

    public function addCustomerPremio($data)
    {
        $this->db->insert('customer_premio', $data);
        return $this->db->insert_id();
    }

    public function getPremioCustomer($id)
    {
        $this->db->where('id_customer_premio', $id);
        return $this->db->get('customer_premio')->row();
    }

    public function getCustomerByEmail($email)
    {
        $this->db->where('email', $email);
        $result = $this->db->get('customers');

        if ($result->num_rows() > 0) {
            return $result->row();
        }

        return FALSE;
    }

    public function getCustomerPremio($id = 0)
    {
        if ( (int)$id > 0 )
        {
            $this->db->where('id_customer', $id);
            $result =  $this->db->get('customer_premio');

            if ($result->num_rows() > 0)
            {
                return $result->row();
            }
        }

        return FALSE;
    }

    public function getPremio($id = 0)
    {
        if ( (int)$id > 0 )
        {
            $this->db->where('id_premio', $id);
            $result =  $this->db->get('premios');

            if ($result->num_rows() > 0)
            {
                return $result->row();
            }
        }

        return FALSE;
    }
}

/* End of file test_model.php */
/* Location: ./application/models/test_model.php */