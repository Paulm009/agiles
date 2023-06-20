<!DOCTYPE html>
<html>
<head>
  <title>Calendario</title>
  <link href="/css/disponibilidad.css" rel="stylesheet">
</head>
<body>

  <h3>Seleccione un Rango De Fechas</h3>


  <div class="row">
    <div class="col px-3 bg-dark ">
      <div class="text-warning d-flex justify-content-center align-items-center py-3 border-bottom border-warning">
        <button id="prevBtn" class="btn btn-outline-warning">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
          </svg>
        </button>
        <span id="monthYear" class="px-4"></span>
        <button id="nextBtn" class="btn btn-outline-warning">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
            </svg>
        </button>
      </div>
      <table id="calendarTable" class=" table table-dark  mb-0">
        <thead class="">
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
    </div>
    <div class="col ps-2 days-selected d-flex justify-content-center align-items-center">
      <div class="">
        <div class="row start-day">
          <div class="tittle">
            <h2 class="calendar-date-title">Fecha Desde:</h2>
          </div>
          <div class="date-data mb-2">
            <h3 id="s-day" class="mb-0">**</h3>
            <p id="s-day-week" class="mb-0">*****</p>
            <p id="s-month-year" class="mb-0">**********</p>
          </div>
          
        </div>
        <div class="row end-day">
          <div class="tittle">
            <h2 class="calendar-date-title">Fecha Hasta:</h2>
          </div>
          <div class="date-data mb-2">
            <h3 id="e-day" class="mb-0">**</h3>
            <p id="e-day-week" class="mb-0">*****</p>
            <p id="e-month-year" class="mb-0">**********</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  

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
      today.setHours(0,0,0,0);
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
            cell.innerHTML = ".";
            cell.addEventListener("click", function() {
            document.getElementById("prevBtn").click();
            });
          } else if (date > daysInMonth) {
            var cell = row.insertCell();
            cell.classList.add("block-day");
            cell.innerHTML = ".";
            cell.addEventListener("click", function() {
            document.getElementById("nextBtn").click();
            });
          } else {
            var cell = row.insertCell();
            cell.innerHTML = date;
            if (month === currentMonth && year === currentYear && date === today.getDate()) {
              cell.classList.add("current-day");
            }
            console.log(year)
            var dateodMonth = new Date(year, month, date);
            console.log(dateodMonth.getTime()+ ">="+ today.getTime());
            if( year >= currentYear && dateodMonth.getTime() >= today.getTime()){
              cell.addEventListener("click", function() {
              if (!selectedStartDate) {
                // Select start date
                console.log(this)
                this.classList.add("selected-day");
                selectedStartDate = {'day':parseInt(this.innerHTML),
                                    'month':month,
                                    'year' :year,
                                    'cell':this};
                showDatesSelected()
                // selectedStartDate = this;
                
              } else if (!selectedEndDate) {
                // Select end date
                selectedEndDate = {'day':parseInt(this.innerHTML),
                                    'month':month,
                                    'year' :year,
                                    'cell':this};
                this.classList.add("selected-day");
                if(selectedEndDate.month < selectedStartDate.month || (selectedEndDate.month == selectedStartDate.month && selectedEndDate.day < selectedStartDate.day)){
                  var temp = selectedEndDate;
                  selectedEndDate = selectedStartDate;
                  selectedStartDate = temp;
                }
                showDatesSelected();
                
              } else {
                // Limpiar un rango previo seleccionado
                if (!changeMonth) {
                  clearRangeSelection();
                }
                

                // Seleccionar una nueva fecha
                showDatesSelected();
                this.classList.add("selected-day");
                selectedStartDate = {'day':parseInt(this.innerHTML),
                                    'month':month,
                                    'year' :year,
                                    'cell':this};
              }
              // Resaltar rago de fechas
              highlightDateRange();
            });
            } else {
              cell.classList.add("block-day");
            }
            

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

    function getDayName(day) {
      var monthNames = ["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado"];
      return monthNames[day];
    }

    function showDatesSelected(){
      var daySelected = "**";
      var dayWeekSelected = "*****";
      var monthYearSelected = "**********"; 
      var day = 0;
      var month = 0;
      var year = 0;
      var dateSelected = null;
      if(selectedStartDate){
        // in this place the data of the selected start date is replaced
        day = selectedStartDate.day;
        month = selectedStartDate.month;
        year = selectedStartDate.year;
        dateSelected = new Date(year,month,day);
        //replace on html.. Fecha Desde
        daySelected = document.getElementById("s-day");
        daySelected.innerHTML = day;
        dayWeekSelected = document.getElementById("s-day-week");
        dayWeekSelected.innerHTML = getDayName(dateSelected.getDay());
        monthYearSelected = document.getElementById("s-month-year");
        monthYearSelected.innerHTML = getMonthName(month)+"/"+year;
      }
      if(selectedEndDate){
        // in this place the data of the selected end date is replaced
        day = selectedEndDate.day;
        month = selectedEndDate.month;
        year = selectedEndDate.year;
        dateSelected = new Date(year,month,day);
        //replace on html.. Fecha Hasta
        daySelected = document.getElementById("e-day");
        daySelected.innerHTML = day;
        dayWeekSelected = document.getElementById("e-day-week");
        dayWeekSelected.innerHTML = getDayName(dateSelected.getDay());
        monthYearSelected = document.getElementById("e-month-year");
        monthYearSelected.innerHTML = getMonthName(month)+"/"+year;
      }
    
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
            if ((day >= startDate && currentMonth == monthOfStartDay && (currentMonth != monthOfEndDay || day <= endDate)) ||
              (day <= endDate && currentMonth == monthOfEndDay && (currentMonth != monthOfStartDay || day >= startDate)) ||
              (currentMonth > monthOfStartDay && currentMonth < monthOfEndDay)) {
            cell.classList.add("range-day");
          }
          }
        }
      }
      
    }
  </script>

</body>
</html>