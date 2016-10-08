<?php

use app\models\User;

/* @var $this yii\web\View */
/* @var $logs app\models\Log[] */

$this->registerJsFile("/js/config-logs.js", ['depends' => 'app\assets\BootstrapTableAsset']);

$this->title = '操作日志';

?>
<style>
    section.panel {
        color: #7a7676;
    }

    #hidden-table-info_wrapper .details {
        background-color: #eff0f4
    }
</style>


<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <header class="panel-heading">
                操作日志
                <span class="tools pull-right"></span>
            </header>
            <div class="panel-body">
                <div class="adv-table">
                    <table class="display table table-bordered" id="hidden-table-info">
                        <thead>
                        <tr>
                            <th data-field="state" data-checkbox="true"></th>
                            <th data-field="id" data-align="right" data-sortable="true">ID</th>
                            <th data-field="category" data-align="center" data-sortable="true">分类</th>
                            <th data-field="message" data-sortable="true">操作</th>
                            <th data-field="prefix" data-sortable="true">用户</th>
                            <th data-field="log_time" data-sortable="true">时间</th>
                        </tr>
                        </thead>
                    </table>

                </div>
            </div>
        </section>
    </div>
</div>

<script type="text/template" id="t1">
    <section class="panel">
        <header class="panel-heading custom-tab ">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a data-toggle="tab">修改</a>
                </li>
                <li class="">
                    <a data-toggle="tab">权限</a>
                </li>
                <li class="">
                    <a data-toggle="tab">Profile</a>
                </li>
                <li class="">
                    <a data-toggle="tab">Contact</a>
                </li>
            </ul>
        </header>
        <div class="panel-body">
            <div class="tab-content">
                <div class="tab-pane active">
                    <p>
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                        3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt
                        laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin
                        coffee nulla assumenda shoreditch et. Nihil anim keffiyeh.
                    </p>
                </div>
                <div class="tab-pane">
                    <p>Vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim
                        aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable
                        VHS.</p>
                    <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3
                        wolf moon officia aute,</p>
                </div>
                <div class="tab-pane">

                    <p>Profile pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
                        squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
                        nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                        single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer
                        labore wes anderson cred nesciunt sapiente ea proident.</p>
                </div>
                <div class="tab-pane">Contact</div>
            </div>
        </div>
    </section>
</script>