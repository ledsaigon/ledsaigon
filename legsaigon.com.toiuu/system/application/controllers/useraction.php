<?php
require_once('indexcontroller.php');
class Useraction extends IndexController{
	public function __construct(){
		parent::__construct();
		$this->load->model(array('admin/users_m','admin/products_m','admin/articles_m'));
		$this->data['hideSlide'] = 1;
		$this->data['userPage'] = 1;
		}
	public function product(){
		if(!isset($_SESSION['userInfo'])||$_SESSION['userInfo']==FALSE||$_SESSION['userInfo']->tid != 2)
		redirect(base_url());
		if(isset($_POST['id_pro'])){
			$id_pro = $this->input->post('id_pro');
			$this->products_m->delete($id_pro,$_SESSION['userInfo']->id);
			$this->data['result'] = 'Xóa sản phẩm thành công';
			}
		$condition = "user_id = ".$_SESSION['userInfo']->id;
		$p=$this->uri->segment('3');
		$per_page=10;
		if($p==0)
		$page = 1;
		else
		$page = $p;
		$total_rows=count($this->products_m->getObjects($condition));
		$total_page = ceil($total_rows/$per_page);
		if($p>$total_page)
		$page = $total_page;
		$config['base_url']=base_url().'nha-phan-phoi/quan-ly-san-pham';
		$config['first_url']=base_url().'nha-phan-phoi/quan-ly-san-pham.html';
		$config['total_rows'] =$total_rows;
		$config['per_page'] = $per_page; 
		$config['uri_segment'] =3;
		$this->load->library('pagination');
		$this->pagination->initialize($config); 
		$this->data['listPages']=$this->pagination->create_links();
		$this->data['listProduct']=$this->products_m->getObjects($condition,$page,$per_page);
		$this->index('users/product','Quản lý sản phẩm');
		
		}
	public function editProduct($id){
		if(!isset($_SESSION['userInfo'])||$_SESSION['userInfo']==FALSE||$_SESSION['userInfo']->tid != 2)
		redirect(base_url());
		$this->data['object'] = $this->products_m->getProOfUser("id = $id AND user_id = ".$_SESSION['userInfo']->id);
		
		$config = array(
						array('field' => 'name',
								'label' => 'Tên thuốc',
								'rules' => 'required|xss_clean|trim()|max_length[100]'),
						array('field' => 'cId',
								'label' => 'Nhóm thuốc',
								'rules' => 'required'),
						array('field' => 'price',
								'label' => 'Giá',
								'rules' => 'numeric|required'),
						array('field' => 'unit',
								'label' => 'Đơn vị tính',
								'rules' => 'required'),
						array('field' => 'link',
								'label' => 'Liên kết',
								'rules' => 'xss_clean'),
						array('field' => 'detail',
								'label' => 'Mô tả',
								'rules' => 'required|xss_clean'),
						array('field' => 'note',
								'label' => 'Ghi chú',
								'rules' => 'xss_clean|max_length[200]'),
						array('field' => 'avatar',
								'label' => 'Hình đại diện',
								'rules' => 'xss_clean|required')
						);
			
		$this->load->library('form_validation');
		$this->form_validation->set_rules($config);
		$this->form_validation->set_message('required','%s - '.lang('not_empty'));
		$this->form_validation->set_message('numeric','%s - '.lang('invalid'));
		$this->form_validation->set_message('min_length','%s - '.lang('min_length'));
		$this->form_validation->set_message('max_length','%s - '.lang('max_length'));
		$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
		if($this->form_validation->run()==FALSE){
			$this->data['error_name'] = form_error('name');
			$this->data['error_cId'] = form_error('cId');
			$this->data['error_price'] = form_error('price');
			$this->data['error_unit'] = form_error('unit');
			$this->data['error_detail'] = form_error('detail');
			$this->data['error_note'] = form_error('note');
			$this->data['error_avatar'] = form_error('avatar');
			}
			else{
				$gallery_path = (ROOT_PATH.'/uploads/products/');
				require_once(APPPATH.'controllers/class/filter.php');
				include_once(APPPATH.'controllers/class/function.php');
				$filter = new Filter();
				$files = isset($_FILES['avatar'])?$_FILES['avatar']:'';
					if($files['tmp_name']){
					$file_name = rand().'_'.addslashes($filter->filterName($files['name'],'_'));
					if(isImage($file_name)){
						move_uploaded_file($files['tmp_name'],$gallery_path.$file_name);
						$image = $gallery_path.$file_name;
						$avatar = ($gallery_path.'a_'.$file_name);
						resizeImg($image,150, 150, $avatar);
						@unlink($image);
						@unlink($gallery_path.$this->input->post('old_avatar'));
						}else $file_name = $this->input->post('old_avatar');
					
				}else $file_name = $this->input->post('old_avatar');
				$slug = creatSlug($this->input->post('name'));
				$properties = array(
									'unit' => $this->input->post('unit'),
									'link' => htmlspecialchars($this->input->post('link')),
									'note' => htmlspecialchars($this->input->post('note'))
									);
				$data = array('user_id' => $_SESSION['userInfo']->id,
								'cid' => $this->input->post('cId'),
								'vn_name' => $this->input->post('name'),
								'avatar' => $file_name,
								'slug' => $slug,
								'price' => $this->input->post('price'),
								'date_created' => date('d-m-Y'),
								'vn_detail' => htmlspecialchars($this->input->post('detail')),								'status' => 0,
								'properties' => serialize($properties)
								);
				
				if($this->products_m->editData($data,$id)){
					//$_SESSION['fullname'] = $this->input->post('fullname');
					redirect(base_url().'nha-phan-phoi/quan-ly-san-pham.html');
					}
						
			}// end els
			$this->index('users/editproduct');
		}
		
