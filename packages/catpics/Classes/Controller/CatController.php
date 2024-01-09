<?php

declare(strict_types=1);

namespace Catpics\Catpics\Controller;

use TYPO3\CMS\Core\Utility\GeneralUtility;
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
        debug('do the import');

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
          $currentCat = new Cat();
          debug($item);
        }
        return true;
       // return (string)json_decode($content, true, flags: JSON_THROW_ON_ERROR)['fact'] ??
       //     throw new \RuntimeException('The service returned an unexpected format.', 1666413230);
    }
}
