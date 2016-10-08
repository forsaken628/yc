<?php

/* @var $this yii\web\View */
/* @var $permissions yii\rbac\Permission[] */
/* @var $roles yii\rbac\Role[] */

app\assets\NestableAsset::register($this);

$this->registerJsFile("/js/config-auths.js", ['depends' => 'app\assets\BootstrapTableAsset']);

$auth = Yii::$app->authManager;
$permissions = $auth->getPermissions();
$roles = $auth->getRoles();

?>
<style>
    .detail-view input[type="checkbox"] {
        margin-top: 4px !important;
        margin-left: -20px !important;
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="panel">
            <header class="panel-heading custom-tab dark-tab">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#role" data-toggle="tab">角色</a>
                    </li>
                    <li class="">
                        <a href="#permission" data-toggle="tab">权限</a>
                    </li>
                    <li class="">
                        <a href="#profile2" data-toggle="tab">规则</a>
                    </li>
                    <li class="">
                        <a href="#contact2" data-toggle="tab">Contact</a>
                    </li>
                </ul>
            </header>
            <div class="panel-body">
                <div class="tab-content">
                    <div class="tab-pane active" id="role">
                        <div class="adv-table">
                            <div id="role-toolbar">
                                <a id="" href="#new-role-modal" data-toggle="modal" class="btn btn-success">
                                    <i class="glyphicon glyphicon-plus"></i> 添加
                                </a>
                            </div>
                            <table class="display table table-bordered">
                                <thead>
                                <tr>
                                    <th data-field="name" data-sortable="true">角色</th>
                                    <th data-field="description" data-sortable="true">描述</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($roles as $role) { ?>
                                    <tr>
                                        <td data-permission='<?= json_encode($auth->getPermissionsByRole($role->name)) ?>'><?= $role->name ?></td>
                                        <td><?= $role->description ?></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                            <script type="text/template" id="tpl-detail">
                                <form>
                                    <div class="checkbox">
                                        <?php foreach ($permissions as $permission) { ?>
                                            <label data-original-title="<?= $permission->name ?>" data-toggle="tooltip"
                                                   data-placement="top">
                                                <input type="checkbox" name="permission[<?= $permission->name ?>]">
                                                <span><?= $permission->description ?></span>
                                            </label>
                                        <?php } ?>
                                        <button type="submit">保存</button>
                                    </div>
                                </form>
                            </script>
                            <div style="display: none;" aria-hidden="true" aria-labelledby="myModalLabel" role="dialog"
                                 tabindex="-1" id="new-role-modal" class="modal fade">
                                <div class="modal-dialog modal-width">
                                    <div class="modal-content">
                                        <form>
                                            <div class="modal-header">
                                                <button aria-hidden="true" data-dismiss="modal" class="close"
                                                        type="button">×
                                                </button>
                                                <h4 class="modal-title">新角色</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-8 col-md-offset-2">
                                                        <div class="form-group">
                                                            <label class="control-label">角色</label>
                                                            <input class="form-control input-sm" name="name">
                                                            <p class="help-block"></p>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">描述</label>
                                                            <input class="form-control input-sm" name="description">
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
                        </div>
                    </div>
                    <div class="tab-pane" id="permission">
                        <div class="adv-table">
                            <table class="display table table-bordered">
                                <thead>
                                <tr>
                                    <th data-field="name" data-sortable="true">权限</th>
                                    <th data-field="description" data-sortable="true">描述</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($permissions as $permission) { ?>
                                    <tr>
                                        <td><?= $permission->name ?></td>
                                        <td><?= $permission->description ?></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="profile2">
                        Profile
                    </div>
                    <div class="tab-pane" id="contact2">Contact</div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
        var c = 0;
        $("#a").click(function () {
            $(".tab-pane").removeClass("active");
            $(".tab-pane").eq(c).addClass("active");
            c++;
            c %= 4;
        });
    });
</script>