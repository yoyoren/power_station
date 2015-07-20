<?php
    class LogHandler{
        //日志插入
        public static function write_log($info=array()){         
            if($info==array()){                            
                $info['station_id']=1;
                $info['log_type']=2;
                $info['log_desc']='测试';
                $info['origin_value']='测试';
                $info['current_value']='测试后';
                $info['creator_id']=1;
            }         
            $log = new PowerBaseStationLog();
            $log->stationId    =$info['station_id'];
            $log->logType      =$info['log_type'];
            $log->logDesc      =$info['log_desc'];
            $log->originValue  =$info['origin_value'];
            $log->currentValue =$info['current_value'];
            $log->creatorId    =$info['creator_id'];       
            $log->createTime   =time();
            $dao =  new PowerBaseStationLogMySqlDAO(); 
            return $dao->insert($log);       
        }
        public static function show_log($start,$end,$createTime='',$logType='',$creatorId=''){
           $where=array();
           if($createTime!=''){
                 $createTime_start= strtotime($createTime." 00:00:00");
                 $createTime_end  = strtotime($createTime." 23:59:59");
                 $where[]="create_time between  ".$createTime_start." and ".$createTime_end;
           }
           if($logType!=''){
                $where[]="log_type=".$logType;
           }
           if($creatorId!=''){
                $where[]="creator_id=".$creatorId;
           }
           if( $where==array()){
               $where = '';
           }else{
               
               $where = implode(' and ', $where);
               $where1 =" where ".$where;
           }
           
            $list=DAOFactory::getPowerBaseStationLogDAO()->queryAndPage($start, $end, $where1);           
            //判断日志类型0：创建；1：修改；2：删除；
            $log_type=array('创建','修改','删除');
            if($list){
                foreach($list as $k=>$v){
                     $list[$k]->stationName= DAOFactory::getPowerBaseStationLogDAO()->queryStationName($list[$k]->stationId);
                     $list[$k]->workType= $log_type[$list[$k]->logType];
                     $list[$k]->operater= DAOFactory::getPowerBaseStationLogDAO()->queryAccountNameById($list[$k]->creatorId);
                     $list[$k]->createTime=date('Y-m-d h:i',$list[$k]->createTime);

                }
            }
            return $list;            
            
        }
        public static function get_operater(){         
            $list1= DAOFactory::getPowerAccountDAO()->queryAllOrderBy('account_id desc');          
            return $list1;       
        }
    }

