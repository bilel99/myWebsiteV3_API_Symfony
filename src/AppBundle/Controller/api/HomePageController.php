<?php
namespace AppBundle\Controller\api;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class HomePageController extends Controller {

    /**
     * @Route("/", name="api.home")
     * @Method({"GET"})
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(){
        $base_dir = $this->generateUrl('api.home', array('api.home' => 'api.home'), UrlGeneratorInterface::ABSOLUTE_URL);

        return $this->render('default/index.html.twig', array(
            'base_dir' => $base_dir
        ));
    }
}