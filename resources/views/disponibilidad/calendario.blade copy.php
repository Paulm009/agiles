<!DOCTYPE html>
<html>
<head>
  <title>Calendario HTML</title>
  <style>
    table {
      border-collapse: collapse;
    }
    th, td {
      border: 1px solid black;
      padding: 10px;
      cursor: pointer;
    }
    .current-day {
      background-color: yellow;
    }
    .selected-day {
      background-color: lightblue;
    }
  </style>
</head>
<body>

  <h2>Calendario</h2>

  <div>
    <button id="prevBtn">Anterior</button>
    <span id="monthYear"></span>
    <button id="nextBtn">Siguiente</button>
  </div>

  <table id="calendarTable">
    <thead>
      <tr>
        <th>Domingo</th>
        <th>Lunes</th>
        <th>Martes</th>
        <th>Miércoles</th>
        <th>Jueves</th>
        <th>Viernes</th>
        <th>Sábado</th>
      </tr>
    </thead>
    <tbody></tbody>
  </table>

  <script>
    var currentMonth = new Date().getMonth();
    var currentYear = new Date().getFullYear();
    var selectedDate = null;

    renderCalendar(currentMonth, currentYear);

    document.getElementById("prevBtn").addEventListener("click", function() {
      currentMonth--;
      if (currentMonth < 0) {
        currentMonth = 11;
        currentYear--;
      }
      renderCalendar(currentMonth, currentYear);
    });

    document.getElementById("nextBtn").addEventListener("click", function() {
      currentMonth++;
      if (currentMonth > 11) {
        currentMonth = 0;
        currentYear++;
      }
      renderCalendar(currentMonth, currentYear);
    });

    function renderCalendar(month, year) {
      var today = new Date();
      var currentMonth = today.getMonth();
      var currentYear = today.getFullYear();

      var firstDay = new Date(year, month, 1).getDay();
      var daysInMonth = new Date(year, month + 1, 0).getDate();

      var calendarTable = document.getElementById("calendarTable");
      var calendarBody = calendarTable.getElementsByTagName("tbody")[0];
      calendarBody.innerHTML = "";

      document.getElementById("monthYear").innerHTML = getMonthName(month) + " " + year;

      var date = 1;
      for (var i = 0; i < 6; i++) {
        var row = calendarBody.insertRow();
        for (var j = 0; j < 7; j++) {
          if (i === 0 && j < firstDay) {
            var cell = row.insertCell();
          } else if (date > daysInMonth) {
            break;
          } else {
            var cell = row.insertCell();
            cell.innerHTML = date;
            if (month === currentMonth && year === currentYear && date === today.getDate()) {
              cell.classList.add("current-day");
            }
            cell.addEventListener("click", function() {
              if (selectedDate) {
                selectedDate.classList.remove("selected-day");
              }
              this.classList.add("selected-day");
              selectedDate = this;
            });
            date++;
          }
        }
      }
    }

    function getMonthName(month) {
      var monthNames = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
      return monthNames[month];
    }
  </script>

</body>
</html>