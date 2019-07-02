<?php

/**
 * @author Truong Quang Dinh
 * @copyright 2011
 */

include_once('home.php');
class Orderroom extends Home
{
    
    public $data = null;
    
    function __construct()
    {
        parent::__construct();
		$this->load->library(array('template_base','common'));
		$this->load->model(array('admin/Mod_order_room','admin/Mod_category'));  
		$this->Mod_order_room->data['langID'] = $this->session->userdata('CI_language_admin_id');      
        $this->data['datasource'] = null;
    }
    
    function orderroom_index()
    {
		$this->Mod_order_room->data['langID'] = $this->session->userdata('CI_language_admin_id');
         $action =  $this->input->post('action');
        if($action == "delete")
        {
            $this->Mod_order_room->data['orID'] = $this->input->post('txtArrayList');
            $this->Mod_order_room->delete_entry();
        }

        $this->data['orderList'] = $this->Mod_order_room->getOrderRoomList();
        $stt = 0;
        foreach($this->data['orderList'] as $value)
        {
            $value['stt'] = ++$stt;
            $this->data['status'][$value['orID']] =    ( $value['orStatus'] == 2 ) ? '<span style="color:#999">Đã hủy đặt phòng</span>' : (
                                ( $value['orStatus'] == 1 ) ? '<span style="color:#333">Đã đặt phòng</span>' : 
                                                            '<span style="color:#F00">Đặt phòng mới</span>');
            $this->data['color'][$value['orID']] = ($value['orStatus'] == 1) ? "#999" : ( ($value['orStatus'] == 2) ? "#333" : "" );
            $value['orStartedDate'] = $this->common->getDateFormDB($value['orStartedDate']);
            $value['orEndedDate'] = $this->common->getDateFormDB($value['orEndedDate']);
            $value['orCreatedDate'] = $this->common->getDateFormDB($value['orCreatedDate']);
        }
        $this->index('order_room','.: Admin Cpanel :. | Quản Lý Phòng');
    }
    
    function status($status=0)
    {
		$this->Mod_order_room->data['langID'] = $this->session->userdata('CI_language_admin_id');
        $action =  $this->input->post('action');
        if($action == "delete")
        {
            $this->Mod_order_room->data['orID'] = $this->input->post('txtArrayList');
            $this->Mod_order_roomdetail->data['orID'] = $this->Mod_order_room->data['orID'];
            $this->Mod_order_roomdetail->delete_items();
            $this->Mod_order_room->delete_entry();
        }
        if($action == "change_0")
        {
            $this->Mod_order_room->data['orID'] = $this->input->post('txtArrayList');
            $this->Mod_order_room->change_status(0);
        }
        if($action == "change_1")
        {
            $this->Mod_order_room->data['orID'] = $this->input->post('txtArrayList');
            $this->Mod_order_room->change_status(1);
        }
        $this->data['orderList'] = $this->Mod_order_room->getOrderListWithStatus($status);
        $stt = 0;
        foreach($this->data['orderList'] as $value)
        {
            $value->qty = count($this->Mod_order_roomdetail->getOrderDetailList($value->orID));
            $value->stt = ++$stt;
            $value->status = lang('cart_progress_'.$value->oStatus);
            $value->color = ($value->oStatus == 1) ? "#333" : ($value->oStatus == 2) ? "#999" : "";
            $value->oTotalPrice = $this->common->formatMoney($value->oTotalPrice,true);
            $value->oCreatedDate = $this->common->getDateFormDB($value->oCreatedDate);
        }
        $this->parser->parse('admin/order',$this->data);
		
    }    
    
    function detail($id='0')
    {
		$this->Mod_order_room->data['langID'] = $this->session->userdata('CI_language_admin_id');
        $action = $this->input->post('action');
        if($action=='')
        {
            $this->data['action'] = 'update';
            $this->Mod_order_room->data['orID'] = $id;
            $this->data = array_merge($this->data,$this->Mod_order_room->select_entry());
            $this->data['orStartedDate'] = $this->common->getDateFormDB($this->data['orStartedDate']);
            $this->data['orEndedDate'] = $this->common->getDateFormDB($this->data['orEndedDate']);
			$this->data['khach_san_list']=$this->Mod_order_room->get_khach_san_list($this->session->userdata('CI_language_admin_id'));
			foreach($this->data['khach_san_list'] as $row)
			{
				$this->data['phong_khach_san_list'][$row['khID']]=$this->Mod_order_room->get_phong_khach_san_list($row['khID']);
			}
            /*$this->data['orCreatedDate'] = $this->common->getDateFormDB($this->data['orCreatedDate']);
            $this->data['orUpdatedDate'] = $this->common->getDateFormDB($this->data['orUpdatedDate']);*/
            //$this->parser->parse('admin/order_room_detail',$this->data);
			$this->index('order_room_detail','.: Admin Cpanel :. | Quản Lý Phòng');
        }       
        else 
        {
            $this->Mod_order_room->data['orID'] = $id;
            $this->Mod_order_room->data['orStartedDate'] = $this->common->dateToBD($this->input->post('orStartedDate'));
            $this->Mod_order_room->data['orEndedDate'] = $this->common->dateToBD($this->input->post("orEndedDate"));
            $this->Mod_order_room->data['orRoomType'] = $this->input->post("typeRoom");
            $this->Mod_order_room->data['orQtyRoom'] = $this->input->post("orQtyRoom");
            $this->Mod_order_room->data['orQtyAdult'] = $this->input->post("orQtyAdult");
            $this->Mod_order_room->data['orQtyKid'] = $this->input->post("orQtyKid");
            $this->Mod_order_room->data['orFullName'] = $this->input->post("orFullName");
            $this->Mod_order_room->data['orPhone'] = $this->input->post("orPhone");
            $this->Mod_order_room->data['orNoID'] = $this->input->post("orNoID");
            $this->Mod_order_room->data['orStatus'] = $this->input->post("ddlStatus");
            $this->Mod_order_room->update_entry();
            redirect(base_url().'AdminCP/orderroom/orderroom_index','refresh');
        }
    }    
    
}
?>