	public function addProduct(){
		if(!isset($_SESSION['userInfo'])||$_SESSION['userInfo']==FALSE||$_SESSION['userInfo']->tid != 2)
		redirect(base_url());
		$config = array(
						array('field' => 'name',
								'label' => 'Tên thuốc',
								'rules' => 'required|xss_clean|trim()|max_length[100]'),
						array('field' => 'cId',
								'label' => 'Nhóm thuốc',
								'rules' => 'required'),
						array('field' => 'price',
								'label' => 'Giá',
								'rules' => 'numeric|required'),
						array('field' => 'unit',
								'label' => 'Đơn vị tính',
								'rules' => 'required'),
						array('field' => 'link',
								'label' => 'Liên kết',
								'rules' => 'xss_clean'),
						array('field' => 'detail',
								'label' => 'Mô tả',
								'rules' => 'required|xss_clean'),
						array('field' => 'note',
								'label' => 'Ghi chú',
								'rules' => 'xss_clean|max_length[200]'),
						array('field' => 'avatar',
								'label' => 'Hình đại diện',
								'rules' => 'xss_clean|required')
						);
			
		$this->load->library('form_validation');
		$this->form_validation->set_rules($config);
		$this->form_validation->set_message('required','%s - '.lang('not_empty'));
		$this->form_validation->set_message('numeric','%s - '.lang('invalid'));
		$this->form_validation->set_message('min_length','%s - '.lang('min_length'));
		$this->form_validation->set_message('max_length','%s - '.lang('max_length'));
		$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
		if($this->form_validation->run()==FALSE){
			$this->data['error_name'] = form_error('name');
			$this->data['error_cId'] = form_error('cId');
			$this->data['error_price'] = form_error('price');
			$this->data['error_unit'] = form_error('unit');
			$this->data['error_detail'] = form_error('detail');
			$this->data['error_note'] = form_error('note');
			$this->data['error_avatar'] = form_error('avatar');
			}
			else{
				$gallery_path = (ROOT_PATH.'/uploads/products/');
				require_once(APPPATH.'controllers/class/filter.php');
				include_once(APPPATH.'controllers/class/function.php');
				$filter = new Filter();
				$files = isset($_FILES['avatar'])?$_FILES['avatar']:'';
					if($files['tmp_name']){
					$file_name = rand().'_'.addslashes($filter->filterName($files['name'],'_'));
					if(isImage($file_name)){
						move_uploaded_file($files['tmp_name'],$gallery_path.$file_name);
						$image = $gallery_path.$file_name;
						$avatar = ($gallery_path.'a_'.$file_name);
						resizeImg($image,150, 150, $avatar);
						@unlink($image);
						}else $file_name = '';
					
				}else $file_name = '';
				$slug = creatSlug($this->input->post('name'));
				$properties = array(
									'unit' => $this->input->post('unit'),
									'link' => htmlspecialchars($this->input->post('link')),
									'note' => htmlspecialchars($this->input->post('note'))
									);
				$data = array('user_id' => $_SESSION['userInfo']->id,
								'cid' => $this->input->post('cId'),
								'vn_name' => $this->input->post('name'),
								'avatar' => $file_name,
								'slug' => $slug,
								'price' => $this->input->post('price'),
								'date_created' => date('d-m-Y'),
								'vn_detail' => htmlspecialchars($this->input->post('detail')),								
								'status' => 0,
								'properties' => serialize($properties)
								);
				
				if($this->products_m->addData($data)){
					//$_SESSION['fullname'] = $this->input->post('fullname');
					redirect(base_url().'nha-phan-phoi/quan-ly-san-pham.html');
					}
						
			}// end els
		
		$this->index('users/addproduct');
		}
	
