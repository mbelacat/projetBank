<?php
include "view/template/header.php";
?>
<section>
    <h2>Compte de M. ou Mme</h2>
    <div class="">

      <div class="">
      Solde: <?php echo $bankAccount[0]->getBalance();?>
      </div>

      <section class="">
        <h2> Donneés personnelles</h2>
        <div class="">
          Nom:
        </div>
        <div class="">
          Prénom:
        </div>
        <div class="">
          Adresse:
        </div>
      </section>

      <section>
        <div class="">
          <a <?php  setHref("transfert",["id" => $bankAccount[0]->getId()]) ?> class="btn btn-danger btn">Faire un virement</a>
        </div>
        <h2>Historique</h2>
      </section>
    </div>
</section>

<?php
include "view/template/footer.php";
?>
