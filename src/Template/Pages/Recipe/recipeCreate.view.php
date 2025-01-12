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
    <textarea name="instructions1"
              id="instruction1"
              cols="30"
              rows="5"
              class="textarea textarea-bordered"
              placeholder="Etape 1 :"
              value="<?= $userData['instructions'] ?? '' ?>"></textarea>
  </div>
  <div class="" id="newBlocInstruct"></div>
  <div class="border rounded-full p-2 my-3 bg-gray-200 hover:shadow-md active:shadow-xl active:bg-gray-400
  active:text-white text-center" id="addInstruction">
    <i class="fa-solid fa-plus"></i> Nouvelle étape
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

<script>

  function createTextareaBlock(stepNumber){
    //création du conteneur du text area
    const divContainer = document.createElement('div');
    divContainer.class = "form-control";

    //création du label
    const label = document.createElement('label');
    label.setAttribute('for', `instruction${stepNumber}`);
    label.class = 'label';
    label.textContent = `Instruction ${stepNumber}`;

    //création du textarea
    const textArea = document.createElement('textarea');
    textArea.name = `instructions${stepNumber}`;
    textArea.id = `instruction${stepNumber}`;
    textArea.cols = "30";
    textArea.rows = "5";
    textArea.class = "textarea textarea-bordered";
    textArea.placeholder = `Etape ${stepNumber}`;

    //assemblage des éléments
    divContainer.appendChild(label);
    divContainer.appendChild(textArea);

    return divContainer;
  }

  const container = document.querySelector('#newBlocInstruct');
  const addButton = document.querySelector('#addInstruction');
  let stepCount = 2;

  addButton.addEventListener('click', () => {
    const newTextareaBlock = createTextareaBlock(stepCount);
    container.appendChild(newTextareaBlock);
    stepCount++;
  })
</script>