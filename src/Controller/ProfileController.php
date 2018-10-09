<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\UserProfile;
use App\Form\UserProfileType;

class ProfileController extends AbstractController
{
    /**
    * @Route("/profile/{id}", name="profile_view")
    */
    public function viewProfile($id = "1")
    {
        $userId = (int) $id;

        $user = $this->getDoctrine()
        ->getRepository(UserProfile::class)
        ->find($userId);

        $model = array('user' => $user);
        $view = 'profile.html.twig';

        return $this->render($view, $model);
    }

    /**
    * @Route("/register", name="profile_new")
    */
    public function newProfile(Request $request)
    {
        $userProfile = new UserProfile();
        $form = $this->createForm(UserProfileType::class, $userProfile);
        $form->handleRequest($request);

        $view = 'register.html.twig';
        $model = array('form' => $form->createView());

        return $this->render($view, $model);
    }
}

?>