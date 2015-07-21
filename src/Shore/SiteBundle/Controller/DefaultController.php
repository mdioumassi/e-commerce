<?php

namespace Shore\SiteBundle\Controller;
use Shore\AdminBundle\Entity\Produit;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ShoreSiteBundle:Default:index.html.twig',array(
            'products'=>$this->getProducts()
        ));
    }
    
   private function getProducts(){
	$em = $this->getDoctrine()->getEntityManager();
	$query = $em->createQuery(
	 'SELECT a FROM ShoreAdminBundle:Produit a'
	);//->setMaxResults(4);
	 return $query->getResult();
    }
}
