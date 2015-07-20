<?php
/**
 * Class that operate on table 'power_ammeter'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-06-25 11:03
 */
class PowerAmmeterMySqlExtDAO extends PowerAmmeterMySqlDAO{
        public function queryAndPage($start,$end){
            $sql = 'SELECT * FROM power_ammeter order by ammeter_id desc limit '.$start.','.$end;		
            $sqlQuery = new SqlQuery($sql);
            return $this->getList($sqlQuery);
	}
        public function queryStation($station){
            $user_id=$_COOKIE['user_id'];
            $sql = "SELECT s.station_id FROM power_account_access_project p,power_base_station s where p.project_id=s.project_id and account_id=".$user_id." and s.station_name='".$station."'";
            $sqlQuery = new SqlQuery($sql);
            $result=$this->execute($sqlQuery);
            return $result[0][0];
	}
	
}
?>