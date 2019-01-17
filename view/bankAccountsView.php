<?php
include "view/template/header.php";
?>
<main>
  <div class="container-fluid">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">client n°: </th>
            <th>Solde</th>
            <th>Retirer </th>
            <th>Créditer</th>
            <th>Transférer</th>
          </tr>
          <tbody>
              <?php
              foreach ($bankAccounts as $key => $bankAccount){
        ?>
        <tr>
          <th scope="row"><?php echo $bankAccount->getClientId() ;?> </th>
          <td scope="row"><?php echo $bankAccount->getBalance() ;?> </td>
          <td scope="row"><a <?php  setHref("withdrawal",["id" => $bankAccount->getId()])?> class="btn btn-danger btn">Retirer</a></td>
          <td scope="row"><a <?php  setHref("credit",["id" => $bankAccount->getId()])?> class="btn btn-danger btn">Créditer</a></td>
          <td scope="row"><a <?php  setHref("transfert",["id" => $bankAccount->getId()]) ?> class="btn btn-danger btn">Transférer</a></td>
        </tr>
      </thead>
      <?php
    }
    ?>
    </tbody>
    </table>
  </div>
</main>

<?php
include "view/template/footer.php";
?>
