document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('capteurChart').getContext('2d');
    const capteurChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [],  // X-axis labels
            datasets: [{
                label: 'Niveau Sonore (dB)',
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                data: [], // Y-axis data points
                fill: true
            }, {
                label: 'Température (°C)',
                borderColor: 'rgba(255, 99, 132, 1)',
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                data: [], // Y-axis data points
                fill: true
            }]
        },
        options: {
            scales: {
                x: {
                    type: 'time',
                    time: {
                        unit: 'minute'
                    },
                    title: {
                        display: true,
                        text: 'Timestamp'
                    }
                },
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Values'
                    }
                }
            }
        }
    });

    function fetchData() {
        $.ajax({
            url: 'Code/app/models/capteur/updateCapteur', 
            type: 'GET',
            success: function(data) {
                const parsedData = JSON.parse(data);
                const labels = parsedData.map(item => new Date(item.timestamp));
                const soundData = parsedData.map(item => item.niveau_sonore);
                const tempData = parsedData.map(item => item.temperature);

                capteurChart.data.labels = labels;
                capteurChart.data.datasets[0].data = soundData;
                capteurChart.data.datasets[1].data = tempData;
                capteurChart.update();
            },
            error: function(error) {
                console.error('Error fetching data:', error);
            }
        });
    }

    // Fetch data initially
    fetchData();

    // Update data every minute
    setInterval(fetchData, 60000);
});
