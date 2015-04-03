<?php

namespace Master\AdminBundle\Controller;

use Master\AdminBundle\Form\Type\CertificateFormType;
use Master\AdminBundle\Form\Type\LoginFormType;
use Master\AdminBundle\Form\Type\ReviewFormType;
use Master\AdminBundle\Form\Type\TourFormType;
use Master\SystemBundle\Controller\InitializableController;
use Master\SystemBundle\Entity\Certificate;
use Master\SystemBundle\Entity\Review;
use Master\SystemBundle\Entity\Tour;
use Master\SystemBundle\Entity\User;
use Symfony\Component\Security\Core\Security;

class AdminController extends InitializableController
{
    public function addCertificateAction()
    {
        $cert = new Certificate();
        $form = $this->createForm(new CertificateFormType(), $cert);
        $form->handleRequest($this->request);

        if ($form->isSubmitted() && $form->isValid()) {
            $cert->getImage()->upload();
            $this->manager->persist($cert->getImage());
            $this->manager->persist($cert);
            $this->manager->flush();

            return $this->redirectToRoute('admin_certificates');
        }

        return $this->render('MasterAdminBundle:Admin:certificate.html.twig', array(
            'form' => $form->createView(),
            'cert' => null
        ));
    }

    public function addReviewAction()
    {
        $review = new Review();
        $form = $this->createForm(new ReviewFormType(), $review);
        $form->handleRequest($this->request);

        if ($form->isSubmitted() && $form->isValid()) {
            $review->getImage()->upload();
            $this->manager->persist($review->getImage());
            $this->manager->persist($review);
            $this->manager->flush();

            return $this->redirectToRoute('admin_reviews');
        }

        return $this->render('MasterAdminBundle:Admin:review.html.twig', array(
            'form' => $form->createView(),
            'review' => null
        ));
    }

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

    public function certificatesAction()
    {
        $certs = $this->getRepository('Certificate')->createQueryBuilder('c')
            ->leftJoin('c.image', 'i')
            ->orderBy('c.created', 'DESC')
            ->getQuery()->getResult();

        return $this->render('MasterAdminBundle:Admin:certificates.html.twig', array(
            'certs' => $certs
        ));
    }

    public function deleteCertificateAction($cert)
    {
        $cert = $this->getRepository('Certificate')->find($cert);

        if (is_null($cert)) throw $this->createNotFoundException();

        $image = $cert->getImage();
        $this->manager->remove($cert);
        $this->manager->remove($image);
        $this->manager->flush();

        return $this->redirectToRoute('admin_certificates');
    }

    public function deleteReviewAction($review)
    {
        $review = $this->getRepository('Review')->find($review);

        if (is_null($review)) throw $this->createNotFoundException();

        $image = $review->getImage();
        $this->manager->remove($review);
        $this->manager->remove($image);
        $this->manager->flush();

        return $this->redirectToRoute('admin_reviews');
    }

    public function deleteTourAction($tour)
    {
        $tour = $this->getRepository('Tour')->find($tour);

        if (is_null($tour)) throw $this->createNotFoundException();

        $image = $tour->getImage();
        $this->manager->remove($tour);
        $this->manager->remove($image);
        $this->manager->flush();

        return $this->redirectToRoute('admin_index');
    }

    public function editCertificateAction($cert)
    {
        $cert = $this->getRepository('Certificate')->find($cert);

        if (is_null($cert)) throw $this->createNotFoundException();

        $form = $this->createForm(new CertificateFormType(), $cert);
        $form->handleRequest($this->request);

        if ($form->isSubmitted() && $form->isValid()) {
            $cert->getImage()->upload();
            $this->manager->persist($cert->getImage());
            $this->manager->persist($cert);
            $this->manager->flush();

            return $this->redirectToRoute('admin_certificates');
        }

        return $this->render('MasterAdminBundle:Admin:certificate.html.twig', array(
            'form' => $form->createView(),
            'cert' => $cert
        ));
    }

    public function editReviewAction($review)
    {
        $review = $this->getRepository('Review')->find($review);

        if (is_null($review)) throw $this->createNotFoundException();

        $form = $this->createForm(new ReviewFormType(), $review);
        $form->handleRequest($this->request);

        if ($form->isSubmitted() && $form->isValid()) {
            $review->getImage()->upload();
            $this->manager->persist($review->getImage());
            $this->manager->persist($review);
            $this->manager->flush();

            return $this->redirectToRoute('admin_reviews');
        }

        return $this->render('MasterAdminBundle:Admin:review.html.twig', array(
            'form' => $form->createView(),
            'review' => $review
        ));
    }

    public function editTourAction($tour)
    {
        $tour = $this->getRepository('Tour')->find($tour);

        if (is_null($tour)) throw $this->createNotFoundException();

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
            'tour' => $tour
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

    public function reviewsAction()
    {
        $reviews = $this->getRepository('Review')->createQueryBuilder('r')
            ->leftJoin('r.image', 'i')
            ->orderBy('r.created', 'DESC')
            ->getQuery()->getResult();

        return $this->render('MasterAdminBundle:Admin:reviews.html.twig', array(
            'reviews' => $reviews
        ));
    }
} 