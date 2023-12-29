$(function () {

    // =====================================
    // Revenue Updates
    // =====================================
    var options = {
        series: [
            {
                name: "Footware",
                data: [1.5, 2.7, 2.2, 3.6, 1.5],
            },
            {
                name: "Fashionware",
                data: [-2.8, -1.1, -2.5, -1.5, -1.2],
            },
        ],
        chart: {
            toolbar: {
                show: false,
            },
            type: "bar",
            fontFamily: "Plus Jakarta Sans,sans-serif",
            foreColor: "#adb0bb",
            height: 270,
            stacked: true,
            offsetX: -20
        },
        colors: ["var(--bs-primary)", "var(--bs-secondary)"],
        plotOptions: {
            bar: {
                horizontal: false,
                barHeight: "70%",
                columnWidth: "20%",
                borderRadius: [5],
                borderRadiusApplication: 'end',
                borderRadiusWhenStacked: 'all'
            },
        },
        dataLabels: {
            enabled: false,
        },
        legend: {
            show: false,
        },
        grid: {
            show: false,
        },
        yaxis: {
            min: -4,
            max: 4,
            tickAmount: 4,
        },
        xaxis: {
            categories: [
                "Jan",
                "Fab",
                "Mar",
                "Apr",
                "May",
            ],
            show: false,
            axisTicks: {
                show: false,
            },
            axisBorder: {
                show: false,
            }
        },
        tooltip: {
            theme: "dark",
        },
    };

    var chart = new ApexCharts(document.querySelector("#revenue-chart"), options);
    chart.render();
});
