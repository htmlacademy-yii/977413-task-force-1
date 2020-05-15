<?php

$test = 'test';

/* @var $this \yii\web\View */
/* @var $model \frontend\models\TaskForm */
/* @var $categories string[] */
/* @var $data \frontend\models\Tasks[] */
?>

<section class="new-task">
    <div class="new-task__wrapper">
        <h1>Новые задания</h1>

        <div class="new-task__card">

            <?php foreach ($data as $dat): ?>

                <div class="new-task__title">
                    <a href="#" class="link-regular"><h2><?= $dat->name; ?></h2></a>
                    <a  class="new-task__type link-regular" href="#"><p><?= $dat->category_id;; ?></p></a>
                </div>
                <div class="new-task__icon new-task__icon--translation"></div>
                <p class="new-task_description">
                    <?= $dat->description; ?>
                </p>
                <b class="new-task__price new-task__price--translation"><?= $dat->budget; ?><b> ₽</b></b>
                <p class="new-task__place"><?= $dat->address; ?></p>
                <span class="new-task__time"><?= $dat->dt_add; ?></span>

            <?php endforeach; ?>

        </div>

    </div>
    <div class="new-task__pagination">
        <ul class="new-task__pagination-list">
            <li class="pagination__item"><a href="#"></a></li>
            <li class="pagination__item pagination__item--current">
                <a>1</a></li>
            <li class="pagination__item"><a href="#">2</a></li>
            <li class="pagination__item"><a href="#">3</a></li>
            <li class="pagination__item"><a href="#"></a></li>
        </ul>
    </div>
</section>
<section  class="search-task">
    <div class="search-task__wrapper">

        <?php
        use yii\helpers\Html;
        use yii\widgets\ActiveForm;
        ?>

        <?php $form = ActiveForm::begin(
                [
//                        'action' => '/',
                        'options' => [
                                'class' => 'search-task__form'
                        ]
                ]
        ); ?>

        <fieldset class="search-task__categories">
<!--<legend>Категории</legend>-->
            <?= $form->field($model, 'categories[]')->checkboxList($categories)
           // , [
//                    'itemOptions' => [
//                    'class' => 'visually-hidden checkbox__input'
//            ]])
                ->label('<legend>Категории</legend>') ?>
<!-- 'class' => 'visually-hidden checkbox__input' -->
        </fieldset>

        <fieldset class="search-task__categories">
<!--<legend>Дополнительно</legend>-->
            <?= $form->field($model, 'remote')->checkbox()->label('Удаленная работа') ?>
            <?= $form->field($model, 'withoutWorker')->checkbox()->label('Без исполнителя') ?>

            <!--            --><?//= $form->field($model, 'additionally[]')->checkboxList(
//                    [
//                       'without-worker' => 'Без исполнителя', 'remote-work' => 'Удаленная работа'
//                    ])
//                   ->label('<legend>Дополнительно</legend>')?>
        </fieldset>

        <?= $form->field($model, 'period')
            ->dropDownList(
                    [
                    'day' => 'За день',
                    'week' => 'За неделю',
                    'month' => 'За месяц'
                    ], ['prompt' => 'За весь период'])
            ->label('Период') ?>
<!--<label class="search-task__name" for="8">Период</label>-->
<!--      <select class="multiple-select input" id="8" size="1" name="time[]">-->
<!--         <option value="day">За день</option>-->
<!--         <option selected value="week">За неделю</option>-->
<!--         <option value="month">За месяц</option>-->
<!--     </select>-->

        <?= $form->field($model, 'search')->input('text')
            ->label('Поиск по названию') ?>
<!--<label class="search-task__name" for="9">Поиск по названию</label>-->
<!--<input class="input-middle input" id="9" type="search" name="q" placeholder="">-->

        <?= Html::submitButton('Искать', ['class' => 'button']) ?>
<!--<button class="button" type="submit">Искать</button>-->

        <?php ActiveForm::end(); ?>



<!--                <form class="search-task__form" name="test" method="get" action="#">-->
<!--                    <fieldset class="search-task__categories">-->
<!--                        <legend>Категории</legend>-->
<!--                        <input class="visually-hidden checkbox__input" id="1" type="checkbox" name="n1" value="v1" checked>-->
<!--                        <label for="1">Курьерские услуги </label>-->
<!--                        <input class="visually-hidden checkbox__input" id="2" type="checkbox" name="n2" value="v2" checked>-->
<!--                        <label  for="2">Грузоперевозки </label>-->
<!--                        <input class="visually-hidden checkbox__input" id="3" type="checkbox" name="n3" value="v3">-->
<!--                        <label  for="3">Переводы </label>-->
<!--                        <input class="visually-hidden checkbox__input" id="4" type="checkbox" name="n4" value="v4">-->
<!--                        <label  for="4">Строительство и ремонт </label>-->
<!--                        <input class="visually-hidden checkbox__input" id="5" type="checkbox" name="n5" value="v5">-->
<!--                        <label  for="5">Выгул животных </label>-->
<!--                    </fieldset>-->
<!--                    <fieldset class="search-task__categories">-->
<!--                        <legend>Дополнительно</legend>-->
<!--                        <input class="visually-hidden checkbox__input" id="6" type="checkbox" name="" value="">-->
<!--                        <label for="6">Без исполнителя </label>-->
<!--                        <input class="visually-hidden checkbox__input" id="7" type="checkbox" name="" value="" checked>-->
<!--                        <label for="7">Удаленная работа </label>-->
<!--                    </fieldset>-->
<!--                    <label class="search-task__name" for="8">Период</label>-->
<!--                    <select class="multiple-select input" id="8"size="1" name="time[]">-->
<!--                        <option value="day">За день</option>-->
<!--                        <option selected value="week">За неделю</option>-->
<!--                        <option value="month">За месяц</option>-->
<!--                    </select>-->
<!--                    <label class="search-task__name" for="9">Поиск по названию</label>-->
<!--                    <input class="input-middle input" id="9" type="search" name="q" placeholder="">-->
<!--                    <button class="button" type="submit">Искать</button>-->
<!--                </form>-->
<!---->
<!--    </div>-->
<!--</section>-->
