<?php

namespace Shore\TestBundle\Controller;

use Shore\TestBundle\Entity\Document;
use Shore\TestBundle\Entity\Produits;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
    * @Template()
    */
    public function indexAction()
    {
        $document = new Document();
        $form = $this->createFormBuilder($document)
            ->add('name')
            ->add('file')
            ->getForm()
        ;
      if ($this->getRequest()->isMethod('POST')) {
        $form->handleRequest($this->getRequest());
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $document->upload();
            $em->persist($document);
            $em->flush();

            //$this->redirect($this->generateUrl(...));
        }
    }
        return $this->render('ShoreTestBundle:Default:index.html.twig', array(
            'form' => $form->createView()
        ));
    }
    
    /**
 * @Template()
 */
    public function produitsAction()
    {
        $prod = new Produits();
        $form = $this->createFormBuilder($prod)
            ->add('nom')
            ->add('description')
            ->add('prixunitaire')
            ->add('stock')
            ->add('file')
            ->add('statut')
            ->getForm()
        ;
        if ($this->getRequest()->isMethod('POST')) {
            $form->handleRequest($this->getRequest());
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
$prod->upload();
                $em->persist($prod);
                $em->flush();

                //$this->redirect($this->generateUrl(...));
            }
        }

        return $this->render('ShoreTestBundle:Default:produits.html.twig',array(
            'form' => $form->createView()
         ));
    }
    
   
}
