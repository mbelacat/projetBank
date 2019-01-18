<?php
include "view/template/header.php";
?>
<section>
    <h2>Compte de M. ou Mme</h2>
    <div class="">

      <div class="">
      Solde:
      <?php
      // echo $bankAccount[0]->getBalance();
      ?>
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

        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Nom du compte</th>
              <th>Solde </th>
              <th>Opération</th>
            </tr>
          </thead>

          <tbody>
            <?php
            foreach ($bankAccountsUser as $key => $bankAccountUser){
            ?>
            <tr>
              <td scope="row"><?php echo $bankAccountUser->getAccountName() ;?></td>
              <td scope="row"><?php echo $bankAccountUser->getBalance() ;?></td>
              <td scope="row">
                <div class="btn-group">
                  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Opération
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" <?php  setHref("withdrawal",["id" => $bankAccountUser->getId()])?> >Retrait</a>
                    <a class="dropdown-item" <?php  setHref("transfert",["id" => $bankAccountUser->getId()]) ?>>Transfert : compte de mon abonnement</a>
                    <a class="dropdown-item" <?php  setHref("credit",["id" => $bankAccountUser->getId()])?>>Crédit</a>
                    <a class="dropdown-item" <?php  setHref("transfert",["id" => $bankAccountUser->getId()]) ?>>Transfert : compte de extérieur</a>
                  </div>
                </div>
              </td>
            <?php
            }
            ?>
      </tr>
      </tbody>
      </table>
      </section>
    </div>
</section>

<?php
include "view/template/footer.php";
?>
