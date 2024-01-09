<?php

namespace Catpics\Catpics\Task\AdditionalFieldProvider;

use TYPO3\CMS\Core\Messaging\FlashMessage;
use TYPO3\CMS\Scheduler\AbstractAdditionalFieldProvider;
use TYPO3\CMS\Scheduler\Controller\SchedulerModuleController;
use TYPO3\CMS\Scheduler\Task\AbstractTask;

class ImportCatPicsTaskAdditionalFieldProvider extends AbstractAdditionalFieldProvider
{

    /**
     * Gets additional fields to render in the form to add/edit a task
     *
     * @param array $taskInfo Values of the fields from the add/edit task form
     * @param AbstractTask $task The task object being edited. Null when adding a task!
     * @param SchedulerModuleController $schedulerModule Reference to the scheduler backend module
     * @return array A two dimensional array, array('Identifier' => array('fieldId' => array('code' => '', 'label' => '', 'cshKey' => '', 'cshLabel' => ''))
     */
    public function getAdditionalFields(array &$taskInfo, $task, SchedulerModuleController $schedulerModule)
    {
        /** @var ReminderTask $task */

        $additionalFields = [];

        $additionalFields = array_merge($additionalFields, $this->generateAdditionalFields("api_url", 'URL to the API', $taskInfo, is_null($task) ? "" : $task->getApiUrl()));
        $additionalFields = array_merge($additionalFields, $this->generateAdditionalFields("api_key", 'API Key', $taskInfo, is_null($task) ? "" : $task->getApiKey()));
        $additionalFields = array_merge($additionalFields, $this->generateAdditionalFields("image_count", 'Number of images to import', $taskInfo, is_null($task) ? "" : $task->getImageCount()));
		    $additionalFields = array_merge($additionalFields, $this->generateAdditionalFields("breed", 'Breeds (comma separated)', $taskInfo, is_null($task) ? "" : $task->getBreed()));

        return $additionalFields;
    }

    /**
     * Validates the additional fields' values
     *
     * @param array $submittedData An array containing the data submitted by the add/edit task form
     * @param SchedulerModuleController $schedulerModule Reference to the scheduler backend module
     * @return bool TRUE if validation was ok (or selected class is not relevant), FALSE otherwise
     */
    public function validateAdditionalFields(array &$submittedData, SchedulerModuleController $schedulerModule)
    {

        $submittedData['api_url'] = trim($submittedData['api_url']);
        $submittedData['api_key'] = trim($submittedData['api_key']);
        $submittedData['image_count'] = trim($submittedData['image_count']);
		    $submittedData['breed'] = trim($submittedData['breed']);

        return true;
    }

    /**
     * Takes care of saving the additional fields' values in the task's object
     *
     * @param array $submittedData An array containing the data submitted by the add/edit task form
     * @param AbstractTask $task Reference to the scheduler backend module
     */
    public function saveAdditionalFields(array $submittedData, AbstractTask $task)
    {
        $task->setApiUrl($submittedData["api_url"]);
        $task->setApiKey($submittedData["api_key"]);
        $task->setImageCount($submittedData["image_count"]);
        $task->setBreed($submittedData["breed"]);
    }

    private function generateAdditionalFields(string $fieldID, string $label, array &$taskInfo, $value = ""): array
    {
        $value = empty($value) ? $taskInfo[$fieldID] : $value;

		    $fieldCode = '<textarea name="tx_scheduler[' . $fieldID .']" id="' . $fieldID . '" cols="80" rows="2" />'. $value .'</textarea>';
        $additionalFields = array();
        $additionalFields[$fieldID] = array(
            'code'     => $fieldCode,
            'label'    => $label
        );

        return $additionalFields;
    }
}
