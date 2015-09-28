<!DOCTYPE html>
<html>
 <?php include ('include/head_script.php')?>
<body>
  <div class="n-layout">
    <?php include ('include/header.php')?>

    <div class="n-container">
      <div class="n-nav-left">
        <ul>
          <li class="current"><a href="/base"><span class="glyphicon glyphicon-cloud" aria-hidden="true"></span><span class="vl-m">基站列表</span></a></li>
		  <li><a href="/base/map"><span class="glyphicon glyphicon-cloud" aria-hidden="true"></span><span class="vl-m">基站地图</span></a></li>
        </ul>
      </div>
      <div class="n-right-content">

      <h4 class="tab-to-title"><a href="/base/create" class="btn btn-primary">创建基站</a></h4>
  	  <div class="alert alert-success" role="alert" id="loading_tip">
  		  <strong></strong> 数据正在加载...
  	  </div>
      <div style="padding-bottom:10px;">
          <div class="n-check-item">
            <span class="name">项目</span>
            <select id="station_project"><option>--查询条件--</option></select>
          </div>
          <div class="n-check-item">
            <span class="name">省</span>
            <select id="province"><option value="0">--查询条件--</option></select>
          </div>
          <div class="n-check-item">
            <span class="name">城市</span>
            <select id="city"><option value="0">--查询条件--</option></select>
          </div>
          <div class="n-check-item">
            <span class="name">县区</span>
            <select id="district"><option value="0">--查询条件--</option></select>
          </div>
          <br/>
          <div class="n-check-item">
            <span class="name">站型</span>
            <select id="station_type"><option value="0">--查询条件--</option>
            <option value="1">基准站</option>
            <option value="2">节能站</option>
             <option value="3">预备站</option>
            </select>
          </div>
          <div class="n-check-item">
            <span class="name">负载</span>
            <select id="overload">
              <option value="0">--查询条件--</option>
              <option value="1">10-20A</option>
              <option value="2">20-30A</option>
              <option value="3">30-40A</option>
              <option value="4">40-50A</option>
              <option value="5">50-60A</option>
			  <option value="6">60-70A</option>
              <option value="7">70A+</option>
             </select>
          </div>
    		  <div class="n-check-item">
                <span class="name">建筑类型</span>
                <select id="building_type"><option value="-1">--查询条件--</option>
                 <option value="1">板房</option>
    			       <option value="2">砖墙</option>
                </select>
          </div>
          <button type="button" class="btn btn-default" id="query_button">确定</button>
      </div>
		  <table class="table table-bordered table-striped" role="grid">
          <thead>
            <tr>
              <th>站点编号</th>
              <th>站点名称</th>
              <th>城市</th>
              <th>区域</th>
              <th>负载功率</th>
              <th>砖墙/板房</th>
              <th>基准站</th>
			  <th>状态</th>
			  <th>操作</th>
            </tr>
          </thead>
          <tbody id="container">

          </tbody>
        </table>
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
var selProvince = $('#province');
var selCity = $('#city');
var selDistirct = $('#district');


$get('/address/province',{},function(d){
	var data = d.data;
	var html = '<option value="0">--查询条件--</option>';
	for (var i=0;i<data.length;i++){
		html += '<option value="'+data[i].code+'">'+data[i].name+'</option>';
	}
	selProvince.html(html);
});

$get('/project/list',{
	},function(d){
	   var data = d.data;
	   var html = '<option value="0">--查询条件--</option>';
	   for(var i=0;i<data.length;i++){
	      html += '<option value="'+data[i].id+'">'+data[i].projectName+'</option>';
	   }
	   $('#station_project').html(html);
});

selProvince.change(function(){
	$get('/address/city',{
		province:$(this).val()
	},function(d){
		var data = d.data;
		var html = '<option value="0">--查询条件--</option>';
		for (var i=0;i<data.length;i++){
			html += '<option value="'+data[i].code+'">'+data[i].name+'</option>';
		}
		selCity.html(html);
	});
});

