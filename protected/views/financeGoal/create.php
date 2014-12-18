<?php

/**
 * @var $this FinanceGoalController
 * @var $types IFinanceGoal[]
 */


foreach ($types as $index => $type) {

    ?>

    <p> Имя: <?php echo $type->getName(); ?></p>

    <p> Описание: <?php echo $type->getDescription(); ?></p>

    <a href="/financeGoal/createByType?type=<?php echo $index?>&finance_id=<?php echo $financeId?>">Создать</a>

    <br>
    <br>
    <hr>
<?php } ?>