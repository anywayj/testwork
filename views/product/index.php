<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Товары';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить товар', ['create'], ['class' => 'btn btn-success']) ?>
    </p>





    <div class="table-responsive">   
          <?= GridView::widget([
              'dataProvider' => $dataProvider,
              'tableOptions' => [
                  'class' => 'table table-striped table-bordered table-hover'
              ],

             // 'filterModel' => $searchModel,
              'columns' => [
                 // ['class' => 'yii\grid\SerialColumn'],

                  [
                    'attribute' => 'id',
                    'value' => function($data){
                         return $data->id;
                    },
                    'contentOptions' => ['style'=>'width:20px;'],
                  ],

                  [
                    'attribute' => 'name',
                    'value' => function($data){
                         return $data->name;
                    },
                    'contentOptions' => ['style'=>'width:100px;'],
                  ],
                  
                  [
                    'attribute' => 'price',
                    'value' => function($data){
                         return $data->price;
                    },
                    'contentOptions' => ['style'=>'width:50px;'],
                  ],

                  [
                    'attribute' => 'count',
                    'value' => function($data){
                         return $data->count;
                    },
                    'contentOptions' => ['style'=>'width:50px;'],
                  ],

                  /*[
                      'format' => 'image',
                      'attribute' => 'icon',
                      'value' => function ($model) {
                          return $model->getImageUrl(); 
                      },
                  ],*/

                  [
                      'attribute' => 'icon',
                      'format' => 'html',    
                      'value' => function ($data) {
                          return Html::img(Yii::getAlias('@web').'/icon/'. $data->icon,
                              ['width' => '70px']);
                      },
                  ],

                  [
                    'attribute' => 'date',
                    'value' => function($data){
                         return $data->date;
                    },
                    'contentOptions' => ['style'=>'width:100px;'],
                  ],

                  [
                    'attribute' => 'category_id',
                    'value' => function($data){
                         return $data->category->name;
                    },
                    'contentOptions' => ['style'=>'width:100px;'],
                  ],

                  [
                    'class' => 'yii\grid\ActionColumn',
                    'header'=>'Ссылки', 
                    'contentOptions' => ['style'=>'width:20px;'],
                  ],





              ],
          ]); ?>
          <?php Pjax::end(); ?>
        </div>
</div>
