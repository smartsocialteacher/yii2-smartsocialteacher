<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\BaseStringHelper;

$baseUrl = Yii::getAlias('@web');
$basePath = Yii::getAlias('@webroot');
$url = Url::to(['/activity/view', 'id' => $model->activity_id]);
$activity_title = BaseStringHelper::truncate($model->activity_title,100);
$content =strip_tags($model->activity_detail);
$content =BaseStringHelper::truncate($model->activity_detail,500);

?>

<li class="list-group-item">
    <div class="row">
        <div class="col-sm-10">
            
        <?=Html::tag('h3',
                Html::a($activity_title,$url,['alt'=>$model->activity_title])
                )?>
         
        <?=($model->location)?Yii::t('person','ณ')." ".$model->location->location_title:"";?>
        </div>
        <div class="col-sm-2" style="padding-top: 30px;">
           <?= Html::a( Yii::t('person', 'ลงทะเบียน'),Url::to(['/activity/register', 'id' => $model->activity_id]),['class'=>'btn btn-success' ]); ?>
                
         </div>
    </div>
    <div class="row">
        <div class="col-sm-9">
        <?=Yii::t('person','วันเวลา')?>
        <?=$model->activity_start?> <?=Yii::t('person','ถึง')?> 
        <?=$model->activity_end?>
        <?=Html::a('ดูรายชื่อ',  Url::to(['/activity/registed','id'=>$model->activity_id]),['class'=>'btn btn-warning'])?>
        </div>
        
    </div>   
</li>