const mysql = require('mysql');

// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Create a MySQL connection
const connection = mysql.createConnection({
  host: 'localhost', // Replace with your database host
  user: 'root', // Replace with your database username
  password: '', // Replace with your database password
  database: 'sd_208' // Replace with your database name
});

// Fetch data from the database
const fetchData = () => {
  return new Promise((resolve, reject) => {
    connection.query('SELECT gender, count(*) as count FROM users GROUP BY gender', (error, results) => {
      if (error) {
        reject(error);
      } else {
        const data = {
          males: 0,
          females: 0
        };
        results.forEach(row => {
          if (row.gender === 'male') {
            data.males = row.count;
          } else if (row.gender === 'female') {
            data.females = row.count;
          }
        });
        resolve(data);
      }
    });
  });
};

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
fetchData().then(data => {
  var myPieChart = new Chart(ctx, {
    type: 'pie',
    data: {
      labels: ["Males", "Females"],
      datasets: [{
        data: [data.males, data.females],
        backgroundColor: ['#007bff', '#dc3545'],
      }],
    },
    options: {
      responsive: true,
    }
  });
});

// Connect to the database
connection.connect((error) => {
  if (error) {
    console.error('Error connecting to the database:', error);
  } else {
    console.log('Connected to the database.');
  }
});