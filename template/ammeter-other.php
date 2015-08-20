<!DOCTYPE html>
<html>
 <?php include ('include/head_script.php')?>
<body>
  <div class="n-layout">
    <?php include ('include/header.php')?>
    <div class="n-container">

      <div class="n-nav-left">
        <ul>
          <li><a href="/ammeter"><span class="glyphicon glyphicon-cloud" aria-hidden="true"></span><span class="vl-m">录入电表 - 杉实环境</span></a></li>
          <li><a href="/ammeterList"><span class="glyphicon glyphicon-cloud" aria-hidden="true"></span><span class="vl-m">查看电表 - 杉实环境</span></a></li>      
          <li><a href="/ammeter-bak"><span class="glyphicon glyphicon-cloud" aria-hidden="true"></span><span class="vl-m">录入备用电表 - 杉实环境</span></a></li>
          <li><a href="/ammeterList-bak"><span class="glyphicon glyphicon-cloud" aria-hidden="true"></span><span class="vl-m">查看备用电表 - 杉实环境</span></a></li>
          <li class="current"><a href="/ammeter-other"><span class="glyphicon glyphicon-grain" aria-hidden="true"></span><span class="vl-m">录入电表 -用能公司</a></li>
          <li><a href="/ammeterList-other"><span class="glyphicon glyphicon-grain" aria-hidden="true"></span><span class="vl-m">查看电表 - 用能公司</a></li>

        </ul>
      </div>

      <div class="n-right-content">
        <h4 class="tab-to-title">录入电表 -用能公司</h4>
        <div class="n-check-area">

          <div class="input-group-item clearfix">
            <span class="name">基站名称：</span>
            <input type="text" class="form-control" required autofocus id="stationName" />
          </div>
          <div class="input-group-item clearfix">
            <span class="name">基站电表采集时间：</span>
            <input type="text" class="form-control form_datetime" value="" required  id="readTime" />
          </div>
          <div class="input-group-item tl-r">
            <button type="button" class="btn btn-default" id="show">确定</button>
          </div>
          <hr/>
          <div style="display:none" id="biao">
          <div class="input-group-item clearfix">
            <span class="name">我方电表采集值：</span>
            <span class="name" id="owndu"></span>
          </div>
          <div class="input-group-item clearfix">
            <span class="name">基站电表采集值：</span>
            <input type="text" class="form-control" required value="" id="du"/>
          </div>
          <div class="input-group-item tl-r">
              <input type="hidden" id="own" /><input type="hidden" id="stationId" />
            <button type="button" class="btn btn-default" id="create">确定</button>
          </div>
          </div>
        </div>

        <p class="table-title"><b>电表记录</b></p>
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>基站名称</th>
              <th>采集时间</th>
              <th>录入值</th>
              <th>电表值</th>  
              <th>最新E值</th>
              <th>录入人</th>
              <th>录入时间</th>             
              <th>操作</th>
            </tr>
          </thead>
          <tbody id="content">
        

          </tbody>
        </table>

      </div>

    </div>

  </div>
</body>
<script type="text/javascript" src="/static/src/js/datepicker/bootstrap-datetimepicker.js"></script>

<script type="text/javascript">
$(function () {
    $(".form_datetime").datetimepicker({
      format: 'yyyy-mm-dd h:i',
      language: 'cn',
      autoclose:true 
      
    });
        //显示所有项目名称
    	$get('/ammeter/otherList',{
                r:new Date().getTime(),
            	start:0,
		end:15
	},function(d){
          
	   var data = d.data;
	   var html = '';
		for (var i=0;i<data.length;i++){
			var _d = data[i];
			html += '<tr>\
					  <td>'+_d.stationName+'</td>\
					  <td>'+_d.readTime+'</td>\<td>'+_d.ammeterNormalChinamobile+'</td>\
					  <td>'+_d.ammeterNormal+'</td>\<td>'+_d.e+'</td>\
					  <td>'+_d.operater+'</td>\
					  <td>'+_d.createTime+'</td>\
					<td><button type=button class=\"btn btn-default\" onclick=del('+_d.ammeterId+')>删除</button></td></tr>';
		}
            $('#content').html(html);
     });  
	  

});
$('#show').click(function(){
	if($('#stationName').val()==""){
		alert('基站名称为空');
		//$('#jzmsg').html('请输入基站名称');
		return;
	}
	if($('#readTime').val()==""){
		alert('采集时间为空');
		//$('#rtmsg').html('请输入采集时间');
		return;
	}
	$.post('/ammeter/otherShow',{
	  stationName:$('#stationName').val(),
          readTime:$('#readTime').val(),        
	},function(d){
		if(d.code == 0){
                    $('#biao').show();
                    $('#owndu').html(d.data.ammeterNormal);
                    $('#own').val(d.data.ammeterNormal);
                    $('#stationId').val(d.data.stationId);
                    $('#du').val(d.data.ammeterNormal);
		}else{
                    alert('基站名称有误');
                }
	},'json');
});
$('#create').click(function(){
	$.post('/ammeter/otherAdd',{
	  stationId:$('#stationId').val(),
          readTime:$('#readTime').val(),
          own:$('#own').val(), 
          du:$('#du').val()
	},function(d){
		if(d.code == 0){
                    alert('抄表成功');
                    location.reload();
		}else{
                    alert('有误');
                }
	},'json');
});
function del(id){
    	$.post('/ammeter/ammeterdel',{
          flag:1,
	  ammeterId:id,
	},function(d){
		if(d.code == 0){
                    alert('删除成功');
                    location.reload();
		}else{
                    alert('基站名称有误');
                }
	},'json');
    
}
</script>
</html>
