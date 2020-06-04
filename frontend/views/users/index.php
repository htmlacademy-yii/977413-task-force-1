<?php
/* @var $this \yii\web\View */
/* @var $model \frontend\models\WorkerForm */
/* @var $categories string[] */
/* @var $workers \frontend\models\Users[] */
?>

<section class="user__search">
    <div class="user__search-link">
        <p>Сортировать по:</p>
        <ul class="user__search-list">
            <li class="user__search-item user__search-item--current">
                <a href="#" class="link-regular">Рейтингу</a>
            </li>
            <li class="user__search-item">
                <a href="#" class="link-regular">Числу заказов</a>
            </li>
            <li class="user__search-item">
                <a href="#" class="link-regular">Популярности</a>
            </li>
        </ul>
    </div>

    <div class="content-view__feedback-card user__search-wrapper">

        <?php foreach ($workers as $worker):?>

        <div class="feedback-card__top">
            <div class="user__search-icon">
                <a href="#"><img src="web/../../img/man-glasses.jpg" width="65" height="65"></a>
                <span>17 заданий</span>
                <span>6 отзывов</span>
            </div>
            <div class="feedback-card__top--name user__search-card">
                <p class="link-name"><a href="#" class="link-regular"><?= $worker->name; ?></a></p>
                <span></span><span></span><span></span><span></span><span class="star-disabled"></span>
                <b>4.25</b>
                <p class="user__search-content">
                    Сложно сказать, почему элементы политического процесса лишь
                    добавляют фракционных разногласий и рассмотрены исключительно
                    в разрезе маркетинговых и финансовых предпосылок.
                </p>
            </div>
            <span class="new-task__time">Был на сайте 25 минут назад</span>
        </div>
        <div class="link-specialization user__search-link--bottom">
            <a href="#" class="link-regular">Ремонт</a>
            <a href="#" class="link-regular">Курьер</a>
            <a href="#" class="link-regular">Оператор ПК</a>
        </div>

        <?php endforeach; ?>

    </div>

</section>


<section  class="search-task">
    <div class="search-task__wrapper">
        <?= $this->render('_filters-form', ['model' => $model, 'categories' => $categories])?>
    </div>
</section>