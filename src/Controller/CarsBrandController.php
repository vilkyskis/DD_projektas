<?php

namespace App\Controller;

use App\Entity\CarsBrand;
use App\Form\CarsBrandType;
use App\Repository\CarsBrandRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/cars/brand")
 */
class CarsBrandController extends Controller
{
    /**
     * @Route("/", name="cars_brand_index", methods="GET")
     */
    public function index(CarsBrandRepository $carsBrandRepository): Response
    {
        return $this->render('cars_brand/index.html.twig', ['cars_brands' => $carsBrandRepository->findAll()]);
    }

    /**
     * @Route("/new", name="cars_brand_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $carsBrand = new CarsBrand();
        $form = $this->createForm(CarsBrandType::class, $carsBrand);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($carsBrand);
            $em->flush();

            return $this->redirectToRoute('cars_brand_index');
        }

        return $this->render('cars_brand/new.html.twig', [
            'cars_brand' => $carsBrand,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="cars_brand_show", methods="GET")
     */
    public function show(CarsBrand $carsBrand): Response
    {
        return $this->render('cars_brand/show.html.twig', ['cars_brand' => $carsBrand]);
    }

    /**
     * @Route("/{id}/edit", name="cars_brand_edit", methods="GET|POST")
     */
    public function edit(Request $request, CarsBrand $carsBrand): Response
    {
        $form = $this->createForm(CarsBrandType::class, $carsBrand);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cars_brand_edit', ['id' => $carsBrand->getId()]);
        }

        return $this->render('cars_brand/edit.html.twig', [
            'cars_brand' => $carsBrand,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="cars_brand_delete", methods="DELETE")
     */
    public function delete(Request $request, CarsBrand $carsBrand): Response
    {
        if ($this->isCsrfTokenValid('delete'.$carsBrand->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($carsBrand);
            $em->flush();
        }

        return $this->redirectToRoute('cars_brand_index');
    }
}
