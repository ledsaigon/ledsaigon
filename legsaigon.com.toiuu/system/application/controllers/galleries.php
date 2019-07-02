<?php
require_once (APPPATH.'controllers/indexcontroller.php');
include_once(APPPATH.'controllers/class/function.php');
class Galleries extends IndexController{
	public function __construct(){
		parent::__construct();
		
		}
	public function show(){
		$this->load->model(array('admin/galleries_m'));
		$this->data['active_menu'] = 10;
		 $p= $this->uri->segment('3');
			$per_page=20;
			if($p==0)
			$page = $p;
			else
			$page = $p;
			$total_rows=count($this->galleries_m->getObjects('status = 1 AND ab_id = 5'));
			$total_page = ceil($total_rows/$per_page);
			if($p>$total_page)
			$page = $total_page;
			$config['base_url']='hinh-anh/page';
			$config['first_url']='hinh-anh.html';
			$config['total_rows'] =$total_rows;
			$config['per_page'] = $per_page; 
			//*********************************************
			$config['uri_segment'] = 3;
			$this->load->library('pagination');
			$this->pagination->initialize($config); 
			$this->data['listPages']=$this->pagination->create_links();
			$this->data['listPhotos'] = $this->galleries_m->getObjects('status = 1 AND ab_id = 5 ',$page,$per_page);
			$this->index('gallery',lang('spa_space'));
		}
public function album($slug){
		$this->load->model(array('admin/galleries_m','admin/gallerygroups_m'));
		$album = $this->gallerygroups_m->getObject('slug',$slug);
		$this->data['active_menu'] = 10;
		$this->data['album'] = $album;
		if($album){
			$ab_id = $album['id'];
			$this->data['listPhotos'] = $this->galleries_m->getObjects("status = 1 AND ab_id = $ab_id");
			# Bread crumb
			$breadCrumbs = array(array(	'name'=>'Collection', 'url' =>'#'),
								array(	'name'=>$album['vn_name'], 'url' =>'')
	);
			$this->data['breadCrumbs'] = $breadCrumbs;
			}
		
		$this->index('gallery');
		}
public function video(){
	$this->load->model(array('admin/galleries_m','admin/gallerygroups_m'));
	$this->data['video'] = $this->galleries_m->getObjects('status = 1 AND ab_id = 6 ');
	$this->index('video');
}
		
	public function watchVideo($id){
		$this->load->model('admin/galleries_m');
		$this->data['videoItem'] = $this->galleries_m->getObject('id',$id);
		$this->data['listVideo'] = $this->galleries_m->getObjects("status = 1 AND ab_id = 15 AND id <> $id",1,10);
			$this->index('watchvideo');
		
		}
	}
?>