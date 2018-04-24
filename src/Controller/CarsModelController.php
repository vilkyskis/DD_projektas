<?php

namespace App\Controller;

use App\Entity\CarsModel;
use App\Form\CarsModelType;
use App\Repository\CarsModelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/cars/model")
 */
class CarsModelController extends Controller
{
    /**
     * @Route("/", name="cars_model_index", methods="GET")
     */
    public function index(CarsModelRepository $carsModelRepository): Response
    {
        return $this->render('cars_model/index.html.twig', ['cars_models' => $carsModelRepository->findAll()]);
    }

    /**
     * @Route("/new", name="cars_model_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $carsModel = new CarsModel();
        $form = $this->createForm(CarsModelType::class, $carsModel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($carsModel);
            $em->flush();

            return $this->redirectToRoute('cars_model_index');
        }

        return $this->render('cars_model/new.html.twig', [
            'cars_model' => $carsModel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="cars_model_show", methods="GET")
     */
    public function show(CarsModel $carsModel): Response
    {
        return $this->render('cars_model/show.html.twig', ['cars_model' => $carsModel]);
    }

    /**
     * @Route("/{id}/edit", name="cars_model_edit", methods="GET|POST")
     */
    public function edit(Request $request, CarsModel $carsModel): Response
    {
        $form = $this->createForm(CarsModelType::class, $carsModel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cars_model_edit', ['id' => $carsModel->getId()]);
        }

        return $this->render('cars_model/edit.html.twig', [
            'cars_model' => $carsModel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="cars_model_delete", methods="DELETE")
     */
    public function delete(Request $request, CarsModel $carsModel): Response
    {
        if ($this->isCsrfTokenValid('delete'.$carsModel->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($carsModel);
            $em->flush();
        }

        return $this->redirectToRoute('cars_model_index');
    }
}
