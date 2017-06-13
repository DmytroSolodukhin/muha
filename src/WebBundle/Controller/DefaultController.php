<?php

namespace WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class DefaultController
 * @package WebBundle\Controller
 */
class DefaultController extends Controller
{
    /**
     * @return Response
     */
    public function indexAction()
    {
        $news = $this->container->get('news.handler')->getEntities(['startPage' => true],[],10);
        $locale = $this->get('request')->getLocale();
        return $this->render('WebBundle:Default:index_'.$locale.'.html.twig',[
            'news' => $news
        ]);
    }

    /**
     * @return Response
     */
    public function photoAction()
    {
        $photo = $this->container->get('photo.handler')->getEntities();
        $locale = $this->get('request')->getLocale();

        return $this->render('WebBundle:Default:photo_'.$locale.'.html.twig',[
            'galerey' => $photo
        ]);
    }

    /**
     * @return Response
     */
    public function videoAction()
    {
        $video = $this->container->get('video.handler')->getEntities();
        $locale = $this->get('request')->getLocale();

        return $this->render('WebBundle:Default:video_'.$locale.'.html.twig',[
            'videos' => $video
        ]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return Response
     */
    public function autoAction(Request $request, $id)
    {
        $transport = $this->container->get('transport.handler')->getEntity($id);
        $locale = $this->get('request')->getLocale();

        return $this->render('WebBundle:Default:transport_'.$locale.'.html.twig',[
            'transport' => $transport
        ]);
    }

}
