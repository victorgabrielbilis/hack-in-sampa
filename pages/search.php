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
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <h1 class="header center black-text">Câmara gasto mensal</h1>
      <div class="row center">
        <h5 class="header col s12 light">Amostra do gasto mensal da câmara de São Paulo</h5>
      </div>

      <br><br>

    </div>
  </div>

  <ul class="collapsible popout">
    <li>
      <div class="collapsible-header"><i class="material-icons">filter_drama</i>First</div>
      <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
    </li>
    <li>
        <div class="collapsible-header" onClick="onOpenStart();"><i class="material-icons">place</i>Second</div>
      <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">whatshot</i>Third</div>
      <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
    </li>
  </ul>

  <?php footer();?>
  <?php scripts("../");?>
  </body>
</html>
