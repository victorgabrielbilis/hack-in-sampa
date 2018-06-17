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
          <h5>Veja os débitos e os créditos dos vereadores</h5>
        </div>
      </form>
      <br>
    </div>

  <ul class="collapsible popout">
<?php  
  
     $sql ="select distinct(vereador) AS vereador from creditoLiderancaVereador";
      
      $select = mysqli_query($database, $sql);
      
      $i = 0;
      
      while ($rs = mysqli_fetch_array($select)){
        
        $vereador = $rs["vereador"];
        $debito = 0;
        $res_vereador = mysqli_query($database,"SELECT SUM(valor) AS total FROM debitovereador WHERE vereador=\"$vereador\" and mes=5");

        while($linha = mysqli_fetch_assoc($res_vereador))
        {
            $debito = $linha["total"];
        }



    echo "<li>
      <div class=\"collapsible-header\" onClick=\"document.getElementById('container".$i."').style.visibility ='visible';\">".$rs["vereador"]."</div>
<div class=\"collapsible-body\"><span>

  <div class=\"row\">
      <div class=\"input-field col s12\">
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
                text: 'Débito e crédito do vereador:'
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
                  { name: 'Débitos', y: ".(($debito * 100) / 24000)." },
                  { name: 'Créditos', y: ". (((24000 - $debito) * 100) / 24000) ." },
                ]
              }]
            });
      </script>
    </div>
    </div>
  </div>
  </div>
  </span>
</div>
    </li>
    ";
    
    $i++;
  
  }
?>
     
  </ul>

  <?php footer();?>
  <?php scripts("../");?>
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
            //var elements = "<select name=\"fornecedor\" id=\"fornecedor\"><br>";
            while(i < data.length)
            {
                elemento = data[i].fornecedor;
                elements += "<option value=\""+elemento+"\">"+elemento+"</option><br>";
                i++;
            }
            //elements += "</select><br>";
            
            fornecedor_selecionado = data[0].fornecedor;
            
            console.log(elements);

            //document.getElementById('select_fornecedor').innerHTML = elements;
            document.getElementById('media_vereadores'+).innerHTML = elements;
            //document.getElementById('select_fornecedor').appendChild(select);
            
            
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
  </body>
</html>
