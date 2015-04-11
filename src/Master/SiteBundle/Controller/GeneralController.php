<?php

namespace Master\SiteBundle\Controller;

use Master\SiteBundle\Form\Type\Request2FormType;
use Master\SiteBundle\Form\Type\RequestFormType;
use Master\SystemBundle\Controller\InitializableController;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class GeneralController extends InitializableController
{
    /** @var Form */
    protected $form;

    public function initialize(Request $request)
    {
        parent::initialize($request);

        $this->form = $this->createForm(new RequestFormType());
    }

    public function render($view, array $parameters = array(), Response $response = null)
    {
        $parameters = array_merge($parameters, array('form' => $this->form->createView()));

        return parent::render($view, $parameters, $response);
    }

    public function bookingAction()
    {
        return $this->render('MasterSiteBundle:General:booking.html.twig');
    }

    public function certificateAction()
    {
        return $this->render('MasterSiteBundle:General:certificate.html.twig');
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

    public function creditAction()
    {
        return $this->render('MasterSiteBundle:General:credit.html.twig');
    }

    public function faqAction()
    {
        return $this->render('MasterSiteBundle:General:faq.html.twig');
    }

    public function filesDocsAction()
    {
        $filename = __DIR__ . '/../../../../web/files/docs.doc';
        $response = new Response();
        $response->headers->set('Content-Type', 'application/msword');
        $response->headers->set('Content-Disposition', 'attachment; filename="' . basename($filename) . '";');
        $response->headers->set('Content-Length', filesize($filename));
        $response->sendHeaders();
        $response->setContent(readfile($filename));

        return $response;
    }

    public function filesPriceAction()
    {
        $filename = __DIR__ . '/../../../../web/files/price.doc';
        $response = new Response();
        $response->headers->set('Content-Type', 'application/msword');
        $response->headers->set('Content-Disposition', 'attachment; filename="' . basename($filename) . '";');
        $response->headers->set('Content-Length', filesize($filename));
        $response->sendHeaders();
        $response->setContent(readfile($filename));

        return $response;
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
        shuffle($tours);
        $form = $this->createForm(new Request2FormType());

        return $this->render('MasterSiteBundle:General:index.html.twig', array(
            'tours' => $tours,
            'tour_form' => $form->createView()
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
        shuffle($tours);
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
        shuffle($tours);
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
        shuffle($tours);
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
        shuffle($tours);
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
        shuffle($tours);
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

    public function requestAction()
    {
        $this->form->handleRequest($this->request);

        if ($this->form->isSubmitted() && $this->form->isValid()) {
            $success = false;
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
            $headers = implode("\r\n", $headers);

            if (mail('master-em@list.ru', 'Заявка с сайта!', $text, $headers)) $success = true;

            require_once __DIR__ . '/../../../../web/smsc_api.php';
            $text = 'Заявка с сайта: '
                . $this->form->get('name')->getData() . ', '
                . $this->form->get('phone')->getData() . ', '
                . $this->form->get('email')->getData();

            $count = 0;
            list($id, $count, $cost, $balance) = send_sms('+79836010014', $text, 0, 0, 0, 0, false);

            if ($count > 0) $success = true;

            if ($success) return new JsonResponse('ok');
        }

        throw $this->createNotFoundException();
    }

    public function request2Action()
    {
        $this->form->handleRequest($this->request);

        if ($this->form->isSubmitted() && $this->form->isValid()) {
            $success = false;
            $text = $this->renderView('MasterSiteBundle:General:mail2.html.twig', array(
                'name' => $this->form->get('name')->getData(),
                'email' => $this->form->get('email')->getData(),
                'from' => $this->form->get('from')->getData(),
                'query' => $this->form->get('query')->getData()
            ));
            $headers = array(
                'From: <noreply@master-em.com>',
                'MIME-Version: 1.0',
                "Content-Type: text/html; charset=utf-8\r\n"
            );
            $headers = implode("\r\n", $headers);

            if (mail('master-em@list.ru', 'Заявка с сайта!', $text, $headers)) $success = true;

            require_once __DIR__ . '/../../../../web/smsc_api.php';
            $text = 'Заявка с сайта: '
                . $this->form->get('name')->getData() . ', '
                . $this->form->get('email')->getData();

            $count = 0;
            list($id, $count, $cost, $balance) = send_sms('+79836010014', $text, 0, 0, 0, 0, false);

            if ($count > 0) $success = true;

            if ($success) return new JsonResponse('ok');
        }

        throw $this->createNotFoundException();
    }

    public function visaAction()
    {
        return $this->render('MasterSiteBundle:General:visa.html.twig');
    }
} 