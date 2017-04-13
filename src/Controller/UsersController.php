<?php
namespace tavoiture\Controller;
use Silex\Application;
use Silex\ControllerProviderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UsersController
{

  /**
  * Page compte utilisateur
  *
  */
  public function indexAction(Application $app, Request $request)
  {
    return new Response($app['twig']->render('account.html.twig'));
  }

}
