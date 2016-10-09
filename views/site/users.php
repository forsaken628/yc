<?php

/* @var $this yii\web\View */
/* @var $users app\models\AR\User[] */

$this->registerJsFile("/js/site/users.js");

?>
<style>
    section.panel {
        color: #7a7676;
    }

    .adv-table .detail-view {
        background-color: #eff0f4
    }

    .modal-width {
        max-width: 400px;
    }
</style>

<section class="panel">
    <header class="panel-heading custom-tab ">
        <ul class="nav nav-tabs">
            <li class="active">
                <a data-toggle="tab">管理员</a>
            </li>
            <li>
                <a data-toggle="tab">教师</a>
            </li>
            <li>
                <a data-toggle="tab">学生</a>
            </li>
            <li>
                <a data-toggle="tab">已停用</a>
            </li>
        </ul>
    </header>
    <div class="panel-body">
        <div class="tab-content">
            <div class="tab-pane active">
                <div class="admin-table">
                    <div class="toolbar">
                        <a data-toggle="modal" class="btn btn-success new-admin-modal">
                            <i class="glyphicon glyphicon-plus"></i> 添加
                        </a>
                    </div>
                    <div style="display: none;" aria-hidden="true" aria-labelledby="myModalLabel" role="dialog"
                         tabindex="-1" id="new-admin-modal" class="modal fade">
                        <div class="modal-dialog modal-width">
                            <div class="modal-content">
                                <form>
                                    <div class="modal-header">
                                        <button aria-hidden="true" data-dismiss="modal" class="close"
                                                type="button">×
                                        </button>
                                        <h4 class="modal-title">添加管理员</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-8 col-md-offset-2">
                                                <input type="hidden" name="type" value="1"/>
                                                <input type="hidden" name="id"/>
                                                <div class="form-group">
                                                    <label class="control-label">用户名</label>
                                                    <input class="form-control input-sm" name="username">
                                                    <p class="help-block"></p>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">密码</label>
                                                    <input class="form-control input-sm" name="password">
                                                    <p class="help-block"></p>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">管理员姓名</label>
                                                    <input class="form-control input-sm" name="admin_name">
                                                    <p class="help-block"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-default js-reset" data-dismiss="modal">取消
                                        </button>
                                        <button type="submit" class="btn btn-success">提交</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <table class="display table table-bordered admin"></table>
                </div>
            </div>
            <div class="tab-pane">
                <div class="teacher-table">
                    <div class="toolbar">
                        <a href="#new-teacher-modal" data-toggle="modal" class="btn btn-success">
                            <i class="glyphicon glyphicon-plus"></i> 添加
                        </a>
                    </div>
                    <div style="display: none;" aria-hidden="true" aria-labelledby="myModalLabel" role="dialog"
                         tabindex="-1" id="new-teacher-modal" class="modal fade">
                        <div class="modal-dialog modal-width">
                            <div class="modal-content">
                                <form>
                                    <div class="modal-header">
                                        <button aria-hidden="true" data-dismiss="modal" class="close"
                                                type="button">×
                                        </button>
                                        <h4 class="modal-title">添加教师</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-8 col-md-offset-2">
                                                <input type="hidden" name="type" value="2"/>
                                                <input type="hidden" name="id"/>
                                                <div class="form-group">
                                                    <label class="control-label">用户名</label>
                                                    <input class="form-control input-sm" name="username">
                                                    <p class="help-block"></p>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">密码</label>
                                                    <input class="form-control input-sm" name="password">
                                                    <p class="help-block"></p>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">教师姓名</label>
                                                    <input class="form-control input-sm" name="teacher_name">
                                                    <p class="help-block"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-default js-reset" data-dismiss="modal">取消
                                        </button>
                                        <button type="submit" class="btn btn-success">提交</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <table class="display table table-bordered teacher"></table>
                </div>
            </div>
            <div class="tab-pane">
                <div class="student-table">
                    <div class="toolbar">
                        <a id="" href="#new-student-modal" data-toggle="modal" class="btn btn-success">
                            <i class="glyphicon glyphicon-plus"></i> 添加
                        </a>
                    </div>
                    <div style="display: none;" aria-hidden="true" aria-labelledby="myModalLabel" role="dialog"
                         tabindex="-1" id="new-student-modal" class="modal fade">
                        <div class="modal-dialog modal-width">
                            <div class="modal-content">
                                <form>
                                    <div class="modal-header">
                                        <button aria-hidden="true" data-dismiss="modal" class="close"
                                                type="button">×
                                        </button>
                                        <h4 class="modal-title">添加学生</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-8 col-md-offset-2">
                                                <input type="hidden" name="type" value="3"/>
                                                <input type="hidden" name="id"/>
                                                <div class="form-group">
                                                    <label class="control-label">用户名</label>
                                                    <input class="form-control input-sm" name="username">
                                                    <p class="help-block"></p>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">密码</label>
                                                    <input class="form-control input-sm" name="password">
                                                    <p class="help-block"></p>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">学生姓名</label>
                                                    <input class="form-control input-sm" name="student_name">
                                                    <p class="help-block"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-default js-reset" data-dismiss="modal">取消
                                        </button>
                                        <button type="submit" class="btn btn-success">提交</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <table class="display table table-bordered student"></table>
                </div>
            </div>
            <div class="tab-pane">
                <div class="disable-table">
                    <table class="display table table-bordered disable"></table>
                </div>
            </div>
        </div>
    </div>
