<?php

namespace App\Controller;

use App\Entity\Main;
use App\Form\AddType;
use App\Repository\MainRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{

    /**
     * @Route("/", name="main")
     */
    public function add(Request $request, EntityManagerInterface $entityManager, MainRepository $mainRepository)
    {
        $add = new Main();

        $form=$this->createForm(AddType::class, $add);
        $form-> handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($add);
            $entityManager->flush();

            return $this->redirectToRoute('main');
        }


        $mains = $mainRepository->findAll();
        return $this->render('main/index.html.twig', [
            'form' => $form->createView(),
            'mains' => $mains,
        ]);
    }


    /**
     * @Route("/edit/{id}", name="edit")
     */
    public function edit(Request $request, Main $main)
    {
        $editForm = $this->createForm(AddType::class, $main);
        $editForm->handleRequest($request);

        if($editForm->isSubmitted() && $editForm->isValid()){
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('main');
        }

        return $this->render('main/edit.html.twig', [
            'main' => $main,
            'editForm' => $editForm->createView(),
        ]);
    }

    /**
     * @Route("/delete/{id}", name="delete")
     */
    public function delete($id)
    {
        $delete = $this->getDoctrine()->getManager();
        $quest = $delete->getRepository(Main::class)->find($id);

        if (!$quest){
            return $this->redirectToRoute('main');
        }
        $delete->remove($quest);
        $delete->flush();

        return $this->redirectToRoute('main');
    }
}
