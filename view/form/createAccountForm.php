
<div class="container col-6">
<!-- form action a remplir quand toutes les pages seront crées-->
    <h2>Creer un compte</h2>
    <form method="post" action="">
        <div class="form-group">
            <label for="lastName">Nom du client</label>
            <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Dupond" >
        </div>

        <div class="form-group">
            <label for="firstName">Prénom du client</label>
            <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Jean-Charles" >
        </div>

        <div class="form-group">
            <label for="balance">Montant du dépôt</label>
            <input type="text" class="form-control mb-3" id="balance" name="balance" placeholder="50" >
        </div>

        <div class="">
          <select class="form-control" id="accountName" name="accountName">
            <label for="accountName">choix du livret</label>
            <option>Livret A</option>
            <option>Livret d'épargne populaire (LEP)</option>
            <option>Compte d'épargne logement (CEL)</option>
            <option>Plan d'épargne logement (PEL)</option>
          </select>
        </div>

        <button type="submit" class="btn btn-success">Créer un compte</button>
    </form>
</div>