</section>


<script type="text/template" id="tpl-admin-operate">
    <a class="edit" href="javascript:void(0)" title="Edit">
        <i class="glyphicon glyphicon-cog"></i> 编辑
    </a>
    <a class="disable" href="javascript:void(0)" title="Disable">
        <i class="glyphicon glyphicon-remove"></i> 停用
    </a>
</script>

<script type="text/template" id="tpl-teacher-operate">
    <a class="edit" href="javascript:void(0)" title="Edit">
        <i class="glyphicon glyphicon-cog"></i> 编辑
    </a>
    <a class="schedule" href="javascript:void(0)" title="chedule">
        <i class="glyphicon glyphicon-cog"></i> 排课
    </a>
    <a class="disable" href="javascript:void(0)" title="Disable">
        <i class="glyphicon glyphicon-remove"></i> 停用
    </a>
</script>

<script type="text/template" id="tpl-student-operate">
    <a class="edit" href="javascript:void(0)" title="Edit">
        <i class="glyphicon glyphicon-cog"></i> 编辑
    </a>
    <a class="placement" href="javascript:void(0)" title="Placement">
        <i class="glyphicon glyphicon-cog"></i> 分班
    </a>
    <a class="disable" href="javascript:void(0)" title="Disable">
        <i class="glyphicon glyphicon-remove"></i> 停用
    </a>
</script>

<script type="text/template" id="tpl-detail">
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
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                        richardson ad squid.
                        3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck
                        quinoa nesciunt
                        laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it
                        squid single-origin
                        coffee nulla assumenda shoreditch et. Nihil anim keffiyeh.
                    </p>
                </div>
                <div class="tab-pane">
                    <p>Vegan excepteur butcher vice lomo. Leggings occaecat craft beer
                        farm-to-table, raw denim
                        aesthetic synth nesciunt you probably haven't heard of them accusamus labore
                        sustainable
                        VHS.</p>
                    <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                        richardson ad squid. 3
                        wolf moon officia aute,</p>
                </div>
                <div class="tab-pane">

                    <p>Profile pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                        richardson ad
                        squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food
                        truck quinoa
                        nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird
                        on it squid
                        single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh
                        helvetica, craft beer
                        labore wes anderson cred nesciunt sapiente ea proident.</p>
                </div>
                <div class="tab-pane">Contact</div>
            </div>
        </div>
    </section>
</script>