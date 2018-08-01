<?php
if (!empty($_POST['dateDeposit']) && !empty($_POST['sumDeposit'])) {
  if($_POST['sumDeposit']>=1000 && $_POST['sumDeposit']<=3000000){
    if ($_POST['radio'] == 'no') {
        $date = $_POST['dateDeposit'];
        $sumDeposit = $_POST['sumDeposit'];
        $periodDeposit = $_POST['periodDeposit'];

        $interval = $periodDeposit * 12;
        $m = (int)date("m", strtotime($dateDeposit));
        $y = (int)date("Y", strtotime($dateDeposit));
        $daysInYear = (int)date('L', strtotime($dateDeposit)) ? 366 : 365;
        $days = cal_days_in_month(CAL_GREGORIAN, $m, $y);
        $percent = 10;
        for ($i = 1; $i < $interval; $i++) {
            $sumDeposit = $sumDeposit + ($sumDeposit) * $days * ($percent / $daysInYear);
        }
        echo json_encode((int)$sumDeposit);

    } else {
        if($_POST['sumRefillDeposit']>=1000 && $_POST['sumRefillDeposit']<=3000000){
        $dateDeposit = $_POST['dateDeposit'];
        $dateDeposit = date("d-m-Y", strtotime($dateDeposit));
        $sumDeposit = $_POST['sumDeposit'];
        $periodDeposit = $_POST['periodDeposit'];
        $sumRefillDeposit = $_POST['sumRefillDeposit'];

        $interval = $periodDeposit * 12;
        $m = (int)date("m", strtotime($dateDeposit));
        $y = (int)date("Y", strtotime($dateDeposit));
        $daysInYear = (int)date('L', strtotime($dateDeposit)) ? 366 : 365;
        $days = cal_days_in_month(CAL_GREGORIAN, $m, $y);
        $percent = 10;
        for ($i = 1; $i < $interval; $i++) {
            $sumDeposit = $sumDeposit + ($sumDeposit + $sumRefillDeposit) * $days * ($percent / $daysInYear);
        }
        echo json_encode((int)$sumDeposit);
      } else echo json_encode($result = 'Заполните все поля');
    }
  } else echo json_encode($result = 'Заполните все поля');
} else echo json_encode($result = 'Заполните все поля');
?>
