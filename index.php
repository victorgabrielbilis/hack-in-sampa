<?php

  require_once("util/head.php");
  require_once("util/footer.php");
  require_once("util/scripts.php");
  require_once("util/menu.php");

    require_once("functions.php");
    $database = connect_DB();

session_start();
 

$itens=null;
$botao="validar";

?>

<!DOCTYPE html>
<html lang="en">
  <?php head("");?>
<body>
  <?php menu("");?>
  <div class="section no-pad-bot" id="index-banner">
    <form mrthod="post">
    <div class="container">
      <br><br>

      <div class="row">
      <div class="input-field col s6">
      <select>
      <option value="" disabled selected></option>
      <option value="1">Option 1</option>
      <option value="2">Option 2</option>
      <option value="3">Option 3</option>
      </select>
      <label>Estado</label>
      </div>
      <div class="input-field col s6">
      <select>
      <option value="" disabled selected></option>
      <option value="1">Option 1</option>
      <option value="2">Option 2</option>
      <option value="3">Option 3</option>
      </select>
      <label>Município</label>
      </div>
    </div>
    <div class="row">
    <div class="input-field col s6">
    <select>
    <option value="" disabled selected></option>
    <option value="1">Option 1</option>
    <option value="2">Option 2</option>
    <option value="3">Option 3</option>
    </select>
    <label>Casa</label>
    </div>
    <div class="input-field col s6">
    <select name="itens">
    <option value="0"> Selecione um item: </option>
    <?php 
        
        $sql="select distinct(despesa) AS item from debitovereador;";
        
        $select=mysqli_query($database,$sql);
        
        while($rs=mysqli_fetch_array($select))
        {
       
        echo "<option value=".$rs['item'].">".$rs['item']."</option>"; 

        
        
        }
    ?>
    </select>
    <label>Item</label>
    </div>
  </div>
  <div class="row">
  <div class="input-field col s6">
  <select>
  <option value="" disabled selected></option>
  <option value="1">Option 1</option>
  <option value="2">Option 2</option>
  <option value="3">Option 3</option>
  </select>
  <label>Fornecedor</label>
  </div>
  <div class="input-field col s6">
          <input id="last_name" type="text" class="validate">
          <label for="last_name">Valor R$</label>
        </div>
  </div>
    <a class="waves-effect waves-light btn">Validar</a>
      <br><br>

    </div>
    </form>
  </div>

  <div class="row">
    <h5 class="col s12 black-text">Padrão:</h5>
  </div>
    <div class="row">
      <h5 class="col s12 green-text">Aprovado</h5>
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
  <?php footer();?>
  <?php scripts("");?>
  </body>
</html>
