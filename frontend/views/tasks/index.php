<?php
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
                    <a  class="new-task__type link-regular" href="#"><p><?= $dat->category_id; ?></p></a>
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
<?= $this->render('_filters-form', ['model' => $model, 'categories' => $categories]); ?>
    </div>
</section>
