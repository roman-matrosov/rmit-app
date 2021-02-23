<?php

namespace App\Controller;

use App\Entity\AppService;
use App\Form\AppServiceType;
use App\Repository\AppServiceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/app/service")
 */
class AppServiceController extends AbstractController
{
    /**
     * @Route("/", name="app_service_index", methods={"GET"})
     */
    public function index(AppServiceRepository $appServiceRepository): Response
    {
        return $this->render('app_service/index.html.twig', [
            'app_services' => $appServiceRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_service_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $appService = new AppService();
        $form = $this->createForm(AppServiceType::class, $appService);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($appService);
            $entityManager->flush();

            return $this->redirectToRoute('app_service_index');
        }

        return $this->render('app_service/new.html.twig', [
            'app_service' => $appService,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_service_show", methods={"GET"})
     */
    public function show(AppService $appService): Response
    {
        return $this->render('app_service/show.html.twig', [
            'app_service' => $appService,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_service_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, AppService $appService): Response
    {
        $form = $this->createForm(AppServiceType::class, $appService);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('app_service_index');
        }

        return $this->render('app_service/edit.html.twig', [
            'app_service' => $appService,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_service_delete", methods={"DELETE"})
     */
    public function delete(Request $request, AppService $appService): Response
    {
        if ($this->isCsrfTokenValid('delete'.$appService->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($appService);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_service_index');
    }
}
