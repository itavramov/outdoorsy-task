<?php


namespace App\Service;

use App\DataSerializer\ObjectSerializer;
use App\Repository\RentalsRepository;
use Symfony\Component\HttpFoundation\Request;

class CampervanService
{
    protected $campervanRepo;
    protected $objectSerializer;

    public function __construct(
        RentalsRepository $rentalsRepository,
        ObjectSerializer $objectSerializer
        ) {
        $this->campervanRepo = $rentalsRepository;
        $this->objectSerializer = $objectSerializer;
    }

    public function findCampervanById($id)
    {
        $campervan = $this->campervanRepo->findCampervanById($id);

        $jsonData = $this->objectSerializer->objectToJsonSerialize($campervan);

        return $jsonData;
    }

    public function findCampervansByIds($ids) {
        $campervans = [];
        if (!empty($ids)) {
            foreach ($ids as $id) {
                $campervans[] = $this->campervanRepo->find($id);
            }
        }

        return $campervans;
    }

    public function findCampervansAroundYou(
        Request $request
    ) {
        $campervans = $this->campervanRepo->getAllCamperVansNearLocation(
            $request->attributes->get('offset'),
            $request->attributes->get('limit'),
            $request->attributes->get('priceMin'),
            $request->attributes->get('priceMax'),
            explode(',',$request->get('near'))[0],
            explode(',',$request->get('near'))[1]
        );
        if (!empty($campervans)) {
            $filtered = array_filter(
                $campervans,
                function ($element) {
                    return $element['distance'] < 161;
                }
            );
        }

        return $campervans;
    }

    public function findCampervansAroundYouSorted(
        Request $request,
        $sortOption
    ) {
        $campervans = $this->campervanRepo->getAllCamperVansNearLocationSorted(
            $request->attributes->get('offset'),
            $request->attributes->get('limit'),
            $request->attributes->get('priceMin'),
            $request->attributes->get('priceMax'),
            explode(',',$request->get('near'))[0],
            explode(',',$request->get('near'))[1],
            $sortOption
        );
        if (!empty($campervans)) {
            $filtered = array_filter(
                $campervans,
                function ($element) {
                    return $element['distance'] < 161;
                }
            );
        }

        return $campervans;
    }

    public function listCampervans(Request $request)
    {
        $extraSortOption = false;
        $extraFilterNearOption = false;
        $extraIdsOption = false;
        if (isset($request->get('price')['min'])) {
            $request->attributes->set('priceMin', $request->get('price')['min']);
        }
        if (isset($request->get('price')['max'])) {
            $request->attributes->set('priceMax', $request->get('price')['max']);
        }
        if (isset($request->get('page')['limit'])) {
            $request->attributes->set('limit', $request->get('page')['limit']);
        }
        if (isset($request->get('page')['offset'])) {
            $request->attributes->set('offset', $request->get('page')['offset']);
        }
        if ($request->attributes->get('limit') === "max") {
            $request->attributes->set(
                'limit',
                $this->campervanRepo->getCountOfRentals()
            );
        }
        if ($request->attributes->get('priceMax') === "max") {
            $request->attributes->set(
                'priceMax',
                $this->campervanRepo->getCampervanMaxRentalPrice()
            );
        }

        if ($request->get('order')) {
            $extraSortOption = true;
            switch ($request->get('order')) {
                case 'price':
                    $orderBy = 'pricePerDay';
                    break;
                case 'id':
                    $orderBy = 'id';
                    break;
                case 'updated':
                    $orderBy = 'updated';
                    break;
                case 'created':
                    $orderBy = 'created';
                    break;
                default:
                    $orderBy = 'none';
                    $extraSortOption = false;
                    break;
            }
        }

        if ($request->get('near')) {
            $extraFilterNearOption = true;
        } elseif ($request->get('ids')) {
            $extraIdsOption = true;
        }

        if ($extraSortOption) {
            $campervans = $this->campervanRepo->listAllCampervansSorted(
                $request->attributes->get('offset'),
                $request->attributes->get('limit'),
                $request->attributes->get('priceMin'),
                $request->attributes->get('priceMax'),
                $orderBy
            );
        } elseif ($extraFilterNearOption) {
            $campervans = $this->findCampervansAroundYou($request);
        } elseif ($extraFilterNearOption && $extraSortOption) {
            $campervans = $this->findCampervansAroundYouSorted(
                $request,
                $orderBy
            );
        } elseif ($extraIdsOption) {
            $campervans = $this->findCampervansByIds(explode(',',$request->get('ids')));
        } else {
            $campervans = $this->campervanRepo->getAllCampervans(
                $request->attributes->get('offset'),
                $request->attributes->get('limit'),
                $request->attributes->get('priceMin'),
                $request->attributes->get('priceMax')
            );
        }

        $jsonData = $this->objectSerializer->arrayOfObjectsToJson($campervans);


        return $jsonData;
    }

    public function findAllCampervansSortedByPrice()
    {
        $campervans = $this->campervanRepo->getAllCamperVansSortedByPrice();

        if (!empty($campervans)) {
            foreach ($campervans as $campervan) {
                $jsonData[] = $this->objectSerializer->objectToJsonSerialize($campervan);
            }
        }

        return json_encode($jsonData);
    }
}