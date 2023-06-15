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
    .range-day {
      background-color: #c0d9ff;
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
    var selectedStartDate = null;
    var selectedEndDate = null;
    var changeMonth = false;
    renderCalendar(currentMonth, currentYear);

    document.getElementById("prevBtn").addEventListener("click", function() {
      currentMonth--;
      if (currentMonth < 0) {
        currentMonth = 11;
        currentYear--;
      }
      changeMonth = true;
      renderCalendar(currentMonth, currentYear);
      changeMonth = false;
    });

    document.getElementById("nextBtn").addEventListener("click", function() {
      currentMonth++;
      if (currentMonth > 11) {
        currentMonth = 0;
        currentYear++;
      }
      changeMonth = true;
      renderCalendar(currentMonth, currentYear);
      changeMonth = false;
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
              if (!selectedStartDate) {
                // Select start date
                selectedStartDate = {'day':parseInt(this.innerHTML),
                                    'month':month,
                                    'cell':this};
                // selectedStartDate = this;
                this.classList.add("selected-day");
              } else if (!selectedEndDate) {
                // Select end date
                selectedEndDate = {'day':parseInt(this.innerHTML),
                                    'month':month,
                                    'cell':this};
                this.classList.add("selected-day");

                
              } else {
                // Limpiar un rango previo seleccionado
                if (!changeMonth) {
                  clearRangeSelection();
                }
                

                // Seleccionar una nueva fecha
                selectedStartDate = {'day':parseInt(this.innerHTML),
                                    'month':month,
                                    'cell':this};
              }
              // Resaltar rago de fechas
              highlightDateRange();
            });

            date++;
          }
        }
      }
      highlightDateRange();
    }

    function getMonthName(month) {
      var monthNames = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
      return monthNames[month];
    }

    function clearRangeSelection() {
      var rangeDays = document.querySelectorAll(".range-day");
      rangeDays.forEach(function(day) {
        day.classList.remove("range-day");
      });

      selectedStartDate.cell.classList.remove("selected-day");
      selectedEndDate.cell.classList.remove("selected-day");

      selectedStartDate = null;
      selectedEndDate = null;
    }

    function highlightDateRange() {
      console.log("--------------------");
      console.log(selectedEndDate);
      console.log(selectedStartDate);
      if (selectedStartDate && selectedEndDate) {
        //verifica los dias de un mes
        var daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();
        var rangeDays = document.querySelectorAll(".range-day");
        
        var startDate = selectedStartDate.day;
        var monthOfStartDay = selectedStartDate.month
        var endDate = selectedEndDate.day;
        var monthOfEndDay = selectedEndDate.month

        var calendarTable = document.getElementById("calendarTable");
        var calendarRows = calendarTable.getElementsByTagName("tr");
       
        var isRangeSelected = false;
        for (var i = 0; i < calendarRows.length; i++) {
          var cells = calendarRows[i].getElementsByTagName("td");
          for (var j = 0; j < cells.length; j++) {
            var cell = cells[j];
            var day = parseInt(cell.innerHTML);
            if (day >= startDate && currentMonth == monthOfStartDay) {
              if ((currentMonth != monthOfEndDay) || (day <= endDate) ) {
                cell.classList.add("range-day");
              }
            }
            if (day <= endDate && currentMonth == monthOfEndDay) {
              if ((currentMonth != monthOfStartDay) || (day >= startDate) ) {
                cell.classList.add("range-day");
              }
            }
            if((currentMonth > monthOfStartDay && currentMonth < monthOfEndDay) ){
              cell.classList.add("range-day");
            }
            // if ((day >= startDate && day <= endDate && currentMonth == monthOfStartDay) 
            //     || (day >= endDate && day <= startDate && currentMonth == monthOfEndDay)) {
            //   cell.classList.add("range-day");
            // }
          }
        }
      }
      
    }
  </script>

</body>
</html>