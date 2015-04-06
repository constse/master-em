<?php

namespace Master\SystemBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class InitializableController extends Controller
{
    protected $authChecker;
    protected $manager;
    protected $repositories;
    /** @var Request */
    protected $request;
    protected $session;
    protected $user;

    public function getRepository($entity)
    {
        if (!array_key_exists($entity, $this->repositories))
            $this->repositories[$entity] = $this->manager->getRepository('MasterSystemBundle:' . $entity);

        return $this->repositories[$entity];
    }

    public function initialize(Request $request)
    {
        $this->request = $request;

        $this->authChecker = $this->get('security.authorization_checker');
        $this->manager = $this->getDoctrine()->getManager();
        $this->repositories = array();
        $this->session = $this->request->getSession();
        $this->user = $this->getUser();
    }
} 