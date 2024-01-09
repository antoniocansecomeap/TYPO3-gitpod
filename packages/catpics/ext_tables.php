<?php
defined('TYPO3') || die();

(static function() {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_catpics_domain_model_cat', 'EXT:catpics/Resources/Private/Language/locallang_csh_tx_catpics_domain_model_cat.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_catpics_domain_model_cat');
})();
