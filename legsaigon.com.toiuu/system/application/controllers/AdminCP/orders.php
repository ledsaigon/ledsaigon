<?php
/**
 * @author Nguyễn Văn Thái
 * @copyright 2012
 */
include_once('home.php');
class Orders extends Home {
   
    public $data = null;
    function __construct()
    {
		parent::__construct();
        $this->load->model(array('admin/orders_m','admin/orderitem_m'));
        $this->data['title_site'] = 'Quản lý đơn hàng';
		$this->lang->load('vi', 'vietnam/admin');
    }
	# main
	public function main(){
		$action = $this->input->post('action');
		switch($action){
			case 'delete':
			$this->orders_m->data['id'] = $this->input->post('txtArrayID');
            $this->orders_m->changeStatus(2);
            $this->data['error'] = sprintf(lang('delete_item_success'),$this->orders_m->data['id']);
			break;
			case 'delete_all':
			 $data = $this->input->post('chkBox');
            for($i = 0 ; $i <= count($data) - 1 ; $i++)
            {
                $this->orders_m->data['id'] = $data[$i];
                $this->orders_m->changeStatus(2);
            }
            $this->data['error'] = sprintf(lang('delete_items_success'),count($data));
			break;
			# enable
			case 'enable':
			$this->orders_m->data['id'] = $this->input->post('txtArrayID');
            $this->orders_m->changeStatus(1);
            $this->data['error'] =  sprintf(lang('display_item_success'),$this->orders_m->data['id']);
			break;
			case 'enable_all':
			 $data = $this->input->post('chkBox');
            for($i = 0 ; $i <= count($data) - 1 ; $i++)
            {
                $this->orders_m->data['id'] = $data[$i];
                $this->orders_m->changeStatus(1);
				
            }
            $this->data['error'] =  sprintf(lang('display_items_success'),count($data));
			break;
			# disable
			case 'disable':
			$this->orders_m->data['id'] = $this->input->post('txtArrayID');
            $this->orders_m->changeStatus(0);
            $this->data['error'] = sprintf(lang('hide_item_success'),$this->orders_m->data['id']);
			break;
			# disable all
			case 'disable_all':
			 $data = $this->input->post('chkBox');
            for($i = 0 ; $i <= count($data) - 1 ; $i++)
            {
                $this->orders_m->data['id'] = $data[$i];
                $this->orders_m->changeStatus(0);
				
            }
            $this->data['error'] =  sprintf(lang('hide_items_success'),count($data));
			break;
			case 'enable_home':
			$this->orders_m->data['id'] = $this->input->post('txtArrayID');
            $this->orders_m->changeEnableHome(1);
            $this->data['error'] =  sprintf(lang('enable_home_success'),$this->orders_m->data['id']);
			break;
			case 'delete_home':
			$this->orders_m->data['id'] = $this->input->post('txtArrayID');
            $this->orders_m->changeEnableHome(0);
            $this->data['error'] =  sprintf(lang('delete_home_success'),$this->orders_m->data['id']);
			break;
			case 'sort':
			 $arrayID = $this->input->post('positionID');
            $arrayValue = $this->input->post('position');
            for( $i = 0 ; $i <= count($arrayID) - 1 ; $i++ )
            {
                $this->orders_m->data['position'] = $arrayValue[$i];
                $this->orders_m->data['id'] = $arrayID[$i];
                $this->orders_m->sort_entry();
            }
            $this->data['error'] = 'Cập nhật vị trí thành công';
			break;
			case 'clean_trash':
			$this->orders_m->cleanTrash();
			$this->data['error'] = 'Dọn rác thành công';
			} // end switch
        $this->data['url_add_new'] = '#';
        $this->data['objects'] = $this->orders_m->getAlls();
        $this->index('orders/index','Quản lý đơn hàng');
		}
	
    
    function detail($id='0'){
		$this->load->model('admin/products_m');
      $orderObject = $this->orders_m->getObject('id',$id);
	  $this->data['orderObject'] = $orderObject;
	  if($orderObject){
		  $this->data['properties'] = unserialize($orderObject->properties);
		   $this->data['listOrderItem'] = $this->orderitem_m->getObjects('order_id = '.$orderObject->id);
		  }
		$this->index('orders/detail');
    }
}