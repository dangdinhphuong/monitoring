function  setType(){
    console.log('xin chào')
}

const ctx = document.getElementById('myChart');
new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [
            {
                label: "Potenz Hydrogen",
                backgroundColor: "rgb(255, 99, 132)",
                borderColor: "rgb(255, 99, 132)",
                data: [12, 19, 3, 5, 24, 31],
                tension: 0.3
            },
            {
                label: "Turbidity",
                backgroundColor: "rgb(205, 0, 255)",
                borderColor: "rgb(205, 0, 255)",
                data: [12, 19, 34, 5, 2, 52],
                tension: 0.3
            },
            {
                label: "Temperature",
                backgroundColor: "rgb(17, 144, 225)",
                borderColor: "rgb(17, 144, 225)",
                data: [12, 19, 3, 5, 24, 37],
                tension: 0.3
            },
            {
                label: "DO",
                backgroundColor: "rgb(129, 255, 17)",
                borderColor: "rgb(129, 255, 17)",
                data: [12, 19, 34, 5, 2, 3],
                tension: 0.3
            }
        ]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
