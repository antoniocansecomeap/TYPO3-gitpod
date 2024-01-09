<?php
defined('TYPO3') || die();

(static function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Catpics',
        'Photolist',
        [
            \Catpics\Catpics\Controller\CatController::class => 'list'
        ],
        // non-cacheable actions
        [
            \Catpics\Catpics\Controller\CatController::class => ''
        ]
    );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    photolist {
                        iconIdentifier = catpics-plugin-photolist
                        title = LLL:EXT:catpics/Resources/Private/Language/locallang_db.xlf:tx_catpics_photolist.name
                        description = LLL:EXT:catpics/Resources/Private/Language/locallang_db.xlf:tx_catpics_photolist.description
                        tt_content_defValues {
                            CType = list
                            list_type = catpics_photolist
                        }
                    }
                }
                show = *
            }
       }'
    );
})();


//register import scheduler task
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['scheduler']['tasks'][\Catpics\Catpics\Task\ImportCatPicsTask::class] = array(
    'extension' => 'catpics',
    'title' => 'Import cat images',
    'description' => 'Imports the cat pics in the TYPO3 database',
    //'additionalFields' => Catpics\Catpics\Task\AdditionalFieldProvider\ImportCatPicsTaskAdditionalFieldProvider::class
);
