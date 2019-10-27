<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Usertwit */

$this->title = 'Create Usertwit';
$this->params['breadcrumbs'][] = ['label' => 'Usertwits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usertwit-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
