<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\WorkTime */
/* @var $form ActiveForm */
?>
<div class="site-worktime">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'timeFrom', ['value' => '08.00']) ?>
        <?= $form->field($model, 'timeTo') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-worktime -->
