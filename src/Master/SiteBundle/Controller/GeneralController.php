<?php

namespace Master\SiteBundle\Controller;

use Master\SystemBundle\Controller\InitializableController;

class GeneralController extends InitializableController
{
    public function bookingAction()
    {
        return $this->render('MasterSiteBundle:General:booking.html.twig', array(
            'menu_active' => 'booking'
        ));
    }

    public function contactsAction()
    {
        return $this->render('MasterSiteBundle:General:contacts.html.twig', array(
            'menu_active' => 'contacts'
        ));
    }

    public function faqAction()
    {
        return $this->render('MasterSiteBundle:General:faq.html.twig', array(
            'menu_active' => null
        ));
    }

    public function flightsAction()
    {
        return $this->render('MasterSiteBundle:General:flights.html.twig', array(
            'menu_active' => 'flights'
        ));
    }

    public function indexAction()
    {
        return $this->render('MasterSiteBundle:General:index.html.twig');
    }

    public function loyaltyAction()
    {
        return $this->render('MasterSiteBundle:General:loyalty.html.twig', array(
            'menu_active' => null
        ));
    }

    public function reviewsAction()
    {
        return $this->render('MasterSiteBundle:General:reviews.html.twig', array(
            'menu_active' => null
        ));
    }

    public function visaAction()
    {
        return $this->render('MasterSiteBundle:General:visa.html.twig', array(
            'menu_active' => 'visa'
        ));
    }
} 