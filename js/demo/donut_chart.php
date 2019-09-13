
<?php // $other_info = new Other_info(); ?>

<script type="text/javascript">

// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("pieChartSDO");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["DSDS","CID","SGOD"],
    datasets: [{
      data: [<?php echo $other_info->employee_type_count('DSDS'); ?>, <?php echo $other_info->employee_type_count('CID'); ?>, <?php echo $other_info->employee_type_count('SGOD'); ?>],
      backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});

// Pie Chart Example
var ctx = document.getElementById("pieChartTeacher");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Kinder","Elementary","JHS","SHS"],
    datasets: [{
      data: [<?php echo $other_info->employee_type_count('Kinder'); ?>, <?php echo $other_info->employee_type_count('Elementary'); ?>, <?php echo $other_info->employee_type_count('Junior High School'); ?>, <?php echo $other_info->employee_type_count('Senior High School'); ?>],
      backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#ffbb33'],
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf', '#FF8800'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});
	

</script>