<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:catpics/Resources/Private/Language/locallang_db.xlf:tx_catpics_domain_model_cat',
        'label' => 'cat_id',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'sortby' => 'sorting',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'cat_id,image_url,image_height',
        'iconfile' => 'EXT:catpics/Resources/Public/Icons/tx_catpics_domain_model_cat.gif'
    ],
    'types' => [
        '1' => ['showitem' => 'cat_id, image_url, image_width, image_height, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language, sys_language_uid, l10n_parent, l10n_diffsource, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access, hidden, starttime, endtime'],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'language',
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'default' => 0,
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_catpics_domain_model_cat',
                'foreign_table_where' => 'AND {#tx_catpics_domain_model_cat}.{#pid}=###CURRENT_PID### AND {#tx_catpics_domain_model_cat}.{#sys_language_uid} IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        0 => '',
                        1 => '',
                        'invertStateDisplay' => true
                    ]
                ],
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],
        'endtime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ],
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],
        'categories' => [
            'config'=> [
                'type' => 'category',
            ],
        ],

        'cat_id' => [
            'exclude' => true,
            'label' => 'LLL:EXT:catpics/Resources/Private/Language/locallang_db.xlf:tx_catpics_domain_model_cat.cat_id',
            'description' => 'LLL:EXT:catpics/Resources/Private/Language/locallang_db.xlf:tx_catpics_domain_model_cat.cat_id.description',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required',
                'default' => ''
            ],
        ],
        'image_url' => [
            'exclude' => true,
            'label' => 'LLL:EXT:catpics/Resources/Private/Language/locallang_db.xlf:tx_catpics_domain_model_cat.image_url',
            'description' => 'LLL:EXT:catpics/Resources/Private/Language/locallang_db.xlf:tx_catpics_domain_model_cat.image_url.description',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required',
                'default' => ''
            ],
        ],
        'image_width' => [
            'exclude' => true,
            'label' => 'LLL:EXT:catpics/Resources/Private/Language/locallang_db.xlf:tx_catpics_domain_model_cat.image_width',
            'description' => 'LLL:EXT:catpics/Resources/Private/Language/locallang_db.xlf:tx_catpics_domain_model_cat.image_width.description',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int,required',
                'default' => 0
            ]
        ],
        'image_height' => [
            'exclude' => true,
            'label' => 'LLL:EXT:catpics/Resources/Private/Language/locallang_db.xlf:tx_catpics_domain_model_cat.image_height',
            'description' => 'LLL:EXT:catpics/Resources/Private/Language/locallang_db.xlf:tx_catpics_domain_model_cat.image_height.description',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required',
                'default' => ''
            ],
        ],
    
    ],
];
