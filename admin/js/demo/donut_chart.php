
<?php // $other_info = new Other_info(); ?>

<script type="text/javascript">

// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("pieChartEmployee");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["TEACHING","NON-TEACHING","SDO BASED PERSONNEL"],
    datasets: [{
      data: [<?php echo $other_info->employee_count('TEACHING'); ?>, <?php echo $other_info->employee_count('NON-TEACHING'); ?>, <?php echo $other_info->employee_count('SDO BASED PERSONNEL'); ?>],
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
// var ctx = document.getElementById("pieChartTeacher");
// var myPieChart = new Chart(ctx, {
//   type: 'doughnut',
//   data: {
//     labels: ["Kinder","Elementary","JHS","SHS"],
//     datasets: [{
//       data: [<?php // echo $other_info->employee_type_count('Kinder'); ?>, <?php // echo $other_info->employee_type_count('Elementary'); ?>, <?php // echo $other_info->employee_type_count('Junior High School'); ?>, <?php // echo $other_info->employee_type_count('Senior High School'); ?>],
//       backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#ffbb33'],
//       hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf', '#FF8800'],
//       hoverBorderColor: "rgba(234, 236, 244, 1)",
//     }],
//   },
//   options: {
//     maintainAspectRatio: false,
//     tooltips: {
//       backgroundColor: "rgb(255,255,255)",
//       bodyFontColor: "#858796",
//       borderColor: '#dddfeb',
//       borderWidth: 1,
//       xPadding: 15,
//       yPadding: 15,
//       displayColors: false,
//       caretPadding: 10,
//     },
//     legend: {
//       display: false
//     },
//     cutoutPercentage: 80,
//   },
// });
	
// Pie Chart Example
var ctx = document.getElementById("pieChartLevelsCivil");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["First Level - SG 1-9","Second Level - SG 10-24","Third Level - SG 25-Up"],
    datasets: [{
      data: [<?php echo $other_info->levels_of_civil_count('First Level - SG 1-9') ?>, <?php echo $other_info->levels_of_civil_count('Second Level - SG 10-24'); ?>, <?php echo $other_info->levels_of_civil_count('Third Level - SG 25-Up'); ?>],
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
var ctx = document.getElementById("pieChartPosition");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Teacher I","Teacher II","Teacher III","Master Teacher I","Master Teacher II","Master Teacher III","Master Teacher IV"],
    datasets: [{
      data: [<?php echo $other_info->position_count('Teacher I') ?>, <?php echo $other_info->position_count('Teacher II'); ?>, <?php echo $other_info->position_count('Teacher III'); ?>,<?php echo $other_info->position_count('Master Teacher I'); ?>,<?php echo $other_info->position_count('Master Teacher II'); ?>,<?php echo $other_info->position_count('Master Teacher III'); ?>,<?php echo $other_info->position_count('Master Teacher IV'); ?>],
      backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc' , '#aa66cc', '#ffbb33', '#00C851', '#ff4444'],
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf' , '#9933CC', '#FF8800', '#007E33', '#CC0000'],
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