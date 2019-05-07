<?php
/**
 * This class process requests from users and determines 
 * which class should be uncluded and which action 
 * should be choosed
 */
class Router
{
    private $_routes;

    /**
     * Adding routes in created object
     * 
     * @return nothing
     */
    public function __construct()
    {
        $routesPath = ROOT.'/config/routes.php';
        $this-> _routes = include $routesPath;
    }
    /**
     * Return request string
     *
     * @return string
     */
    private function _getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    /**
     * Process users requests and determines
     * which class should be uncluded and which action 
     * should be choosed
     * 
     * @return nothing
     */ 
    public function run() 
    {
        // Getting request string
        $uri = $this-> _getURI();
        // check if request sting is in routes.php
        foreach ($this-> _routes as $uriPattern => $path) {
            // comprison uri request and routes in routes.php
            if (preg_match("~$uriPattern~", $uri)) {


                // searching and inserting paramaters in uri for methods
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
               


                // if it is define which controller and action
                // must be choosed
                $segments = explode('/', $internalRoute);
                $controllerName = ucfirst(array_shift($segments).'Controller');
                $actionName = 'action'.ucfirst(array_shift($segments));


                 // include controller file class
                $controllerFile = ROOT.'/controllers/'.$controllerName.'.php';
                if (file_exists($controllerFile)) {
                    include_once $controllerFile;
                }

                //  create an object and call method (aciton)
                $controllerObject = new $controllerName;

                // calbackk funct to beutify parameteres in method ??
                $result = call_user_func_array(array($controllerObject, $actionName), $segments);
                //$result = $controllerObject->$actionName();
                if ($result != null) {
                    break;
                }

            }



        }
    }
}