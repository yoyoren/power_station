<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
  <title>故障列表--全屏显示</title>
  <link rel="stylesheet" type="text/css" href="/static/src/css/base.css">
  <link rel="stylesheet" type="text/css" href="/static/src/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="/static/src/css/main.css">
  <script type="text/javascript" src="/static/src/js/portfolio/js/jquery.js"></script>
  <script type="text/javascript" src="/static/src/js/portfolio/js/jQuery.easing.min.js"></script>
  <script type="text/javascript" src="/static/src/js/portfolio/js/jquery.quicksand.min.js"></script>
  <script type="text/javascript" src="/static/src/js/portfolio/js/jquery.sortportfolio.min.js"></script>
  <link href="/static/src/js/portfolio/css/animate.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" charset="utf-8">
        $(document).ready(function () {
            var _filterPortfolio = $('#portfolio').filterPortfolio({
                initFilter: '#visit',
                itemUL: '#itemUL',
                orderbyButtons: [
                  { 'link': '#visit', 'dom': '.name'},
                  { 'link': '#name', 'dom': '.style' },
                  { 'link': '#date', 'dom': '.date', 'isNumber': true }
                ],
                orderReverse: true,
                sortOption: {
                    adjustHeight: 'auto',
                    easeIn: 'fadeIn',
                    easeOut: 'fadeOut'
                }
            });

        });

    </script>
<style type="text/css">
  body{background: #f5f5f5;}
  .panel-con{padding: 10px 20px; overflow: hidden;}
  .panel.panel-success .panel-heading {
    background-color: #8dc63f;
    color: #ffffff;
  }
  .panel.panel-warning .panel-heading {
    background-color: #ffba00;
    color: #ffffff;
  }
  .panel.panel-info .panel-heading {
    background-color: #40bbea;
    color: #ffffff;
  }
  .panel.panel-purple .panel-heading {
    background-color: #7c38bc;
    color: #ffffff;
  }
  .panel.panel-red .panel-heading {
    background-color: #d5080f;
    color: #ffffff;
  }
  .panel{display: inline-block; width: 280px; margin: 10px;
  border-radius: 0; box-shadow: none; border: 0 none; float: left; height: 140px;}
  .panel .panel-heading{border-radius: 0; border: 0 none;}

  .test{display: inline-block; width: 100px; height: 100px; border: 1px solid #eee;}
  .itemUL{width: 1200px; margin: 0 auto;}
  .itemUL li{text-align: left;}
 .bar{overflow: hidden;}
  .bar li a{display: inline-block; background: #ddd; color: #333; padding: 10px; float: left; margin-right: 20px;}
</style>
</head>
<body>
<div id="portfolio">
<ul class="bar" style="display:none">
    <li class=""><a href="#" id="visit">排一下</a></li>
    <li class=""><a href="#" id="name">排一下</a></li>
    <li class="current"><a href="#" id="date">排一下</a></li>
</ul>
<div style="clear:both">
   <ul id="itemUL" class="itemUL"></ul>
</div>
<script>
var WARNING_MSG = {
		'1':'断站',
		'2':'室内高温',
		'3':'恒温柜高温',
		'4':'电表故障',
		'5':'功率异常',
		'6':'远程关站',
		'7':'代理维护按钮',
		'8':'空调故障',
		'9':'温度感应故障'
  };
  function getNowFormatDate(day) { 
	day = new Date(day);
	var Year = 0; 
	var Month = 0; 
	var Day = 0; 
	var CurrentDate = ""; 

	Year= day.getFullYear();
	Month= day.getMonth()+1; 
	Day = day.getDate(); 
	CurrentDate += Year + "-"; 
	if (Month >= 10 ) 
	{ 
	CurrentDate += Month + "-"; 
	} 
	else 
	{ 
	CurrentDate += "0" + Month + "-"; 
	} 
	if (Day >= 10 ) 
	{ 
	CurrentDate += Day ; 
	} 
	else 
	{ 
	CurrentDate += "0" + Day ; 
	} 
	var minute = day.getMinutes();
	if(minute<10){
		minute = '0' + minute;
	}
	CurrentDate+= ' ' + day.getHours() + ':' + minute;
	return CurrentDate; 
}
window.data = <?php echo json_encode($data);?>;
window.data = window.data.data;
var html = '';
var color = ['success','red','warning','purple','info'];
for(var i=0;i<16;i++){
	var _d = data[i];
	var index = Math.round(Math.random()*color.length);
	if(index >= color.length){
		index = 0;
	}
	_color = color[index];
	html += '<li data-id="id-'+i+'" class="panel panel-color panel-'+_color+'">\
				<div class="panel-heading">\
				  <h3 class="panel-title">'+_d.stationName+'</h3>\
				</div>\
				<div class="panel-body">\
				  <p>\
					故障开始时间：'+getNowFormatDate(_d.createTime*1000)+'<br/>\
					告警类型：'+WARNING_MSG[_d.warningType]+'<br/>\
					参数值：'+_d.warningDesc+'\
				  </p>\
				</div>\
			  </li>';
}

$('#itemUL').html(html);

setInterval(function(){
	$('#visit').trigger('click');
},300000);
</script>

</div>
</body>
</html>
