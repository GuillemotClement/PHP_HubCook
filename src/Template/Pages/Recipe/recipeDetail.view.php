<?php

use HubCook\Core\Utils\DisplayHelper;

$recipe   = $data['recipe'];
$username = $data['username']['username'];
function convertToOrderedList(string $text): string
{
  // Sépare le texte en étapes basées sur les numéros
  $steps = preg_split('/(?=\d+\s*-)/', $text, -1, PREG_SPLIT_NO_EMPTY);

  // Commence la liste HTML
  $html = '<ol class="list-decimal space-y-2 px-4">';

  foreach ($steps as $step) {
    // Nettoie chaque étape (retire le numéro et le tiret au début)
    $step = preg_replace('/^\d+\s*-\s*/', '', trim($step));

    // Trouve le premier verbe ou le début de l'instruction
    $parts = explode(' ', $step, 2);
    if (count($parts) > 1) {
      // Met en gras le premier mot/groupe
      $html .= sprintf(
        '<li class="leading-relaxed"><strong>%s</strong> %s</li>',
        $parts[0],
        $parts[1]
      );
    } else {
      $html .= sprintf('<li class="leading-relaxed">%s</li>', $step);
    }
  }

  $html .= '</ol>';
  return $html;
}



?>
<div class="">
  <img src="<?= $recipe['image'] ?>"
       alt="<?= $recipe['name'] ?>"
       class="rounded-md shadow-md">
  <h1 class="text-center font-bold text-2xl my-6"><?= $recipe['name'] ?></h1>
  <div class="flex justify-between gap-x-8 px-12 mb-4">
    <p class="capitalize"><i class="fa-solid fa-user-pen text-xl"></i> <?= $username ?></p>
    <p><i class="fa-regular fa-clock text-xl"></i> <?= $recipe['duration']?> minutes</p>
    <p>
      <?php for ($i = 0; $i < $recipe['difficulty']; $i++): ?>
        <i class="fa-solid fa-star text-xl"></i>
      <?php endfor; ?>
    </p>
  </div>
  <div class="px-12">
    <h2 class="font-bold mb-2 text-lg">Description :</h2>
    <p class="text-justify mb-5"><?= $recipe['describ'] ?></p>
    <div class="px-12">
      <p><?= convertToOrderedList($recipe['instructions']) ?></p>
    </div>

  </div>

</div>

