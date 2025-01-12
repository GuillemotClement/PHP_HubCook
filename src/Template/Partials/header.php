<header class="flex justify-between items-center px-8 py-2 shadow-md">
  <div class="navbar bg-base-100">
    <div class="flex-1">
      <img src="/images/logo.png" alt="HubCook" height="50px" width="50px">
      <p class="btn btn-ghost text-xl">HubCook</p>
    </div>
    <div class="flex-none">
      <div class="flex-none">
        <ul class="menu menu-horizontal px-1">
          <li><a href="/">Accueil</a></li>
          <li>
            <details>
              <summary>Recettes</summary>
              <ul class="bg-base-100 rounded-t-none p-2">
                <li><a href="/recipe">Nos recettes</a></li>
                <li><a>Link 2</a></li>
              </ul>
            </details>
          </li>
        </ul>
      </div>
      <ul class="flex gap-x-2 items-center">
        <?php if(!isset($_SESSION['username'])): ?>
          <div class="flex-none">
            <ul class="menu menu-horizontal px-1">
              <li><a href="/login">Connexion</a></li>
              <li><a href="/register">Inscription</a></li>
            </ul>
          </div>
        <?php else :?>
          <div class="dropdown dropdown-end">
            <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
              <div class="w-10 rounded-full">
                <img
                  alt="picture user"
                  src="<?= $_SESSION['user_image']?>" />
              </div>
            </div>
            <ul
              tabindex="0"
              class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
              <li>
                <a class="justify-between">
                  Profile
                </a>
              </li>
              <li><a>Settings</a></li>
              <li><a href="/logout">Logout</a></li>
            </ul>
          </div>
        <?php endif; ?>
      </ul>
  </div>
</header>