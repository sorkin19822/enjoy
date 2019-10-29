<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->registerJsFile(
    '@web/js/script.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);

?>
<div class="systemMessages"></div>
<div class="uk-grid">
<div  class="uk-width-1-2">
    <div class="uk-width-1-1">
<?php
$form = ActiveForm::begin([
    'id' => 'addUser-form',
    'options' => ['class' => 'form-horizontal'],
    'fieldConfig' => [
        'template' => "{label}\n<div class=\"col-lg-6\">{input}</div>\n<div class=\"col-lg-6\">{error}</div>",
        'labelOptions' => ['class' => 'col-lg-1 control-label'],
    ],
]) ?>
<?= $form->field($userAdd, 'user')->textInput(['class' => 'inpitUserAdd form-control',
    'placeholder' => "Please enter user name of twitter"])
    ->label('User') ?>
    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Add', ['id'=>'addUser', 'class' => 'addUser btn btn-primary']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>
    </div>
    <div class="uk-width-1-1"><?php
        $form = ActiveForm::begin([
            'id' => 'delUser-form',
            'options' => ['class' => 'form-horizontal'],
            'fieldConfig' => [
                'template' => "{label}\n<div class=\"col-lg-6\">{input}</div>\n<div class=\"col-lg-6\">{error}</div>",
                'labelOptions' => ['class' => 'col-lg-1 control-label'],
            ],
        ]) ?>
        <?= $form->field($userDel, 'user')->textInput(['class' => 'inpitUserDel form-control',
            'placeholder' => "Please enter user name for delete"])
            ->label('User') ?>
        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">

                <?= Html::submitButton('Del', ['id'=>'delUser', 'class'=>'addUser btn btn-primary']) ?>
            </div>
        </div>
        <?php ActiveForm::end() ?></div>
</div>
    <div class="uk-width-1-2">
        <div><button class="uk-button uk-button-secondary uk-width-1-1" id="userFeed">Feed</button></div>
        <div class="uk-margin-small getFeedButton"></div>
    </div>
</div>

<?
include(Yii::getAlias('@app/views/client/template.php'));