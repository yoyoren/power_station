<!DOCTYPE html>
<html>
 <?php include ('include/head_script.php')?>
<body>
  <div class="n-layout">
    <?php include ('include/header.php')?>

    <div class="n-container">
      <?php include ('include/nav_base.php')?>
	  <script>$('#nav_base_1').addClass('current');</script>

      <div class="n-right-content">
      <div class="n-right-content-inner">
        <h4 class="tab-to-title">基础信息</h4>
        <div class="current-name-area clearfix">
          <span class="vl-m fl-l name"><b><?php echo $station['info']->stationSeriseCode; ?>（<?php echo $station['info']->stationName;?>）</b>基站</span>

          <div class="fl-r">
            <div class="btn-group">


				<?php
					 $prev_id = $station['prev_id'];
					 if($prev_id > 1){
						echo '<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span><a href="/base/info/'.$prev_id.'" class="vl-m">前一个基站</a></button>';
					 }
				?>


              <button type="button" class="btn btn-default">
                <a href="/base/info/<?php echo $station['next_id'];?>" class="vl-m">后一个基站</a><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              </button>
            </div>
          </div>

        </div>

        <div class="nav-tabs-content">

          <p class="table-title clearfix">
            <a href="/base/edit/<?php echo $station['info']->stationId;?>" class="btn btn-default fl-r">编辑当前基站</a>
          </p>

          <table class="table table-bordered">
            <tbody>
              <tr>
                <td class="td-to-th">基站名称</td>
                <td><?php echo $station['info']->stationName;?></td>
                <td class="td-to-th">站点类型</td>
                <td><?php echo $station['info']->stationType;?></td>
                <td class="td-to-th">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td class="td-to-th">基站编号</td>
                <td><?php echo $station['info']->stationSeriseCode;?></td>
                <td class="td-to-th">用能方站号</td>
                <td>NH10113</td>
                <td class="td-to-th">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr class="td-empty">
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>


              <tr>
                <td class="td-to-th">项目</td>
                <td><?php echo $station['info']->projectName;?></td>
                <td class="td-to-th">工程分期</td>
                <td>shcu1</td>
                <td class="td-to-th">建站时间</td>
                <td><?php echo $station['info']->displayDate;?></td>
              </tr>

              <tr>
                <td class="td-to-th">省</td>
                <td><?php echo $station['info']->stationProvinceName;?></td>
                <td class="td-to-th">城市</td>
                <td><?php echo $station['info']->stationCityName;?></td>
                <td class="td-to-th">区县</td>
                <td><?php echo $station['info']->stationDistirctName;?></td>
              </tr>

              <tr>
                <td class="td-to-th">地址</td>
                <td><?php echo $station['info']->stationAddress;?></td>
                <td class="td-to-th">经度</td>
                <td><?php echo $station['info']->stationLat;?></td>
                <td class="td-to-th">纬度</td>
                <td><?php echo $station['info']->stationLng;?></td>
              </tr>

              <tr class="td-empty">
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>

              <tr>
                <td class="td-to-th">供电类型</td>
                <td><?php echo $station['energy']->powerSupplyTypeName;?></td>
                <td class="td-to-th">电价收费方</td>
                <td><?php echo $station['energy']->feeTypeName;?></td>
                <td class="td-to-th">建筑类型</td>
                <td><?php echo $station['energy']->buildingTypeName;?></td>
              </tr>

              <tr>
                <td class="td-to-th">电价</td>
                <td><?php echo $station['energy']->price;?></td>
                <td class="td-to-th">分成比例</td>
                <td><?php echo $station['energy']->ration;?></td>
                <td class="td-to-th">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>

              <tr>
                <td class="td-to-th">局方电表号</td>
                <td><?php echo $station['energy']->ammeterNum;?></td>
                <td class="td-to-th">我方电表号</td>
                <td><?php echo $station['energy']->ammeterNumChinamobile;?></td>
                <td class="td-to-th">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>

              <tr class="td-empty">
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>

              <tr>
                <td class="td-to-th">空调数量</td>
                <td><?php echo $station['device']->airConditionNum;?></td>
                <td class="td-to-th">空调温感</td>
                <td><?php echo $station['device']->airConditionTempature;?></td>
                <td class="td-to-th">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>

              <tr>
                <td class="td-to-th">室外温感</td>
                <td><?php echo $station['device']->tempatureInside;?></td>
                <td class="td-to-th">室内温感</td>
                <td><?php echo $station['device']->tempatureOutside;?></td>
                <td class="td-to-th">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>

              <tr>
                <td class="td-to-th">进风机型号</td>
                <td><?php echo $station['device']->fanInType;?></td>
                <td class="td-to-th">出风机型号</td>
                <td><?php echo $station['device']->fanOutType;?></td>
                <td class="td-to-th">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>

              <tr>
                <td class="td-to-th">恒温柜数量</td>
                <td><?php echo $station['device']->cabinetNum;?></td>
                <td class="td-to-th">蓄电池柜</td>
                <td><?php echo $station['device']->batteryType;?></td>
                <td class="td-to-th">蓄电池空调</td>
                <td><?php echo $station['device']->batteryAirType;?></td>
              </tr>

              <tr class="td-empty">
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>

              <tr>
                <td class="td-to-th">负载（A）</td>
                <td><?php echo $station['energy']->overload;?></td>
                <td class="td-to-th">能耗类型（A）</td>
                <td><?php echo $station['energy']->energyTypeName;?></td>
                <td class="td-to-th">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td class="td-to-th">SIM卡号</td>
                <td><?php echo $station['energy']->simNum;?></td>
                <td class="td-to-th">ECU编号</td>
                <td><?php echo $station['energy']->ecuNum;?></td>
                <td class="td-to-th">ECU扩展编号</td>
                <td><?php echo $station['energy']->esgNum;?></td>
              </tr>


            </tbody>
          </table>

        </div>
        </div>

      </div>

    </div>

  </div>
</body>
</html>