	public function promotion(){
		if(!isset($_SESSION['userInfo'])||$_SESSION['userInfo']==FALSE||$_SESSION['userInfo']->tid != 2)
		redirect(base_url());
		if(isset($_POST['id_item'])){
			$id_item = $this->input->post('id_item');
			$this->articles_m->delete($id_item,$_SESSION['userInfo']->id);
			$this->data['result'] = 'Xóa tin thành công';
			}
		$condition = "user_id = ".$_SESSION['userInfo']->id;
		$p=$this->uri->segment('3');
		$per_page=10;
		if($p==0)
		$page = 1;
		else
		$page = $p;
		$total_rows=count($this->articles_m->getObjects($condition));
		$total_page = ceil($total_rows/$per_page);
		if($p>$total_page)
		$page = $total_page;
		$config['base_url']=base_url().'nha-phan-phoi/khuyen-mai';
		$config['first_url']=base_url().'nha-phan-phoi/khuyen-mai.html';
		$config['total_rows'] =$total_rows;
		$config['per_page'] = $per_page; 
		$config['uri_segment'] =3;
		$this->load->library('pagination');
		$this->pagination->initialize($config); 
		$this->data['listPages']=$this->pagination->create_links();
		$this->data['listItem']=$this->articles_m->getObjects($condition,$page,$per_page);
		$this->index('users/promotion','Khuyến mãi');
		
		}
	public function editNews($id){
		if(!isset($_SESSION['userInfo'])||$_SESSION['userInfo']==FALSE||$_SESSION['userInfo']->tid != 2)
		redirect(base_url());
		$this->data['object'] = $this->articles_m->getNewsOfUser("id = $id AND user_id = ".$_SESSION['userInfo']->id);
		
		$config = array(
						array('field' => 'title',
								'label' => 'Tiêu đề',
								'rules' => 'required|xss_clean|trim()|max_length[200]'),
						array('field' => 'sapo',
								'label' => 'Mô tả',
								'rules' => 'required|xss_clean|max_length[250]|addslashes'),
						array('field' => 'detail',
								'label' => 'Nội dung',
								'rules' => 'required|addslashes'),
						array('field' => 'avatar',
								'label' => 'Hình đại diện',
								'rules' => 'xss_clean')
						
						);
			
		$this->load->library('form_validation');
		$this->form_validation->set_rules($config);
		$this->form_validation->set_message('required','%s - '.lang('not_empty'));
		$this->form_validation->set_message('max_length','%s - '.lang('max_length'));
		$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
		if($this->form_validation->run()==FALSE){
			$this->data['error_title'] = form_error('title');
			$this->data['error_sapo'] = form_error('sapo');
			$this->data['error_detail'] = form_error('detail');
			}
			else{
				$gallery_path = (ROOT_PATH.'/uploads/news/');
				require_once(APPPATH.'controllers/class/filter.php');
				include_once(APPPATH.'controllers/class/function.php');
				$filter = new Filter();
				$files = isset($_FILES['avatar'])?$_FILES['avatar']:'';
					if($files['tmp_name']){
					$file_name = rand().'_'.addslashes($filter->filterName($files['name'],'_'));
					if(isImage($file_name)){
						move_uploaded_file($files['tmp_name'],$gallery_path.$file_name);
						$image = $gallery_path.$file_name;
						$avatar = ($gallery_path.'a_'.$file_name);
						resizeImg($image,150, 150, $avatar);
						@unlink($image);
						@unlink($gallery_path.$this->input->post('old_avatar'));
						}else $file_name = $this->input->post('old_avatar');
					
				}else $file_name = $this->input->post('old_avatar');
				$slug = creatSlug($this->input->post('title'));
				/*$properties = array(
									
									);*/
				$data = array('user_id' => $_SESSION['userInfo']->id,
								'cid' => 36,
								'vn_title' => $this->input->post('title'),
								'avatar' => $file_name,
								'slug' => $slug,
								'vn_sapo' => $this->input->post('sapo'),
								'date_created' => strtotime(date('H:i d-m-Y')),
								'vn_detail' => htmlspecialchars($this->input->post('detail')),						'status' => 0,
								);
				
				$this->articles_m->editData($data,$id);
					//$_SESSION['fullname'] = $this->input->post('fullname');
				redirect(base_url().'nha-phan-phoi/khuyen-mai.html');
						
			}// end els
			$this->index('users/editnews');
		}
		
