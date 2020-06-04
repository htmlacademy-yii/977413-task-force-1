 <?php
 /* @var $this \yii\web\View */
 /* @var $model \frontend\models\TaskForm */
 /* @var $categories string[] */

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
        ])->label(false);
        ?>
    </fieldset>
    <fieldset class="search-task__categories">
        <legend>Дополнительно</legend>
        <?= $form->field($model, 'remote', ['template' =>
            '<input type="checkbox" class="visually-hidden checkbox__input" value="1" name="TaskForm[remote]" id="10"><label for="10">Удаленная работа</label>'])->checkbox() ?>
        <?= $form->field($model, 'withoutWorker', ['template' =>
            '<input type="checkbox" class="visually-hidden checkbox__input" value="1" name="TaskForm[withoutWorker]" id="11"><label for="11">Без исполнителя</label>'])->checkbox() ?>
    </fieldset>
    <?= $form->field($model, 'period')
        ->dropDownList(
                [
                'day' => 'За день',
                'week' => 'За неделю',
                'month' => 'За месяц'
                ],
                [
                'prompt' => 'За весь период',
                'class' => 'multiple-select input',
                    'id' => '8'
                ])->label('Период', ['class' => 'search-task__name']);
    ?>
    <?= $form->field($model, 'search')->textInput(['class' => 'input-middle input'])->label('Поиск по названию', ['class' => 'search-task__name']) ?>
    <?= Html::submitButton('Искать', ['class' => 'button']) ?>
 <?php ActiveForm::end(); ?>