function myChart(id, detail, capaian, target) {
    const ctx = document.getElementById(id);


    var dataFirst = {
        label: detail,
        data: capaian,
        lineTension: 0.2,
        fill: true,
        borderColor: 'rgb(75, 192, 192)',
        tension: 0.1
    };

    var dataSecond = {
        label: "target / ambang batas ",
        data: target,
        lineTension: 0,
        fill: false,
        borderColor: 'rgb(255, 51, 51)'
    };

    var dataCapaianTarget = {
        labels: ['JAN', 'FEB', 'MAR', 'APR', 'MEI', 'JUN', 'JUL', 'AGT', 'SEP', 'OKT', 'NOV', 'DES'],
        datasets: [dataFirst, dataSecond]
    };
    const myChart = new Chart(ctx, {
        type: 'line',
        data: dataCapaianTarget,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

}