<?php 

global $bdd;

 function insert_payment_details($arr_data = array()) {
        $isPaymentExist = $this->$bdd->query("SELECT * FROM payments WHERE payment_id = '".$arr_data['payment_id']."'");

        if($isPaymentExist->num_rows == 0) {
            $i = 0;
            $values = '';
            foreach($arr_data as $key=>$val){
                $pre = ($i > 0)?', ':'';
                $values .= $pre."'".$this->db->real_escape_string($val)."'";
                $i++;
            }

            $insert = $this->$bdd->query("INSERT INTO payments(".implode(",", array_keys($arr_data)).") VALUES(".$values.")");
        }
    }

    ?>