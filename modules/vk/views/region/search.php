<?php
/* @var $this yii\web\View */
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<h1>Виберіть країну для пошуку всіх її регіонів</h1>
<div>

</div>
<?php $form = ActiveForm::begin(); ?>

<?= $form->field( $country, 'country' )->dropDownList( [ 2 => "Україна", 1 => "Росія", 3 => "Білорусь"], ['prompt' => 'Виберіть країну ...'] ) ?>

<div class="form-group">
    <?= Html::submitButton('Відправити запит отримання регіонів', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>

<?= GridView::widget( [
    'dataProvider' => $provider,
    'columns'      => [
        [ 'class' => 'yii\grid\SerialColumn' ],
        'region_id',
        'title',
        'country',
        [ 'class' => 'yii\grid\ActionColumn' ],
    ],
] ); ?>
