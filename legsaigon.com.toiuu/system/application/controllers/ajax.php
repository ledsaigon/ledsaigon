<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Ajax extends CI_Controller {

	public $data;

	

	public function __construct(){
		parent::__construct();
	}


    public function send_comment(){
        $this->load->model('admin/comments_m');
        $product_id = $this->input->post('id');
        $comment_name = $this->input->post('comment_name');
        $comment_email = $this->input->post('comment_email');
        $comment_content = $this->input->post('comment_content');
        $data['product_id'] = $product_id;
        $data['fullname'] = $comment_name;
        $data['email'] = $comment_email;
        $data['comment'] = $comment_content;
        $data['date_created'] = date('Y-m-d H:i:s', time());
        $data['status'] = 1;
        //echo '<pre>';print_r($data);die();
        $result = $this->comments_m->insert_comment($data);
        echo $result;
    }

    public function newsletter(){
        $this->load->model('admin/newsletter_m');
        $reg_name = $this->input->post('reg_name');
        $reg_email = $this->input->post('reg_email');
        $data['fullname'] = $reg_name;
        $data['email'] = $reg_email;
        $data['status'] = 1;
        //echo '<pre>';print_r($data);die();
        $result = $this->newsletter_m->insert_newsletter($data);
        echo $result;
    }


     public function faq(){
        $this->load->model('admin/faq_m');
        $reg_cauhoi = $this->input->post('reg_cauhoi');
        $reg_email = $this->input->post('reg_email');
        $data['vn_title'] = $reg_cauhoi;
        $data['email'] = $reg_email;
        $data['date_created'] = date('d-m-Y');
         $data['status'] = 0;
        //echo '<pre>';print_r($data);die();
        $result = $this->faq_m->insert_newsletter($data);
        echo $result;
    }


  
}

/* End of file welcome.php */

/* Location: ./application/controllers/welcome.php */
?>
