<?php

    function head($caminho)
    {
        echo "<head>
          <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\"/>
          <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, maximum-scale=1.0\"/>
          <title>Brasilida</title>

          <!-- CSS  -->
          <link href=\"https://fonts.googleapis.com/icon?family=Material+Icons\" rel=\"stylesheet\">
          <link href=\"".$caminho."css/materialize.css\" type=\"text/css\" rel=\"stylesheet\" media=\"screen,projection\"/>
          <link href=\"".$caminho."css/style.css\" type=\"text/css\" rel=\"stylesheet\" media=\"screen,projection\"/>

          <script src=\"https://code.highcharts.com/highcharts.js\"></script>
          <script src=\"https://code.highcharts.com/modules/data.js\"></script>
          <script src=\"https://code.highcharts.com/modules/exporting.js\"></script>
          <script src=\"https://code.highcharts.com/modules/export-data.js\"></script>
          <script src=\"https://code.jquery.com/jquery-2.1.1.min.js\"></script>


          <style type=\"text/css\">
          #container {
          	min-width: 310px;
          	 height: 400px;
          	margin: 0 auto
          }
          #container2 {
          	min-width: 310px;
            height: 400px;
            margin: 0 auto
          }
          ";
?>
<?php
        require_once("../functions.php");
  $database = connect_DB();
     $sql ="select distinct(vereador) AS vereador from creditoliderancavereador;"; 
      
      $select = mysqli_query($database, $sql);
      
      $i = 3;
      
      while ($rs=mysqli_fetch_array($select)){
        
    
        echo"  #container".$i." {
          	min-width: 310px;
            height: 300px;
            max-width: 600px;
            margin: 0 auto
          }
          ";
      $i++;
      }
          ?>
<?php
        echo"
          </style>

          <script>

          $(document).ready(function() {
            M.updateTextFields();
            document.getElementById(\"container3\").style.visibility =\"hidden\";
          });

          document.addEventListener('DOMContentLoaded', function() {
             var elems = document.querySelectorAll('.collapsible.popout');
           var instances = M.Collapsible.init(elems, {
             accordion: false
           });
         });

           document.addEventListener('DOMContentLoaded', function() {
             var elems = document.querySelectorAll('select');
             var instances = M.FormSelect.init(elems, {
               accordion: false
             });
           });

          $(document).ready(function(){
              $('.sidenav').sidenav();
          });
          </script>

        </head>";
    }

?>
