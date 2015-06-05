<?php
/* @var $this yii\web\View */
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<h1>Виберіть район для пошуку всіх його users</h1>
<div>

</div>
<?php $form = ActiveForm::begin(); ?>

<?= $form->field( $forma, 'area' )->dropDownList( $areas, ['prompt' => 'Виберіть район ...'] ) ?>

<div class="form-group">
    <?= Html::submitButton('Відправити запит отримання шкіл', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>

<?= GridView::widget( [
    'dataProvider' => $provider,
    'columns'      => [
        [ 'class' => 'yii\grid\SerialColumn' ],
        'uid',
        'first_name',
        'last_name',
        [ 'class' => 'yii\grid\ActionColumn' ],
    ],
] ); ?>
