// Bar chart with custom tooltip
const dataBarCustomTooltip = {
    type: 'bar',
    data: {
      labels: ['Friday', 'Saturday ', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday'],
      datasets: [
        {
          label: 'Traffic',
          data: [30, 15, 62, 65, 61, 65, 40],
        },
      ],
    },
  };
  
  const optionsBarCustomTooltip = {
    options: {
      plugins: {
        tooltip: {
          callbacks: {
             label: function (context) {
              let label = context.dataset.label || '';
              label = `${label}: ${context.formattedValue} users`;
              return label;
            },
          },
         },
       },
    },
  };
  
  new mdb.Chart(
    document.getElementById('bar-chart-custom-tooltip'),
    dataBarCustomTooltip,
    optionsBarCustomTooltip);
  