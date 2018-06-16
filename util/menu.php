<?php


    function menu($caminho)
    {
        echo "
        <nav class=\"light-blue lighten-1\" role=\"navigation\">
          <div class=\"nav-wrapper container\"><a id=\"logo-container\" href=\"#\" class=\"brand-logo\">Logo</a>
          <div class=\"nav-wrapper container\"><a href=\"".$caminho."\" data-target=\"nav-mobile\" class=\"sidenav-trigger\"><i class=\"material-icons\">menu</i></a>
            <ul class=\"right hide-on-med-and-down\">
              <li><a href=\"#\">Navbar Link</a></li>
            </ul>

            <ul id=\"nav-mobile\" class=\"sidenav\">
              <li><a href=\"".$caminho."\">API</a></li>
              <li><a href=\"".$caminho."\">Pesquisar</a></li>
            </ul>
          </div>

        </nav>

        <ul id=\"slide-out\" class=\"sidenav\">
          <li><div class=\"user-view\">
            <div class=\"background\">
              <img src=\"images/office.jpg\">
            </div>
            <a href=\"#user\"><img class=\"circle\" src=\"images/yuna.jpg\"></a>
            <a href=\"#name\"><span class=\"white-text name\">John Doe</span></a>
            <a href=\"#email\"><span class=\"white-text email\">jdandturk@gmail.com</span></a>
          </div></li>
          <li><a href=\"#!\"><i class=\"material-icons\">cloud</i>First Link With Icon</a></li>
          <li><a href=\"#!\">Second Link</a></li>
          <li><div class=\"divider\"></div></li>
          <li><a class=\"subheader\">Subheader</a></li>
          <li><a class=\"waves-effect\" href=\"#!\">Third Link With Waves</a></li>

        </ul>

        ";
    }

?>
