<?php
  require_once("../util/head.php");
  require_once("../util/footer.php");
  require_once("../util/scripts.php");
  require_once("../util/menu.php");

  require_once("../functions.php");
  $database = connect_DB();

session_start();

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
<?php  
     $sql ="select distinct(vereador) AS vereador from creditoliderancavereador;"; 
      
      $select = mysqli_query($database, $sql);
      
      $i = 0;
      
      while ($rs=mysqli_fetch_array($select)){
        
    
    echo "<li>
      <div class=\"collapsible-header\" onClick=\"document.getElementById('container".$i."').style.visibility ='visible';\">".$rs["vereador"]."</div>
<div class=\"collapsible-body\"><span>

  <div class=\"row\">
      <div class=\"input-field col s6\">
      <div id=\"container".$i."\">

        <div class=\"section\">
      <script type=\"text/javascript\">
            // Make monochrome colors
            var pieColors = (function () {
              var colors = [\"#d50000\",\"#00c853\"],
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
            Highcharts.chart('container".$i."', {
              chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
              },
              title: {
                text: 'Débito e crédito do deputado:'
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

  <div class=\"input-field col s6\">
  <select name=\"itens\">
  <option value=\"0\"> Selecione um item: </option>";
          $i++;
      
         
        
        $sql2="select distinct(despesa) AS item from debitovereador;";
        
        $select2=mysqli_query($database,$sql2);
        
        while($rs2=mysqli_fetch_array($select2))
        {
       
        echo "<option value=".$rs2['item'].">".$rs2['item']."</option>"; 

        
        
        }
      
    echo"
  </select>
  <label>Item</label>
  </div>

  </div>
  </span>
</div>
    </li>";}
?>
     
  </ul>

  <?php footer();?>
  <?php scripts("../");?>
  </body>
</html>
