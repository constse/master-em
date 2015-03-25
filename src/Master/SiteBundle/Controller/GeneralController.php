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

    public function flightsAction()
    {
        return $this->render('MasterSiteBundle:General:flights.html.twig', array(
            'menu_active' => 'flights'
        ));
    }

    public function indexAction()
    {
        return $this->render('MasterSiteBundle:General:index.html.twig', array(
            'menu_active' => 'index'
        ));
    }

    public function visaAction()
    {
        return $this->render('MasterSiteBundle:General:visa.html.twig', array(
            'menu_active' => 'visa'
        ));
    }
} 