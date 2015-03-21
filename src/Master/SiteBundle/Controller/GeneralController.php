<?php

namespace Master\SiteBundle\Controller;

use Master\SystemBundle\Controller\InitializableController;

class GeneralController extends InitializableController
{
    public function contactsAction()
    {
        return $this->render('MasterSiteBundle:General:contacts.html.twig', array(
            'menu_active' => 'contacts'
        ));
    }

    public function indexAction()
    {
        return $this->render('MasterSiteBundle:General:index.html.twig', array(
            'menu_active' => 'index'
        ));
    }
} 