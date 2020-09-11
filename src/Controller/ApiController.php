<?php
/**
 * ApiController.php
 *
 * API Controller
 *
 * @category   Controller
 */
namespace App\Controller;

use App\Entity\User;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Swagger\Annotations as SWG;

class ApiController extends FOSRestController
{
    const JSON = 'json';

    public function userInfoAction(Request $request)
    {
        $error = false;
        $message = "";
        $em = $this->getDoctrine()->getManager();
        $extendedUser = $this->getDoctrine()->getRepository(User::class)->findOneById($this->getUser()->getId());
        if ($request->isMethod('post')) {
            try {
                
                if ($request->request->has('username')){
                    $extendedUser->setUsername($request->get("username"));
                }

                if ($request->request->has('comment')){
                    $extendedUser->setComment($request->get("comment"));
                }

                $em->persist($extendedUser);
                $em->flush();
            } catch (Exception $ex) {
                $error = true;
                $message = "An error has occurred - Error: {" . $ex->getMessage() . "}";
            }
        }
        $jsonResponse = $this->container->get('jms_serializer')->serialize($error == false ? $extendedUser : $message, self::JSON);
        
        return new Response($jsonResponse,  Response::HTTP_OK,
        ['content-type' => 'application/json']);
    }
}