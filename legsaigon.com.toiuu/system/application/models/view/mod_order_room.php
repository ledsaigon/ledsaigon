<?php

/**
 * @author Truong Quang DInh
 * @copyright 2011
 */
    class Mod_order_room extends CI_Model
    {
        public $data = array(
                                'orID' => '',
                                'orFullName' => '',
                                'orPhone' => '',
                                'orNoID' => '',
                                'orRoomType' => '',
                                'orStartedDate' => '',
                                'orEndedDate' => '',
                                'orQtyRoom' => 0,
                                'orQtyAdult' => 0,
                                'orQtyKid' => 0,
                                'orStatus' => 0,
                                'orCreatedDate' => '',
                                'orUpdatedDate' => '',
                            );

        function __construct()
        {
            parent::__construct();
        }
        
        public function select_entry()
        {
            $sql = '';
            $sql .= '   SELECT `orID`, `orFullName`, `orPhone`, `orRoomType`, `orStartedDate`, `orEndedDate`
                        , `orQtyRoom`, `orQtyAdult`, `orQtyKid`, `orNoID`, `orStatus`, `orCreatedDate`, `orUpdatedDate` 
                        FROM `order_room` 
                        WHERE 1 AND `orID` = ? ORDER BY `orID` DESC ';
            $param = array(	$this->data['orID']);
            $query = $this->db->query($sql,$param);
            if($query->num_rows() > 0)
            {
                $row = $query->row();
                $this->data['orID'] = $row->orID;
                $this->data['orFullName'] = $row->orFullName;
                $this->data['orNoID'] = $row->orNoID;
                $this->data['orPhone'] = $row->orPhone;
                $this->data['orRoomType'] = $row->orRoomType;
                $this->data['orStartedDate'] = $row->orStartedDate;
                $this->data['orEndedDate'] = $row->orEndedDate;
                $this->data['orQtyRoom'] = $row->orQtyRoom;
                $this->data['orQtyAdult'] = $row->orQtyAdult;
                $this->data['orQtyKid'] = $row->orQtyKid;
                $this->data['orStatus'] = $row->orStatus;
                $this->data['orCreatedDate'] = $row->orCreatedDate;
                $this->data['orUpdatedDate'] = $row->orUpdatedDate;
            }
            return $this->data;
        }
        
        public function getOrderRoomList()
        {
            $sql = '';
            $sql .= ' SELECT `orID`, `orFullName`, `orPhone`, `orNoID`, `orRoomType`, `orStartedDate`, `orEndedDate`
                        , `orQtyRoom`, `orQtyAdult`, `orQtyKid`, `orStatus`, `orCreatedDate`, `orUpdatedDate` 
                        FROM `order_room` 
                        ORDER BY `orStatus` ASC, `orID` DESC ';
            $query = $this->db->query($sql);
    		return $query->result();
        }
                
        public function insert_entry()
        {
            $sql = "INSERT INTO `order_room` (
                            `orFullName`
                        ,   `orPhone`
                        ,   `orNoID`
                        ,   `orRoomType`
                        ,   `orStartedDate`
                        ,   `orEndedDate`
                        ,   `orQtyRoom`
                        ,   `orQtyAdult`
                        ,   `orQtyKid`
                        ,   `orStatus`
                        ,   `orCreatedDate`
                        ,   `orUpdatedDate`
                    )
                    VALUES (
                    ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW()
                    );";
            $query = $this->db->query($sql, array(
                                                  $this->data["orFullName"]
                                                  ,$this->data["orPhone"]
                                                  ,$this->data["orNoID"]
                                                  ,$this->data["orRoomType"]
                                                  ,$this->data["orStartedDate"]
                                                  ,$this->data["orEndedDate"]
                                                  ,$this->data["orQtyRoom"]
                                                  ,$this->data["orQtyAdult"]
                                                  ,$this->data["orQtyKid"]
                                                  ,$this->data["orStatus"]));
            return $this->db->affected_rows();
        }
        
        public function update_entry()
        {
            $sql = "UPDATE  `order_room` 
                    SET  `orFullName` = ?,
                        `orPhone` = ?,
                        `orNoID` = ?,
                        `orRoomType` = ?,
                        `orStartedDate` = ?,
                        `orEndedDate` = ?,
                        `orQtyRoom` = ?,
                        `orQtyAdult` = ?, 
                        `orQtyKid` = ?, 
                        `orStatus` = ?,
                        `orUpdatedDate` = NOW()
                    WHERE `orID` = ? ;";
            $query = $this->db->query($sql, array(
                                                  $this->data["orFullName"]
                                                  ,$this->data["orPhone"]
                                                  ,$this->data["orNoID"]
                                                  ,$this->data["orRoomType"]
                                                  ,$this->data["orStartedDate"]
                                                  ,$this->data["orEndedDate"]
                                                  ,$this->data["orQtyRoom"]
                                                  ,$this->data["orQtyAdult"]
                                                  ,$this->data["orQtyKid"]
                                                  ,$this->data["orStatus"]
                                                  ,$this->data['orID']));
            return $this->db->affected_rows();
        }
        
        public function delete_entry()
        {
            $sql = "DELETE FROM `order_room` WHERE `orID` IN (".$this->data['orID'].");";
            $query = $this->db->query($sql);
            return $this->db->affected_rows();
        }
    }
?>