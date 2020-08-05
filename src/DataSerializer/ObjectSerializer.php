<?php


namespace App\DataSerializer;

use App\Entity\Rentals;
use JMS\Serializer\SerializerBuilder;
use Symfony\Component\Serializer\Encoder\EncoderInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;



class ObjectSerializer
{
    protected $encoders;
    protected $normalizers;
    protected $serializer;
    protected $serializerBuilder;

    public function __construct(
        EncoderInterface $jsonEncoder,
        ObjectNormalizer $objectNormalizer,
        EncoderInterface $serializer
    ) {
        $this->encoders = [$jsonEncoder];
        $this->normalizers = [$objectNormalizer];
        $this->serializer = $serializer;
    }

    public function objectToJsonSerialize($object)
    {
        $data['status'] = 'No result found!';

        if (!$object['id']) {
            $data['status'] = $object;
            return $data;
        }

        if ($object) {
            $data['status'] = 'Success!';
            $data['data'] = $object;
            //$jsonContent = $this->serializer->serialize($object, 'json');
        }


        return $data;
    }

    public function arrayOfObjectsToJson($campervans) {
        $jsonData['status'] = "No results found!";

        if (!is_array($campervans)) {
            return $jsonData['status'] = $campervans;
        }

        if (!empty($campervans)) {
            $jsonData['status'] = 'Success! ' . count($campervans) . ' records was found!';
            foreach ($campervans as $campervan) {
                $jsonData['data'][] = $this->objectToJsonSerialize($campervan);
            }
        }

        return $jsonData;
    }
}