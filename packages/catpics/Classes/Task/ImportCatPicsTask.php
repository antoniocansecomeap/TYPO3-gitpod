<?php
 namespace Catpics\Catpics\Task;

 use TYPO3\CMS\Core\Utility\GeneralUtility;
 use TYPO3\CMS\Scheduler\Task\AbstractTask;
 use Catpics\Catpics\Controller\CatController;

 class ImportCatPicsTask extends AbstractTask {
    /**
     * @var string URL to the API
     */
    public $apiUrl;

    /**
     * @var string API Key
     */
    public $apiKey;

    /**
     * @var string Number of images to import
     */
    public $imageCount;

    /**
     * @var string Breeds (comma separated)
     */
    public $breeds;

    /**
     * @return string
     */
    public function getApiUrl()
    {
        return $this->apiUrl;
    }

    /**
     * @param string $url
     */
    public function setApiUrl(string $apiUrl): void
    {
        $this->apiUrl = $apiUrl;
    }

    /**
     * @return string
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * @param string $url
     */
    public function setApiKey(string $apiKey): void
    {
        $this->apiKey = $apiKey;
    }

    /**
     * @return string
     */
    public function getImageCount()
    {
        return $this->imageCount;
    }

    /**
     * @param string $imageCount
     */
    public function setImageCount(string $imageCount): void
    {
        $this->imageCount = $imageCount;
    }


    /**
     * @return string
     */
    public function getBreed()
    {
        return $this->breed;
    }

    /**
     * @param string $breed
     */
    public function setBreed(string $breed): void
    {
        $this->breed = $breed;
    }

    public function execute(): bool
    {
        $catController = GeneralUtility::makeInstance(CatController::class);
        return $catController->importAction();
    }
 }
?>
