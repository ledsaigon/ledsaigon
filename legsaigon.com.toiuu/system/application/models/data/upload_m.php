<?php
class Upload_m extends CI_Model{
    protected $gallery_path = "";
    protected $gallery_url = "";
    public function __construct(){
        parent::__construct();
        //Lấy đường dẫn url của thư mục chứa hình ảnh được upload
        $this->gallery_url = base_url()."public/images/";
        //Lấy đường dẫn vật lý của thư mục chứa hình ảnh đươc upload
        $this->gallery_path = base_url().realpath("gallery/");
    }
    
    //hàm thực hiện công việc upload và resize lại hình ảnh
    public function do_upload($gallery_path='',$width=100,$height=100){
        $config = array('upload_path'   => $gallery_path,
                        'allowed_types' => 'gif|jpg|png',
                        'max_size'      => '2000');
        $this->load->library("upload",$config);
        if(!$this->upload->do_upload("img")){
            $error = array($this->upload->display_errors());
        }else{
            $image_data = $this->upload->data();    
        }
        //kết thúc công đoạn upload hình ảnh
        
        $config = array("source_image" => $image_data['full_path'],
                        "new_image" => $this->gallery_path . "/thumbs",
                        "maintain_ration" => true,
                        "width" => $width,
                        "height" => $height);
        $this->load->library("image_lib",$config);
        $this->image_lib->resize();
        //kết thúc công đoạn resize lại hình ảnh                
    }
    
    
    //hàm lấy hình ảnh từ thư mục lưu file đã upload
    public function get_images(){
        $file = scandir($this->_gallery_path);
        $file = array_diff($file, array('.', '..', 'thumbs'));
        //tên tất cả các file hình trong thư mục đã được upload lên.
        
        
        $images = array();
        foreach($file as $img){
            $images[] = array("url"        => $this->_gallery_url . $img,
                              "thumb_url" => $this->_gallery_url . "thumbs/" . $img);    
        }
        return $images;
    }
}