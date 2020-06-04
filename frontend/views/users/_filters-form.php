<?php
/* @var $this \yii\web\View */
/* @var $model \frontend\models\WorkerForm */
/* @var $categories string[] */
///* @var $workers \frontend\models\Users[] */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin(
    [
        'options' => [
            'class' => 'search-task__form'
        ]
    ]); ?>

    <fieldset class="search-task__categories">
        <legend>Категории</legend>
        <?= $form->field($model, 'categories[]')->checkboxList($categories, [
            'item' => function($index, $label, $name, $checked, $value) {
                return "<input type='checkbox' class='visually-hidden checkbox__input' {$checked} name='{$name}' value='{$value}' id='{$index}'><label for='{$index}'>{$label}</label>";
            }
        ])->label(false); ?>
    </fieldset>
    <fieldset class="search-task__categories">
        <legend>Дополнительно</legend>
        <?= $form->field($model, 'free', ['template' =>
            '<input type="checkbox" class="visually-hidden checkbox__input" value="1" name="WorkerForm[free]" id="10"><label for="10">Сейчас свободен</label>'])->checkbox() ?>
        <?= $form->field($model, 'online', ['template' =>
            '<input type="checkbox" class="visually-hidden checkbox__input" value="1" name="WorkerForm[online]" id="11"><label for="11">Сейчас онлайн</label>'])->checkbox() ?>
        <?= $form->field($model, 'haveReviews', ['template' =>
            '<input type="checkbox" class="visually-hidden checkbox__input" value="1" name="WorkerForm[haveReviews]" id="12"><label for="12">Есть отзывы</label>'])->checkbox() ?>
    </fieldset>
<?= $form->field($model, 'search')->textInput(['class' => 'input-middle input'])->label('Поиск по названию', ['class' => 'search-task__name']) ?>

<?= Html::submitButton('Искать', ['class' => 'button']) ?>
<?php ActiveForm::end(); ?>