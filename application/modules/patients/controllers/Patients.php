<?php
class Patients extends MX_Controller 
{
    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
    }

// List all patients
function index() {
	$data['patients'] = $this->get('id');
	$this->load->view('list', $data);
}

// Add new patient
function add() 
{
	$submit = $this->input->post('submit', TRUE);
	if ($submit == "Submit")
	{
		if ($this->input->post('submit')) 
		{
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('dob', 'Date of Birth', 'required');
			$this->form_validation->set_rules('gender', 'Gender', 'required');
			$this->form_validation->set_rules('phone', 'Phone', 'required');

			if ($this->form_validation->run() !== FALSE) 
			{
				$data = [
					'name'   => $this->input->post('name'),
					'dob'    => $this->input->post('dob'),
					'gender' => $this->input->post('gender'),
					'phone'  => $this->input->post('phone')
				];
				$this->_insert($data);
				redirect('patients');
			}
		}
	}
	$this->load->view('add');
}

// Edit existing patient
function edit($id) {
	$data['patient'] = $this->get_where($id)->row();
	
	$submit = $this->input->post('submit', TRUE);
	if ($submit == "Submit")
	{
		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('dob', 'Date of Birth', 'required');
			$this->form_validation->set_rules('gender', 'Gender', 'required');
			$this->form_validation->set_rules('phone', 'Phone', 'required');

			if ($this->form_validation->run() !== FALSE) {
				$update_data = [
					'name'   => $this->input->post('name', TRUE),
					'dob'    => $this->input->post('dob', TRUE),
					'gender' => $this->input->post('gender', TRUE),
					'phone'  => $this->input->post('phone', TRUE)
				];
				$this->_update($id, $update_data);
				redirect('patients');
			}
		}
	}

	$this->load->view('edit', $data);
}

// Delete patient
function delete($id) {
	$this->_delete($id);
	redirect('patients');
}









function get($order_by)
{
    $this->load->model('mdl_patients');
    $query = $this->mdl_patients->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_patients');
    $query = $this->mdl_patients->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_patients');
    $query = $this->mdl_patients->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('mdl_patients');
    $query = $this->mdl_patients->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('mdl_patients');
    $this->mdl_patients->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_patients');
    $this->mdl_patients->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_patients');
    $this->mdl_patients->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('mdl_patients');
    $count = $this->mdl_patients->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('mdl_patients');
    $max_id = $this->mdl_patients->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('mdl_patients');
    $query = $this->mdl_patients->_custom_query($mysql_query);
    return $query;
}

}