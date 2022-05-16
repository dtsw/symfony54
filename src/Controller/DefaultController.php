<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends AbstractController;
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));
    }

    /**
     * @Route("/sayHelloTo/{name}", name="sayhello")
     */
    public function helloAction($name)
    {
        return new Response( "Hello " . ucfirst($name) );
    }

    /**
     * @Route("/sayByeTo/{name}/{_locale}", name="saybye", defaults={"_locale" = "en"}, requirements={"_locale" : "de|fr|it|en" })
     */
    public function byeAction($name)
    {
        $translated = $this->get('translator')->trans('symfony.is.great');
        return new Response( $translated . " " . ucfirst($name) );
    }

}
