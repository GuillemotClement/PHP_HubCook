<?php

namespace HubCook\Core\Router;

use HubCook\Core\Utils\DisplayHelper;

class Router
{
  private array $routes = [];
  private array $params = [];

  protected function addRoute(string $path, string $controller, string $method): void
  {
    $this->routes[] = [
      'path' => $path,
      'controller' => $controller,
      'method' => $method
    ];
  }

  /**
   * Permet de créer une nouvelle route GET pour récupérer de la data
   * @param string $path
   * @param string $controller
   *
   * @return void
   */
  public function addGetRoute(string $path, string $controller):void
  {
    $this->addRoute($path, $controller, 'GET');
  }

  /**
   * Permet de créer une nouvelle route POST pour créer une nouvelle ressource
   * @param string $path
   * @param string $controller
   *
   * @return void
   */
  public function addPostRoute(string $path, string $controller):void
  {
    $this->addRoute($path, $controller, 'POST');
  }

  /**
   * Permet de faire une edition complète d'une ressource
   *
   * @param string $path
   * @param string $controller
   *
   * @return void
   */
  public function addPutRoute(string $path, string $controller):void
  {
    $this->addRoute($path, $controller, 'PUT');
  }

  /**
   * Créer une route pour une mise à jour partielle d'une ressource
   * @param string $path
   * @param string $controller
   *
   * @return void
   */
  public function addPatchRoute(string $path, string $controller):void
  {
    $this->addRoute($path, $controller, 'PATCH');
  }
  /**
   * Permet de créer une nouvelle route pour supprimer une ressource indiquée
   * @param string $path
   * @param string $controller
   *
   * @return void
   */
  public function addDeleteRoute(string $path, string $controller):void
  {
    $this->addRoute($path, $controller, 'DELETE');
  }

  /**
   * Affiche les routes configurées dans l'application
   * @return array
   */
  public function getRoutes(): array
  {
    return $this->routes;
  }

  protected function getPath(string $url):string
  {
    return parse_url($url, PHP_URL_PATH);

  }

  protected function abort(int $code = 404):void
  {
    http_response_code($code);
    require BASE_PATH . "src/Controllers/Errors/{$code}Error.php";
    die();
  }

  public function routeTo(string $url, string $method): void
  {
    $uri = $this->getPath($url);
    $method = strtoupper($method);


    foreach ($this->routes as $route){

      if(strpos($route['path'], '{') !== false){
        $pattern = preg_replace('/\{([^}]+)\}/', '([^/]+)', $route['path']);
        $pattern = str_replace('/', '\/', $pattern);
        $pattern = '/^' . $pattern . '$/';

        if (preg_match($pattern, $uri, $matches)) {
          // Passe le paramètre au contrôleur
          array_shift($matches); // Retire le premier match (chemin complet)
          $_GET['params'] = $matches;

          $router = $this;
          require BASE_PATH . "src/Controllers/{$route['controller']}.php";
          return;
        }
      }elseif($uri === $route['path'] && $method === $route['method']){
        $router = $this;
        require BASE_PATH . "src/Controllers/{$route['controller']}.php";
        die();
      }
    }
    $this->abort();
  }

  public function importFile(string $path): void
  {
    //on fait référence à l'instance courante de Router()
    //en assignant $this à la variable, on créer une variable accessible dans le fichier importer
    $router = $this; //contient l'instance du router qui est maintenant disponible dans via l'import
    require BASE_PATH . "$path.php";
  }

  public function renderRootLayout(array $data):void
  {
    extract($data);
    require BASE_PATH.'src/Template/Layout/RootLayout.view.php';
  }



}