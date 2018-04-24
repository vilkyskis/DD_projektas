<?php

namespace App\Controller;

use App\Entity\ServicesCategory;
use App\Form\ServicesCategoryType;
use App\Repository\ServicesCategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/services/category")
 */
class ServicesCategoryController extends Controller
{
    /**
     * @Route("/", name="services_category_index", methods="GET")
     */
    public function index(ServicesCategoryRepository $servicesCategoryRepository): Response
    {
        return $this->render('services_category/index.html.twig', ['services_categories' => $servicesCategoryRepository->findAll()]);
    }

    /**
     * @Route("/new", name="services_category_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $servicesCategory = new ServicesCategory();
        $form = $this->createForm(ServicesCategoryType::class, $servicesCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($servicesCategory);
            $em->flush();

            return $this->redirectToRoute('services_category_index');
        }

        return $this->render('services_category/new.html.twig', [
            'services_category' => $servicesCategory,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="services_category_show", methods="GET")
     */
    public function show(ServicesCategory $servicesCategory): Response
    {
        return $this->render('services_category/show.html.twig', ['services_category' => $servicesCategory]);
    }

    /**
     * @Route("/{id}/edit", name="services_category_edit", methods="GET|POST")
     */
    public function edit(Request $request, ServicesCategory $servicesCategory): Response
    {
        $form = $this->createForm(ServicesCategoryType::class, $servicesCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('services_category_edit', ['id' => $servicesCategory->getId()]);
        }

        return $this->render('services_category/edit.html.twig', [
            'services_category' => $servicesCategory,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="services_category_delete", methods="DELETE")
     */
    public function delete(Request $request, ServicesCategory $servicesCategory): Response
    {
        if ($this->isCsrfTokenValid('delete'.$servicesCategory->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($servicesCategory);
            $em->flush();
        }

        return $this->redirectToRoute('services_category_index');
    }
}
