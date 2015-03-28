<?php
/* @var $this yii\web\View */


use yii\widgets\ActiveForm;
$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="body-content">

        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span2">
                    <?php $form = ActiveForm::begin([
                        'id' => 'calendar-form',
                        'options' => ['class' => 'form-horizontal'],
                        'fieldConfig' => [
                            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                            'labelOptions' => ['class' => 'col-lg-1 control-label'],
                        ],
                    ]); ?>

                    <?= $form->field($model, 'dateFrom') ?>

                    <?= $form->field($model, 'dateTo') ?>

                    <div class="form-group">
                        <div class="col-lg-offset-1 col-lg-11">
                            <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                        </div>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
                <div class="span10">
                    <!--Body content-->
                </div>
            </div>
        </div>

    </div>
</div>
