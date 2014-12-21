<?php

/**
 * @var $this FinanceController
 * @var $models FinanceCommit[]
 */
if (count($models) > 0) {

    ?>


    <a type="button" class="btn btn-link" href="/finance/view?id=<?php echo $finance->id; ?>">Назад
    </a><br><br>
    <canvas id="balanceChart" width="400" height="300"></canvas>
    <canvas id="balanceAllChart" width="400" height="300"></canvas>





    <table class="table table-condensed">
        <thead>
        <tr>
            <th>Номер</th>

            <th>Тип</th>
            <th>Сумма</th>
            <th>Дата</th>
        </tr>
        </thead>
        <tbody>


        <?php foreach ($models as $index => $model) {

            $activeGoalsCount = count(FinanceGoal::model()->findAllByAttributes(array('finance_id' => $model->id, 'state' => FinanceGoal::StateInProgress)));

            ?>


            <tr>
                <td><?php echo $index + 1; ?></td>
                <td>  <?php echo FinanceCommit::getTypeName($model->type); ?></td>
                <td> <?php echo $model->value ?> </td>
                <td><?php echo CDateHelper::getFullDate($model->create_date) ?></td>
            </tr>

        <?php } ?>


        </tbody>
    </table>




    <?php

    $plusValue = 0;
    $minusValue = 0;

    foreach ($models as $model) {

        if ($model->type == FinanceCommit::ADD) {
            $plusValue += $model->value;
        } else if ($model->type == FinanceCommit::SPEND) {
            $minusValue += $model->value;
        }

    }

    ?>

    <script>


        $(function () {

            var ctx = $('#balanceChart').get(0).getContext("2d");
            var balanceChart = new Chart(ctx);

            var data = [
                {
                    value: <?php echo $minusValue; ?>,
                    color: "#F7464A",
                    highlight: "#FF5A5E",
                    label: "Потратил"
                },
                {
                    value: <?php echo $plusValue; ?>,
                    color: "#46BFBD",
                    highlight: "#5AD3D1",
                    label: "Добавил"
                },
            ]

            balanceChart.Pie(data);


            var ctx2 = $('#balanceAllChart').get(0).getContext("2d");
            var balanceAllChart = new Chart(ctx2);

            var data = [

                <?php foreach($models as $model){
                    $color = ($model->type == FinanceCommit::ADD) ? "'#46BFBD'" : "'#F7464A'";
                    $hl = ($model->type == FinanceCommit::ADD) ? "'#5AD3D1'" : "'#FF5A5E'";
                    echo "{";
                    echo "value: " . $model->value ;  echo ",";
                    echo "color: " . $color;  echo ",";
                    echo "highlight: " . $hl;  echo ",";
                    echo "label: " . "'Дата - " . CDateHelper::getFullDate($model->create_date);  echo "',";
                    echo "}";  echo ",";
                }?>
            ];

            balanceAllChart.Pie(data);
        });

    </script>
<?php } else { ?>

    <h2>У вас нет изменений</h2>

<?php } ?>