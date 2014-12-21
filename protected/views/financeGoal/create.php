<?php

/**
 * @var $this FinanceGoalController
 * @var $types IFinanceGoal[]
 */

?>

<a type="button" class="btn btn-link" href="/finance/view?id=<?php echo $financeId; ?>">Назад</a>

<div class="container">
    <div class="row">
        <h4>
            Создайте новую задачу<hr>
        </h4>
        <?php foreach ($types as $index => $type) {

            ?>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="text-center">
                            <?php echo $type->getName(); ?> </h4>
                    </div>
                    <div class="panel-body text-center">
                        <p class="lead">
                            <strong>Бесплатно</strong></p>
                    </div>
                    <ul class="list-group list-group-flush text-center">
                        <li class="list-group-item"><?php echo nl2br($type->getDescription()); ?></li>
                    </ul>
                    <div class="panel-footer">
                        <a class="btn btn-lg btn-block btn-default"
                           href="/financeGoal/createByType?type=<?php echo $index ?>&finance_id=<?php echo $financeId ?>">Создать</a>
                    </div>
                </div>
            </div>

        <?php } ?>
    </div>
</div>