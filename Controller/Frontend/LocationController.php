<?php

namespace Webburza\Sylius\LocationBundle\Controller\Frontend;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\AcceptHeader;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\DependencyInjection\Exception\ServiceCircularReferenceException;
use Symfony\Component\DependencyInjection\Exception\ServiceNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class LocationController extends Controller
{
    /**
     * @return Response
     */
    public function indexAction()
    {
        $googleMapsEnabled = $this->getParameter('webburza.sylius.location_bundle.google_maps_enabled');
        $googleMapsKey = $this->getParameter('webburza.sylius.location_bundle.google_maps_key');

        return $this->render(
            'WebburzaSyliusLocationBundle:Frontend:index.html.twig',
            [
                'googleMapsEnabled' => $googleMapsEnabled,
                'googleMapsKey' => $googleMapsKey,
            ]
        );
    }

    /**
     * @param Request $request
     *
     * @return Response
     *
     * @throws NotFoundHttpException
     * @throws ServiceCircularReferenceException When a circular reference is detected
     * @throws ServiceNotFoundException          When the service is not defined
     */
    public function showAction(Request $request)
    {
        /* @var \Webburza\Sylius\LocationBundle\Doctrine\ORM\LocationRepository $locationRepository */
        $locationRepository = $this->container->get('webburza_location.repository.location');

        // Get current locale
        $locale = $this->get('sylius.context.locale')->getCurrentLocale();

        /* @var \Symfony\Component\Serializer\Serializer */
        $serializer = $this->container->get('serializer');

        $location = $locationRepository->findPublicBySlug($request->get('slug'), $locale);

        if (!$location) {
            throw $this->createNotFoundException('The location does not exist');
        }

        $googleMapsKey = $this->getParameter('webburza.sylius.location_bundle.google_maps_key');
        $googleMapsEnabled = $this->getParameter('webburza.sylius.location_bundle.google_maps_enabled');

        return $this->render(
            'WebburzaSyliusLocationBundle:Frontend:show.html.twig',
            [
                'location' => $location,
                'locationJson' => $serializer->serialize($location, 'json'),
                'googleMapsEnabled' => $googleMapsEnabled,
                'googleMapsKey' => $googleMapsKey,
            ]
        );
    }

    /**
     * @param Request $request
     *
     * @throws ServiceCircularReferenceException When a circular reference is detected
     * @throws ServiceNotFoundException          When the service is not defined
     *
     * @return JsonResponse|Response
     */
    public function searchAction(Request $request)
    {
        /* @var \Webburza\Sylius\LocationBundle\Doctrine\ORM\LocationRepository $locationRepository */
        $locationRepository = $this->container->get('webburza_location.repository.location');

        /* @var \Sylius\Component\Locale\Model\Locale */
        $locale = $this->get('sylius.context.locale')->getCurrentLocale();

        /* @var \Symfony\Component\Serializer\Serializer */
        $serializer = $this->container->get('serializer');

        if ($query = $request->get('query')) {
            $locations = $locationRepository->findPublicByQuery($query, $locale);
        } else {
            $locations = $locationRepository->findPublicByQuery('', $locale);
        }

        $locationsJson = $serializer->serialize($locations, 'json');
        $returnJson = AcceptHeader::fromString($request->headers->get('Accept'))->has('application/json');

        if ($returnJson) {
            $response = new JsonResponse($locationsJson);
            $response->headers->set('Access-Control-Allow-Origin', '*');

            return $response;
        } else {
            $googleMapsKey = $this->getParameter('webburza.sylius.location_bundle.google_maps_key');
            $googleMapsEnabled = $this->getParameter('webburza.sylius.location_bundle.google_maps_enabled');

            return $this->render(
                'WebburzaSyliusLocationBundle:Frontend:_search.html.twig',
                [
                    'locations' => $locations,
                    'locationsJson' => $locationsJson,
                    'googleMapsEnabled' => $googleMapsEnabled,
                    'googleMapsKey' => $googleMapsKey,
                ]
            );
        }
    }
}
