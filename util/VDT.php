<?php 
    function VDT($date){
        $date = strtotime($date);
        $currantDate = strtotime(date("y-m-d"));
        if($date >= $currantDate){
            return true;
        }else{
            return false;
        }
    }


?>