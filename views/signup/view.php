<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Signup */

$this->title = $model->name;
$this->params['breadcrumbs'][] = [
    'label' => 'Signups',
    'url' => [
        'index'
    ]
];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="signup-view">

	<h1><?= Html::encode($this->title) ?></h1>

	<p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=Html::a('Delete', ['delete','id' => $model->id], ['class' => 'btn btn-danger','data' => ['confirm' => 'Are you sure you want to delete this item?','method' => 'post']])?>
    </p>

    <?=DetailView::widget(['model' => $model,'attributes' => ['id','name','contact_no','username','password','email:email','adress','state_id','created_on','created_by_id','type_id','authkey']])?>

</div>
