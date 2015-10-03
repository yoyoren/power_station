<?php
class ReportHandler {
    public static function evaule($start,$pagesize,$query_option = array()){
        $sql = '';
        $sql_arr = array();
        foreach($query_option as $key=>$value){
            if($value){
		array_push($sql_arr,$key.'="'.$value.'"');
            }
	}
        if(count($sql_arr)){
	    $sql = " and ".implode(' AND ',$sql_arr);          
        }
        //搜索电表的基站大于2条的数据.分组记录>2站id，（连接power_base_station表搜索）
        $station=  DAOFactory::getPowerAmmeterChinamobileDAO()->estation($sql);
        //进行数据整合
        foreach($station as $k=>$v){
            $ammeter=  DAOFactory::getPowerAmmeterChinamobileDAO()->search(0,2,'');
            $station[$k]['t1']= date('Y-m-d H:i',$ammeter[1]->readTime);
            $station[$k]['t2']= date('Y-m-d H:i',$ammeter[0]->readTime);
            $station[$k]['h1']= floatval($ammeter[1]->ammeterNormal);
            $station[$k]['h2']= floatval($ammeter[0]->ammeterNormal);
            $station[$k]['k1']= floatval($ammeter[1]->ammeterNormalChinamobile);
            $station[$k]['k2']= floatval($ammeter[0]->ammeterNormalChinamobile);
            $station[$k]['x'] = ($station[$k]['k2']-$station[$k]['k1'])/($station[$k]['h2']-$station[$k]['h1']); 
            $station[$k]['e'] = $ammeter[0]->eValue;
        }
        return $station;
    }
}

