<?php

namespace Master\SiteBundle\Controller;

use Master\SiteBundle\Form\Type\RequestFormType;
use Master\SystemBundle\Controller\InitializableController;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class GeneralController extends InitializableController
{
    protected $ajax;
    /** @var Form */
    protected $form;

    public function initialize(Request $request)
    {
        parent::initialize($request);

        $this->ajax = false;
        $this->form = $this->createForm(new RequestFormType());
        $this->form->handleRequest($this->request);

        if ($this->request->isXmlHttpRequest()) {
            if ($this->form->isSubmitted() && $this->form->isValid()) {
                $text = $this->renderView('MasterSiteBundle:General:mail.html.twig', array(
                    'name' => $this->form->get('name')->getData(),
                    'phone' => $this->form->get('phone')->getData(),
                    'email' => $this->form->get('email')->getData(),
                    'from' => $this->form->get('from')->getData(),
                    'query' => $this->form->get('query')->getData()
                ));

                $headers = array(
                    'From: <noreply@master-em.com>',
                    'MIME-Version: 1.0',
                    "Content-Type: text/html; charset=utf-8\r\n"
                );

                if (mail('const.seoff@gmail.com', 'Заявка с сайта!', $text, $headers))
                    $this->ajax = new JsonResponse('ok');
            }

            throw $this->createNotFoundException();
        }
    }

    public function render($view, array $parameters = array(), Response $response = null)
    {
        $parameters = array_merge($parameters, array('form' => $this->form->createView()));

        return parent::render($view, $parameters, $response);
    }

    public function bookingAction()
    {
        if ($this->ajax) return $this->ajax;

        return $this->render('MasterSiteBundle:General:booking.html.twig');
    }

    public function contactsAction()
    {
        if ($this->ajax) return $this->ajax;

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
        if ($this->ajax) return $this->ajax;

        return $this->render('MasterSiteBundle:General:faq.html.twig');
    }

    public function flightsAction()
    {
        if ($this->ajax) return $this->ajax;

        return $this->render('MasterSiteBundle:General:flights.html.twig');
    }

    public function indexAction()
    {
        if ($this->ajax) return $this->ajax;

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
        if ($this->ajax) return $this->ajax;

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
        if ($this->ajax) return $this->ajax;

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
        if ($this->ajax) return $this->ajax;

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
        if ($this->ajax) return $this->ajax;

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
        if ($this->ajax) return $this->ajax;

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
        if ($this->ajax) return $this->ajax;

        return $this->render('MasterSiteBundle:General:loyalty.html.twig');
    }

    public function reviewsAction()
    {
        if ($this->ajax) return $this->ajax;

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
        if ($this->ajax) return $this->ajax;
        
        return $this->render('MasterSiteBundle:General:visa.html.twig');
    }
} 