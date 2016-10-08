<?php
/**
 * Created by PhpStorm.
 * User: forsa
 * Date: 2016-09-22
 * Time: 20:14
 */

$this->registerJsFile("/js/site/courses.js",['depends' => ['app\assets\FullcalendarAsset']]);

?>
<section class="panel">
    <header class="panel-heading">
        课程管理
        <span class="tools pull-right"></span>
    </header>
    <div class="panel-body">
        <section class="panel">
            <div class="classes-table">
                <div class="toolbar">
<!--                    <a href="#new-admin-modal" data-toggle="modal" class="btn btn-success">-->
<!--                        <i class="glyphicon glyphicon-plus"></i> 添加-->
<!--                    </a>-->
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
                <table class="display table table-bordered course"></table>
            </div>
        </section>
    </div>
</section>
<script type="text/template" id="tpl-detail">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="fullcalendar" ></div>
            </div>
            <div class="col-md-6">
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>学生</th>
                    </tr>
                    <tr v-for="student in students">
                        <td>{{ student.id }}</td>
                        <td>{{ student.student_name }}</td>
                    </tr>
                </table>
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>教师</th>
                        <th>教室</th>
                        <th>上课安排</th>
                    </tr>
                    <tr v-for="schedule in schedules">
                        <td>{{ schedule.id }}</td>
                        <td>{{ schedule.teacher.teacher_name }}</td>
                        <td>{{ schedule.venue.venue_name }}</td>
                        <td>{{ schedule.description }}</td>
                    </tr>
                </table>
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>课时</th>
                    </tr>
                    <tr v-for="period in periods">
                        <td>{{ period.id }}</td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</script>