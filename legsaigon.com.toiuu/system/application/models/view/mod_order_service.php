<?php

/**
 * @author Truong Quang Dinh
 * @copyright 2011
 */
    class Mod_order_service extends CI_Model
    {
        public $data = array(
                                'osID' => '',
                                'osFullName' => '',
                                'osPhone' => '',
                                'osEmail' => '',
                                'osSubject' => '',
                                'osDate' => '',
                                'osStatus' => '',
                                'osContent' => '',
                                'osCreatedDate' => '',
                                'osUpdatedDate' => ''
                            );

        function __construct()
        {
            parent::__construct();
        }
        
        
        public function select_entry()
        {
            $sql = '';
            $sql .= ' SELECT `osID`, `osFullName`, `osPhone`, `osEmail`, `osSubject`, `osDate`
                    , `osContent`, `osStatus`, `osCreatedDate`, `osUpdatedDate` 
                    FROM `order_service` 
                    WHERE 1 AND `osID` = ? ORDER BY `osID` DESC LIMIT 0,1;';
            $query = $this->db->query($sql,$this->data['osID']);
            if($query->num_rows() > 0)
            {
                $row = $query->row();
                $this->data['osID'] = $row->osID;
                $this->data['osFullName'] = $row->osFullName;
                $this->data['osPhone'] = $row->osPhone;
                $this->data['osEmail'] = $row->osEmail;
                $this->data['osSubject'] = $row->osSubject;
                $this->data['osDate'] = $row->osDate;
                $this->data['osContent'] = $row->osContent;
                $this->data['osStatus'] = $row->osStatus;
                $this->data['osCreatedDate'] = $row->osCreatedDate;
                $this->data['osUpdatedDate'] = $row->osUpdatedDate;
            }
            return $this->data;
        }
        
        public function getOrderServiceList()
        {
            $sql = '';
            $sql .= ' SELECT `osID`, `osFullName`, `osPhone`, `osEmail`, `osSubject`, `osDate`
                    , `osContent`, `osStatus`, `osCreatedDate`, `osUpdatedDate` 
                    FROM `order_service` 
                    WHERE 1 ORDER BY `osStatus` ASC , `osID` DESC';
    		$query = $this->db->query($sql);
            return $query->result();
        }
        
        public function insert_entry()
        {
            $sql = "INSERT INTO `order_service` (
                        `osFullName`
                    ,   `osPhone`
                    ,   `osEmail`
                    ,   `osSubject`
                    ,   `osDate`
                    ,   `osContent`
                    ,   `osStatus`
                    ,   `osCreatedDate`
                    ,   `osUpdatedDate` 
                    )
                    VALUES (
                    ?, ?, ?, ?, ?, ?, ?, NOW(), NOW()
                    );";
            $query = $this->db->query($sql, array(
                                                  $this->data["osFullName"]
                                                  ,$this->data["osPhone"]
                                                  ,$this->data["osEmail"]
                                                  ,$this->data["osSubject"]
                                                  ,$this->data["osDate"]
                                                  ,$this->data["osContent"]
                                                  ,$this->data["osStatus"]));
            return $this->db->affected_rows();
        }
        
        public function update_entry()
        {
            /*$sql = "UPDATE  `order_service` 
                    SET  `osFullName` = ?
                    ,   `osPhone` = ?
                    ,   `osEmail` = ?
                    ,   `osSubject` = ?
                    ,   `osDate` = ?
                    ,   `osContent` = ?
                    ,   `osStatus` = ?
                    ,   `osUpdatedDate`  = NOW()
                    WHERE `osID` = ? ;";*/
            $sql = "UPDATE  `order_service` 
                    SET  `osFullName` = ?
                    ,   `osPhone` = ?
                    ,   `osDate` = ?
                    ,   `osStatus` = ?
                    ,   `osUpdatedDate`  = NOW()
                    WHERE `osID` = ? ;";
            $query = $this->db->query($sql, array(
                                                  $this->data["osFullName"]
                                                  ,$this->data["osPhone"]
                                                  ,$this->data["osDate"]
                                                  ,$this->data["osStatus"]
                                                  ,$this->data["osID"]));
            return $this->db->affected_rows();
        }
        
        
        
        public function delete_entry()
        {
            $sql = "DELETE FROM `order_service` WHERE `osID` IN (".$this->data["osID"].");";
            $query = $this->db->query($sql);
            return $this->db->affected_rows();
        }
        
    }
?>