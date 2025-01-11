<?php


$userData = $data['inputData'];
$errors   = $data['errors'];

?>
<form action=""
      class="w-96"
      method="post">
  <h1 class="text-2xl uppercase text-center font-bold">Inscription</h1>
  <div class="form-control">
    <label for="username"
           class="label">Pseudo</label>
    <input type="text"
           id="username"
           name="username"
           class="input input-bordered"
           value="<?= $userData['username'] ?? '' ?>"
           required>

  </div>
  <div class="form-control">
    <label for="email"
           class="label">Email</label>
    <input type="email"
           id="email"
           name="email"
           class="input input-bordered"
           value="<?= $userData['email'] ?? '' ?>"
           required>
  </div>
  <div class="form-control">
    <label for="password"
           class="label">Mot de passe</label>
    <input type="password"
           id="password"
           name="password"
           class="input input-bordered"
           required>
  </div>
  <div class="form-control">
    <label for="confirm-password"
           class="label">Confirmer le mot de passe</label>
    <input type="password"
           id="confirm-password"
           name="confirm-password"
           class="input input-bordered"
           required>
  </div>
  <div class="text-xs italic text-blue-400 hover:underline my-3">
    <a href="/login">J'ai déjà un compte</a>
  </div>
  <div class="">
    <ul>
      <?php foreach ($errors as $error):?>
        <li class="text-red-400 font-bold"><?= $error?></li>
      <?php endforeach; ?>
    </ul>
  </div>
  <div class="flex justify-center my-4 gap-x-5">
    <a href="/"
       class="btn">Retour</a>
    <button type="submit"
            class="btn btn-neutral">Inscription
    </button>
  </div>
</form>
