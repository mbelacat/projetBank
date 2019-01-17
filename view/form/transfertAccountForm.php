
<div class="container col-6">
    <h2>Transfert</h2>
    <form method="post">
      <!-- input type hidden? -->

      <div class="form-group">
          <label for="idAccount">Compte à débiter</label>
          <input type="text" class="form-control" id="idAccount" name="idAccount" placeholder="" >
      </div>
      <div class="form-group">
          <label for="idAccount">Compte à créditer</label>
          <input type="text" class="form-control" id="idAccount" name="idAccount" placeholder="" >
      </div>

      <div class="form-group">
          <label for="amount">Montant à transérer</label>
          <input type="text" class="form-control" id="amount" name="amount" placeholder="" >
      </div>
      <button type="submit" class="btn btn-success">Transférer</button>
    </form>
</div>
