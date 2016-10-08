<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

$this->title = 'Login';

use yii\helpers\Html;
use app\assets\AppAsset;
use yii\bootstrap\ActiveForm;

AppAsset::register($this);


?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <?= Html::csrfMetaTags() ?>
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="#" type="image/png">

    <title><?= Html::encode($this->title) ?></title>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="/js/html5shiv.js"></script>
    <script src="/js/respond.min.js"></script>
    <![endif]-->

    <?php $this->head() ?>

</head>

<body class="login-body">

<?php $this->beginBody() ?>


<div class="container">

    <?php $form = ActiveForm::begin([
        'options' => ['class' => 'form-signin'],
        'fieldConfig' => [
            'template' => "{input}<div class=\"col-lg-8\">{error}</div>",
        ],
    ]); ?>

    <div class="form-signin-heading text-center">
        <h1 class="sign-title">Sign In</h1>
        <img src="/images/login-logo.png" alt=""/>
    </div>

    <div class="login-wrap">
        <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder' => $model->getAttributeLabel("username"), 'value' => 'admin001']) ?>

        <?= $form->field($model, 'password')->passwordInput(['placeholder' => $model->getAttributeLabel("password"), 'value' => '123456']) ?>

        <?= Html::submitButton('<i class="fa fa-check"></i>', ['class' => 'btn btn-lg btn-login btn-block', 'name' => 'login-button']) ?>

    </div>

    <?php ActiveForm::end(); ?>

</div>


<!-- Placed js at the end of the document so the pages load faster -->

<!-- Placed js at the end of the document so the pages load faster -->

<?php $this->endBody() ?>

</body>

<?php $this->endPage() ?>

</html>
