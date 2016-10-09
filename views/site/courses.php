<?php
/**
 * Created by PhpStorm.
 * User: forsa
 * Date: 2016-09-22
 * Time: 20:14
 */

use app\models\AR\Teacher;
use app\models\AR\Venue;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

$this->registerJsFile("/js/site/courses.js", ['depends' => ['app\assets\FullcalendarAsset','app\assets\DateTimePickerAsset']]);

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
                <table class="display table table-bordered course"></table>
            </div>
        </section>
    </div>
</section>


<div style="display: none;" aria-hidden="true" aria-labelledby="myModalLabel" role="dialog"
     tabindex="-1" id="new-schedule-modal" class="modal fade">
    <div class="modal-dialog modal-width">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close"
                            type="button">×
                    </button>
                    <h4 class="modal-title">添加排期</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="form-group">
                                <label class="control-label">课程</label>
                                <input class="form-control input-sm" name="username" disabled>

                                <p class="help-block"></p>
                            </div>
                            <div class="form-group">
                                <label class="control-label">教师</label>
                                <?= Html::activeDropDownList(new Teacher(), 'id',
                                    ArrayHelper::map(Teacher::find()->all(), 'id', 'teacher_name'),
                                    ['name' => 'teacher',
                                        'id' => null,
                                        'class' => 'form-control',
                                    ]) ?>
                                <p class="help-block"></p>
                            </div>
                            <div class="form-group">
                                <label class="control-label">教室</label>
                                <?= Html::activeDropDownList(new Venue(), 'id',
                                    ArrayHelper::map(Venue::find()->all(), 'id', 'venue_name'),
                                    ['name' => 'venue',
                                        'id' => null,
                                        'class' => 'form-control',
                                    ]) ?>
                                <p class="help-block"></p>
                            </div>
                            <div class="form-group">
                                <label class="control-label">开始时间</label>
                                <input class="form-control input-sm datetimepicker" size="16" name="admin_name">
                                <p class="help-block"></p>
                            </div>
                            <div class="form-group">
                                <label class="control-label">结束时间</label>
                                <input class="form-control input-sm datetimepicker" name="admin_name">
                                <p class="help-block"></p>
                            </div>
                            <div class="form-group">
                                <label class="control-label">重复</label>
                                <div>
                                    <label class="col-md-3 radio-inline">
                                        <input name="has_repeat" value="0" type="radio" checked> 无重复
                                    </label>
                                    <label class="col-md-3 radio-inline">
                                        <input name="has_repeat" value="1" type="radio"> 日重复
                                    </label>
                                    <label class="col-md-3 radio-inline">
                                        <input name="has_repeat" value="2" type="radio"> 周重复
                                    </label>
                                    <div class="clearfix"></div>
                                </div>
                                <div>
                                    <label class="col-md-3 radio-inline">
                                        <input name="has_repeat" value="3" type="radio"> 双周重复
                                    </label>
                                    <label class="col-md-3 radio-inline">
                                        <input name="has_repeat" value="4" type="radio"> 月重复
                                    </label>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="form-group weekly hidden">
                                <div>
                                    <label class="col-md-3 checkbox-inline">
                                        <input name="weekly[1]" type="checkbox"> 星期一
                                    </label>
                                    <label class="col-md-3 checkbox-inline">
                                        <input name="weekly[2]" type="checkbox"> 星期二
                                    </label>
                                    <label class="col-md-3 checkbox-inline">
                                        <input name="weekly[3]" type="checkbox"> 星期三
                                    </label>
                                    <div class="clearfix"></div>
                                </div>
                                <div>
                                    <label class="col-md-3 checkbox-inline">
                                        <input name="weekly[4]" type="checkbox"> 星期四
                                    </label>
                                    <label class="col-md-3 checkbox-inline">
                                        <input name="weekly[5]" type="checkbox"> 星期五
                                    </label>
                                    <label class="col-md-3 checkbox-inline">
                                        <input name="weekly[6]" type="checkbox"> 星期六
                                    </label>
                                    <div class="clearfix"></div>
                                </div>
                                <div>
                                    <label class="col-md-3 checkbox-inline">
                                        <input name="weekly[0]" type="checkbox"> 星期日
                                    </label>
                                    <div class="clearfix"></div>
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="control-label">终止重复</label>
                                <div>
                                    <label class="col-md-3 radio-inline">
                                        <input name="has_end" value="0" type="radio" checked> 无
                                    </label>
                                    <label class="col-md-3 radio-inline">
                                        <input name="has_end" value="1" type="radio"> 按次数
                                    </label>
                                    <label class="col-md-3 radio-inline">
                                        <input name="has_end" value="2" type="radio"> 终止时间
                                    </label>
                                    <div class="clearfix"></div>
                                </div>
                                <p class="help-block"></p>
                            </div>
                            <div class="form-group end-on hidden">
                                <label class="control-label">次数</label>
                                <input class="spinner-input form-control input-sm" name="end_on">
                                <p class="help-block"></p>
                            </div>
                            <div class="form-group end-at hidden">
                                <label class="control-label">终止时间</label>
                                <input class="form-control input-sm datetimepicker" name="end_at">
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
<script type="text/template" id="tpl-detail">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="fullcalendar"></div>
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