
<div class="container col-6">
    <h2>Transfert</h2>
    <form method="post">
      <!-- input type hidden? -->

      <div class="form-group">
          <label for="id">Compte à débiter</label>
          <input type="text" class="form-control" id="id" name="id" value="<?php intval($_GET["id"])?>" placeholder="Compte à débiter: <?php echo intval($_GET["id"])?>">
      </div>
      <div class="form-group">
          <label for="recepientId">Compte à créditer</label>
          <select class="" name="recepientId">
            <?php foreach ($bankAccounts as $key => $bankAccount){ ?>
            <option value ="<?php echo $bankAccount->getId() ?>">Compte n°: <?php echo $bankAccount->getId() ?></option>
            <?php } ?>
          </select>
      </div>

      <div class="form-group">
          <label for="amount">Montant à transérer</label>
          <input type="text" class="form-control" id="amount" name="amount" placeholder="" >
      </div>
      <button type="submit" class="btn btn-success">Transférer</button>
    </form>
</div>
