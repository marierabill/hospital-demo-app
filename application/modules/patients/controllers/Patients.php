<?php
class Patients extends MX_Controller 
{
    function __construct() {
        parent::__construct();
        $this->load->model('Mdl_patients');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
    }

// List all patients
function index() 
{
	$data['patients'] = $this->Mdl_patients->get('id');
	$this->load->view('list', $data);
}

// Add new patient
function add() 
{
	if ($this->input->post('submit')) {
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('dob', 'Date of Birth', 'required');
		$this->form_validation->set_rules('gender', 'Gender', 'required');
		$this->form_validation->set_rules('phone', 'Phone', 'required');

		if ($this->form_validation->run() !== FALSE) {
			$data = [
				'name'   => $this->input->post('name'),
				'dob'    => $this->input->post('dob'),
				'gender' => $this->input->post('gender'),
				'phone'  => $this->input->post('phone')
			];
			$this->Mdl_patients->_insert($data);
			redirect('patients');
		}
	}
	$this->load->view('add');
}

// Edit existing patient
function edit($id) 
{
	$data['patient'] = $this->Mdl_patients->get_where($id)->row();

	if ($this->input->post('submit')) {
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('dob', 'Date of Birth', 'required');
		$this->form_validation->set_rules('gender', 'Gender', 'required');
		$this->form_validation->set_rules('phone', 'Phone', 'required');

		if ($this->form_validation->run() !== FALSE) {
			$update_data = [
				'name'   => $this->input->post('name'),
				'dob'    => $this->input->post('dob'),
				'gender' => $this->input->post('gender'),
				'phone'  => $this->input->post('phone')
			];
			$this->Mdl_patients->_update($id, $update_data);
			redirect('patients');
		}
	}

	$this->load->view('edit', $data);
}

// Delete patient
function delete($id) 
{
	$this->Mdl_patients->_delete($id);
	redirect('patients');
}









function get($order_by)
{
    $this->load->model('mdl_perfectcontroller');
    $query = $this->mdl_perfectcontroller->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_perfectcontroller');
    $query = $this->mdl_perfectcontroller->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_perfectcontroller');
    $query = $this->mdl_perfectcontroller->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('mdl_perfectcontroller');
    $query = $this->mdl_perfectcontroller->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('mdl_perfectcontroller');
    $this->mdl_perfectcontroller->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_perfectcontroller');
    $this->mdl_perfectcontroller->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_perfectcontroller');
    $this->mdl_perfectcontroller->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('mdl_perfectcontroller');
    $count = $this->mdl_perfectcontroller->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('mdl_perfectcontroller');
    $max_id = $this->mdl_perfectcontroller->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('mdl_perfectcontroller');
    $query = $this->mdl_perfectcontroller->_custom_query($mysql_query);
    return $query;
}

}