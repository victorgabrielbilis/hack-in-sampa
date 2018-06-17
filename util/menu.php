<?php


    function menu($caminho)
    {
        echo "<nav>
        <nav class=\"indigo darken-4\" role=\"navigation\">
          <ul class=\"left\">
          
          </ul>
          <div class=\"nav-wrapper container\"><a id=\"logo-container\" href=\"".$caminho."index.php\" class=\"brand-logo\">Brasilida</a>

            <ul class=\"right hide-on-med-and-down\">

            <li><a href=\"pages/search.php\">Créditos e débitos</a></li>
            </ul>

            <ul id=\"nav-mobile\" class=\"sidenav\">
              <li><a href=\"pages/search.php\">Pesquisar</a></li>
            </ul>

          </div>
        </nav>

        </nav>


        ";
    }

?>
