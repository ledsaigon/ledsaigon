<?php
/**
 * @author Thai Nguyen
 * @copyright 2011
 */
include_once('home.php');
class Articles extends Home {
    public $data = null;
    function __construct(){
		parent::__construct();
		@set_time_limit(-1);
        $this->load->model('admin/articles_m');
        $this->data['title_page'] = 'Quản lý bài viết';
		$this->lang->load('vi', 'vietnam/admin');
    }
	# main
	public function main($cId = ''){
		$action = $this->input->post('action');
		switch($action){
			case 'delete':
			$this->articles_m->data['id'] = $this->input->post('txtArrayID');
            $this->articles_m->changeStatus(2);
            $this->data['error'] = sprintf(lang('delete_item_success'),$this->articles_m->data['id']);
			break;
			case 'delete_all':
			 $data = $this->input->post('chkBox');
            for($i = 0 ; $i <= count($data) - 1 ; $i++){
                $this->articles_m->data['id'] = $data[$i];
                $this->articles_m->changeStatus(2);
            }
            $this->data['error'] = sprintf(lang('delete_items_success'),count($data));
			break;
			# enable
			case 'enable':
			$this->articles_m->data['id'] = $this->input->post('txtArrayID');
            $this->articles_m->changeStatus(1);
            $this->data['error'] =  sprintf(lang('display_item_success'),$this->articles_m->data['id']);
			break;
			case 'enable_all':
			$data = $this->input->post('chkBox');
            for($i = 0 ; $i <= count($data) - 1 ; $i++){
                $this->articles_m->data['id'] = $data[$i];
                $this->articles_m->changeStatus(1);
            }
            $this->data['error'] = sprintf(lang('display_items_success'),count($data));
			break;			
			# disable 
			case 'disable':
			$this->articles_m->data['id'] = $this->input->post('txtArrayID');
            $this->articles_m->changeStatus(0);
            $this->data['error'] =  sprintf(lang('hide_item_success'),$this->articles_m->data['id']);
			break;		
			# disable all
			case 'disable_all':
			$data = $this->input->post('chkBox');
            for($i = 0 ; $i <= count($data) - 1 ; $i++){
                $this->articles_m->data['id'] = $data[$i];
                $this->articles_m->changeStatus(0);
            };
            $this->data['error'] =  sprintf(lang('hide_items_success'),count($data));
			break;
			case 'enable_home':
			$this->articles_m->data['id'] = $this->input->post('txtArrayID');
            $this->articles_m->changeEnableHome(1);
            $this->data['error'] =  sprintf(lang('enable_home_success'),$this->articles_m->data['id']);
			break;
			case 'delete_home':
			$this->articles_m->data['id'] = $this->input->post('txtArrayID');
            $this->articles_m->changeEnableHome(0);
            $this->data['error'] =  sprintf(lang('delete_home_success'),$this->articles_m->data['id']);
			break;
			case 'sort':
            $arrayID = $this->input->post('positionID');
            $arrayValue = $this->input->post('position');
            for( $i = 0 ; $i <= count($arrayID) - 1 ; $i++ ){
                $this->articles_m->data['position'] = $arrayValue[$i];
                $this->articles_m->data['id'] = $arrayID[$i];
                $this->articles_m->sort_entry();
            }
            $this->data['error'] = 'Cập nhật vị trí thành công';
			break;
			case 'clean_trash':
			$this->articles_m->cleanTrash();
			$this->data['error'] = "Dọn rác thành công";
			} // end switch
        $this->articles_m->data['cid'] = 0;
		$this->data['url_add_new'] = base_url().'AdminCP/articles/detail/new';
		if($cId){
		$this->data['cat_id'] = $cId;
        $this->data['objects'] = $this->articles_m->getFromPid($cId);
		}else
		$this->data['objects'] = $this->articles_m->getAlls();
		$this->load->model('admin/categories_m');
		$this->data['listCategory'] = $this->categories_m->getObjects('pid = 0');
        $this->index('news/articles','Quản lý bài viết');
		}
    function detail($id='0'){
        $action = $this->input->post('action');
        $status = $this->input->post('status');
        $this->data['url_cancel'] = base_url().'AdminCP/articles/main';          
        if($action == ''){
            $this->articles_m->data['cid'] = 0;
            $this->data['objects'] = $this->articles_m->getAlls();
            $this->articles_m->data['id'] = $id;
			$this->load->model('admin/categories_m');
			$this->data['categoryCombo'] = $this->categories_m->creatCombobox();
            $this->data = array_merge($this->data,$this->articles_m->select_entry());
			$this->index('news/articles_detail','Quản lý bài viết');
        }
        else{
			$gallery_path = (ROOT_PATH.'/uploads/news/');
			require_once(APPPATH.'controllers/class/filter.php');
			include_once(APPPATH.'controllers/class/function.php');
			$filter = new Filter();

			if(isset($_FILES["file_download"]["name"]) && !empty($_FILES["file_download"]["name"])){
                $file_name_download = rand().'_'.addslashes($filter->filterName($_FILES["file_download"]['name'],'_'));
                $album_dir = 'uploads/news/';
                if(!is_dir($album_dir)){ create_dir($album_dir); } 
                $config['upload_path']  = $album_dir;
                $config['file_name'] = $file_name_download;
                $config['allowed_types'] = 'pdf|doc|docx'; 
                $this->load->library('upload', $config); 
                $this->upload->initialize($config); 
                $image_download = $this->upload->do_upload("file_download");
                $image_data_dowload = $this->upload->data();
            }else $file_name_download = $this->input->post('old_file_download');  





			$files = isset($_FILES['avatar'])?$_FILES['avatar']:'';
				if(isset($files['tmp_name']) && !empty($files['tmp_name'])){
					$file_name = rand().'_'.addslashes($filter->filterName($files['name'],'_'));
					move_uploaded_file($files['tmp_name'],$gallery_path.$file_name);
					$image = $gallery_path.$file_name;
					$avatar = ($gallery_path.'a_'.$file_name);
					resizeImg($image,250, 250, $avatar);
					@unlink($gallery_path.'a_'.$this->input->post('old_avatar'));
					@unlink($gallery_path.$this->input->post('old_avatar'));
				}else $file_name = $this->input->post('old_avatar');
			$slug = creatSlug($this->input->post('slug'));
			$i = 0;
			$dup = 1;
			while($dup) {
				$dup = $this->articles_m->checkDuplicateSlug($id,$slug.($i?'-'.$i:''));
				if($dup) $i++;
			}
			$slug .= $i?'-'.$i:'';


  if($id == 'new'){
				$arrPhotos = array();
				# Files upload
			$files = isset($_FILES['files'])?$_FILES['files']:'';
			if($files) {
				
				for($i=0; $i<count($files['name']);$i++) {
					if($files['name'][$i]!=''){
					$img = addslashes((rand()."_".$filter->filterName($files['name'][$i])));
					$tmp_img = $files['tmp_name'][$i];
						# Upload
							move_uploaded_file($tmp_img,$gallery_path.$img);
							$image = $gallery_path.$img;
							$avatar = ($gallery_path.'a_'.$img);
							$medium = ($gallery_path.'m_'.$img);
							resizeImg($image,100, 100, $avatar);
							resizeImg($image,600, 500, $medium);
							$arrPhotos[] = $img;
					}
				} #/for($i=0;
			}
		}else{


			$detailOb = $this->articles_m->getObject('id',$id);				
			 	$properties = unserialize($detailOb['properties']);
				$arrPhotos = array();
				if(isset($properties['photos']))
				$arrPhotos = $properties['photos'];
				# Files upload
				$files = isset($_FILES['files'])?$_FILES['files']:'';
				if($files) {
					for($i=0; $i<count($files['name']);$i++) {
						if($files['name'][$i]!=''){
						$img = addslashes((rand()."_".$filter->filterName($files['name'][$i])));
						$tmp_img = $files['tmp_name'][$i];
						# Upload
						move_uploaded_file($tmp_img,$gallery_path.$img);
						$image = $gallery_path.$img;
						$avatar = ($gallery_path.'a_'.$img);
						$medium = ($gallery_path.'m_'.$img);
						resizeImg($image,150, 150, $avatar);
						resizeImg($image,600, 500, $medium);
						$arrPhotos[] = $img;
						}
					} #/for($i=0;
				}
				
				

		}

			$properties = array('photos' => $arrPhotos,
								'vn_img_title' => $this->input->post('vn_img_title'),
								'vn_img_alt' => $this->input->post('vn_img_alt'),
								'en_img_title' => $this->input->post('en_img_title'),
								'en_img_alt' => $this->input->post('en_img_alt'));
			$datas = array('cid'=>$this->input->post('cId'),				
							'vn_title'=>$this->input->post('vn_title', TRUE),				
							'en_title'=>$this->input->post('en_title', TRUE),				
							'slug'=>$slug,			
							'vn_title_site'=>$this->input->post('vn_title_site',TRUE),
							'en_title_site'=>$this->input->post('en_title_site',TRUE),
							'vn_keyword'=>$this->input->post('vn_keyword',TRUE),
							'en_keyword'=>$this->input->post('en_keyword',TRUE),
							'vn_description'=>$this->input->post('vn_description',TRUE),				
							'en_description'=>$this->input->post('en_description',TRUE),				
							'vn_sapo'=>$this->input->post('vn_sapo',TRUE),				
							'en_sapo'=>$this->input->post('en_sapo',TRUE),				
							'vn_detail'=>$this->input->post('vn_detail'),				
							'en_detail'=>$this->input->post('en_detail'),				
							'avatar' =>  $file_name,
							'link_download' =>  $file_name_download,					
							'date_created' => date('Y-m-d'),				
							'home'=>$this->input->post('home'),				
							'position'=>$this->input->post('position',TRUE),
							'properties'=> serialize($properties), 				
							'status'=>$this->input->post('cboStatus'));
            if($id == 'new'){
                $this->articles_m->addData($datas);
            }
            else{
                $this->articles_m->editData($datas,$id);
            }
            if($status == 'save')
               redirect(base_url().'AdminCP/articles/main/','refresh');
            else if($status == 'close')
                redirect(base_url().'AdminCP','refresh');
            else
                redirect(base_url().'AdminCP/articles/detail/new','refresh');
        }
    }
    	public function deleteFile($id,$file){
		if($file&&$id) {
			$detailOb = $this->articles_m->getObject('id',$id);
			$properties = unserialize($detailOb['properties']);
			if(isset($properties['photos'])&&$properties['photos']==true){
			foreach($properties['photos'] as $key => $value) {
				if($value == $file) {
					unlink($gallery_path.$properties['photos'][$key]);
					unset($properties['photos'][$key]);
					$datas = array('properties' => serialize($properties));
					 $this->articles_m->editData($datas,$id);
					 header("location:".base_url().'AdminCP/articles/detail/'.$id);
				}
			}
			}
		}
		}
}