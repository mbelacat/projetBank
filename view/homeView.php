<?php
include "view/template/header.php";
?>
<div class="home d-flex flex-column justify-content-around">
  <div class="alrazy-title text-center" data-splitting >
    <?php echo $message; ?>
  </div >
  <div class="login text-center">
    <a class="border border-danger btn btn-outline-light" <?php setHref("login") ?>>Accéder à Mon votre Espace</a>
  </div>
</div>

<?php
include "view/template/footer.php"
?>
