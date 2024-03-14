<?php
namespace App\Controller;

use Slim\Psr7\Request;
use Slim\Psr7\Response;
use App\Domain\Model\User;

class HomeController {
    public function index(Request $request, Response $response, $args) {
        $userModel = new User();
        $userData = $userModel->getUserData();

        extract($userData);
        
        ob_start();
        include __DIR__ . '/../../templates/User/home.php';
        $view = ob_get_clean();

        $response->getBody()->write($view);
        return $response;
    }
}
