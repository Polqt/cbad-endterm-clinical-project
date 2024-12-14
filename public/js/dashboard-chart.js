function initializeDiseaseDistributionChart(diagnoses, counts) {
    const ctx = document.getElementById('diseaseDistributionChart').getContext('2d');
    const colorPalette = [
        'rgba(54, 162, 235, 0.7)',
        'rgba(255, 99, 132, 0.7)',
        'rgba(255, 206, 86, 0.7)',
        'rgba(75, 192, 192, 0.7)',
        'rgba(153, 102, 255, 0.7)',
        'rgba(255, 159, 64, 0.7)'
    ];

    new Chart(ctx, {
        type: 'pie', // Changed from bar to pie
        data: {
            labels: diagnoses,
            datasets: [{
                label: 'Active Patients by Diagnosis',
                data: counts,
                backgroundColor: colorPalette,
                borderColor: colorPalette.map(color => color.replace('0.7', '1')),
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'right',
                    labels: {
                        boxWidth: 20,
                        padding: 10
                    }
                },
                title: {
                    display: true,
                    text: 'Active Patients by Diagnosis',
                    font: {
                        size: 16
                    }
                }
            }
        }
    });
}