<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'count')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?php // $form->field($model, 'icon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date')->textInput(['disabled' => true]) ?>

    <?= $form->field($model, 'category_id')->dropDownList(\yii\helpers\ArrayHelper::map(app\models\Category::find()->all(), 'id', 'name'),
    [
        'prompt' => 'Выберите категорию',
    ]
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t("app", "Вернуться"), ["/product/index"] , ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
