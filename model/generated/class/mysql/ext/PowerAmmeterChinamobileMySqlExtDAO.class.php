<?php
/**
 * Class that operate on table 'power_ammeter_chinamobile'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-06-25 11:03
 */
class PowerAmmeterChinamobileMySqlExtDAO extends PowerAmmeterChinamobileMySqlDAO{
        public function queryAndPage($start,$end){
            $user_id=$_COOKIE['user_id'];          
            $where=" where station_id in("."SELECT s.station_id FROM power_account_access_project p,power_base_station s where p.project_id=s.project_id and account_id=".$user_id.")";
            //查询是否是管理员
            $a=DAOFactory::getPowerAccountDAO()->load($user_id);
            if($a->accoutType==1) $where="";  
            $sql = "SELECT * FROM power_ammeter_chinamobile ".$where." order by station_id,ammeter_id desc limit ".$start.','.$end;		
            $sqlQuery = new SqlQuery($sql);
            return $this->getList($sqlQuery);
	}
        public function queryNormal($stationId,$readTime){
            $sql = 'SELECT energy_all FROM power_base_station_runing_data where station_id='.$stationId.' and create_time<='.$readTime.' order by create_time desc';
            $sqlQuery = new SqlQuery($sql);
            $result=$this->execute($sqlQuery);
            return $result[0][0];
	}
        public function search($start,$end,$sql){                 
            $sql = "SELECT * FROM power_ammeter_chinamobile ".$sql." order by ammeter_id desc limit ".$start.','.$end;		
            $sqlQuery = new SqlQuery($sql);
            return $this->getList($sqlQuery);
        }
        public function lastRow($stationId){                     
           $sql = "SELECT * FROM power_ammeter_chinamobile where station_id=".$stationId." order by ammeter_id desc";         
            $sqlQuery = new SqlQuery($sql);
            $result=$this->execute($sqlQuery);
            return $result[0];
        }
	public function estation($sqlext=''){          
            $sql="select a.station_id,b.station_name from power_ammeter_chinamobile as a  LEFT JOIN power_base_station as b on a.station_id=b.station_id  WHERE status=0 ".$sqlext." group by station_id having count(a.station_id)>1";
            $sqlQuery = new SqlQuery($sql);
            return $this->execute($sqlQuery);   
        }
}
?>