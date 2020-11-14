<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cest_calendar_v2</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d4ac8916dc.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="cest_calendar_v4.css">
</head>

<body>
        <video autoplay mute loop id="subway-background">
        <source src="subway.mp4">
    </video>

    <div class=" d-flex align-items-center justify-content-center min-vh-100 min-vw-100">
        <div class="container d-flex align-items-center h-100 ">

            <div class="row shadow my-auto">
                <div class="col-8 left ">
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
                    $today= mktime(0,0,0,$month,$day_current,$year);

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
                                                                $calendar_days= ($i * 7 + ($j + 1) - $date);
                                                                if ($calendar_days == $day_current){
                                                                    echo "<span style='color:#E3A37D'>".$calendar_days."</span> ";
                                                                }else{
                                                                    echo $calendar_days;
                                                                }
                                                            }
                                                            echo "</td>";
                                                        }

                                                        echo "</tr>";
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>

                </div>

                <div class="col-4 right position-relative ">
                
                    <ul class="list-unstyled postion-absolute add-item-form ">
                        <form action="index.php" method="post" class="form-inline ">
                        <span class="" id="todo_title">Add New To-Do Item!</span>
                            <li class="todo"><input type="text" name="item" required></li><br>
                            <button type="submit" id="sbmt" class="mx-auto"><i class="fas fa-plus"></i></button>
                    </ul>
                    
                    </form>
                    <?php
                   /* 線上展示版先暫停資料表功能,改以SESSION陣列來代替
                     $dsn = "mysql:host=localhost; dbname=todo; charset=utf8";
                    $pdo = new pdo($dsn, 'root', '');
                     */
                 
                    /* add new row to item if receive data from the form */
                    /* if (isset($_POST["item"])) {
                        $do_it = $_POST["item"];
                        $insert_into_todo = "insert into `bulletin`(`item`) values('$do_it')";
                        $result = $pdo->query($insert_into_todo)->fetch();
                    }
                    if (isset ($_POST["delete"])){
                        $delete_do_it=$_POST["delete"];
                        $delete_todo_sql="delete from `bulletin` where `id`= '$delete_do_it'";
                        $delete_result=$pdo->exec($delete_todo_sql);
                    } 
                    
            

                    $things = "select `id`, `item` from `bulletin`";
                    $dos = $pdo->query($things)->fetchAll(); */

                    //功能展示用的臨時性陣列,使用session在瀏灠期間模擬資料表的功能;
                    session_start();

                    //如果server中沒有$_SESSION['dos']這個陣列,則先建立這個陣列,如果這個暫時性的陣列已存在,則不做任何事
                    if(empty($_SESSION['dos'])){
                        $_SESSION['dos']=[
                            [
                                'id'=>1,
                                'item'=>'buy lucky charms',
                                'date'=>'2020-11-12 00:09:09'
                            ],
                            [
                                'id'=>2,
                                'item'=>'watch taskmaster',
                                'date'=>'2020-11-12 00:10:24'
                            ],
                            [
                                'id'=>3,
                                'item'=>'learn php',
                                'date'=>'2020-11-12 00:10:29'
                            ],
                        ];
                     }
                    //如果有收到POST的新增動作，則將資料加到陣列中，隨後的迴圈會將資料顯示出來
                    if (isset($_POST["item"])) {
                        $do_it = $_POST["item"];
                        //根據SESSION的資料數量來計算id值
                        $id=count($_SESSION['dos'])+1;
                        array_push($_SESSION['dos'],['id'=>$id,'item'=>$_POST['item'],'date'=>date("Y-m-d H:i:s")]);
                    }

                    //如果有收到POST的刪除動作，則將資料從陣列中移除，隨後的迴圈將不顯示已刪除的資料
                    if (isset ($_POST["delete"])){
                        $delete_do_it=$_POST["delete"];

                        //使用迴圈在SESSION陣列中找id符合要刪除的id資料,然後利用array_splice()函數來從SESSION陣列中移除該筆資料
                        foreach($_SESSION['dos'] as $key => $item){
                            if($item['id']==$_POST['delete']){
                                array_splice($_SESSION['dos'],$key,1);
                            }
                        }
                    } 

                    /* echo all items so far (including the one just added) */
                    foreach ($_SESSION['dos'] as $do) {
                        echo "<form action='index.php' method='post'>";
                        echo "<ul class='list-unstyled' id='todo_items'>";
                        echo "<li class='todo'>{$do['item']}&nbsp;
                        <button type='submit' name='delete' value='{$do['id']}'><i class='fas fa-minus'></i></button></li>";
                        echo "</ul>";
                        echo "</form>";
                    } 
               
                 /* 
                    $delete_todo_sql="delete from `bulletin` where `id`= '{$do['id']}'";
                        $delete_result=$pdo->exec($delete_todo_sql); */



                  


                    
                
                    ?>
                </div>

            </div>
        </div>
    </div>
</body>

</html>