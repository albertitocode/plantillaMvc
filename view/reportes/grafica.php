<!DOCTYPE html>
<html lang="en">
<!-- <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>

 -->
<div class="mt-5">
    <h3 class="display-4">Reporte</h3>
</div>
 <div class="content">


 <div class="card" style="width: 50rem;">
      <div class="card-body">
        <canvas id="chartPrincipal"></canvas>
        <script>
         const ctx = document.getElementById('chartPrincipal').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'bar', 
    data: {
        labels: labels,
        datasets: [{
            label: 'Valores por Fecha',
            data: dataValues,
            borderColor: 'rgba(75, 192, 192, 1)',
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            fill: true
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
          if(document.getElementById('formreportAcci')){
            id_formulario =document.getElementById('formreportAcci');
          }
          document.getElementById(id_formulario).addEventListener('submit', function(event) {
    event.preventDefault(); // Evitar que el formulario se envíe

    // Obtener las fechas del formulario
    const startDate = new Date(document.getElementById('startDate').value);
    const endDate = new Date(document.getElementById('endDate').value);
    
    // Obtener la frecuencia seleccionada
    const frequency = document.querySelector('input[name="frequency"]:checked').value;

    // Limpiar los arrays
    labels.length = 0;
    dataValues.length = 0;

    let currentDate = startDate;

    // Generar fechas intermedias según la frecuencia seleccionada
    while (currentDate <= endDate) {
        labels.push(currentDate.toISOString().split('T')[0]); // Formato YYYY-MM-DD
        dataValues.push(Math.floor(Math.random() * 100)); // Generar un valor aleatorio para cada fecha

        if (frequency === 'day') {
            currentDate.setDate(currentDate.getDate() + 1); // Sumar un día
        } else if (frequency === 'month') {
            currentDate.setMonth(currentDate.getMonth() + 1); // Sumar un mes
        } else if (frequency === 'year') {
            currentDate.setFullYear(currentDate.getFullYear() + 1); // Sumar un año
        }
    }

    // Actualizar el gráfico
    myChart.update();
    
    // Limpiar el formulario
    this.reset();
});
        </script>

      </div>
    </div>
 </div>
</html>