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
  <script>
    var fornecedor_selecionado = "";
    var chart1 = "";
  </script>

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
  <div class="input-field col s6" id="adicionar_elemento">
        
    <select id="select_fornecedor" class="materialSelect">
     </select>
     
   <label>Fornecedor</label>
   <!--
    <select id="fornecedor">
    <option value="" disabled selected></option>
    <option value="1">Option 1</option>
    <option value="2">Option 2</option>
    <option value="3">Option 3</option>
    </select>
    -->
    
    
    
  
  </div>
  <div class="input-field col s6">
          <input id="valor" type="text" class="validate">
          <label for="valor">Valor R$</label>
        </div>
  </div>
    <a class="waves-effect waves-light btn" onclick="validar();">Validar</a>
      <br><br>

    </div>
    </form>
  </div>
  
  <script>
    function validar()
    {
        //var item = document.getElementById('item').value;
        
        var itens = document.getElementById('itens');
        var itens_value = itens.options[itens.selectedIndex].text;
        
        /*
        var fornecedor = document.getElementById('fornecedor').value;
        var fornecedor_value = fornecedor.options[fornecedor.selectedIndex].text;
        */

        var valor = document.getElementById('valor').value;
        $.get("http://localhost/hack-in-sampa/api/v1/info/getFornecedorAverage.php?despesa="+itens_value+"&fornecedor="+fornecedor_selecionado, function(data, status){
            
            console.log(data);
            data = JSON.parse(data);
            var max = data[0].media * 1.10;
            if(parseFloat(valor) > max)
            {
              document.getElementById('res_label').innerHTML = "Reprovado";
              document.getElementById('res_label').style.color = "#ff3d00";
            }
            else
            {
              document.getElementById('res_label').innerHTML = "Aprovado";
              document.getElementById('res_label').style.color = "#00c853";
            }
            
            
            $.get("http://localhost/hack-in-sampa/api/v1/despesas/getHistoricoPrecos.php?despesa="+itens_value+"&fornecedor="+fornecedor_selecionado, function(data, status){
                      console.log(data);
                      data = JSON.parse(data);
                      //var max = data[0].media * 1.10;
                      var vetor = new Array();
                      var i = 0;
                      
                      while(i < data.length)
                      {
                        vetor[i] = parseFloat(data[i].total);
                        i++;
                      }
                    
                      chart1.series[0].setData(vetor);
                });
               


      });
    }
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
            document.getElementById('select_fornecedor').innerHTML = elements;
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

  <div class="row">
    <h5 class="col s12 black-text">Padrão:</h5>
  </div>
    <div class="row">
      <h5 id="res_label" class="col s12 ">Aprovado</h5>
    </div>

  <div id="container">

    <div class="section">
      <script>
                  chart1 = Highcharts.chart('container', {
                    chart: {
                      type: 'line'
                    },
                    title: {
                      text: 'Historico de médias'
                    },
                    subtitle: {
                      text: ''
                    },
                    xAxis: {
                      categories: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez']
                    },
                    yAxis: {
                      title: {
                        text: 'Dinheiro R$'
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
                      name: 'Serie 1'
                      <?php
                          /*
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
                          */
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
