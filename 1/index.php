<?php 
  $time = strtotime("2020-08-30T08:00:00.000Z");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>作业一 - 杨子越 课程设计 U201816816</title>
  </head>
  <body>
    <table border="1" cellspacing="0" style="width: 100%;">
      <tr>
        <th></th>
        <th>星期日</th>
        <th>星期一</th>
        <th>星期二</th>
        <th>星期三</th>
        <th>星期四</th>
        <th>星期五</th>
        <th>星期六</th>
      </tr>
      <?php for ($i = 1; $i <= 20; $i++) { ?>
        <?php $current_week = $time <= time() && time() <= $time + 7 * 24 * 60 * 60;?>
        <tr <?php if ($current_week) echo "style=\"background: #9af1ff;\"" ?>>
          <th>第 <?php echo $i;?> 周</th>
          <?php for ($j = 0; $j < 7; $j++) {?>
            <td <?php if (date("Y-m-d", $time) == date("Y-m-d", time())) { echo "style=\"color:red;\""; } ?> >
              <?php echo date("Y-m-d", $time); $time += 24 * 60 * 60;?>
            </td>
          <?php } ?>
        </tr>
      <?php } ?>
    </table>
  </body>
</html>
