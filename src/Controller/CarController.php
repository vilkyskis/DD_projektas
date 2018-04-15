<?php

namespace App\Controller;

use App\Entity\Car;
use App\Form\CarRegistrationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CarController extends Controller
{
    /**
     * @Route("/car", name="car")
     */
    public function index()
    {
        return $this->render('car/index.html.twig', [
            'controller_name' => 'CarController',
        ]);
    }

    /**
     * @Route("/carRegister", name="car_register")
     */
    public function carRegister(Request $request)
    {
        $car = new Car();
        if (is_null($car->getUser())) {
            $user = $this->getDoctrine()
                ->getRepository('App:User');
            $userObj = $user->find(1);
            $car->setUser($userObj);
        }
        $form = $this->createForm(CarRegistrationType::class, $car);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            //save the car
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($car);
            $entityManager->flush();

            return new Response('Saved new product with id ' . $car->getId());
        }

        return $this->render('car/register.html.twig', array(
                'form' => $form->createView(),
            )
        );

    }
}
