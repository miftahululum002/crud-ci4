<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    protected $session;

    protected $data = null;
    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.
        $this->data['title'] = !empty($this->data['title']) ? $this->data['title'] : 'index';
        // E.g.: $this->session = \Config\Services::session();
        // $this->database = \Config\
        $this->session = \Config\Services::session();
    }

    /**
     * render
     *
     * @param  string $fileName view
     * @return void
     */
    protected function render($fileName = 'index')
    {
        $this->setDataArgumen();
        $class_name = get_class($this);
        $reflection_class = new \ReflectionClass($class_name);
        $namespace = $reflection_class->getNamespaceName();
        $class = str_replace("$namespace\\", '', $class_name);
        return view(strtolower($class) . '/' . $fileName, $this->data);
    }

    protected function setDataArgumen()
    {
        $this->data['requiredLabel'] = '<b class="text-danger">*</b>';
    }
}
