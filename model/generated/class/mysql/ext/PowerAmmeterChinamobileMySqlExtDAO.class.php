<?php
/**
 * Class that operate on table 'power_ammeter_chinamobile'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-06-25 11:03
 */
class PowerAmmeterChinamobileMySqlExtDAO extends PowerAmmeterChinamobileMySqlDAO{
        public function queryAndPage($start,$end){
            $sql = 'SELECT * FROM power_ammeter_chinamobile order by ammeter_id desc limit '.$start.','.$end;		
            $sqlQuery = new SqlQuery($sql);
            return $this->getList($sqlQuery);
	}
        public function queryNormal($stationId,$readTime){
            $sql = 'SELECT ammeter_normal FROM power_base_station_runing_data where station_id='.$stationId.' and create_time<='.$readTime.' order by create_time desc';
            $sqlQuery = new SqlQuery($sql);
            $result=$this->execute($sqlQuery);
            return $result[0][0];
	}
	
}
?>