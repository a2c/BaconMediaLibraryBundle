<?php

namespace Bacon\Bundle\MediaLibraryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/admin/media-library", name="bacon_manager_url", options={"expose": true})
     */
    public function indexAction(Request $request)
    {
        $mediaLibrary = $this
            ->getDoctrine()
            ->getRepository('BaconMediaLibraryBundle:MediaLibrary')
            ->getPagination()
        ;    
        
        $pagination = $this->get('knp_paginator')->paginate(
            $mediaLibrary,
            1,
            100
        );


        if ($request->query->get('frontend') == 'CKEDITOR') {

            return $this->render('BaconMediaLibraryBundle:Default:ckeditor.html.twig', [
                'pagination' => $pagination,
            ]);
        }

        return $this->render('BaconMediaLibraryBundle:Default:index.html.twig', [
            'pagination' => $pagination,
        		
        ]);
    }
}
