// Pie Chart
new Chart(document.getElementById('pieChart'), {
    type: 'pie',
    data: {
        labels: ['Recyclable', 'Compostable', 'Non-Recyclable'],
        datasets: [{
            data: [60, 20, 20],
            backgroundColor: ['#63BD73', '#F5B66F', '#FF4B4B'],
            borderColor: '#fff', borderWidth: 3
        }]
    },
    options: {
        responsive: true, maintainAspectRatio: true,
        plugins: { legend: { display: false } }
    }
});

// Bar Chart
new Chart(document.getElementById('barChart'), {
    type: 'bar',
    data: {
        labels: ['6:00 AM', '9:00 AM', '12:00 PM', '3:00 PM', '6:00 PM', '9:00 PM'],
        datasets: [
            { label: 'Recyclable',     data: [1, 2, 10, 11, 13, 9],  backgroundColor: '#63BD73' },
            { label: 'Non-Recyclable', data: [0, 1,  7,  9, 13, 12], backgroundColor: '#FF4B4B' },
            { label: 'Compostable',    data: [0, 0,  7,  6,  8,  4], backgroundColor: '#F5B66F' }
        ]
    },
    options: {
        responsive: true, maintainAspectRatio: false,
        scales: {
            x: { grid: { display: false }, ticks: { font: { size: 11 } } },
            y: { beginAtZero: true, max: 15, ticks: { stepSize: 5 } }
        },
        plugins: {
            legend: { position: 'bottom', labels: { boxWidth: 12, font: { size: 12 }, padding: 10 } }
        }
    }
});

// Line Chart — legend hidden, using custom HTML legend below
new Chart(document.getElementById('lineChart'), {
    type: 'line',
    data: {
        labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
        datasets: [
            {
                label: 'Recyclable',
                data: [13, 13, 13, 15, 13, 17, 19],
                borderColor: '#63BD73', pointBackgroundColor: '#63BD73',
                pointBorderColor: '#63BD73', pointRadius: 5,
                borderWidth: 2, tension: 0.4, fill: false
            },
            {
                label: 'Non-Recyclable',
                data: [5, 6, 5, 6, 5, 8, 4],
                borderColor: '#FF4B4B', pointBackgroundColor: '#FF4B4B',
                pointBorderColor: '#FF4B4B', pointRadius: 5,
                borderWidth: 2, tension: 0.4, fill: false
            },
            {
                label: 'Compostable',
                data: [7, 10, 8, 11, 9, 9, 12],
                borderColor: '#F5B66F', pointBackgroundColor: '#F5B66F',
                pointBorderColor: '#F5B66F', pointRadius: 5,
                borderWidth: 2, tension: 0.4, fill: false
            }
        ]
    },
    options: {
        responsive: true, maintainAspectRatio: false,
        interaction: { mode: 'index', intersect: false },
        scales: {
            x: { grid: { display: false }, ticks: { font: { size: 14 }, color: '#222121' } },
            y: { beginAtZero: true, max: 20, ticks: { stepSize: 5, font: { size: 13 }, color: '#222121' }, grid: { color: 'rgba(0,0,0,0.06)' } }
        },
        plugins: {
            legend: { display: false }
        }
    }
});