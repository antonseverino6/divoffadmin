<script>
var ctx = document.getElementById("pieChartAge");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["20-30","31-40","41-50","51-60"],
    datasets: [{
      data: [<?php echo $info->age_count(20,30); ?>, <?php echo $info->age_count(31,40); ?>, <?php echo $info->age_count(41,50); ?>, <?php echo $info->age_count(51,60); ?>],
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


var ctx = document.getElementById("pieChartAgeFemale");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["18-30","31-40","41-50","51-60"],
    datasets: [{
      data: [<?php echo $info->count_gender_for_age('FEMALE',18,30); ?>, <?php echo $info->count_gender_for_age('FEMALE',31,40); ?>, <?php echo $info->count_gender_for_age('FEMALE',41,50); ?>, <?php echo $info->count_gender_for_age('FEMALE',51,60); ?>],
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


var ctx = document.getElementById("pieChartAgeMale");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["18-30","31-40","41-50","51-60"],
    datasets: [{
      data: [<?php echo $info->count_gender_for_age('MALE',18,30); ?>, <?php echo $info->count_gender_for_age('MALE',31,40); ?>, <?php echo $info->count_gender_for_age('MALE',41,50); ?>, <?php echo $info->count_gender_for_age('MALE',51,60); ?>],
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