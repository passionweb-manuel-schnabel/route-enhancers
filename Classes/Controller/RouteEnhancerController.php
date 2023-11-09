<?php

namespace Passionweb\RouteEnhancers\Controller;


use Passionweb\RouteEnhancers\Domain\Model\Entry;
use Passionweb\RouteEnhancers\Domain\Repository\EntryRepository;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class RouteEnhancerController extends ActionController
{
    protected EntryRepository $entryRepository;

    public function __construct(
        EntryRepository $entryRepository
    )
    {
        $this->entryRepository = $entryRepository;
    }

    public function simpleRouteEnhancerAction(): ResponseInterface
    {
        if(array_key_exists('order_id', $this->request->getAttribute('routing')->getArguments())) {
            // do something with the order id
            $this->view->assign('orderId', $this->request->getAttribute('routing')->getArguments()['order_id']);
        }
        return $this->htmlResponse();
    }

    /**
     * @param Entry|null $entry
     * @return ResponseInterface
     */
    public function extbaseRouteEnhancerAction(Entry $entry = null): ResponseInterface
    {
        // do something with the entry entity
        if($entry !== null) {
            $this->view->assign('entry', $entry);
        } else {
            $this->view->assign('entries', $this->entryRepository->findAll());
        }
        return $this->htmlResponse();
    }
}
