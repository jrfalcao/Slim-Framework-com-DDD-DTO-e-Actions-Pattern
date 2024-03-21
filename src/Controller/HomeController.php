<?php
namespace App\Controller;

use Slim\Psr7\Request;
use Slim\Psr7\Response;
use App\Domain\Service\UserService;

class HomeController {

    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(Request $request, Response $response) {
        $user = $this->userService->getByID(1);

        extract($user);
        
        ob_start();
        include __DIR__ . '/../../templates/User/home.php';
        $view = ob_get_clean();

        $response->getBody()->write($view);
        return $response;
    }
}
