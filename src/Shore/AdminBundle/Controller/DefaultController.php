<?php

namespace Shore\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ShoreAdminBundle:Default:index.html.twig', array('name' => $name));
    }
}
