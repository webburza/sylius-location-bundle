<?php

namespace Webburza\Sylius\LocationBundle\Controller\Frontend;

use JMS\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Webburza\Sylius\LocationBundle\Model\LocationInterface;
use Webburza\Sylius\LocationBundle\Repository\LocationRepositoryInterface;

class LocationController extends Controller
{
    /**
     * @param Request $request
     *
     * @return Response
     */
    public function indexAction(Request $request)
    {
        /** @var LocationRepositoryInterface $locationRepository */
        $locationRepository = $this->get('webburza_location.repository.location');

        // Get current locale
        $locale = $this->get('sylius.context.locale')->getLocaleCode();

        /** @var SerializerInterface $serializer */
        $serializer = $this->get('serializer');

        if ($query = $request->get('query')) {
            $locations = $locationRepository->findPublicByQuery($query, $locale);
        } else {
            $locations = $locationRepository->findPublicByQuery('', $locale);
        }

        $locationsJson = $serializer->serialize($locations, 'json');

        $googleMapsKey = $this->getParameter('webburza_location.google_maps_key');
        $googleMapsEnabled = $this->getParameter('webburza_location.google_maps_enabled');

        return $this->render(
            'WebburzaSyliusLocationBundle:Frontend:index.html.twig',
            [
                'locations'         => $locations,
                'locationsJson'     => $locationsJson,
                'googleMapsEnabled' => $googleMapsEnabled,
                'googleMapsKey'     => $googleMapsKey
            ]
        );
    }

    /**
     * @param Request $request
     *
     * @return Response
     */
    public function showAction(Request $request)
    {
        /** @var LocationRepositoryInterface $locationRepository */
        $locationRepository = $this->get('webburza_location.repository.location');

        // Get current locale
        $locale = $this->get('sylius.context.locale')->getLocaleCode();

        /** @var SerializerInterface $serializer */
        $serializer = $this->get('serializer');

        $location = $locationRepository->findPublicBySlug($request->get('slug'), $locale);

        if (!$location) {
            throw $this->createNotFoundException('Location not found.');
        }

        $googleMapsKey = $this->getParameter('webburza_location.google_maps_key');
        $googleMapsEnabled = $this->getParameter('webburza_location.google_maps_enabled');

        $googleMapUrl = $this->getGoogleMapUrl($location);

        return $this->render(
            'WebburzaSyliusLocationBundle:Frontend:show.html.twig',
            [
                'location'          => $location,
                'locationJson'      => $serializer->serialize($location, 'json'),
                'googleMapsEnabled' => $googleMapsEnabled,
                'googleMapsKey'     => $googleMapsKey,
                'googleMapUrl'      => $googleMapUrl
            ]
        );
    }

    /**
     * @param LocationInterface $location
     *
     * @return string
     */
    protected function getGoogleMapUrl(LocationInterface $location)
    {
        $url = 'https://www.google.hr/maps/place/'
            . $location->getFullAddress() . '/@' . $location->getCoords() . ',17z';

        return str_replace(' ', '+', $url);
    }
}
