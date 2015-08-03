<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
  <title>故障列表--全屏显示</title>
  <link rel="stylesheet" type="text/css" href="/static/src/css/base.css">
  <link rel="stylesheet" type="text/css" href="/static/src/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="/static/src/css/main.css">
  <script type="text/javascript" src="/static/src/js/portfolio/js/jquery.js"></script>
  <script type="text/javascript" src="/static/src/js/portfolio/js/jquery.easing.min.js"></script>
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
<ul class="bar">
    <li class="current"><a href="#" id="visit">排一下</a></li>
    <li><a href="#" id="name">排一下</a></li>
    <li><a href="#" id="date">排一下</a></li>
</ul>
<div style="clear:both">
   <ul id="itemUL" class="itemUL">
      <li data-id="id-1" class="book panel panel-color panel-success">
          <div class="panel-heading">
            <h3 class="panel-title name">北京站</h3>
          </div>

          <div class="panel-body">

            <p>
              故障开始时间：<span class="date">2015-07-26 12:34:00 </span><br/>
              告警类型：<span class="style">断站</span><br/>
              参数值：5分钟无数据发送
            </p>

          </div>
      </li>
      <li data-id="id-2" class="book panel panel-color panel-warning">
          <div class="panel-heading">
            <h3 class="panel-title name">河南站</h3>
          </div>

          <div class="panel-body">

            <p>
              故障开始时间：<span class="date">2015-07-24 12:34:00 </span><br/>
              告警类型：<span class="style">室内高温</span><br/>
              参数值：5分钟无数据发送
            </p>

          </div>
      </li>
      <li data-id="id-3" class="book panel panel-color panel-info">
          <div class="panel-heading">
            <h3 class="panel-title name">温州站</h3>
          </div>

          <div class="panel-body">

            <p>
              故障开始时间：<span class="date">2015-06-26 12:34:00 </span><br/>
              告警类型：<span class="style">恒温柜高温</span><br/>
              参数值：5分钟无数据发送
            </p>

          </div>
      </li>

      <li data-id="id-4" class="panel panel-color panel-purple">
        <div class="panel-heading">
          <h3 class="panel-title">河东站</h3>
        </div>

        <div class="panel-body">

          <p>
            故障开始时间：2015-07-26 12:34:00<br/>
            告警类型：断站<br/>
            参数值：5分钟无数据发送
          </p>

        </div>
      </li>

      <li  data-id="id-5" class="panel panel-color panel-red">
        <div class="panel-heading">
          <h3 class="panel-title">河东站</h3>
        </div>

        <div class="panel-body">

          <p>
            故障开始时间：2015-07-26 12:34:00<br/>
            告警类型：断站<br/>
            参数值：5分钟无数据发送
          </p>

        </div>
      </li>

      <li data-id="id-6" class="book panel panel-color panel-success">
          <div class="panel-heading">
            <h3 class="panel-title name">北京站</h3>
          </div>

          <div class="panel-body">

            <p>
              故障开始时间：<span class="date">2015-07-26 12:34:00 </span><br/>
              告警类型：<span class="style">断站</span><br/>
              参数值：5分钟无数据发送
            </p>

          </div>
      </li>
      <li data-id="id-7" class="book panel panel-color panel-warning">
          <div class="panel-heading">
            <h3 class="panel-title name">河南站</h3>
          </div>

          <div class="panel-body">

            <p>
              故障开始时间：<span class="date">2015-07-24 12:34:00 </span><br/>
              告警类型：<span class="style">室内高温</span><br/>
              参数值：5分钟无数据发送
            </p>

          </div>
      </li>
      <li data-id="id-8" class="book panel panel-color panel-info">
          <div class="panel-heading">
            <h3 class="panel-title name">温州站</h3>
          </div>

          <div class="panel-body">

            <p>
              故障开始时间：<span class="date">2015-06-26 12:34:00 </span><br/>
              告警类型：<span class="style">恒温柜高温</span><br/>
              参数值：5分钟无数据发送
            </p>

          </div>
      </li>

      <li data-id="id-9" class="panel panel-color panel-purple">
        <div class="panel-heading">
          <h3 class="panel-title">河东站</h3>
        </div>

        <div class="panel-body">

          <p>
            故障开始时间：2015-07-26 12:34:00<br/>
            告警类型：断站<br/>
            参数值：5分钟无数据发送
          </p>

        </div>
      </li>

      <li  data-id="id-10" class="panel panel-color panel-red">
        <div class="panel-heading">
          <h3 class="panel-title">河东站</h3>
        </div>

        <div class="panel-body">

          <p>
            故障开始时间：2015-07-26 12:34:00<br/>
            告警类型：断站<br/>
            参数值：5分钟无数据发送
          </p>

        </div>
      </li>

      <li  data-id="id-11" class="panel panel-color panel-purple">
        <div class="panel-heading">
          <h3 class="panel-title">河东站</h3>
        </div>

        <div class="panel-body">

          <p>
            故障开始时间：2015-07-26 12:34:00<br/>
            告警类型：断站<br/>
            参数值：5分钟无数据发送
          </p>

        </div>
      </li>

      <li data-id="id-12" class="panel panel-color panel-red">
        <div class="panel-heading">
          <h3 class="panel-title">河东站</h3>
        </div>

        <div class="panel-body">
          <p>
            故障开始时间：2015-07-26 12:34:00<br/>
            告警类型：断站<br/>
            参数值：5分钟无数据发送
          </p>
        </div>
      </li>

    </ul>
</div>


</div>
</body>
</html>
