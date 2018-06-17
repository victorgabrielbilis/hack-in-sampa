<?php

  require_once("util/head.php");
  require_once("util/footer.php");
  require_once("util/scripts.php");
  require_once("util/menu.php");

    require_once("functions.php");
    $database = @connect_DB();

session_start();


$itens=null;
$botao="validar";

?>

<!DOCTYPE html>
<html lang="en">
  <?php head("");?>
<body>
  <?php menu("");?>
  <div class="row">
    
    <div class="row center">
    <img style="margin-top:-750" class="responsive-img" src="util/img/logo_png.png">
  </div>
  </div>
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
    <select name="itens" id="itens" onChange="changed();" class="materialSelect">
    <option value="0"> Selecione um item: </option>
    <?php

        $sql="select distinct(despesa) AS item from debitovereador;";

        $select=mysqli_query($database,$sql);

        while($rs=mysqli_fetch_array($select))
        {
       
        echo "<option value=\"".$rs['item']."\">".$rs['item']."</option>"; 



        }
    ?>
    </select>
    <label>Item</label>
    </div>
  </div>
  <div class="row">
  <div class="input-field col s6">
  <div id="select_fornecedor">
    <select id="fornecedor">
    <option value="" disabled selected></option>
    <option value="1">Option 1</option>
    <option value="2">Option 2</option>
    <option value="3">Option 3</option>
    </select>
  </div>
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
  
  <script>

    function changed()
    {
      //alert();
      var iten = document.getElementById('itens').value;
      console.log("http://localhost/hack-in-sampa/api/v1/info/getFornecedor.php?despesa="+iten);
      
      $.get("http://localhost/hack-in-sampa/api/v1/info/getFornecedor.php?despesa="+iten, function(data, status){
            //          alert("Data: " + data + "\nStatus: " + status);
            console.log(data);
            data = JSON.parse(data);

            var html = "";
            var i = 0;
            
            var elements = "";
            while(i < data.lenght)
            {
                elemento = data[i].fornecedor;
                elemento = data[i].fornecedor;
                elements += "<option value=\""++"\">"+elemento+"</option>";
                i++;
            }

            
      });
      /*
      $(document).ready(function() {
            $('select').material_select();
         });
         */
      //alert('chamei');  
      /*
       $('.materialSelect').material_select();

      // setup listener for custom event to re-initialize on change
      $('.materialSelect').on('contentChanged', function() {
        $(this).material_select();
      });   
var $newOpt = $("<option>").attr("value",1).text("fdsafdsa")
    $("#fornecedor").append($newOpt);
  */
/*
        var x = document.getElementById("fornecedor");
        var option = document.createElement("option");
        option.text = "Kiwi";
        x.add(option);
        console.log('workou');
        
  */      
    }
  </script>

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
                      categories: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez']
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
                      data: [
                      <?php

                          $site = file_get_contents("http://localhost/hack-in-sampa/api/v1/despesas/getAllCostsMonths.php");
                          $json = json_decode($site, true);
                          $i = 0;
                          $contents = "";
                          while($i < count($json))
                          {
                            $contents .= $json[$i]['total'].",";
                            $i++;
                          }
                          
                          $contents = substr($contents, 0 , strlen($contents)-1);
                          echo $contents."]";
                      ?>

                      //data: [7.0, 6.9, 9.5, 14.5, 18.4, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
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
