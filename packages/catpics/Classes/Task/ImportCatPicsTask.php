<?php
 namespace Catpics\Catpics\Task;

 use TYPO3\CMS\Core\Utility\GeneralUtility;
 use TYPO3\CMS\Scheduler\Task\AbstractTask;
 use Catpics\Catpics\Controller\CatController;

 class ImportCatPicsTask extends AbstractTask {
     public function execute(): bool
     {
        $catController = GeneralUtility::makeInstance(CatController::class);
        return $catController->importAction();
     }
 }
?>
