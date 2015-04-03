<?php

namespace Master\AdminBundle\Controller;

use Master\AdminBundle\Form\Type\LoginFormType;
use Master\AdminBundle\Form\Type\TourFormType;
use Master\SystemBundle\Controller\InitializableController;
use Master\SystemBundle\Entity\Tour;
use Master\SystemBundle\Entity\User;
use Symfony\Component\Security\Core\Security;

class AdminController extends InitializableController
{
    public function addTourAction()
    {
        $tour = new Tour();
        $form = $this->createForm(new TourFormType(), $tour);
        $form->handleRequest($this->request);

        if ($form->isSubmitted() && $form->isValid()) {
            $tour->getImage()->upload();
            $this->manager->persist($tour->getImage());
            $this->manager->persist($tour);
            $this->manager->flush();

            return $this->redirectToRoute('admin_index');
        }

        return $this->render('MasterAdminBundle:Admin:tour.html.twig', array(
            'form' => $form->createView(),
            'tour' => null
        ));
    }

    public function indexAction()
    {
        $tours = $this->getRepository('Tour')->createQueryBuilder('t')
            ->leftJoin('t.image', 'i')
            ->orderBy('t.created', 'DESC')
            ->getQuery()->getResult();

        return $this->render('MasterAdminBundle:Admin:index.html.twig', array(
            'tours' => $tours
        ));
    }

    public function loginAction()
    {
        if ($this->authChecker->isGranted('IS_AUTHENTICATED_FULLY')) return $this->redirectToRoute('admin_index');

        $authError = null;

        if ($this->request->attributes->has(Security::AUTHENTICATION_ERROR))
            $authError = $this->request->attributes->get(Security::AUTHENTICATION_ERROR);
        else {
            $authError = $this->session->get(Security::AUTHENTICATION_ERROR);
            $this->session->remove(Security::AUTHENTICATION_ERROR);
        }

        $user = new User();
        $form = $this->createForm(new LoginFormType(), $user);

        return $this->render('MasterAdminBundle:Admin:login.html.twig', array(
            'form' => $form->createView()
        ));
    }
} 