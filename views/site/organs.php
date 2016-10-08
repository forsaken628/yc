<?php

/* @var $this yii\web\View */

//use app\assets\BootstrapTableAsset;

//BootstrapTableAsset::register($this);
$this->registerJsFile("/js/site-organs.js", ['depends' => 'app\assets\BootstrapTableAsset']);
$this->title = '机构管理';

?>

<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                机构管理
                <span class="tools pull-right"></span>
            </header>
            <div class="panel-body">
                <div class="adv-table">
                    <div id="toolbar">
                        <a id="insert" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i>添加</a>
                    </div>
                    <div style="display: none;" aria-hidden="true" aria-labelledby="myModalLabel" role="dialog"
                         tabindex="-1" id="new-organ-modal" class="modal fade">
                        <div class="modal-dialog modal-width">
                            <div class="modal-content">
                                <form>
                                    <div class="modal-header">
                                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×
                                        </button>
                                        <h4 class="modal-title">新机构</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-8 col-md-offset-2">
                                                <div class="form-group">
                                                    <label class="control-label">机构名</label>
                                                    <input class="form-control input-sm" name="org_name">
                                                    <p class="help-block"></p>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">机构APP入口</label>
                                                    <input class="form-control input-sm" name="org_app_name">
                                                    <p class="help-block"></p>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">电话</label>
                                                    <input class="form-control input-sm" name="phone">
                                                    <p class="help-block"></p>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">地址</label>
                                                    <input class="form-control input-sm" name="org_address">
                                                    <p class="help-block"></p>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">图标</label>
                                                    <input class="form-control input-sm" name="org_logo">
                                                    <p class="help-block"></p>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Url</label>
                                                    <input class="form-control input-sm" name="org_url">
                                                    <p class="help-block"></p>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">数据库</label>
                                                    <input class="form-control input-sm" name="org_db_name">
                                                    <p class="help-block"></p>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">数据库账号</label>
                                                    <input class="form-control input-sm" name="org_db_username">
                                                    <p class="help-block"></p>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">数据库密码</label>
                                                    <input class="form-control input-sm" name="org_db_password">
                                                    <p class="help-block"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-default js-reset" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success" name="id" value="">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <table class="display table table-bordered" id="hidden-table-info"
                           data-pagination="true"
                           data-search="true">
                    </table>
                    <script type="text/template" id="tpl-operate">
                        <a class="edit" href="javascript:void(0)" title="Edit">
                            <i class="glyphicon glyphicon-cog"></i>
                        </a>
                        <a class="remove" href="javascript:void(0)" title="Remove">
                            <i class="glyphicon glyphicon-remove"></i>
                        </a>
                    </script>
                </div>
            </div>
        </section>
    </div>
</div>
