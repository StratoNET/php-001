<?php
namespace Udemy\controllers;

use Kunststube\CSRFP\SignatureGenerator;
use duncan3dc\Laravel\BladeInstance;

class BaseController
{
    /* TWIG (templating) IS NOT CURRENTLY USED.

// Twig uses PSR0(basic), not PSR4(autoload), PHP standards. Consequently it cannot
// be loaded into a namespace via a 'use' command. Instead, an implicit constructor
// must be called to initialize the loader/twig protected variables...

  protected $loader;
  protected $twig;

    public function __construct()
    {
        $this->loader = new \Twig_Loader_Filesystem(__DIR__ . "/../../views");
        $this->twig = new \Twig_Environment($this->loader, [
      'cache' => false,
      'debug' => true,
    ]);
    }
*/

  protected $signer;
  protected $blade;

  public function __construct()
  {
    /* Kunststube CSRFP */
    $this->signer = new SignatureGenerator(getenv('CSRF_SECRET'));
    /* BLADE templating system */
    $this->blade = new BladeInstance("/vagrant/views", "/vagrant/cache/views");
  }
}
