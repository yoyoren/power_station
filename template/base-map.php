<!DOCTYPE html>
<html>
 <?php include ('include/head_script.php')?>
<body>
  <div class="n-layout">
    <?php include ('include/header.php')?>

    <div class="n-container">
      <div class="n-nav-left">
        <ul>
          <li><a href="/base"><span class="glyphicon glyphicon-cloud" aria-hidden="true"></span><span class="vl-m">基站列表</span></a></li>
		  <li class="current"><a href="/base/map"><span class="glyphicon glyphicon-cloud" aria-hidden="true"></span><span class="vl-m">基站地图</span></a></li>
        </ul>
      </div>
      <div class="n-right-content">
		  <div class="alert alert-success" role="alert" id="loading_tip" style="display:none">
			  <strong></strong> 数据正在加载...
		  </div>
		  <div style="padding-bottom:10px;">
			  <div class="n-check-item">
				<span class="name">项目</span>
				<select id="station_project"><option>--查询条件--</option></select>
			  </div>
			  <button type="button" class="btn btn-default" id="query_button">确定</button>
		  </div>
		  <script type="text/javascript" src="http://api.map.baidu.com/api?v=1.4"></script>
		  <div id="map_container" style="width:100%;height:500px;">
		  
		  </div>
		  <script>
		 
		  </script>
	  </div>

      </div>
      <div class="n-right-content">
        <div class="tl-r">
          <ul class="pagination" id="page_container">

          </ul>
        </div>
      </div>
    </div>
  </div>
  <script>
	 window.map = new BMap.Map("map_container");
	 window.setCurrentCity = function(d){
		map.centerAndZoom(new BMap.Point(d.x, d.y), 11);
		map.setCurrentCity(d.name);
		$('#current_city_display').html(d.name);
		window.currentCityName = d.name;
	}
	setCurrentCity({
		name:'上海市',
		id:'1',
		x:121.478,
		y:31.225
		});
	map.enableScrollWheelZoom(true);
	var currentPage = 0;	
	var pageSize = 20;
	var renderMap = function(init){
		$get('/station/list',{
			start:currentPage * pageSize,
			pagesize:pageSize
		},function(d){
				var data = d.data.data;
				for(var i=0;i<data.length;i++){
					var d = data[i];
					var _p = new BMap.Point(parseFloat(d.stationLat), parseFloat(d.stationLng));
					var marker = new BMap.Marker(_p);
					map.addOverlay(marker);
				}				
		});
	}
	renderMap();
  </script>
</body>
</html>