	public function addNews(){
		if(!isset($_SESSION['userInfo'])||$_SESSION['userInfo']==FALSE||$_SESSION['userInfo']->tid != 2)
		redirect(base_url());
				$config = array(
						array('field' => 'title',
								'label' => 'Tiêu đề',
								'rules' => 'required|xss_clean|trim()|max_length[200]'),
						array('field' => 'sapo',
								'label' => 'Mô tả',
								'rules' => 'required|xss_clean|max_length[250]'),
						array('field' => 'detail',
								'label' => 'Nội dung',
								'rules' => 'required'),
						array('field' => 'avatar',
								'label' => 'Hình đại diện',
								'rules' => 'xss_clean|required')
						
						);
			
		$this->load->library('form_validation');
		$this->form_validation->set_rules($config);
		$this->form_validation->set_message('required','%s - '.lang('not_empty'));
		$this->form_validation->set_message('max_length','%s - '.lang('max_length'));
		$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
		if($this->form_validation->run()==FALSE){
			$this->data['error_title'] = form_error('title');
			$this->data['error_sapo'] = form_error('sapo');
			$this->data['error_detail'] = form_error('detail');
			$this->data['error_avatar'] = form_error('avatar');
			}
			else{
				$gallery_path = (ROOT_PATH.'/uploads/news/');
				require_once(APPPATH.'controllers/class/filter.php');
				include_once(APPPATH.'controllers/class/function.php');
				$filter = new Filter();
				$files = isset($_FILES['avatar'])?$_FILES['avatar']:'';
					if($files['tmp_name']){
					$file_name = rand().'_'.addslashes($filter->filterName($files['name'],'_'));
					if(isImage($file_name)){
						move_uploaded_file($files['tmp_name'],$gallery_path.$file_name);
						$image = $gallery_path.$file_name;
						$avatar = ($gallery_path.'a_'.$file_name);
						resizeImg($image,150, 150, $avatar);
						@unlink($image);
						@unlink($gallery_path.$this->input->post('old_avatar'));
						}else $file_name = '';
					
				}else $file_name = '';
				$slug = creatSlug($this->input->post('title'));
				/*$properties = array(
									
									);*/
				$data = array('user_id' => $_SESSION['userInfo']->id,
								'cid' => 36,
								'vn_title' => $this->input->post('title'),
								'avatar' => $file_name,
								'slug' => $slug,
								'vn_sapo' => $this->input->post('sapo'),
								'date_created' => strtotime(date('H:i d-m-Y')),
								'vn_detail' => htmlspecialchars($this->input->post('detail')),						'status' => 0,
								);
				
				$this->articles_m->addData($data);
					//$_SESSION['fullname'] = $this->input->post('fullname');
					redirect(base_url().'nha-phan-phoi/khuyen-mai.html');
						
			}// end els
		
		$this->index('users/addnews');
		}
	function checkUp($user_id,$level){
		switch($level){
			case '0':// level0
				$last_update = $this->users_m->getField('last_up',$user_id);
				$timeOf3day = 3*24*60*60;
				$limit = 1;
				if(time()-$last_update >= $timeOf3day )
					$this->up();
				else
					$result = 'Bạn đã sử dụng hết lượt làm mới tin cho phép, vui lòng quay lại sau '.(time()-$last_update)/(60*60). ' giờ.';
				break;
			case '1':// level1
				$last_update = $this->users_m->getField('last_up',$user_id);
				$timeOf3day = 3*24*60*60;
				$limit = 3;
				if(time()-$last_update >= $timeOf3day )
					$this->up();
				else
					$result = 'Bạn đã sử dụng hết lượt làm mới tin cho phép, vui lòng quay lại sau '.(time()-$last_update)/(60*60). ' giờ.';
				break;
			}// end switch
		}
}