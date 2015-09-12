<?php
/**
 * Class that operate on table 'power_ammeter'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-06-25 11:03
 */
class PowerAmmeterMySqlExtDAO extends PowerAmmeterMySqlDAO{
       //非搜索查询全部
        public function queryAndPage($start,$end,$is_bak=0){           
            $user_id=$_COOKIE['user_id'];                     
            //查询是否是管理员
            $a=DAOFactory::getPowerAccountDAO()->load($user_id);         
            $bak=" is_bak=0 ";
            if($is_bak==1) $bak=" is_bak=1 ";
            $where=" where ".$bak;
            if($a->accoutType!=1)  $where.=" and  station_id in("."SELECT s.station_id FROM power_account_access_project p,power_base_station s where p.project_id=s.project_id and account_id=".$user_id.")";          
            $sql = "SELECT * FROM power_ammeter ".$where." order by station_id,ammeter_id desc limit ".$start.",".$end;		
            $sqlQuery = new SqlQuery($sql);
            return $this->getList($sqlQuery);
	}
        public function queryStation($station){
            $user_id=$_COOKIE['user_id'];                  
            //查询是否是管理员
            $a=DAOFactory::getPowerAccountDAO()->load($user_id);
            if($a->accoutType==2){//普通用户
                $sql = "SELECT s.station_id FROM power_account_access_project p,power_base_station s where p.project_id=s.project_id and account_id=".$user_id." and s.station_name='".$station."'"; 
            }else{
                $sql = "SELECT s.station_id FROM power_base_station s where  s.station_name='".$station."'";
            } 
            $sqlQuery = new SqlQuery($sql);
            $result=$this->execute($sqlQuery);
            return $result[0][0];
	}
        public function search($start,$end,$where=''){           
            $sql = "SELECT * FROM power_ammeter ".$where." order by ammeter_id desc limit ".$start.",".$end;		
            $sqlQuery = new SqlQuery($sql);
            return $this->getList($sqlQuery);
	}
        public function lastRow($stationId){                     
           $sql = "SELECT * FROM power_ammeter where station_id=".$stationId." order by ammeter_id desc";         
            $sqlQuery = new SqlQuery($sql);
            $result=$this->execute($sqlQuery);
            return $result[0];
        }
	
}
?>