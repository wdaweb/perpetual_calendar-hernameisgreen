<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>calendar:final version</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d4ac8916dc.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="calendar.css">
</head>

<body>
    <video autoplay mute loop id="subway-background">
        <source src="subway.mp4">
    </video>
    <div class=" d-flex align-items-center justify-content-center min-vh-100 min-vw-100">
        <div class="container d-flex align-items-center h-100 " >

            <div class="row shadow my-auto">
                <div class="col-8 left">
                    <?php
                    if (isset($_GET['year'])) {
                        $year = $_GET['year'];
                    } else {
                        $year = date('Y');
                    }
                    if (isset($_GET['month'])) {
                        $month = $_GET['month'];
                    } else {
                        $month = date('m');
                    }
                    $start_date = date('Y-m-d', mktime(0, 0, 0, $month, 01, $year));
                    $date = date('w', mktime(0, 0, 0, $month, 01, $year)); /*計算第一天是星期幾*/
                    $days = date('t', mktime(0, 0, 0, $month, 01, $year)); /*計算這個月總共有幾天*/
                    $print_month = date('F', mktime(0, 0, 0, $month, 01, $year));/*顯示用的月份*/
                    $date_current = date('D');
                    $day_current = date('d');

                    ?>

                    <div class="title"><?= "$year" ?><br>
                        <span style="color:#ECBFAE;"><?= "$print_month" ?></span></div>

                    <?php
                    if (($month - 1) < 1) { ?>
                        <a id="prev" href="?month=12&year=<?= $year - 1 ?>">

                            <i class="fas fa-long-arrow-alt-left fa-2x">
                            <?php
                        } else {
                            ?>
                                <a id="prev" href='?month=<?= $month - 1 ?>&year=<?= $year ?>'>

                                    <i class="fas fa-long-arrow-alt-left fa-2x">
                                    <?php
                                }
                                    ?>


                                    </i></a>
                                <br>

                                <?php
                                if (($month + 1) > 12) { ?>
                                    <a id="next" href='?month= 1&year=<?= $year + 1 ?>'>

                                        <i class="fas fa-long-arrow-alt-right fa-2x">
                                        <?php
                                    } else {
                                        ?>
                                            <a id="next" href='?month=<?= $month + 1 ?>&year=<?= $year ?>'>

                                                <i class="fas fa-long-arrow-alt-right fa-2x">
                                                <?php
                                            }
                                                ?>

                                                </i></a>
                                            <table class="calendar">
                                                <tbody>
                                                    <?php
                                                    echo "<tr>";
                                                    echo '<th scope="col" >';
                                                    echo "SUN";
                                                    echo "</th>";
                                                    echo '<th scope="col">';
                                                    echo "MON";
                                                    echo "</th>";
                                                    echo '<th scope="col">';
                                                    echo "TUE";
                                                    echo "</th>";
                                                    echo '<th scope="col">';
                                                    echo "WED";
                                                    echo "</th>";
                                                    echo '<th scope="col">';
                                                    echo "THU";
                                                    echo "</th>";
                                                    echo '<th scope="col">';
                                                    echo "FRI";
                                                    echo "</th>";
                                                    echo '<th scope="col">';
                                                    echo "SAT";
                                                    echo "</th>";
                                                    echo "</tr>";
                                                    for ($i = 0; $i < 6; $i++) {
                                                        echo "<tr>";
                                                        for ($j = 0; $j < 7; $j++) {
                                                            echo "<td>";
                                                            if ($i == 0 and $j < $date) {
                                                            } else if ($i * 7 + ($j + 1) - $date > $days) {
                                                            } else {
                                                                echo ($i * 7 + ($j + 1) - $date);
                                                            }
                                                            echo "</td>";
                                                        }

                                                        echo "</tr>";
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>

                </div>

                <div class="col-4 right">
                    <div class="right-title"><?= $date_current ?>&nbsp;<?= $day_current ?></div>
                </div>

            </div>

        </div>
    </div>
</body>

</html>