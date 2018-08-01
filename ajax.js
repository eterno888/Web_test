function showError(container, errorMessage) {
    container.className = 'error col-3';
    var msgElem = document.createElement('span');
    msgElem.className = "error-message";
    msgElem.innerHTML = errorMessage;
    container.appendChild(msgElem);
}

function resetError(container) {
    container.className = 'col-3';
    if (container.lastChild.className == "error-message") {
      container.removeChild(container.lastChild);
    }
}

//Функция валидации
function validate(form) {
    var elems = form.elements;

    resetError(elems.dateDeposit.parentNode);
    if (!elems.dateDeposit.value) {
      showError(elems.dateDeposit.parentNode, ' Укажите дату.');
    }

    resetError(elems.sumDeposit.parentNode);
    if (!elems.sumDeposit.value) {
      showError(elems.sumDeposit.parentNode, ' Укажите сумму вклада.');
    } else if (elems.sumDeposit.value < 1000) {
        showError(elems.sumDeposit.parentNode, ' Введите сумму вклада больше 1000');
    } else if (elems.sumDeposit.value > 3000000) {
        showError(elems.sumDeposit.parentNode, ' Введите сумму вклада меньше 3000000');
    }
    
    resetError(elems.sumRefillDeposit.parentNode);
    if(!($('#sumRefillDeposit').is(':disabled'))){
      resetError(elems.sumRefillDeposit.parentNode);
      if (!elems.sumRefillDeposit.value) {
        showError(elems.sumRefillDeposit.parentNode, ' Укажите сумму вклада.');
      } else if (elems.sumRefillDeposit.value < 1000) {
          showError(elems.sumRefillDeposit.parentNode, ' Введите сумму вклада больше 1000');
      } else if (elems.sumRefillDeposit.value > 3000000) {
          showError(elems.sumRefillDeposit.parentNode, ' Введите сумму вклада меньше 3000000');
      }
    }
}

//Функция нажатия кнопки
$(document).ready(function(){
  $("#ajaxBtn").click(
    function () {
      sendAjaxForm('calcResult', 'sendForm', 'calc.php');
      return false;
    }
  );
});

//Функция обработки запроса
function sendAjaxForm(calcResult, sendForm, url) {
    $.ajax({
        url: url,
        type: "POST",
        dataType: "html",
        data: $("#" + sendForm).serialize(),
        success: function (response) {
            result = $.parseJSON(response);
            $('#calcResult').html('Результат: ' + result);
        },
        error: function (response) {
            $('#calcResult') . html('Ошибка. Данные не отправлены.');
        }
    });
}