selCity.change(function(){
	$get('/address/district',{
		province:selProvince.val(),
		city:$(this).val()
	},function(d){
		var data = d.data;
		var html = '<option value="0">--查询条件--</option>';
		for (var i=0;i<data.length;i++){
			html += '<option value="'+data[i].code+'">'+data[i].name+'</option>';
		}
		selDistirct.html(html);
	});
});

var params = location.href.split('?')[1];
if(params){
   var building_type = params.split('building=')[1];
   building_type = building_type.split('&')[0];

   var energy_type = params.split('energy=')[1];
   energy_type = energy_type.split('&')[0];
}

var start = 0;
var pageSize = 20;
//查询暂时没有分页
var pageQuery = 200;
var renderOnePage = function(data){
		var html = '';
		for (var i=0;i<data.length;i++){
			var _d = data[i];
			html += '<tr id="station_item_'+_d.stationId+'">\
					  <td class="sorting_1"><a href="/base/status/'+_d.stationId+'">'+_d.stationSeriseCode+'</a></td>\
					  <td>'+_d.stationName+'</td>\
					  <td>'+_d.cityName+'</td>\
					  <td>'+_d.distirctName+'</td>\
					  <td>'+_d.energyTypeName+'</td>\
					  <td>'+_d.buildTypeName+'</td>\
					  <td>是</td>\
					  <td>'+(_d.online?'在线':'离线')+'</td>\
					  <td><button class="del_site" data-id="'+_d.stationId+'">删除</button></td>\
					</tr>';
		}
		$('#container').html(html);
		$('#loading_tip').hide();
}

//非搜索的基站列表
var currentPage = 0;
var renderList = function(init){
	$get('/station/list',{
		start:currentPage * pageSize,
		pagesize:pageSize
	},function(d){
			var data = d.data.data;
			if(init){
				total = parseInt(d.data.count);
				totalPage = Math.floor(total/pageSize) + 1;
				var pageHTML = '';
				for(var i=1;i<=totalPage;i++){
					pageHTML +='<li data-index="'+(i-1)+'"><a href="#">'+i+'</a></li>';
				}

				$('#page_container').html(pageHTML);
			}
			renderOnePage(data);
	});
}
$('body').delegate('.del_site','click',function(){
	var id = $(this).data('id');
	if(confirm('确认删除该基站？')){
		$post('/station/delete',{
			id:id
		},function(d){
			if(d.code == 0){
				$('#station_item_' + id ).remove();
				alert('删除成功！');
			}
		});
	}
});
//从首页过来的条件查询
if(energy_type || building_type){
	$('#overload').val(energy_type);
	$('#building_type').val(building_type);
	$('#loading_tip').show();
	$get('/station/query',{
		start:0,
		end:pageQuery,
		building_type:building_type,
		overload:energy_type
	},function(d){
		if(d.data){
			renderOnePage(d.data);
			$('#page_container').hide();
		}
		if(d.data == null){
		   alert('没有检索到数据！');
		}
	});
}else{
	renderList(true);
}

$('#page_container').delegate('li','click',function(){
		var page = $(this).data('index');
		currentPage = page;
		$('#loading_tip').show();
		renderList();
});

$('#query_button').click(function(){
	var project = $('#station_project').val();
	var province = $('#province').val();
	var city = $('#city').val();
	var district = $('#district').val();
	var project = $('#station_project').val();
	var station_type = $('#station_type').val();
	var building_type = $('#building_type').val();
	var overload = $('#overload').val();
    $('#loading_tip').show();

	$get('/station/query',{
		start:0,
		end:pageQuery,
		project:project,
		province:province,
		city:city,
		district:district,
		station_type:station_type,
		building_type:building_type,
		overload:overload
	},function(d){
		if(d.data){
			renderOnePage(d.data);
			$('#page_container').hide();
		}
		if(d.data == null){
		   alert('没有检索到数据！');
		}
	});
});
  </script>
</body>
</html>
