<?php namespace Langaner\RoutePriority;

use Illuminate\Http\Request;
use Illuminate\Routing\ControllerDispatcher;
use Illuminate\Routing\Route as IlluminateRoute;

class Route extends IlluminateRoute
{
    /**
     * @var int
     */
    protected $priority = Router::DEFAULT_PRIORITY;

    /**
     * Run the route action and return the response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     *
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    protected function runController()
    {
        // Request $request
        $this->router         = app('router');
        list($class, $method) = explode('@', $this->action['uses']);

		dd($class);

        return (new ControllerDispatcher(app()))
            ->dispatch($this, $this->controller, $method);
    }

    /**
     * @return int
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * @param int $priority
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
    }

    public function getUri()
    {
        return $this->uri;
    }

}
