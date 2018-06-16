<?php


    function menu($caminho)
    {
        echo "<nav>
        <nav class=\"light-blue lighten-1\" role=\"navigation\">
          <ul class=\"left\">
          <li href=\"#\" data-target=\"slide-out\" class=\"sidenav-trigger\"><i class=\"material-icons\">menu</i></li>
          </ul>
          <div class=\"nav-wrapper container\"><a id=\"logo-container\" href=\"".$caminho."index.php\" class=\"brand-logo\">Logo</a>

            <ul class=\"right hide-on-med-and-down\">

            <li><a href=\"#\">API</a></li>
            <li><a href=\"pages/search.php\">Pesquisar</a></li>
            </ul>

            <ul id=\"nav-mobile\" class=\"sidenav\">
              <li><a href=\"#\">API</a></li>
              <li><a href=\"pages/search.php\">Pesquisar</a></li>
            </ul>

          </div>
        </nav>

        </nav>
        <ul id=\"slide-out\" class=\"sidenav\">
          <li><a href=\"#!\">Tipo de despesas</a></li>
          <li><a href=\"#!\">Parlamentar</a></li>
          <li><a href=\"#!\">Partido</a></li>
          <li><a href=\"#!\">Fornecedor</a></li>
        </ul>

        ";
    }

?>
