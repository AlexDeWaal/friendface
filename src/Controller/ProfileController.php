<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;

class ProfileController extends AbstractController
{
    /**
     * @Route("/profile/{id}", name="profile_view")
     */
    public function viewProfile($id = "1")
    {
    $userId = (int) $id;

    $mark = new User();
    $mark->setId(1);
    $mark->setName("Mark");

    $grace = new User();
    $grace->setId(2);
    $grace->setName("Grace");

    $bill = new User();
    $bill->setId(3);
    $bill->setName("Bill");

    $dennis = new User();
    $dennis->setId(4);
    $dennis->setName("Dennis");

    $mark->addFriend($grace);
    $mark->addFriend($bill);
    $grace->addFriend($mark);
    $bill->addFriend($mark);

    $users = [$mark, $grace, $bill, $dennis];

    $model = array();
    $view = 'profile.html.twig';

    foreach ($users as $user) {
        if ($userId === $user->getId()) {
            $model['user'] = $user;
        }
    }

    return $this->render($view, $model);
    }
}

?>