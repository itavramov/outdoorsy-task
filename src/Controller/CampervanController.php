<?php


namespace App\Controller;


use App\Service\CampervanService;
use OpenTracing\GlobalTracer;
use OpenTracing\Tracer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CampervanController extends AbstractController
{
    protected $campervanService;

    public function __construct(CampervanService $campervanService)
    {
        $this->campervanService = $campervanService;
    }

    /**
     * @Route("/campervans/{id}", name="findCampervanById")
     */
    public function findCampervanById($id)
    {
        $jsonData = $this->campervanService->findCampervanById($id);

        return new JsonResponse(
            $jsonData,
            200,
            [
                'Content-Type',
                'application/json; charset=UTF-8'
            ]
        );
    }

    /**
     * @Route("/campervans", name="listCampervans", defaults={"offset"=0, "limit"="max","priceMin"=0,"priceMax"="max"})
     */
    public function listAllCampervans(Request $request)
    {
        $jsonData = $this->campervanService->listCampervans($request);

        return new JsonResponse(
            $jsonData,
            200,
            [
                'Content-Type',
                'application/json; charset=UTF-8'
            ]
        );
    }
}