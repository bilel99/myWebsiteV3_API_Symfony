<?php
namespace AppBundle\Service;

use Doctrine\Bundle\DoctrineBundle\Registry;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class Validate {

    private $validator;

    /**
     * Validate constructor.
     * @param ValidatorInterface $validator
     */
    public function __construct(ValidatorInterface $validator)
    {
        $this->validator = $validator;
    }

    /**
     * Validation of request Assert Entity
     * @param $data
     * @return array
     */
    public function validateRequest($data){
        $errors = $this->validator->validate($data);

        $errorsResponse = array();

        /**
         * @var ConstraintViolation $error
         */
        foreach($errors as $error){
            $errorsResponse[] = [
                'field' => $error->getPropertyPath(),
                'message' => $error->getMessage()
            ];
        }

        if(count($errors)){
            $reponse = array(
                'code' => 1,
                'message' => 'validation errors',
                'errors' => $errorsResponse,
                'result' => null
            );
            return $reponse;
        } else {
            $reponse = [];
            return $reponse;
        }
    }

}