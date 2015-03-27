<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
/*
	    $table = 'users';

	    $mdb = new MDBUtils();

        $cursor = $mdb->getMDB()->$table->find();

		if ($cursor)
        {
        	foreach ($cursor as $id => $value) 
	        {
	            $data[] = $value;
	        }

	        $this->load->view('welcome_message', $data[0]);
	    }
	    else
	    {
	    	$this->load->view('index');
	    }
*/
        $table = 'users';
        $where = array('username' => 'leo2' );

	    $mdb = MDBHelper::GenerateClient();

	    $data = $mdb->query($table, $where);

        if ($data)
        {
    		$this->load->view('welcome_message', $data[0]);
	    }
	    else
	    {
	    	$this->load->view('404');
	    }
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */