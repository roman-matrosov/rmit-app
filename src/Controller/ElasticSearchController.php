<?php

namespace App\Controller;

use FOS\ElasticaBundle\Finder\PaginatedFinderInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ElasticSearchController extends AbstractController
{
    private $appFinder;
    private $appServiceFinder;

    public function __construct(PaginatedFinderInterface $appFinder, PaginatedFinderInterface $appServiceFinder)
    {
        $this->appFinder = $appFinder;
        $this->appServiceFinder = $appServiceFinder;
    }

    /**
     * @Route("/elastic/search", name="elastic_search")
     */
    public function index(Request $request) : Response
    {
        $q = $request->get('q', null);
        $q = $q ? '*' . $q . '*' : null;
	
		$apps = $this->appFinder->find($q);
		$appServices =  $this->appServiceFinder->find($q);

        return new Response($this->renderView('elastic_search/index.html.twig', [
            'apps' => $apps,
            'appServices' => $appServices,
        ]));
    }
}
