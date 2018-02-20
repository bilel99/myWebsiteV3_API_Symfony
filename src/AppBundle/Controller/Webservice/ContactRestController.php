<?php

namespace AppBundle\Controller\Webservice;

use AppBundle\Entity\Contact;
use AppBundle\Service\Validate;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ContactRestController extends Controller {


    /**
     * @Route("/api/add-contact", name="add_contact")
     * @Method({"POST"})
     *
     * @param Request $request
     * @param Validate $validate
     * @param \Swift_Mailer $mailer
     * @return JsonResponse
     */
    public function addContact(Request $request, Validate $validate, \Swift_Mailer $mailer){
        $data = $request->getContent();

        $serializer = $this->get('jms_serializer');
        $contact = $serializer->deserialize($data, Contact::class, 'json');

        $response = $validate->validateRequest($contact);

        if(!empty($response)){
            return new JsonResponse($response, Response::HTTP_BAD_REQUEST);
        }

        $em = $this->getDoctrine()->getManager();
        $contact->setDone(1);
        $contact->setCreatedAt(new \DateTime());
        $em->persist($contact);
        $em->flush();

        $response = array(
            'code' => 0,
            'message' => 'Form contact send',
            'error' => null,
            'result' => null
        );

        return new JsonResponse($response, Response::HTTP_CREATED);
    }

}