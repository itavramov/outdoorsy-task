<?php


namespace App\Controller;


use App\Repository\RentalsRepository;
use App\Service\CampervanService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    protected $rentalRepo;
    protected $campervanService;

    public function __construct(
        RentalsRepository $rentalsRepository,
        CampervanService $campervanService
    ) {
        $this->rentalRepo = $rentalsRepository;
        $this->campervanService = $campervanService;
    }

    /**
     * @Route("/", name="index", defaults={"offset"=0, "limit"="max","priceMin"=0,"priceMax"="max"})
     */
    public function index(
        Request $request
    ) {
        dump('Само Левски!');die;
    }

}