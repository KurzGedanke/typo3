<?php

return [
    'ctrl' => [
        'title' => 'Form engine - inline foreign_record_defaults',
        'label' => 'uid',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'delete' => 'deleted',
        'sortby' => 'sorting',
        'iconfile' => 'EXT:styleguide/Resources/Public/Icons/tx_styleguide.svg',
        'versioningWS' => true,
        'origUid' => 't3_origuid',
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'translationSource' => 'l10n_source',
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
        'security' => [
            'ignorePageTypeRestriction' => true,
        ],
    ],

    'columns' => [
        'hidden' => [
            'config' => [
                'type' => 'check',
                'items' => [
                    ['label' => 'Disable'],
                ],
            ],
        ],
        'sys_language_uid' => [
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'language',
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label' => 'Translation parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['label' => '', 'value' => 0],
                ],
                'foreign_table' => 'tx_styleguide_inline_foreignrecorddefaults',
                'foreign_table_where' => 'AND {#tx_styleguide_inline_foreignrecorddefaults}.{#pid}=###CURRENT_PID### AND {#tx_styleguide_inline_foreignrecorddefaults}.{#sys_language_uid} IN (-1,0)',
                'default' => 0,
            ],
        ],
        'l10n_source' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label' => 'Translation source',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['label' => '', 'value' => 0],
                ],
                'foreign_table' => 'tx_styleguide_inline_foreignrecorddefaults',
                'foreign_table_where' => 'AND {#tx_styleguide_inline_foreignrecorddefaults}.{#pid}=###CURRENT_PID### AND {#tx_styleguide_inline_foreignrecorddefaults}.{#uid}!=###THIS_UID###',
                'default' => 0,
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
                'default' => '',
            ],
        ],

        'inline_1' => [
            'label' => 'inline_1',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_styleguide_inline_foreignrecorddefaults_child',
                'foreign_field' => 'parentid',
                'foreign_table_field' => 'parenttable',
                'overrideChildTca' => [
                    'columns' => [
                        'input_1' => [
                            'config' => [
                                'default' => 'default text from parent',
                            ],
                        ],
                    ],
                ],
            ],
        ],

    ],

    'types' => [
        '0' => [
            'showitem' => 'inline_1',
        ],
    ],

];