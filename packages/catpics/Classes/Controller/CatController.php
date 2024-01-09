<?php

declare(strict_types=1);

namespace Catpics\Catpics\Controller;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager;
use TYPO3\CMS\Core\Http\RequestFactory;
use Catpics\Catpics\Domain\Model\Cat;

/**
 * This file is part of the "Cat Pics" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2024
 */

/**
 * CatController
 */
class CatController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    private const API_URL = 'https://api.thecatapi.com/v1/images/search?limit=10&breed_ids=beng&api_key=live_wE5APo6N8z585pMP9eogwX6HVxXwGCO5jvi9FRT33j6rh8pR2dE2n2NqCv42PEqE';

    /**
     * catRepository
     *
     * @var \Catpics\Catpics\Domain\Repository\CatRepository
     */
    protected $catRepository = null;

    /**
     * action list
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function listAction(): \Psr\Http\Message\ResponseInterface
    {
        $cats = $this->catRepository->findAll();
        $this->view->assign('cats', $cats);
        return $this->htmlResponse();
    }

    /**
     * @param \Catpics\Catpics\Domain\Repository\CatRepository $catRepository
     */
    public function injectCatRepository(\Catpics\Catpics\Domain\Repository\CatRepository $catRepository)
    {
        $this->catRepository = $catRepository;
    }

    /**
     * action import
     *
     * @return bool
     */
    public function importAction(): bool
    {
        //we need to do this because the dependency injections doesnt seem to work...
        $persistenceManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(PersistenceManager::class);
        $objectManager = GeneralUtility::makeInstance(ObjectManager::class);
        $catRepository = $objectManager->get(\Catpics\Catpics\Domain\Repository\CatRepository::class);


        $requestFactory = GeneralUtility::makeInstance(RequestFactory::class);

        $additionalOptions = [
            'headers' => ['Cache-Control' => 'no-cache'],
            'allow_redirects' => false,
        ];

        // Get a PSR-7-compliant response object
        $response = $requestFactory->request(
            self::API_URL,
            'GET',
            $additionalOptions
        );

        if ($response->getStatusCode() !== 200) {
            throw new \RuntimeException(
                'Returned status code is ' . $response->getStatusCode()
            );
        }

        $content = $response->getBody()->getContents();

        foreach(json_decode($content) as $item) {
          $catItem = new Cat();
          //@todo: load this dynamic via typoscript settings
          $catItem->setPid(2);
          $catItem->setCatId($item->id);
          $catItem->setImageUrl($item->url);
          $catItem->setImageWidth($item->width);
          $catItem->setImageHeight($item->height);

          $catRepository->add($catItem);
        }
        $persistenceManager->persistAll();

      return true;
      //@todo: exception handling
    }
}
