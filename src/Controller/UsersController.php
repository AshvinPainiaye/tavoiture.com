<?php
namespace tavoiture\Controller;
use Silex\Application;
use Silex\ControllerProviderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use tavoiture\Entity\Users;

class UsersController
{

  /**
  * Page compte utilisateur
  *
  */
  public function indexAction(Application $app, Request $request)
  {
    $user = $app['session']->get('user');

    if ($user != null) {

      return new Response($app['twig']->render('account.html.twig', array(
        'users' => $user
      )));
    } else {
      return $app->redirect('/login');

    }
  }


  public function loginAction(Application $app, Request $request)
  {

    if ($request->isMethod('post')){

      $email = $_POST['email'];
      $password = $_POST['password'];

      $user = new Users();
      $authenticate = $user->authenticate($email, $password);

      if ($authenticate) {
        $app['session']->set('user', $authenticate);
        return $app->redirect('/account');
      }

      $app['session']->getFlashBag()->add('message', 'Email ou Mot de passe incorrect.');
      return $app->redirect('/login');
    }

    return new Response($app['twig']->render('login.html.twig'));
  }


  public function logoutAction(Application $app, Request $request)
  {
    $app['session']->clear();
    return $app->redirect('/');

  }


}
