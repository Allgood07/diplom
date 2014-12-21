<?php

/**
 * @var $this FinanceGoalController
 * @var $models FinanceGoal[]
 */

?>

    <a type="button" class="btn btn-link" href="/finance/view?id=<?php echo $finance->id; ?>">Назад
    </a><br><br>

<?php
if (count($models) > 0) {

    ?>

    <canvas id="goalChart" width="600" height="400"></canvas>

    <table class="table table-condensed">
        <thead>
        <tr>
            <th>Номер</th>

            <th>Название</th>
            <th>Статус</th>
            <th>Детали</th>
        </tr>
        </thead>
        <tbody>


        <?php foreach ($models as $index => $model) {
            ?>
            <tr>
                <td><?php echo $index + 1; ?></td>
                <td> <?php echo FinanceGoal::getType($model->type)->getName(); ?></td>
                <td> <?php echo FinanceGoal::getStateName($model->state); ?> </td>
                <td><a href="/financeGoal/detail?id=<?php echo $model->id; ?>">Детали</a></td>
            </tr>

        <?php } ?>


        </tbody>
    </table>




    <?php

    $doneGoals = 0;
    $failGoals = 0;
    $inProgressGoals = 0;

    foreach ($models as $model) {

        if ($model->state == FinanceGoal::StateDone) {
            $doneGoals += 1;
        } else if ($model->state == FinanceGoal::StateFail) {
            $failGoals += 1;
        } else if ($model->state == FinanceGoal::StateInProgress) {
            $inProgressGoals += 1;
        }

    }

    ?>

    <script>


        $(function () {

            var ctx = $('#goalChart').get(0).getContext("2d");
            var balanceChart = new Chart(ctx);

            var data = [
                {
                    value: <?php echo $failGoals; ?>,
                    color: "#F7464A",
                    highlight: "#FF5A5E",
                    label: "Провалил"
                },
                {
                    value: <?php echo $doneGoals; ?>,
                    color: "#46BFBD",
                    highlight: "#5AD3D1",
                    label: "Выполнил"
                },
                {
                    value: <?php echo $inProgressGoals; ?>,
                    color: "#FDB45C",
                    highlight: "#FFC870",
                    label: "В процессе выполнения"
                },
            ]

            balanceChart.Pie(data);


        });

    </script>
<?php } else { ?>

    <h2>У вас нет задач</h2>

<?php } ?>