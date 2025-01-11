<form action=""
      class="w-96"
      method="post">
  <h1 class="text-2xl uppercase text-center font-bold">Nouvelle recette</h1>
  <div class="form-control">
    <label for="name"
           class="label">Nom</label>
    <input type="text"
           id="name"
           name="name"
           class="input input-bordered"
           value="<?= $userData['name'] ?? '' ?>"
           placeholder="Galette Saucisse"
           required>
  </div>
  <div class="form-control">
    <label for="describ"
           class="label">Description</label>
    <textarea name="describ"
              id="describ"
              cols="30"
              rows="5"
              class="textarea textarea-bordered"
              placeholder="Ma super recette est ..."
              value="<?= $userData['describ'] ?? '' ?>"></textarea>
  </div>
  <div class="form-control">
    <label for="instructions"
           class="label">Instructions</label>
    <textarea name="instructions"
              id="instructions"
              cols="30"
              rows="5"
              class="textarea textarea-bordered"
              placeholder="1 - Première étape :"
              value="<?= $userData['instructions'] ?? '' ?>"></textarea>
  </div>
  <div class="form-control">
    <label for="duration"
           class="label">Durée</label>
    <input type="number"
           id="duration"
           name="duration"
           class="input input-bordered"
           value="<?= $userData['duration'] ?? '' ?>"
           placeholder="150 min"
           required>
  </div>
  <div class="form-control">
    <label for="difficulty"
           class="label">Difficulté</label>
    <select class="select select-bordered w-full max-w-xs" id="difficulty" name="difficulty">
      <option disabled selected>Choix</option>
      <?php for($i = 1; $i <= 5; $i++): ?>
        <option value="<?= $i ?>"><?= $i ?></option>
      <?php endfor; ?>
    </select>
  </div>
  <div class="form-control">
    <label for="image"
           class="label">Illustration</label>
    <input type="url"
           id="image"
           name="image"
           class="input input-bordered"
           value="<?= $userData['image'] ?? '' ?>"
           placeholder="@url"
           required>
  </div>
  <div class="flex justify-center my-4 gap-x-5 ">
    <a href="/recipe" class="btn">Retour</a>
    <button type="submit" class="btn btn-neutral">Créer</button>
  </div>
</form>