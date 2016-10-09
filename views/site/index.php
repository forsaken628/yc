<?php

/* @var $this yii\web\View */

$this->title = '我的主页';

?>
<img src="/images/ER.png">
<script type="text/tpl">

<div class="row">
    <div class="col-md-6">
        <!--statistics start-->
        <div class="row state-overview">
            <div class="col-md-6 col-xs-12 col-sm-6">
                <div class="panel purple">
                    <div class="symbol">
                        <i class="fa fa-gavel"></i>
                    </div>
                    <div class="state-value">
                        <div class="value">230</div>
                        <div class="title">New Order</div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xs-12 col-sm-6">
                <div class="panel red">
                    <div class="symbol">
                        <i class="fa fa-tags"></i>
                    </div>
                    <div class="state-value">
                        <div class="value">3490</div>
                        <div class="title">Copy Sold</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row state-overview">
            <div class="col-md-6 col-xs-12 col-sm-6">
                <div class="panel blue">
                    <div class="symbol">
                        <i class="fa fa-money"></i>
                    </div>
                    <div class="state-value">
                        <div class="value">22014</div>
                        <div class="title"> Total Revenue</div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xs-12 col-sm-6">
                <div class="panel green">
                    <div class="symbol">
                        <i class="fa fa-eye"></i>
                    </div>
                    <div class="state-value">
                        <div class="value">390</div>
                        <div class="title"> Unique Visitors</div>
                    </div>
                </div>
            </div>
        </div>
        <!--statistics end-->
    </div>
    <div class="col-md-6">
        <!--more statistics box start-->
        <div class="panel deep-purple-box">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-7 col-sm-7 col-xs-7">
                        <div id="graph-donut" class="revenue-graph">
                            <svg style="overflow: hidden; position: relative; top: -0.5px;"
                                 xmlns="http://www.w3.org/2000/svg" width="443" version="1.1" height="220">
                                <desc>Created with Raphaël 2.1.2</desc>
                                <defs></defs>
                                <path opacity="1" stroke-width="2"
                                      d="M221.5,176.66666666666669A66.66666666666667,66.66666666666667,0,0,0,263.07879551323236,57.88811835950217"
                                      stroke="#4acacb" fill="none" style="opacity: 1;"></path>
                                <path stroke-width="3"
                                      d="M221.5,179.66666666666669A69.66666666666667,69.66666666666667,0,0,0,264.9498413113278,55.54308368567977L283.8681932698485,31.832177539253266A100,100,0,0,1,221.5,210Z"
                                      stroke="none" fill="#4acacb" style=""></path>
                                <path opacity="0" stroke-width="2"
                                      d="M263.07879551323236,57.88811835950217A66.66666666666667,66.66666666666667,0,0,0,159.45101113025743,85.6203481426209"
                                      stroke="#6a8bc0" fill="none" style="opacity: 0;"></path>
                                <path stroke-width="3"
                                      d="M264.9498413113278,55.54308368567977A69.66666666666667,69.66666666666667,0,0,0,156.65880663111903,84.52326380903884L133.08019086061685,75.25899610323478A95,95,0,0,1,280.7497836063561,35.7405686622906Z"
                                      stroke="none" fill="#6a8bc0" style=""></path>
                                <path opacity="0" stroke-width="2"
                                      d="M159.45101113025743,85.6203481426209A66.66666666666667,66.66666666666667,0,0,0,179.91301928453285,162.10534981569367"
                                      stroke="#5ab6df" fill="none" style="opacity: 0;"></path>
                                <path stroke-width="3"
                                      d="M156.65880663111903,84.52326380903884A69.66666666666667,69.66666666666667,0,0,0,178.0416051523368,164.45009055739988L162.2385524804593,184.25012348736345A95,95,0,0,1,133.08019086061685,75.25899610323478Z"
                                      stroke="none" fill="#5ab6df" style=""></path>
                                <path opacity="0" stroke-width="2"
                                      d="M179.91301928453285,162.10534981569367A66.66666666666667,66.66666666666667,0,0,0,221.47905604932066,176.66666337679857"
                                      stroke="#fe8676" fill="none" style="opacity: 0;"></path>
                                <path stroke-width="3"
                                      d="M178.0416051523368,164.45009055739988A69.66666666666667,69.66666666666667,0,0,0,221.4781135715401,179.6666632287545L221.47015487028193,204.99999531193794A95,95,0,0,1,162.2385524804593,184.25012348736345Z"
                                      stroke="none" fill="#fe8676" style=""></path>
                                <text stroke-width="0.6916666666666665"
                                      transform="matrix(1.4458,0,0,1.4458,-98.9639,-48.5904)" font-weight="800"
                                      font-size="15px" fill="#ffffff" stroke="none" font="10px &quot;Arial&quot;"
                                      text-anchor="middle" y="100" x="221.5"
                                      style="text-anchor: middle; font: 800 15px &quot;Arial&quot;;">
                                    <tspan dy="5">New Visit</tspan>
                                </text>
                                <text stroke-width="0.7199999999999999"
                                      transform="matrix(1.3889,0,0,1.3889,-86.3333,-43.5556)" font-size="14px"
                                      fill="#ffffff" stroke="none" font="10px &quot;Arial&quot;"
                                      text-anchor="middle" y="120" x="221.5"
                                      style="text-anchor: middle; font: 14px &quot;Arial&quot;;">
                                    <tspan dy="5">at least 70%</tspan>
                                </text>
                            </svg>
                        </div>

                    </div>
                    <div class="col-md-5 col-sm-5 col-xs-5">
                        <ul class="bar-legend">
                            <li><span class="blue"></span> Open rate</li>
                            <li><span class="green"></span> Click rate</li>
                            <li><span class="purple"></span> Share rate</li>
                            <li><span class="red"></span> Unsubscribed rate</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--more statistics box end-->
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="panel">
            <div class="panel-body">
                <div class="row revenue-states">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <h4>Monthly revenue report</h4>
                        <div class="icheck">
                            <div class="square-red single-row">
                                <div class="checkbox ">
                                    <div style="position: relative;" class="icheckbox_square-red checked"><input
                                            style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"
                                            checked="" type="checkbox">
                                        <ins
                                            style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"
                                            class="iCheck-helper"></ins>
                                    </div>
                                    <label>Online</label>
                                </div>
                            </div>
                            <div class="square-blue single-row">
                                <div class="checkbox ">
                                    <div style="position: relative;" class="icheckbox_square-blue"><input
                                            style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"
                                            type="checkbox">
                                        <ins
                                            style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"
                                            class="iCheck-helper"></ins>
                                    </div>
                                    <label>Offline </label>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <ul class="revenue-nav">
                            <li><a href="#">weekly</a></li>
                            <li><a href="#">monthly</a></li>
                            <li class="active"><a href="#">yearly</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="clearfix">
                            <div id="main-chart-legend" class="pull-right">
                                <table style="font-size:smaller;color:#545454">
                                    <tbody>
                                    <tr>
                                        <td class="legendColorBox">
                                            <div style="border:1px solid #000000;padding:1px">
                                                <div
                                                    style="width:4px;height:0;border:5px solid rgb(90,188,223);overflow:hidden"></div>
                                            </div>
                                        </td>
                                        <td class="legendLabel">New Visitors</td>
                                        <td class="legendColorBox">
                                            <div style="border:1px solid #000000;padding:1px">
                                                <div
                                                    style="width:4px;height:0;border:5px solid rgb(255,134,115);overflow:hidden"></div>
                                            </div>
                                        </td>
                                        <td class="legendLabel">Unique Visitors</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div id="main-chart">
                            <div style="padding: 0px; position: relative;" id="main-chart-container"
                                 class="main-chart">
                                <canvas height="300" width="1060"
                                        style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 1060px; height: 300px;"
                                        class="flot-base"></canvas>
                                <div
                                    style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);"
                                    class="flot-text">
                                    <div
                                        style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"
                                        class="flot-x-axis flot-x1-axis xAxis x1Axis">
                                        <div class="flot-tick-label tickLabel"
                                             style="position: absolute; max-width: 96px; top: 279px; left: 22px; text-align: center;">
                                            0
                                        </div>
                                        <div class="flot-tick-label tickLabel"
                                             style="position: absolute; max-width: 96px; top: 279px; left: 125px; text-align: center;">
                                            1
                                        </div>
                                        <div class="flot-tick-label tickLabel"
                                             style="position: absolute; max-width: 96px; top: 279px; left: 227px; text-align: center;">
                                            2
                                        </div>
                                        <div class="flot-tick-label tickLabel"
                                             style="position: absolute; max-width: 96px; top: 279px; left: 330px; text-align: center;">
                                            3
                                        </div>
                                        <div class="flot-tick-label tickLabel"
                                             style="position: absolute; max-width: 96px; top: 279px; left: 433px; text-align: center;">
                                            4
                                        </div>
                                        <div class="flot-tick-label tickLabel"
                                             style="position: absolute; max-width: 96px; top: 279px; left: 536px; text-align: center;">
                                            5
                                        </div>
                                        <div class="flot-tick-label tickLabel"
                                             style="position: absolute; max-width: 96px; top: 279px; left: 638px; text-align: center;">
                                            6
                                        </div>
                                        <div class="flot-tick-label tickLabel"
                                             style="position: absolute; max-width: 96px; top: 279px; left: 741px; text-align: center;">
                                            7
                                        </div>
                                        <div class="flot-tick-label tickLabel"
                                             style="position: absolute; max-width: 96px; top: 279px; left: 844px; text-align: center;">
                                            8
                                        </div>
                                        <div class="flot-tick-label tickLabel"
                                             style="position: absolute; max-width: 96px; top: 279px; left: 946px; text-align: center;">
                                            9
                                        </div>
                                        <div class="flot-tick-label tickLabel"
                                             style="position: absolute; max-width: 96px; top: 279px; left: 1046px; text-align: center;">
                                            10
                                        </div>
                                    </div>
                                    <div
                                        style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"
                                        class="flot-y-axis flot-y1-axis yAxis y1Axis">
                                        <div class="flot-tick-label tickLabel"
                                             style="position: absolute; top: 264px; left: 14px; text-align: right;">
                                            0
                                        </div>
                                        <div class="flot-tick-label tickLabel"
                                             style="position: absolute; top: 231px; left: 1px; text-align: right;">
                                            100
                                        </div>
                                        <div class="flot-tick-label tickLabel"
                                             style="position: absolute; top: 198px; left: 1px; text-align: right;">
                                            200
                                        </div>
                                        <div class="flot-tick-label tickLabel"
                                             style="position: absolute; top: 165px; left: 1px; text-align: right;">
                                            300
                                        </div>
                                        <div class="flot-tick-label tickLabel"
                                             style="position: absolute; top: 132px; left: 1px; text-align: right;">
                                            400
                                        </div>
                                        <div class="flot-tick-label tickLabel"
                                             style="position: absolute; top: 99px; left: 1px; text-align: right;">
                                            500
                                        </div>
                                        <div class="flot-tick-label tickLabel"
                                             style="position: absolute; top: 66px; left: 1px; text-align: right;">
                                            600
                                        </div>
                                        <div class="flot-tick-label tickLabel"
                                             style="position: absolute; top: 33px; left: 1px; text-align: right;">
                                            700
                                        </div>
                                        <div class="flot-tick-label tickLabel"
                                             style="position: absolute; top: 0px; left: 1px; text-align: right;">800
                                        </div>
                                    </div>
                                </div>
                                <canvas height="300" width="1060"
                                        style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 1060px; height: 300px;"
                                        class="flot-overlay"></canvas>
                            </div>
                        </div>
                        <ul class="revenue-short-info">
                            <li>
                                <h1 class="red">15%</h1>
                                <p>Server Load</p>
                            </li>
                            <li>
                                <h1 class="purple">30%</h1>
                                <p>Disk Space</p>
                            </li>
                            <li>
                                <h1 class="green">84%</h1>
                                <p>Transferred</p>
                            </li>
                            <li>
                                <h1 class="blue">28%</h1>
                                <p>Temperature</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel">
            <header class="panel-heading">
                goal progress
                <span class="tools pull-right">
                                <a href="javascript:;" class="fa fa-chevron-down"></a>
                                <a href="javascript:;" class="fa fa-times"></a>
                             </span>
            </header>
            <div class="panel-body">
                <ul class="goal-progress">
                    <li>
                        <div class="prog-avatar">
                            <img src="/images/photos/user1.png" alt="">
                        </div>
                        <div class="details">
                            <div class="title">
                                <a href="#">John Doe</a> - Project Lead
                            </div>
                            <div class="progress progress-xs">
                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20"
                                     aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                                    <span class="">70%</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="prog-avatar">
                            <img src="/images/photos/user2.png" alt="">
                        </div>
                        <div class="details">
                            <div class="title">
                                <a href="#">Cameron Doe</a> - Sales
                            </div>
                            <div class="progress progress-xs">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20"
                                     aria-valuemin="0" aria-valuemax="100" style="width: 91%">
                                    <span class="">91%</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="prog-avatar">
                            <img src="/images/photos/user3.png" alt="">
                        </div>
                        <div class="details">
                            <div class="title">
                                <a href="#">Hoffman Doe</a> - Support
                            </div>
                            <div class="progress progress-xs">
                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="20"
                                     aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                    <span class="">40%</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="prog-avatar">
                            <img src="/images/photos/user4.png" alt="">
                        </div>
                        <div class="details">
                            <div class="title">
                                <a href="#">Jane Doe</a> - Marketing
                            </div>
                            <div class="progress progress-xs">
                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="20"
                                     aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                    <span class="">20%</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="prog-avatar">
                            <img src="/images/photos/user5.png" alt="">
                        </div>
                        <div class="details">
                            <div class="title">
                                <a href="#">Hoffman Doe</a> - Support
                            </div>
                            <div class="progress progress-xs">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20"
                                     aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                                    <span class="">45%</span>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="text-center"><a href="#">View all Goals</a></div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="panel">
            <div class="panel-body extra-pad">
                <h4 class="pros-title">prospective <span>leads</span></h4>
                <div class="row">
                    <div class="col-sm-4 col-xs-4">
                        <div id="p-lead-1">
                            <canvas height="35" width="68"
                                    style="display: inline-block; width: 68px; height: 35px; vertical-align: top;"></canvas>
                        </div>
                        <p class="p-chart-title">Laptop</p>
                    </div>
                    <div class="col-sm-4 col-xs-4">
                        <div id="p-lead-2">
                            <canvas height="35" width="68"
                                    style="display: inline-block; width: 68px; height: 35px; vertical-align: top;"></canvas>
                        </div>
                        <p class="p-chart-title">iPhone</p>
                    </div>
                    <div class="col-sm-4 col-xs-4">
                        <div id="p-lead-3">
                            <canvas height="35" width="68"
                                    style="display: inline-block; width: 68px; height: 35px; vertical-align: top;"></canvas>
                        </div>
                        <p class="p-chart-title">iPad</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel">
            <div class="panel-body extra-pad">
                <div class="col-sm-6 col-xs-6">
                    <div class="v-title">Visits</div>
                    <div class="v-value">10,090</div>
                    <div id="visit-1">
                        <canvas height="25" width="100"
                                style="display: inline-block; width: 100px; height: 25px; vertical-align: top;"></canvas>
                    </div>
                    <div class="v-info">Pages/Visit</div>
                </div>
                <div class="col-sm-6 col-xs-6">
                    <div class="v-title">Unique Visitors</div>
                    <div class="v-value">8,173</div>
                    <div id="visit-2">
                        <canvas height="25" width="100"
                                style="display: inline-block; width: 100px; height: 25px; vertical-align: top;"></canvas>
                    </div>
                    <div class="v-info">Avg. Visit Duration</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">

        <div class="panel green-box">
            <div class="panel-body extra-pad">
                <div class="row">
                    <div class="col-sm-6 col-xs-6">
                        <div class="knob">
                                        <span class="chart" data-percent="79">
                                            <span class="percent">79% <span class="sm">New Visit</span></span>
                                        <canvas width="85" height="85"></canvas></span>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xs-6">
                        <div class="knob">
                                        <span class="chart" data-percent="56">
                                            <span class="percent">56% <span class="sm">Bounce rate</span></span>
                                        <canvas width="85" height="85"></canvas></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="panel">
            <div class="panel-body">
                <div class="calendar-block ">
                    <div class="cal1">
                        <div class="clndr">
                            <div class="clndr-controls">
                                <div class="clndr-control-button"><span class="clndr-previous-button"><i
                                            class="fa fa-chevron-left"></i></span></div>
                                <div class="month"><span>August</span> 2016</div>
                                <div class="clndr-control-button leftalign"><span class="clndr-next-button"><i
                                            class="fa fa-chevron-right"></i></span></div>
                            </div>
                            <table class="clndr-table" border="0" cellpadding="0" cellspacing="0">
                                <thead>
                                <tr class="header-days">
                                    <td class="header-day">S</td>
                                    <td class="header-day">M</td>
                                    <td class="header-day">T</td>
                                    <td class="header-day">W</td>
                                    <td class="header-day">T</td>
                                    <td class="header-day">F</td>
                                    <td class="header-day">S</td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="day past adjacent-month last-month calendar-day-2016-07-31">
                                        <div class="day-contents">31</div>
                                    </td>
                                    <td class="day past calendar-day-2016-08-01">
                                        <div class="day-contents">1</div>
                                    </td>
                                    <td class="day past calendar-day-2016-08-02">
                                        <div class="day-contents">2</div>
                                    </td>
                                    <td class="day past calendar-day-2016-08-03">
                                        <div class="day-contents">3</div>
                                    </td>
                                    <td class="day past calendar-day-2016-08-04">
                                        <div class="day-contents">4</div>
                                    </td>
                                    <td class="day past calendar-day-2016-08-05">
                                        <div class="day-contents">5</div>
                                    </td>
                                    <td class="day past calendar-day-2016-08-06">
                                        <div class="day-contents">6</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="day past calendar-day-2016-08-07">
                                        <div class="day-contents">7</div>
                                    </td>
                                    <td class="day past calendar-day-2016-08-08">
                                        <div class="day-contents">8</div>
                                    </td>
                                    <td class="day past calendar-day-2016-08-09">
                                        <div class="day-contents">9</div>
                                    </td>
                                    <td class="day past event calendar-day-2016-08-10">
                                        <div class="day-contents">10</div>
                                    </td>
                                    <td class="day past event calendar-day-2016-08-11">
                                        <div class="day-contents">11</div>
                                    </td>
                                    <td class="day past event calendar-day-2016-08-12">
                                        <div class="day-contents">12</div>
                                    </td>
                                    <td class="day past event calendar-day-2016-08-13">
                                        <div class="day-contents">13</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="day past event calendar-day-2016-08-14">
                                        <div class="day-contents">14</div>
                                    </td>
                                    <td class="day past calendar-day-2016-08-15">
                                        <div class="day-contents">15</div>
                                    </td>
                                    <td class="day past calendar-day-2016-08-16">
                                        <div class="day-contents">16</div>
                                    </td>
                                    <td class="day past calendar-day-2016-08-17">
                                        <div class="day-contents">17</div>
                                    </td>
                                    <td class="day past calendar-day-2016-08-18">
                                        <div class="day-contents">18</div>
                                    </td>
                                    <td class="day past calendar-day-2016-08-19">
                                        <div class="day-contents">19</div>
                                    </td>
                                    <td class="day past calendar-day-2016-08-20">
                                        <div class="day-contents">20</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="day past event calendar-day-2016-08-21">
                                        <div class="day-contents">21</div>
                                    </td>
                                    <td class="day past event calendar-day-2016-08-22">
                                        <div class="day-contents">22</div>
                                    </td>
                                    <td class="day past event calendar-day-2016-08-23">
                                        <div class="day-contents">23</div>
                                    </td>
                                    <td class="day past calendar-day-2016-08-24">
                                        <div class="day-contents">24</div>
                                    </td>
                                    <td class="day past calendar-day-2016-08-25">
                                        <div class="day-contents">25</div>
                                    </td>
                                    <td class="day past calendar-day-2016-08-26">
                                        <div class="day-contents">26</div>
                                    </td>
                                    <td class="day past calendar-day-2016-08-27">
                                        <div class="day-contents">27</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="day past calendar-day-2016-08-28">
                                        <div class="day-contents">28</div>
                                    </td>
                                    <td class="day past calendar-day-2016-08-29">
                                        <div class="day-contents">29</div>
                                    </td>
                                    <td class="day past calendar-day-2016-08-30">
                                        <div class="day-contents">30</div>
                                    </td>
                                    <td class="day today calendar-day-2016-08-31">
                                        <div class="day-contents">31</div>
                                    </td>
                                    <td class="day adjacent-month next-month calendar-day-2016-09-01">
                                        <div class="day-contents">1</div>
                                    </td>
                                    <td class="day adjacent-month next-month calendar-day-2016-09-02">
                                        <div class="day-contents">2</div>
                                    </td>
                                    <td class="day adjacent-month next-month calendar-day-2016-09-03">
                                        <div class="day-contents">3</div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel">
            <header class="panel-heading">
                Todo List
                <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
            </header>
            <div class="panel-body">
                <ul class="to-do-list ui-sortable" id="sortable-todo">
                    <li class="clearfix">
                                    <span class="drag-marker">
                                    <i></i>
                                    </span>
                        <div class="todo-check pull-left">
                            <input value="None" id="todo-check" type="checkbox">
                            <label for="todo-check"></label>
                        </div>
                        <p class="todo-title">
                            Dashboard Design &amp; Wiget placement
                        </p>
                        <div class="todo-actionlist pull-right clearfix">

                            <a href="#" class="todo-remove"><i class="fa fa-times"></i></a>
                        </div>
                    </li>
                    <li class="clearfix">
                                    <span class="drag-marker">
                                    <i></i>
                                    </span>
                        <div class="todo-check pull-left">
                            <input value="None" id="todo-check1" type="checkbox">
                            <label for="todo-check1"></label>
                        </div>
                        <p class="todo-title">
                            Wireframe prepare for new design
                        </p>
                        <div class="todo-actionlist pull-right clearfix">

                            <a href="#" class="todo-remove"><i class="fa fa-times"></i></a>
                        </div>
                    </li>
                    <li class="clearfix">
                                    <span class="drag-marker">
                                    <i></i>
                                    </span>
                        <div class="todo-check pull-left">
                            <input value="None" id="todo-check2" type="checkbox">
                            <label for="todo-check2"></label>
                        </div>
                        <p class="todo-title">
                            UI perfection testing for Mega Section
                        </p>
                        <div class="todo-actionlist pull-right clearfix">

                            <a href="#" class="todo-remove"><i class="fa fa-times"></i></a>
                        </div>
                    </li>
                    <li class="clearfix">
                                    <span class="drag-marker">
                                    <i></i>
                                    </span>
                        <div class="todo-check pull-left">
                            <input value="None" id="todo-check3" type="checkbox">
                            <label for="todo-check3"></label>
                        </div>
                        <p class="todo-title">
                            Wiget &amp; Design placement
                        </p>
                        <div class="todo-actionlist pull-right clearfix">

                            <a href="#" class="todo-remove"><i class="fa fa-times"></i></a>
                        </div>
                    </li>
                    <li class="clearfix">
                                    <span class="drag-marker">
                                    <i></i>
                                    </span>
                        <div class="todo-check pull-left">
                            <input value="None" id="todo-check4" type="checkbox">
                            <label for="todo-check4"></label>
                        </div>
                        <p class="todo-title">
                            Development &amp; Wiget placement
                        </p>
                        <div class="todo-actionlist pull-right clearfix">

                            <a href="#" class="todo-remove"><i class="fa fa-times"></i></a>
                        </div>
                    </li>

                </ul>
                <div class="row">
                    <div class="col-md-12">
                        <form role="form" class="form-inline">
                            <div class="form-group todo-entry">
                                <input placeholder="Enter your ToDo List" class="form-control" style="width: 100%"
                                       type="text">
                            </div>
                            <button class="btn btn-primary pull-right" type="submit">+</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel blue-box twt-info">
            <div class="panel-body">
                <h3>19 Februay 2014</h3>

                <p>AdminEx is new model of admin
                    dashboard <a href="#">http://t.co/3laCVziTw4</a>
                    4 days ago by John Doe</p>
            </div>
        </div>
        <div class="panel">
            <div class="panel-body">
                <div class="media usr-info">
                    <a href="#" class="pull-left">
                        <img class="thumb" src="/images/photos/user2.png" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Mila Watson</h4>
                        <span>Senior UI Designer</span>
                        <p>I use to design websites and applications for the web.</p>
                    </div>
                </div>
            </div>
            <div class="panel-footer custom-trq-footer">
                <ul class="user-states">
                    <li>
                        <i class="fa fa-heart"></i> 127
                    </li>
                    <li>
                        <i class="fa fa-eye"></i> 853
                    </li>
                    <li>
                        <i class="fa fa-user"></i> 311
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

</script>