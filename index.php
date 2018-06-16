<?php
  require_once("util/head.php");
  require_once("util/footer.php");
  require_once("util/scripts.php");
  require_once("util/menu.php");
?>

<!DOCTYPE html>
<html lang="en">
  <?php head("");?>
<body>
  <?php menu("#");?>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <h1 class="header center black-text">Câmara gasto mensal</h1>
      <div class="row center">
        <h5 class="header col s12 light">Amostra do gasto mensal da câmara de São Paulo</h5>
      </div>

      <br><br>

    </div>
  </div>


  <div id="container">
    <div class="section">
      <script>
                  Highcharts.chart('container', {
                    chart: {
                      type: 'line'
                    },
                    title: {
                      text: 'Monthly Average Temperature'
                    },
                    subtitle: {
                      text: 'Source: WorldClimate.com'
                    },
                    xAxis: {
                      categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                    },
                    yAxis: {
                      title: {
                        text: 'Temperature (°C)'
                      }
                    },
                    plotOptions: {
                      line: {
                        dataLabels: {
                          enabled: true
                        },
                        enableMouseTracking: false
                      }
                    },
                    series: [{
                      name: 'Tokyo',
                      data: [7.0, 6.9, 9.5, 14.5, 18.4, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
                    }, {
                      name: 'London',
                      data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
                    }]
                  });

                        </script>

    </div>
    <br><br>
  </div>
  <br>
  <br>
  <div class="container">
    <br><br>
    <h1 class="header center black-text">Empresas</h1>
      <h5 class="header center light">Top 10</h5>
    </div>
      <div id="container2">
                            <table id="datatable">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Jane</th>
                          <th>John</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th>Apples</th>
                          <td>3</td>
                          <td>4</td>
                        </tr>
                        <tr>
                          <th>Pears</th>
                          <td>2</td>
                          <td>0</td>
                        </tr>
                        <tr>
                          <th>Plums</th>
                          <td>5</td>
                          <td>11</td>
                        </tr>
                        <tr>
                          <th>Bananas</th>
                          <td>1</td>
                          <td>1</td>
                        </tr>
                        <tr>
                          <th>Oranges</th>
                          <td>2</td>
                          <td>4</td>
                        </tr>
                      </tbody>
                    </table>
        <div class="section">
          <script>

                  Highcharts.chart('container2', {
                    data: {
                      table: 'datatable'
                    },
                    chart: {
                      type: 'column'
                    },
                    title: {
                      text: 'Data extracted from a HTML table in the page'
                    },
                    yAxis: {
                      allowDecimals: false,
                      title: {
                        text: 'Units'
                      }
                    },
                    tooltip: {
                      formatter: function () {
                        return '<b>' + this.series.name + '</b><br/>' +
                          this.point.y + ' ' + this.point.name.toLowerCase();
                      }
                    }
                  });

                  </script>
        </div>
    <br><br>

  </div>
  <?php footer();?>
  <?php scripts("");?>
  </body>
</html>
