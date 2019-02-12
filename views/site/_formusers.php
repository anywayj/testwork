<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'firstname')->label('Имя') ?>

    <?= $form->field($model, 'lastname')->label('Фамилия') ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t("app", "Вернуться"), ["/site/index"] , ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
