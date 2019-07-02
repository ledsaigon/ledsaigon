<?php

    Class Mod_viewer extends CI_Model
    {

        public $data = array(
                                'ID' => '',
                                'Name' => '',
                                'Alias' => '',
                                'Order' => 0,
                                'Path' => '',
                                'Headline' => '',
                                'Content' => '',
                                'Type' => '',
                                'Parent' => '',
                                'State' => '',
                                'Level' => '',
                                'langID' => 1,
                                'CreatedDate' => '',
                                'UpdatedDate' => ''
                            );
                            
        function __construct()
        {
            parent::__construct();
        }
        
		function Get_banner()
		{
			$data=array();
			$this->db->where('bType','banner');
			$this->db->where('bActive',1);
			$this->db->where('langID',$this->data['langID']);
			if($this->data['langID']==1)
			$this->db->where('bID',12);
			else
			$this->db->where('bID',15);
			$re=$this->db->get('banner');
			if($re->num_rows()>0)
			{
				$data=$re->row_array();
			}
			else
			{
				$data['bPath']="";
			}
			$re->free_result();
			return $data;
		}
		
		function Get_banner_con()
		{
			$data=array();
			$this->db->where('bType','banner');
			$this->db->where('bActive',1);
			$this->db->where('langID',$this->data['langID']);
			if($this->data['langID']==1)
			$this->db->where('bID',22);
			else
			$this->db->where('bID',23);
			$re=$this->db->get('banner');
			if($re->num_rows()>0)
			{
				$data=$re->row_array();
			}
			else
			{
				$data['bPath']="";
			}
			$re->free_result();
			return $data;
		}
		
		function Get_video()
		{
			$data=array();
			$this->db->where('bType','video');
			$this->db->where('bActive',1);
			$this->db->where('langID',$this->data['langID']);
			$re=$this->db->get('banner');
			if($re->num_rows()>0)
			{
				$data=$re->row_array();
			}
			else
			{
				$data['bPath']="";
			}
			$re->free_result();
			return $data;
		}
		
		function Get_bando()
		{
			$data=array();
			$this->db->where('bType','slide');
			$this->db->where('bActive',1);
			$this->db->where('langID',$this->data['langID']);
			$this->db->where('bActive',1);
			$re=$this->db->get('banner');
			if($re->num_rows()>0)
			{
				$data=$re->row_array();
			}
			else
			{
				$data['bPath']="";
			}
			$re->free_result();
			return $data;
		}
		
		function Get_footer()
		{
			$data=array();
			$this->db->where('cfKey','config_footer');
			$this->db->where('langID',$this->data['langID']);
			$re=$this->db->get('config');
			if($re->num_rows()>0)
			{
				$data=$re->row_array();
			}
			$re->free_result();
			return $data;
		}
		
		function Get_footer_2()
		{
			$data=array();
			$this->db->where('cfKey','config_footer_2');
			$this->db->where('langID',$this->data['langID']);
			$re=$this->db->get('config');
			if($re->num_rows()>0)
			{
				$data=$re->row_array();
			}
			$re->free_result();
			return $data;
		}
		
		function Get_slideshow()
		{
			$data=array();
			$this->db->where('langID',$this->data['langID']);
			$re=$this->db->get('slideshow');
			if($re->num_rows()>0)
			{
				foreach($re->result_array() as $row)
				{
					$data[]=$row;
				}
			}
			$re->free_result();
			return $data;
		}
		
		function Get_slideshow_list_gelerry()
		{
			$data=array();
			$this->db->where('langID',$this->data['langID']);
			$this->db->where('type','slideshow');
			$re=$this->db->get('slideshow');
			if($re->num_rows()>0)
			{
				foreach($re->result_array() as $row)
				{
					$data[]=$row;
				}
			}
			$re->free_result();
			return $data;
		}
		
		function Get_spnoi_bat()
		{
			$data=array();
			$this->db->where('pState',0);
			$this->db->where('pActive',1);
			$this->db->where('langID',$this->data['langID']);
			$this->db->order_by('pPromotion','DESC');
			$this->db->where('pTypical',1);
			$this->db->order_by('pTypical','ASC');
			$this->db->order_by('pCreatedDate','DESC');
			$this->db->limit(10);
			$re=$this->db->get('product');
			if($re->num_rows()>0)
			{
				foreach($re->result_array() as $row)
				{
					$data[]=$row;
				}
			}
			$re->free_result();
			return $data;
		}
		
		function Get_list_san_pham_moi()
		{
			$data=array();
			$this->db->where('pState',0);
			$this->db->where('pActive',1);
			$this->db->where('langID',$this->data['langID']);
			$this->db->order_by('pCreatedDate','DESC');
			$this->db->order_by('pTypical','ASC');
			$this->db->limit(8);
			$re=$this->db->get('product');
			if($re->num_rows()>0)
			{
				foreach($re->result_array() as $row)
				{
					$data[]=$row;
				}
			}
			$re->free_result();
			return $data;
		}
		
		function Get_tienich()
		{
			$data=array();
			$this->db->where('langID',$this->data['langID']);
			$re=$this->db->get('utilities');
			if($re->num_rows()>0)
			{
				foreach($re->result_array() as $row)
				{
					$data[]=$row;
				}
			}
			$re->free_result();
			return $data;
		}
		
		function Get_lienket()
		{
			$data=array();
			$this->db->where('langID',$this->data['langID']);
			$this->db->where('liState',0);
			$this->db->where('liType','weblink');
			$re=$this->db->get('itd_link');
			if($re->num_rows()>0)
			{
				foreach($re->result_array() as $row)
				{
					$data[]=$row;
				}
			}
			$re->free_result();
			return $data;
		}
		
		function Get_config()
		{
			$data=array();
			$this->db->where('langID',$this->data['langID']);
			$re=$this->db->get('config');
			if($re->num_rows()>0)
			{
				foreach($re->result_array() as $row)
				{
					$data[]=$row;
				}
			}
			$re->free_result();
			return $data;
		}
		
		function Get_infor_list()
		{
			$data=array();
			$this->db->where('langID',$this->data['langID']);
			$this->db->order_by('mOrder');
			$re=$this->db->get('menu_infor');
			if($re->num_rows()>0)
			{
				foreach($re->result_array() as $row)
				{
					$data[]=$row;
				}
			}
			$re->free_result();
			return $data;
		}
		
		function Get_danh_muc_list()
		{
			$data=array();
			$this->db->where('cState',1);
			$this->db->where('langID',$this->data['langID']);
			$this->db->where('cType','product');
			$this->db->where('cLevel',1);
			$this->db->where('cParent',0);
			$this->db->order_by('cOrder','ASC');
			$re=$this->db->get('category');
			if($re->num_rows()>0)
			{
				foreach($re->result_array() as $row)
				{
					$data[]=$row;
				}
			}
			$re->free_result();
			return $data;
		}
		
		function Get_tin_tuc_menu_list()
		{
			$data=array();
			$this->db->where('cState',1);
			$this->db->where('langID',$this->data['langID']);
			$this->db->where('cType','news');
			$this->db->where('cLevel',1);
			$this->db->where('cParent',0);
			$this->db->order_by('cOrder','ASC');
			$re=$this->db->get('category');
			if($re->num_rows()>0)
			{
				foreach($re->result_array() as $row)
				{
					$data[]=$row;
				}
			}
			$re->free_result();
			return $data;
		}
		
		function Get_lienhe_online_list()
		{
			$data=array();
			$this->db->where('suState',0);
			$this->db->where('langID',$this->data['langID']);
			$this->db->where('suActive',1);
			$this->db->order_by('suOrder','ASC');
			$re=$this->db->get('support');
			if($re->num_rows()>0)
			{
				foreach($re->result_array() as $row)
				{
					$data[]=$row;
				}
			}
			$re->free_result();
			return $data;
		}
		
		function Get_infor_content($id)
		{
			$data=array();
			$this->db->where('langID',$this->data['langID']);
			$this->db->where('mID',$id);
			$re=$this->db->get('menu_infor');
			if($re->num_rows()>0)
			{
				$data=$re->row_array();
			}
			$re->free_result();
			return $data;
		}
        
         function Get_product()
		 {
			 $data=array();
			$this->db->where('langID',$this->data['langID']);
			$this->db->order_by('pUpdatedDate','DESC');
			$this->db->where('pNew',1);
			$re=$this->db->get('product');
			if($re->num_rows()>0)
			{
				foreach($re->result_array() as $row)
				{
					$data[]=$row;
				}
			}
			$re->free_result();
			return $data;
		 }
		 
		 function Get_product_content($id)
		 {
			  $data=array();
			$this->db->where('langID',$this->data['langID']);
			$this->db->where('pID',$id);
			$re=$this->db->get('product');
			if($re->num_rows()>0)
			{
				$data=$re->row_array();
			}
			$re->free_result();
			return $data;
		 }
		 
		 function Get_news_list()
		 {
			$data=array();
			$this->db->where('langID',$this->data['langID']);
			$this->db->order_by('newsOrder','ASC');
			$re=$this->db->get('news');
			if($re->num_rows()>0)
			{
				foreach($re->result_array() as $row)
				{
					$data[]=$row;
				}
			}
			$re->free_result();
			return $data;
		 }
		 
		 function Get_contact()
		 {
			$data=array();
			$this->db->where('langID',$this->data['langID']);
			$this->db->limit(1);
			$re=$this->db->get('contact');
			if($re->num_rows()>0)
			{
				$data=$re->row_array();
			}
			$re->free_result();
			return $data;
		 }
		 
        public function getLanguageList($id='')
        {
            $sql = '';
            $sql .= '   SELECT `lID`, `lName`, `lKey`, `lParameter`, `lFlag`, `lOrder`, `lFileView`, `lFileAdmin`, `lActive`, `lCreatedDate` 
                        FROM `language` 
                        WHERE 1 AND `lActive` = 1 AND `lID` != ? ';
    		$query = $this->db->query($sql,$id);
            return $query->result();
        }    
        
        public function getLanguage($key='0')
        {
            $sql = '';
            $sql .= '   SELECT `lID`, `lName`, `lKey`, `lParameter`, `lFlag`, `lOrder`, `lFileView`, `lFileAdmin`, `lActive`, `lCreatedDate` 
                        FROM `language` 
                        WHERE 1 AND `lKey` = ?';
            $query = $this->db->query($sql,$key);
            if($query->num_rows() > 0)
            {
                $row = $query->row();
                $this->data['langID'] = $row->lID;
                $this->data['langName'] = $row->lName;
                $this->data['langParameter'] = $row->lParameter;
                $this->data['langKey'] = $row->lKey;
                $this->data['langFlag'] = $row->lFlag;
            }
            else
            {
                $this->data['langID'] = 0;
                $this->data['langName'] = '';
                $this->data['langParameter'] = '';
                $this->data['langKey'] = '';
                $this->data['langFlag'] = '';
            }
            return $this->data;
        }
        
        public function getLangID()
        {
            $sql = '';
            $sql .= '   SELECT `lID` 
                        FROM `language` 
                        WHERE 1 AND `lActive` = 1 ORDER BY `lID` LIMIT 0 , 1;';
            $query = $this->db->query($sql);
            if($query->num_rows() > 0)
            {
                $row = $query->row();
                return $row->lID;
            }
            else
            {
                return -1;
            }
        }
        
        public function getLoginAdminList()
        {
            $sql = "SELECT * 
                    FROM  `login`
                    ORDER BY `lgID` DESC
                    LIMIT 0 , 6";
            $query = $this->db->query($sql);
            return $query->result();
        }   
        
        public function getSiteLinkList($where=' 1 ')
        {
            $sql = "SELECT `liID`, `liName`, `liAlias`, `liOrder`, `liHeadline`, `liContent`, `liPath`, `liType`, `liState`
                    , `liActive`, `langID`, `liCreatedDate`, `liUpdatedDate` 
                    FROM `itd_link` 
                    WHERE 1 AND `liState` = 0 AND $where";
                    
            $query = $this->db->query($sql);
            return $query->result();
        } 
        
        
        public function getAboutList($where=' 1 ')
        {
            $sql = "SELECT `inID`, `inName`, `inAlias`, `inOrder`, `inHeadline`, `inContent`, `inPath`
                    , `inState`, `inActive`, `langID`, `inCreatedDate`, `inUpdatedDate` 
                    FROM `itd_about` 
                    WHERE 1 AND `inState` = 0 AND $where";
            $query = $this->db->query($sql);
            return $query->result();
        } 
        
        public function getAbout($where = ' 1 ORDER BY `inOrder` LIMIT 0 , 1')
        {
            $sql = '';
            $sql .= "   SELECT `inID`, `inName`, `inAlias`, `inOrder`, `inHeadline`, `inContent`, `inPath`
                        FROM `itd_about` 
                        WHERE 1 AND `langID` = ? AND $where ;";
                        
            $query = $this->db->query($sql,array($this->data["langID"]));
            if($query->num_rows() > 0)
            {
                $row = $query->row();
                $this->data['ID'] = $row->inID;
                $this->data['Name'] = $row->inName;
                $this->data['Alias'] = $row->inAlias;
                $this->data['Order'] = $row->inOrder;
                $this->data['Headline'] = $row->inHeadline;
                $this->data['Content'] = $row->inContent;
                $this->data['Path'] = $row->inPath;
            }
            return $this->data;
        }
        
        public function getNewsList($where=' 1 ')
        {
            $sql = "SELECT `neID`, `neName`, `neAlias`, `neOrder`, `neHeadline`, `neContent`, `nePath`
                    , `neTypical`, `neType`, `cID`, `neState`, `neActive`, `langID`, `neCreatedDate`, `neUpdatedDate`
                    FROM `itd_news` 
                    WHERE 1 AND `neState` = 0 AND `langID` = ? AND $where";
            $query = $this->db->query($sql,array($this->data['langID']));
            return $query->result();
        }       
        
        public function getCatList($where=' 1 ')
        {
            $sql = "SELECT `cID`, `cName`, `cAlias`, `cOrder`, `cPath`, `cContent`, `cType`, `cParent`
                    , `cState`, `cLevel`, `langID`, `cCreatedDate`, `cUpdatedDate` 
                    FROM `category` 
                    WHERE 1 AND `cState` = 1 AND `langID` = ? AND $where";
            $query = $this->db->query($sql,array($this->data['langID']));
            return $query->result();
        } 
        
        public function getCatDetail($id='0')
        {
            $sql = "SELECT `cID`, `cName`, `cAlias`, `cOrder`, `cPath`, `cContent`, `cType`, `cParent`
                    , `cState`, `cLevel`, `langID`, `cCreatedDate`, `cUpdatedDate` 
                    FROM `category` 
                    WHERE 1 AND `cState` = 1 AND `cID` = $id";
            $query = $this->db->query($sql);
            if($query->num_rows() > 0)
            {
                $row = $query->row();
                $this->data['ID'] = $row->cID;
                $this->data['Name'] = $row->cName;
                $this->data['Alias'] = $row->cAlias;
                $this->data['Order'] = $row->cOrder;
                $this->data['Path'] = $row->cPath;
                $this->data['Content'] = $row->cContent;
                $this->data['Type'] = $row->cType;
                $this->data['Parent'] = $row->cParent;
                $this->data['State'] = $row->cState;
                $this->data['Level'] = $row->cLevel;
                $this->data['angID'] = $row->langID;
                $this->data['CreatedDate'] = $row->cCreatedDate;
                $this->data['UpdatedDate'] = $row->cUpdatedDate;
            }
            return $this->data;
        } 
        
        public function getCatDetail2($id='0')
        {
            $sql = "SELECT `cID`, `cName`, `cAlias`, `cOrder`, `cPath`, `cContent`, `cType`, `cParent`
                    , `cState`, `cLevel`, `langID`, `cCreatedDate`, `cUpdatedDate` 
                    FROM `category` 
                    WHERE 1 AND `cState` = 1 AND `cID` = $id";
            $query = $this->db->query($sql);
            if($query->num_rows() > 0)
            {
                $row = $query->row();
                $this->data['caID'] = $row->cID;
                $this->data['caName'] = $row->cName;
                $this->data['caAlias'] = $row->cAlias;
                $this->data['caOrder'] = $row->cOrder;
                $this->data['caPath'] = $row->cPath;
                $this->data['caContent'] = $row->cContent;
                $this->data['caType'] = $row->cType;
                $this->data['caParent'] = $row->cParent;
                $this->data['caState'] = $row->cState;
                $this->data['caLevel'] = $row->cLevel;
                $this->data['caLangID'] = $row->langID;
                $this->data['caCreatedDate'] = $row->cCreatedDate;
                $this->data['caUpdatedDate'] = $row->cUpdatedDate;
            }
            return $this->data;
        } 
        
        public function getSupportList()
        {
            $sql = '';
            $sql .= '   SELECT  `suID` ,  `suName` ,  `suNick` ,  `suType` ,  `suOrder` ,  `suActive` , `suState`, `langID` ,  `suCreatedDate` ,  `suUpdatedDate` 
                        FROM  `support` 
                        WHERE 1 AND `suState` = 0 AND `langID` = ? ORDER BY `suOrder`;';
            $query = $this->db->query($sql,$this->data['langID']);
            return $query->result();
        }
        
        public function GetProductList($where = " 1 ")
        {
            $sql = '';
            $sql .= "   SELECT `pID`, `pName`, `pAlias`, `pPriceOr`, `pPrice`, `pPromotion`, `pPriceHot`, `pPrPro`, `pPrDes`
                        , `pPath`, `pTypical`, `pType`, `pView`, `pHeadline`, `pContent`, `cID`, `langID`, `pState`, `pActive`, `pCreatedDate`, `pUpdatedDate`
                        FROM `product` p
                        WHERE 1 
                        AND `pState` = 0 AND `langID` = ? AND {$where} ";
    		$query = $this->db->query($sql,array($this->data['langID']));
    		return $query->result();
        }
        
        public function CheckProduct($id=0)
        {
            $sql = '';
            $sql .= '   SELECT `id`
                        FROM `products`
                        WHERE `id` = ?';
            $query = $this->db->query($sql,$id);
            if($query->num_rows() > 0)
                return true;
            else return false;
        }
        
        public function getProduct($id=0)
        {
            $sql = "UPDATE `product` SET `pView` = `pView` + 1 WHERE `pID` = ".$id.";";
            $this->db->query($sql);
            $sql = '   SELECT `pID`, `pName`, `pAlias`, `pPriceOr`, `pPrice`, `pPromotion`, `pPriceHot`, `pPrPro`, `pPrDes`
                        , `pPath`, `pTypical`, `pType`, `pView`, `pHeadline`, p.`cID`, p.`pContent`, p.`langID`, `pState`
                        , `pActive`, `pCreatedDate`, `pUpdatedDate`, `cAlias`, `cName`
                        FROM `product` p, `category` c
                        WHERE 1 
                        AND `pId` = ? AND p.`langID` = ? ORDER BY `pId` DESC; ';
            $param = array(	$id,$this->data['langID']);
            $query = $this->db->query($sql,$param);
            if($query->num_rows() > 0)
            {
                $row = $query->row();
                $this->data['ID'] = $row->pID;
                $this->data['Name'] = $row->pName;
                $this->data['Alias'] = $row->pAlias;
                $this->data['PrDes'] = $row->pPrDes;
                $this->data['Price'] = $row->pPrice;
                $this->data['Path'] = $row->pPath;
                $this->data['View'] = $row->pView;
                $this->data['Typical'] = $row->pTypical;
                $this->data['Type'] = $row->pType;
                $this->data['Headline'] = $row->pHeadline;
                $this->data['Content'] = $row->pContent;
                $this->data['cID'] = $row->cID;
                $this->data['cName'] = $row->cName;
                $this->data['cAlias'] = $row->cAlias;
                $this->data['pCreatedDate'] = $row->pCreatedDate;
                $this->data['pUpdatedDate'] = $row->pUpdatedDate;
            }
            return $this->data;
        }
        
        
        
        public function getCareer($id)
        {
            $sql = '';
            $sql .= '   SELECT `crID`, `crName`, `crAlias`, `crOrder`, `crHeadline`, `crContent`, `crPath`
                        , `crState`, `crActive`, `langID`, `crCreatedDate`, `crUpdatedDate` 
                        FROM `itd_career` 
                        WHERE 1 AND `crID` = ? ORDER BY `crID` DESC;';
                        
            $query = $this->db->query($sql,$id);
            if($query->num_rows() > 0)
            {
                $row = $query->row();
                $this->data['crID'] = $row->crID;
                $this->data['crName'] = $row->crName;
                $this->data['crAlias'] = $row->crAlias;
                $this->data['crOrder'] = $row->crOrder;
                $this->data['crHeadline'] = $row->crHeadline;
                $this->data['crContent'] = $row->crContent;
                $this->data['crPath'] = $row->crPath;
                $this->data['crState'] = $row->crState;
                $this->data['crActive'] = $row->crActive;
                $this->data['langID'] = $row->langID;
                $this->data['crCreatedDate'] = $row->crCreatedDate;
                $this->data['crUpdatedDate'] = $row->crUpdatedDate;
            }
            return $this->data;
        }
        
        public function getCareerList($where = " 1 ")
        {
            $sql = '';
            $sql .= "   SELECT `crID`, `crName`, `crAlias`, `crOrder`, `crHeadline`, `crContent`, `crPath`
                        , `crState`, `crActive`, `langID`, `crCreatedDate`, `crUpdatedDate` 
                        FROM `itd_career` 
                        WHERE 1 AND `crState` = 0 AND `langID` = ? AND {$where};";
            $query = $this->db->query($sql,$this->data['langID']);
            return $query->result();
        }
        
        public function getService($id=0)
        {
            $sql = '';
            $sql .= '   SELECT `seID`, `seName`, `seAlias`, `seOrder`, `seHeadline`, `seContent`, `sePath`
                        , `seState`, `seActive`, `seTypical`, `langID`, `seCreatedDate`, `seUpdatedDate` 
                        FROM `itd_service` 
                        WHERE 1 AND `seID` = ? ORDER BY `seID` DESC;';
                        
            $query = $this->db->query($sql,array($id));
            if($query->num_rows() > 0)
            {
                $row = $query->row();
                $this->data['ID'] = $row->seID;
                $this->data['Name'] = $row->seName;
                $this->data['Alias'] = $row->seAlias;
                $this->data['Order'] = $row->seOrder;
                $this->data['Headline'] = $row->seHeadline;
                $this->data['Content'] = $row->seContent;
                $this->data['Path'] = $row->sePath;
                $this->data['Typical'] = $row->seTypical;
            }
            return $this->data;
        }
        
        public function getServiceList($where = ' 1 ')
        {
            $sql = '';
            $sql .= "   SELECT `seID`, `seName`, `seAlias`, `seOrder`, `seHeadline`, `seContent`, `sePath`
                        , `seState`, `seActive`, `seTypical`, `langID`, `seCreatedDate`, `seUpdatedDate` 
                        FROM `itd_service` 
                        WHERE 1 AND `seState` = 0 AND `langID` = ? AND  {$where}";
            $query = $this->db->query($sql,$this->data['langID']);
            return $query->result();
        }
        
        function GetConfig($key='')
        {
            $sql = "SELECT 
                            `cfKey`
                        ,   `cfDesc`
                    FROM 
                            `config` 
                    WHERE 1
                    AND     `cfKey` = ? AND `langID` = ?;";
            $query = $this->db->query($sql,array($key,$this->data["langID"]));
            if($query->num_rows() > 0)
            {
                $row = $query->row();
                return $row->cfDesc;
            }
            return '';
        }
        

         function Get_about_menu_list()
		{
			$data=array();
			$this->db->where('inState',0);
			$this->db->where('inActive',1);
			$this->db->where('langID',$this->data['langID']);
			$this->db->order_by('inOrder','ASC');
			$re=$this->db->get('itd_about');
			if($re->num_rows()>0)
			{
				foreach($re->result_array() as $row)
				{
					$data[]=$row;
				}
			}
			$re->free_result();
			return $data;
		}  
		
		function Get_lvhd_menu_list()
		{
			$data=array();
		$this->db->where('neActive',1);
		$this->db->where('neState',0);
		$this->db->where('langID',$this->data['langID']);
		$this->db->where('neType','linh_vuc');
		$this->db->order_by('neTypical','ASC');
		$this->db->order_by('neOrder','DESC');
		$re=$this->db->get('itd_news');
		if($re->num_rows()>0)
		{
			foreach($re->result_array() as $row)
			{
				$data[]=$row;
			}
		}
		$re->free_result();
		return $data;
		}    
    }
?>