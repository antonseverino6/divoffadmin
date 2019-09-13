<script>
var ctx = document.getElementById("pieChartAge");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["20-30","31-40","41-50","51-60"],
    datasets: [{
      data: [<?php $info->age_count(20,30); ?>, <?php $info->age_count(31,40); ?>, <?php $info->age_count(41,50); ?>, <?php $info->age_count(51,60); ?>],
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