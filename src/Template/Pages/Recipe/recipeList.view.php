<?php

use HubCook\Core\Utils\DisplayHelper;


$recipe = $recipes[0];
?>

<div class="w-full">
  <h1 class="font-bold text-2xl uppercase text-center">Nos recettes</h1>
  <div class="flex justify-end">
    <a href="/recipeCreate"
       class="btn btn-primary my-4">Nouvelle recette</a>
  </div>
</div>
<div class="grid grid-cols-3 gap-6">
  <?php
  for ($i = 0; $i < 12; $i++): ?>
    <div class="card bg-base-100 w-96 shadow-xl">
      <figure>
        <img
          src="<?= $recipe['image'] ?>"
          alt="<?= $recipe['name'] ?>" />
      </figure>
      <div class="card-body">
        <h2 class="card-title"><?= $recipe['name'] ?></h2>
        <hr>
        <p>Difficulté : <?= $recipe['difficulty'] ?></p>
        <p><?= $recipe['describ'] ?></p>
        <div class="card-actions justify-between">
          <a href=""
             class="btn btn-success">Save</a>
          <button class="btn btn-neutral">Details</button>
        </div>
      </div>
    </div>
  <?php
  endfor; ?>
</div>