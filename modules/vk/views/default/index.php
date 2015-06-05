<?php use yii\helpers\Url;
?>
<div class="vk-default-index">
    <h1>Виберіть дію</h1>
    <p>
        <a href="<?= Url::to( [ '/vk/region' ] ); ?>" class="btn btn-default btn-xl btn-contact">Знайти регіони обраної країни</a>
    </p>
    <p>
        <a href="<?= Url::to( [ '/vk/city' ] ); ?>" class="btn btn-default btn-xl btn-contact">Знайти міста обраного регіону</a>
    </p>
    <p>
        <a href="<?= Url::to( [ '/vk/school' ] ); ?>" class="btn btn-default btn-xl btn-contact">Знайти school обраного area</a>
    </p>
    <p>
        <a href="<?= Url::to( [ '/vk/search-user' ] ); ?>" class="btn btn-default btn-xl btn-contact">Знайти user обраного area</a>
    </p>
</div>
