<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="uk-grid">
<div  class="uk-width-1-2">
    <div class="uk-width-1-1">
<?php
$form = ActiveForm::begin([
    'id' => 'login-form',
    'options' => ['class' => 'form-horizontal'],
    'fieldConfig' => [
        'template' => "{label}\n<div class=\"col-lg-6\">{input}</div>\n<div class=\"col-lg-6\">{error}</div>",
        'labelOptions' => ['class' => 'col-lg-1 control-label'],
    ],
]) ?>
<?= $form->field($userAdd, 'user')->textInput(['placeholder' => "Please enter user name of twitter"])
    ->label('User') ?>
    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Add', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>
    </div>
    <div class="uk-width-1-1"><?php
        $form = ActiveForm::begin([
            'id' => 'login-form',
            'options' => ['class' => 'form-horizontal'],
            'fieldConfig' => [
                'template' => "{label}\n<div class=\"col-lg-6\">{input}</div>\n<div class=\"col-lg-6\">{error}</div>",
                'labelOptions' => ['class' => 'col-lg-1 control-label'],
            ],
        ]) ?>
        <?= $form->field($userDel, 'user')->textInput(['placeholder' => "Please enter user name foor delete"])
            ->label('User') ?>
        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Del', ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
        <?php ActiveForm::end() ?></div>
</div>
    <div class="uk-width-1-2">11</div>
</div>