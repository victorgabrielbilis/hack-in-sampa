<?php
  require_once("../util/head.php");
  require_once("../util/footer.php");
  require_once("../util/scripts.php");
  require_once("../util/menu.php");
?>

<!DOCTYPE html>
<html lang="en">
  <?php head("../");?>
<body>
  <?php menu("../");?>
  <div class="row">
    <br>
      <form class="col s12">
        <div class="row center">
          <div class="input-field col s12">
            <i class="material-icons prefix">search</i>
            <input id="icon_prefix" type="text" class="validate">
            <label for="icon_prefix">Pesquisar</label>
          </div>
        </div>
      </form>
      <br>
    </div>

  <ul class="collapsible popout">
    <li>
      <div class="collapsible-header" onClick="document.getElementById('container3').style.visibility ='visible';">Vereador</div>
<div class="collapsible-body"><span>

  <div class="row">
      <div class="input-field col s6">
      <div id="container3">

        <div class="section">
      <script type="text/javascript">
            // Make monochrome colors
            var pieColors = (function () {
              var colors = ["#d50000","#00c853"],
                base = Highcharts.getOptions().colors[0],
                i;

              for (i = 0; i < 10; i += 1) {
                // Start out with a darkened base color (negative brighten), and end
                // up with a much brighter color
                colors.push(Highcharts.Color(base).brighten((i - 3) / 7).get());
              }
              return colors;
            }());

            // Build the chart
            Highcharts.chart('container3', {
              chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
              },
              title: {
                text: 'Browser market shares at a specific website, 2014'
              },
              tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
              },
              plotOptions: {
                pie: {
                  allowPointSelect: true,
                  cursor: 'pointer',
                  colors: pieColors,
                  dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b><br>{point.percentage:.1f} %',
                    distance: -50,
                    filter: {
                      property: 'percentage',
                      operator: '>',
                      value: 4
                    }
                  }
                }
              },
              series: [{
                name: 'Saldo Total',
                data: [
                  { name: 'Débitos', y: 61.41 },
                  { name: 'Créditos', y: 11.84 },
                ]
              }]
            });

      </script>
    </div>
    </div>
  </div>

  <div class="input-field col s6">
  <select>
  <option value="" disabled selected></option>
  <option value="1">Option 1</option>
  <option value="2">Option 2</option>
  <option value="3">Option 3</option>
  </select>
  <label>Item</label>
  </div>

  </div>
  </span>
</div>
    </li>
  </ul>

  <?php footer();?>
  <?php scripts("../");?>
  </body>
</html>
