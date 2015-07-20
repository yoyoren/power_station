<?php
/**
 * Class that operate on table 'power_base_station_log'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-07-02 13:01
 */
class PowerBaseStationLogMySqlExtDAO extends PowerBaseStationLogMySqlDAO{
    	public function queryAndPage($start,$end,$where=''){
            $sql = 'SELECT * FROM power_base_station_log'.$where.' order by log_id desc limit '.$start.','.$end;		
            $sqlQuery = new SqlQuery($sql);
            return $this->getList($sqlQuery);
	}
        public function queryAccountNameById($account_id){
            $sql = 'SELECT account_name FROM power_account where account_id='.$account_id;		
            $sqlQuery = new SqlQuery($sql);
            $result=$this->execute($sqlQuery);
            return $result[0][0];
	}
        public function queryStationName($station_id){
            $sql = 'SELECT station_name FROM power_base_station where station_id='.$station_id;		
            $sqlQuery = new SqlQuery($sql);
            $result=$this->execute($sqlQuery);
            return $result[0][0];
	}
	
}
?>