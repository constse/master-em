<?php

namespace Master\SiteBundle\Controller;

use Master\SystemBundle\Controller\InitializableController;

class GeneralController extends InitializableController
{
    public function indexAction()
    {
        return $this->render('MasterSiteBundle:General:index.html.twig');
    }
} 