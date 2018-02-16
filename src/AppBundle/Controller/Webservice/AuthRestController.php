<?php
namespace AppBundle\Controller\Webservice;

use AppBundle\Entity\Langue;
use AppBundle\Entity\Role;
use AppBundle\Entity\User;
use AppBundle\Service\Validate;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthRestController extends Controller {


    /**
     * @Route("/api/langue", name="get_langue")
     * @Method({"GET"})
     *
     * @return JsonResponse
     */
    public function getLangue(){

        $em = $this->getDoctrine()->getRepository(Langue::class);
        $langue = $em->findAll();

        if(empty($langue)){
            $response = array(
                'code' => 1,
                'message' => 'langue not found',
                'error' => null,
                'result' => null
            );
            return new JsonResponse($response, Response::HTTP_NOT_FOUND);
        }

        $data = $this->get('jms_serializer')->serialize($langue, 'json');

        $response = array(
            'code' => 0,
            'message' => 'success',
            'error' => null,
            'result' => json_decode($data)
        );

        return new JsonResponse($response, 200);

    }


    /**
     * @Route("/api/login", name="login")
     * @Method({"POST"})
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request){
        $data = $request->getContent();

        $serializer = $this->get('jms_serializer');

        $auth = $serializer->deserialize($data, User::class, 'json');

        // Authentification
        $email = $auth->getEmail();
        $password = $auth->getPassword();

        $entityUser = $this->getDoctrine()->getRepository(User::class);
        $result = $entityUser->authorizedAccess($email, sha1($password.' '.$this->getParameter('salt')));

        $data = $this->get('jms_serializer')->serialize($result, 'json');
        if(count($result) === 1) {
            $response = array(
                'code' => 0,
                'message' => 'success',
                'error' => null,
                'result' => json_decode($data)
            );
            return new JsonResponse($response, 200);
        } else {
            $response = array(
                'code' => 1,
                'message' => 'error',
                'error' => null,
                'result' => null
            );
            return new JsonResponse($response, Response::HTTP_NOT_FOUND);
        }
    }


    /**
     * @Route("/api/register", name="register")
     * @Method({"POST"})
     *
     * @param Request $request
     * @param Validate $validate
     * @param \Swift_Mailer $mailer
     * @return JsonResponse
     */
    public function authRegister(Request $request, Validate $validate, \Swift_Mailer $mailer){
        $data = $request->getContent();

        $serializer = $this->get('jms_serializer');
        $user = $serializer->deserialize($data, User::class, 'json');

        $response = $validate->validateRequest($user);

        if(!empty($response)){
            return new JsonResponse($response, Response::HTTP_BAD_REQUEST);
        }

        // Récupération du role
        $instanceRole = $this->getDoctrine()->getRepository(Role::class);
        $role = $instanceRole->find(1);

        $em = $this->getDoctrine()->getManager();
        $user->setRole($role);

        // Hash Password
        $user->setPassword(sha1($user->getPassword().' '.$this->getParameter('salt')));

        $user->setCreatedAt(new \DateTime());
        $em->persist($user);
        $em->flush();

        // Envoie email
        $name = 'bilel.bekkouche@gmail.com';
        $email = $user->getEmail();
        $message = (new \Swift_Message('Register'))
            ->setFrom('bilel.bekkouche@gmail.com')
            ->setTo('bilel.bekkouche@hotmail.fr')
            ->setBody(
                $this->renderView(
                    'email/register.html.twig',
                    array(
                        'name' => $name,
                        'email' => $email
                    )
                ),
                'text/html'
            );
        $mailer->send($message);

        $response = array(
            'code' => 0,
            'message' => 'User created',
            'error' => null,
            'result' => null
        );

        return new JsonResponse($response, Response::HTTP_CREATED);
    }

    /**
     * @Route("/api/forgot", name="forgot_password")
     * @Method({"POST"})
     *
     * @param Request $request
     * @param \Swift_Mailer $mailer
     * @return JsonResponse
     */
    public function forgotPass(Request $request, \Swift_Mailer $mailer){
        $data = $request->getContent();

        $serializer = $this->get('jms_serializer');
        $user = $serializer->deserialize($data, User::class, 'json');

        // Rand password
        $newPass = $this->rand_passwd();
        $email = $user->getEmail();

        // Vérification si email existe
        $entityUser = $this->getDoctrine()->getRepository(User::class);
        $validEmail = $entityUser->findBy(array("email" => $email));

        if(count($validEmail) === 1){
            // Sauvegarde new pass field forgot table => user
            $em = $this->getDoctrine()->getManager();
            $upd = $em->getRepository(User::class)->find($validEmail[0]->getId());

            $upd->setForgot($newPass);
            $em->flush();

            // Envoie email
            $message = (new \Swift_Message('Mot de passe oublié'))
                ->setFrom('bilel.bekkouche@gmail.com')
                ->setTo('bilel.bekkouche@hotmail.fr')
                ->setBody(
                    $this->renderView(
                        'email/forgot.html.twig',
                        array(
                            'randomPassword' => $newPass,
                            'email' => $email
                        )
                    ),
                    'text/html'
                );
            $mailer->send($message);

            $response = array(
                'code' => 0,
                'message' => 'Forgot random password created',
                'error' => null,
                'result' => null
            );
            return new JsonResponse($response, Response::HTTP_CREATED);

        } else {
            $response = array(
                'code' => 1,
                'message' => 'Error email invalid or not found',
                'error' => null,
                'result' => null
            );
            return new JsonResponse($response, Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * @Route("/api/forgotStepFinal", name="forgot_step_final")
     * @Method({"POST"})
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function forgotStepFinal(Request $request){
        $data = $request->getContent();

        $serializer = $this->get('jms_serializer');
        $user = $serializer->deserialize($data, User::class, 'json');

        $forgotPass = $user->getForgot();

        $entityUser = $this->getDoctrine()->getRepository(User::class);
        $res = $entityUser->findBy(array("forgot" => $forgotPass));

        if(count($res) === 1){

            $em = $this->getDoctrine()->getManager();
            // Hash Password
            $res[0]->setPassword(sha1($forgotPass.' '.$this->getParameter('salt')));
            $em->persist($res[0]);
            $em->flush();

            $response = array(
                'code' => 0,
                'message' => 'success',
                'error' => null,
                'result' => $res[0]
            );

            return new JsonResponse($response, Response::HTTP_CREATED);

        } else {
            $response = array(
                'code' => 1,
                'message' => 'forgot password field not found',
                'error' => null,
                'result' => null
            );

            return new JsonResponse($response, Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Generate password random shuffle
     * @param int $length
     * @param string $chars
     * @return string
     */
    private function rand_passwd($length = 8, $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789') {
        return substr(str_shuffle($chars), 0, $length);
    }

}