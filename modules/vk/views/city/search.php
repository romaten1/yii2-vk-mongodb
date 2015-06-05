<?php
/* @var $this yii\web\View */
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<h1>Виберіть регіон для пошуку всіх його населених пунктів</h1>
<div>

</div>
<?php $form = ActiveForm::begin(); ?>

<?= $form->field( $forma, 'region' )->dropDownList( $regions, ['prompt' => 'Виберіть регіон ...'] ) ?>

<div class="form-group">
    <?= Html::submitButton('Відправити запит отримання міст', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>

<?= GridView::widget( [
    'dataProvider' => $provider,
    'columns'      => [
        [ 'class' => 'yii\grid\SerialColumn' ],
        'cid',
        'title',
        'area',
        'region',
        [ 'class' => 'yii\grid\ActionColumn' ],
    ],
] ); ?>
