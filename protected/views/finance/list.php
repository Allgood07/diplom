<?php

/**
 * @var $this FinanceController
 * @var $models Finance[]
 */


?>
<h1>Мои финансовые проекты</h1>
<h3><a href="/finance/create">Создать Новый Проект</a></h3>
<?php if(count($models) > 0 ) {?>
<table class="table table-condensed">
    <thead>
    <tr>
        <th>Номер</th>

        <th>Название</th>
        <th>Баланс</th>
        <th>Количество активных задач</th>
        <th>Посмотреть</th>
    </tr>
    </thead>
    <tbody>


    <?php foreach ($models as $index => $model) {

        $activeGoalsCount = count(FinanceGoal::model()->findAllByAttributes(array('finance_id'=>$model->id , 'state' => FinanceGoal::StateInProgress ) ));

        ?>


        <tr>
            <td><?php echo $index + 1; ?></td>
            <td> <?php echo $model->name; ?></td>
            <td> <?php echo $model->financeStates[0]->value; ?></td>
            <td> <?php echo $activeGoalsCount; ?></td>
            <td><a href="/finance/view?id=<?php echo $model->id; ?>">Посмотреть</a></td>
        </tr>

    <?php } ?>


    </tbody>
</table>

<?php }else{ ?>
    <br><br>
    <h2>Пока у вас нет финансовых проектов! <a href="/finance/create">Создайте новый</a> </h2>

<?php } ?>