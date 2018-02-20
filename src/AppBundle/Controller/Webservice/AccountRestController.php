<?php
namespace AppBundle\Controller\Webservice;
use AppBundle\Entity\User;
use AppBundle\Entity\Ville;
use AppBundle\Service\Validate;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AccountRestController extends Controller {

    public function __construct()
    {
    }

    /**
     * @Route("/api/update-profil/{id}", name="update_profil")
     * @Method({"PUT"})
     *
     * @param $id
     * @param Request $request
     * @param Validate $validate
     * @return JsonResponse
     */
    public function updateProfil($id, Request $request, Validate $validate){
        $user = $this->getDoctrine()->getRepository(User::class)->find($id);

        if(empty($user)){
            $response = array(
                'code' => 1,
                'message' => 'User not found',
                'error' => null,
                'result' => null
            );

            return new JsonResponse($response, Response::HTTP_NOT_FOUND);
        }

        $body = $request->getContent();
        $serializer = $this->get('jms_serializer');
        $data = $serializer->deserialize($body, User::class, 'json');

        $user->setNom($data->getNom());
        $user->setPrenom($data->getPrenom());
        $user->setSexe($data->getSexe());
        $user->setDateNaissance($data->getDateNaissance());
        $user->setMobile($data->getMobile());
        $user->setVille($data->getVille());
        $user->setMedia($data->getMedia());
        $user->setUpdatedAt(new \DateTime());

        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();

        $response = array(
            'code' => 0,
            'message' => 'User updated',
            'error' => null,
            'result' => null
        );

        return new JsonResponse($response, Response::HTTP_CREATED);
    }

    /**
     * @Route("/api/getVille/{cp}", name="get_ville_cp")
     * @Method({"GET"})
     * @param Request $request
     * @param $cp
     * @return $this
     * @throws \Exception
     */
    public function getVille(Request $request, $cp){
        $em = $this->getDoctrine()->getRepository(Ville::class);
        $villeCodePostal = $em->findOneBy(array('zipcode' => $cp));

        if($villeCodePostal) {
            $ville = $villeCodePostal->getLibelle();
        } else {
            $ville = null;
        }
        // AJAX
        $response = new JsonResponse();
        return $response->setData(array(
            'ville' => $ville
        ));
    }

}