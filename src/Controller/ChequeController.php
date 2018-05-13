<?php

namespace App\Controller;

use App\Entity\Cheque;
use App\Entity\Order;
use App\Form\ChequeType;
use App\Repository\ChequeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/cheque")
 */
class ChequeController extends Controller
{
    /**
     * @Route("/", name="cheque_index", methods="GET")
     */
    public function index(ChequeRepository $chequeRepository): Response
    {
        return $this->render('cheque/index.html.twig', ['cheques' => $chequeRepository->findAll()]);
    }

    /**
     * @Route("/new?price={price},id={id}", name="cheque_new", methods="GET|POST")
     */
    public function new(Request $request,$price,$id): Response
    {
        $cheque = new Cheque();
        $cheque->setPaid(false); // 1 - is paid; 0 - is nor paid
        $em = $this->getDoctrine()->getManager();
        $order = $em->getRepository(Order::class)->find($id);
        $form = $this->createForm(ChequeType::class, $cheque,array(
            'price' => $price,
        ));
        $order->setCheque($cheque);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cheque);
            $order->setCheque($cheque);
            $em->flush();
            return $this->redirectToRoute('cheque_index');
        }

        return $this->render('cheque/new.html.twig', [
            'cheque' => $cheque,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="cheque_show", methods="GET")
     */
    public function show(Cheque $cheque): Response
    {
        return $this->render('cheque/show.html.twig', ['cheque' => $cheque]);
    }

    /**
     * @Route("/{id}/edit", name="cheque_edit", methods="GET|POST")
     */
    public function edit(Request $request, Cheque $cheque): Response
    {
        $form = $this->createForm(ChequeType::class, $cheque);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cheque_edit', ['id' => $cheque->getId()]);
        }

        return $this->render('cheque/edit.html.twig', [
            'cheque' => $cheque,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="cheque_delete", methods="DELETE")
     */
    public function delete(Request $request, Cheque $cheque): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cheque->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cheque);
            $em->flush();
        }

        return $this->redirectToRoute('cheque_index');
    }
}
