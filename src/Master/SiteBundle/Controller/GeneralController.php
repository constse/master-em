<?php

namespace Master\SiteBundle\Controller;

use Master\SystemBundle\Controller\InitializableController;

class GeneralController extends InitializableController
{
    public function bookingAction()
    {
        return $this->render('MasterSiteBundle:General:booking.html.twig');
    }

    public function contactsAction()
    {
        $certificates = $this->getRepository('Certificate')->createQueryBuilder('c')
            ->leftJoin('c.image', 'i')
            ->orderBy('c.created', 'DESC')
            ->getQuery()->getResult();

        return $this->render('MasterSiteBundle:General:contacts.html.twig', array(
            'certificates' => $certificates
        ));
    }

    public function faqAction()
    {
        return $this->render('MasterSiteBundle:General:faq.html.twig');
    }

    public function flightsAction()
    {
        return $this->render('MasterSiteBundle:General:flights.html.twig');
    }

    public function indexAction()
    {
        $tours = $this->getRepository('Tour')->createQueryBuilder('t')
            ->leftJoin('t.image', 'i')
            ->orderBy('t.created', 'DESC')
            ->getQuery()->getResult();

        return $this->render('MasterSiteBundle:General:index.html.twig', array(
            'tours' => $tours
        ));
    }

    public function landing1Action()
    {
        $tours = $this->getRepository('Tour')->createQueryBuilder('t')
            ->leftJoin('t.image', 'i')
            ->where('t.landing = :landing')
            ->setParameters(array('landing' => 1))
            ->orderBy('t.created', 'DESC')
            ->getQuery()->getResult();
        $reviews = $this->getRepository('Review')->createQueryBuilder('r')
            ->leftJoin('r.image', 'i')
            ->orderBy('r.created', 'DESC')
            ->getQuery()->getResult();
        $certificates = $this->getRepository('Certificate')->createQueryBuilder('c')
            ->leftJoin('c.image', 'i')
            ->orderBy('c.created', 'DESC')
            ->getQuery()->getResult();

        return $this->render('MasterSiteBundle:General:landing1.html.twig', array(
            'landing' => 1,
            'tours' => $tours,
            'reviews' => $reviews,
            'certificates' => $certificates
        ));
    }

    public function landing2Action()
    {
        $tours = $this->getRepository('Tour')->createQueryBuilder('t')
            ->leftJoin('t.image', 'i')
            ->where('t.landing = :landing')
            ->setParameters(array('landing' => 2))
            ->orderBy('t.created', 'DESC')
            ->getQuery()->getResult();
        $reviews = $this->getRepository('Review')->createQueryBuilder('r')
            ->leftJoin('r.image', 'i')
            ->orderBy('r.created', 'DESC')
            ->getQuery()->getResult();
        $certificates = $this->getRepository('Certificate')->createQueryBuilder('c')
            ->leftJoin('c.image', 'i')
            ->orderBy('c.created', 'DESC')
            ->getQuery()->getResult();

        return $this->render('MasterSiteBundle:General:landing2.html.twig', array(
            'landing' => 2,
            'tours' => $tours,
            'reviews' => $reviews,
            'certificates' => $certificates
        ));
    }

    public function landing3Action()
    {
        $tours = $this->getRepository('Tour')->createQueryBuilder('t')
            ->leftJoin('t.image', 'i')
            ->where('t.landing = :landing')
            ->setParameters(array('landing' => 3))
            ->orderBy('t.created', 'DESC')
            ->getQuery()->getResult();
        $reviews = $this->getRepository('Review')->createQueryBuilder('r')
            ->leftJoin('r.image', 'i')
            ->orderBy('r.created', 'DESC')
            ->getQuery()->getResult();
        $certificates = $this->getRepository('Certificate')->createQueryBuilder('c')
            ->leftJoin('c.image', 'i')
            ->orderBy('c.created', 'DESC')
            ->getQuery()->getResult();

        return $this->render('MasterSiteBundle:General:landing3.html.twig', array(
            'landing' => 3,
            'tours' => $tours,
            'reviews' => $reviews,
            'certificates' => $certificates
        ));
    }

    public function landing4Action()
    {
        $tours = $this->getRepository('Tour')->createQueryBuilder('t')
            ->leftJoin('t.image', 'i')
            ->where('t.landing = :landing')
            ->setParameters(array('landing' => 4))
            ->orderBy('t.created', 'DESC')
            ->getQuery()->getResult();
        $reviews = $this->getRepository('Review')->createQueryBuilder('r')
            ->leftJoin('r.image', 'i')
            ->orderBy('r.created', 'DESC')
            ->getQuery()->getResult();
        $certificates = $this->getRepository('Certificate')->createQueryBuilder('c')
            ->leftJoin('c.image', 'i')
            ->orderBy('c.created', 'DESC')
            ->getQuery()->getResult();

        return $this->render('MasterSiteBundle:General:landing4.html.twig', array(
            'landing' => 4,
            'tours' => $tours,
            'reviews' => $reviews,
            'certificates' => $certificates
        ));
    }

    public function landing5Action()
    {
        $tours = $this->getRepository('Tour')->createQueryBuilder('t')
            ->leftJoin('t.image', 'i')
            ->where('t.landing = :landing')
            ->setParameters(array('landing' => 5))
            ->orderBy('t.created', 'DESC')
            ->getQuery()->getResult();
        $reviews = $this->getRepository('Review')->createQueryBuilder('r')
            ->leftJoin('r.image', 'i')
            ->orderBy('r.created', 'DESC')
            ->getQuery()->getResult();
        $certificates = $this->getRepository('Certificate')->createQueryBuilder('c')
            ->leftJoin('c.image', 'i')
            ->orderBy('c.created', 'DESC')
            ->getQuery()->getResult();

        return $this->render('MasterSiteBundle:General:landing5.html.twig', array(
            'landing' => 5,
            'tours' => $tours,
            'reviews' => $reviews,
            'certificates' => $certificates
        ));
    }

    public function loyaltyAction()
    {
        return $this->render('MasterSiteBundle:General:loyalty.html.twig');
    }

    public function reviewsAction()
    {
        $reviews = $this->getRepository('Review')->createQueryBuilder('r')
            ->leftJoin('r.image', 'i')
            ->orderBy('r.created', 'DESC')
            ->getQuery()->getResult();

        return $this->render('MasterSiteBundle:General:reviews.html.twig', array(
            'reviews' => $reviews
        ));
    }

    public function visaAction()
    {
        return $this->render('MasterSiteBundle:General:visa.html.twig');
    }
} 