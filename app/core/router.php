<?php

class Router {
    private $routes = [];

    // Methode zum Hinzufügen von Routen
    public function add($path, $controller, $method) {
        $this->routes[$path] = ['controller' => $controller, 'method' => $method];
    }

    // Methode zum Bearbeiten der Anfrage
    public function handleRequest() {
        // Holen der aktuellen Anfrage-URI
        $request = trim($_SERVER['REQUEST_URI'], '/');
        $method = $_SERVER['REQUEST_METHOD']; // GET, POST, etc.

        // Überprüfen, ob der Pfad existiert
        if (array_key_exists($request, $this->routes)) {
            $controllerName = $this->routes[$request]['controller'];
            $methodName = $this->routes[$request]['method'];

            // Erstellen des Controller-Objekts
            if (class_exists($controllerName)) {
                $controller = new $controllerName();

                // Überprüfen, ob die Methode existiert
                if (method_exists($controller, $methodName)) {
                    // Methode aufrufen
                    call_user_func([$controller, $methodName]);
                } else {
                    http_response_code(404);
                    echo "404 - Methode nicht gefunden";
                }
            } else {
                http_response_code(404);
                echo "404 - Controller nicht gefunden";
            }
        } else {
            http_response_code(404);
            echo "404 - Seite nicht gefunden";
        }
    }
}
?>
