<?php

namespace App\Controller;

use App\Entity\ServicesSubCategory;
use App\Form\ServicesSubCategoryType;
use App\Repository\ServicesSubCategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/services/sub/category")
 */
class ServicesSubCategoryController extends Controller
{
    /**
     * @Route("/", name="services_sub_category_index", methods="GET")
     */
    public function index(ServicesSubCategoryRepository $servicesSubCategoryRepository): Response
    {
        return $this->render('services_sub_category/index.html.twig', ['services_sub_categories' => $servicesSubCategoryRepository->findAll()]);
    }

    /**
     * @Route("/new", name="services_sub_category_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $servicesSubCategory = new ServicesSubCategory();
        $form = $this->createForm(ServicesSubCategoryType::class, $servicesSubCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($servicesSubCategory);
            $em->flush();

            return $this->redirectToRoute('services_sub_category_index');
        }

        return $this->render('services_sub_category/new.html.twig', [
            'services_sub_category' => $servicesSubCategory,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="services_sub_category_show", methods="GET")
     */
    public function show(ServicesSubCategory $servicesSubCategory): Response
    {
        return $this->render('services_sub_category/show.html.twig', ['services_sub_category' => $servicesSubCategory]);
    }

    /**
     * @Route("/{id}/edit", name="services_sub_category_edit", methods="GET|POST")
     */
    public function edit(Request $request, ServicesSubCategory $servicesSubCategory): Response
    {
        $form = $this->createForm(ServicesSubCategoryType::class, $servicesSubCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('services_sub_category_edit', ['id' => $servicesSubCategory->getId()]);
        }

        return $this->render('services_sub_category/edit.html.twig', [
            'services_sub_category' => $servicesSubCategory,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="services_sub_category_delete", methods="DELETE")
     */
    public function delete(Request $request, ServicesSubCategory $servicesSubCategory): Response
    {
        if ($this->isCsrfTokenValid('delete'.$servicesSubCategory->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($servicesSubCategory);
            $em->flush();
        }

        return $this->redirectToRoute('services_sub_category_index');
    }
}
