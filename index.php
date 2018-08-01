<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Калькулятор вкладов</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
<div class="row justify-content-between">
    <div class="col-3"><img src="WBP.PNG" class="img-fluid"></div>
    <div class="col-3 align-text-top">8-800-100-5005 <br> +7(3452)522-000<br></div>
</div>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">Кредитные карты</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">Вклады</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Дебетовая карта</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Страхование</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Друзья</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Интернет-банк</a>
            </li>
        </ul>
    </div>
</nav>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Главная</a></li>
        <li class="breadcrumb-item"><a href="#">Вклады</a></li>
        <li class="breadcrumb-item active" aria-current="page">Калькулятор</li>
    </ol>
</nav>

<main role="main" class="container">
    <div class="jumbotron">
        <h2>Калькулятор</h2>
        <form method="post" id="sendForm" action="">
            <div class="form-group row">
                <div class="col-5">Дата оформления вклада</div>
                <div class="col-3">
                    <input type="date" class="form-control" name="dateDeposit" placeholder="дд.мм.гггг">
                </div>
            </div>
            </br>
            <div class="form-group row">
                <div class="col-5">Сумма вклада</div>
                <div class="col-3">
                    <input class="form-control" type="number" min="1000" max="3000000" id="sumDeposit"
                           name="sumDeposit" placeholder="1000">
                </div>
                <div class="col-4">
                    <input type="range" min="1000" max="3000000" class="custom-range" id="rangeSumDeposit"
                           oninput="changeRangeSumDeposit()">
                    <div class="d-flex">
                        <div class="font-weight-light col-md-6">1 тыс. руб
                        </div>
                        <div class="ml-auto font-weight-light col-md-6 text-right">3 000 000
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-5">Срок вклада</div>
                <div class="col-3">
                    <select class="form-control" name="periodDeposit">
                        <option value="1">1 год</option>
                        <option value="2">2 года</option>
                        <option value="3">3 года</option>
                        <option value="4">4 года</option>
                        <option value="5">5 лет</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-5">Пополнение вклада</div>
                <div class="col-3">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input radio" type="radio" name="radio" id="radioNo" value="no" checked>
                        <label class="form-check-label" for="radioNo">Нет</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input radio" type="radio" name="radio" id="radioYes" value="yes">
                        <label class="form-check-label" for="radioYes">Да</label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-5">Сумма пополнения вклада</div>
                <div class="col-3">
                    <input class="form-control" type="number" min="1000" max="3000000" id="sumRefillDeposit"
                           name="sumRefillDeposit" placeholder="1000" required disabled>
                </div>
                <div class="col-4">
                    <input type="range" min="1000" max="3000000" class="custom-range"
                           id="rangeSumRefillDeposit" oninput="changeRangeSumRefillDeposit()">
                    <div class="d-flex">
                        <div class="font-weight-light col-md-6">1 тыс. руб
                        </div>
                        <div class="ml-auto font-weight-light col-md-6 text-right">3 000 000
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-3">
                    <input type="button" class="btn btn-primary" id="ajaxBtn" onclick="validate(this.form)"
                           value="Рассчитать">
                </div>
                <div class="col-8"><label id="calcResult"></label></div>
            </div>

        </form>
    </div>
</main>

<nav class="navbar fixed-bottom navbar-expand-sm navbar-dark bg-dark">
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <ins>Кредитные карты</ins>
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">
                    <ins>Вклады</ins>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <ins>Дебетовая карта</ins>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <ins>Страхование</ins>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <ins>Друзья</ins>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <ins>Интернет-банк</ins>
                </a>
            </li>
        </ul>
    </div>
</nav>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
<script>
    $("#sumRefillDeposit").attr("disabled", "disabled");
    $(".radio").change(function () {
        if ($(this).val() == "no") {
            $("#sumRefillDeposit").attr("disabled", "disabled").val('');
        } else {
            $("#sumRefillDeposit").removeAttr("disabled");
        }
    });
</script>
<script type="text/javascript" src="script.js"></script>
<script type="text/javascript" src="ajax.js"></script>
</body>
</html>
