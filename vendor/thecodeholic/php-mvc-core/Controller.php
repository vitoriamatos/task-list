<?php
/**
 * User: TheCodeholic
 * Date: 7/8/2020
 * Time: 8:43 AM
 */

namespace thecodeholic\phpmvc;

use thecodeholic\phpmvc\middlewares\BaseMiddleware;
/**
 * Class Controller
 *
 * @author  Zura Sekhniashvili <zurasekhniashvili@gmail.com>
 * @package thecodeholic\phpmvc
 */
class Controller
{
    public string $layout = 'main';
    public string $action = '';
    protected $params = '';

    /**
     * @var \thecodeholic\phpmvc\BaseMiddleware[]
     */
    protected array $middlewares = [];
    
    // public function __construct() {
	// 	$this->view = new \stdClass();
	// }

    public function setLayout($layout): void
    {
        $this->layout = $layout;
    }

    public function render($view, $params = []): string
    {
        $this->params = $params;

        return Application::$app->router->renderView($view, $params);
    }

    public function registerMiddleware(BaseMiddleware $middleware)
    {
        $this->middlewares[] = $middleware;
    }

    /**
     * @return \thecodeholic\phpmvc\middlewares\BaseMiddleware[]
     */
    public function getMiddlewares(): array
    {
        return $this->middlewares;
    }
}