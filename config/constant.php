<?php

return [
    'MAIL' => [
        'REGISTRATION_COMPLETION' => '「転ジョーク会議」会員本登録完了のお知らせ',
        'REGISTRATION' => '「転ジョーク会議」会員本登録完了のお知らせ',
        'RESET_PASSWORD' => '「転ジョーク会議」パスワード再設定用URL発行のお知らせ',
        'RESET_PASSWORD_COMPLETE' => '「転ジョーク会議」パスワード再設定完了のお知らせ',
        'REGISTRATION_COMPANY' => '「転ジョーク会議」管理システム パスワード再設定用URL発行のお知らせ',
        'REGISTRATION_COMPANY_COMPLETION' => '「転ジョーク会議」管理システム」パスワード再設定完了のお知らせ',
        'WITHDRAWAL' => '「転ジョーク会議」退会手続き完了のお知らせ',
        'ADMIN_REGISTRATION' => '「転ジョーク会議」管理システム 管理者アカウント発行',
        'ADMIN_REGISTRATION_COMPLETION' => '「転ジョーク会議」管理システム 管理者アカウント登録完了',
        'ADMIN_ACCOUNT_UPDATE' => '「転ジョーク会議」管理システム 管理者アカウント編集完了',
    ],
    'PASSWORD' => [
        'MIN' => 8,
        'MAX' => 12
    ],
    'RATE_LIMIT' => [
        'MAX' => 8,
        'DECAY' => 3600
    ],
    'SAMUI' => [
        'MAX' => 1.5,
        'MIN' => 1.0
    ],
    'SIZZLE' => [
        'MAX' => 2.5,
        'MIN' => 1.5
    ],
    'KUSU' => [
        'MAX' => 3.5,
        'MIN' => 2.5
    ],
    'INTERESTING' => [
        'MAX' => 4.5,
        'MIN' => 3.5
    ],
    'BURSTOFLAUGHTER' => [
        'MAX' => 5.5,
        'MIN' => 4.5
    ],
    'REGISTRATION_COMPLETION' => [
        'MAJOR' => 50,
        'LAST_SCHOOL' => 50,
        'COMPANY_NAME' => 50,
        'JOB_DETAIL' => 255,
        'MAX_AGE' => 49,
        'MIN_AGE' => 15
    ],
    'RECENT_DAYS' => 10,
    'RECENT_THREE_MONTHS_IN_DAYS' => 90,
    'VIEW_MORE_LIMIT' => 5,
    'PAGINATION_LIMIT' => 20,
    'PAGINATION_COUNT' => 10,
    'MAX_PICKUP_JOBS' => 10,
    'GENERATION' => [
        'DECADE' => 10,
        'LESS_THAN_DECADE' => 1
    ],
    'SKILL_NAME' => [
        'MAX' => 50,
    ],
    'SKILL_DETAILS' => [
        'MAX' => 255,
    ],
    'SKILLS' => [
        'MAX' => 9,
    ],
    'ACADEMIC_HISTORY' => [
        'SCHOOL_NAME_LIMIT' => 50,
        'MAJORING_LIMIT' => 50,
        'MIN_YEAR' => date('Y') - 49,
        'MAX_YEAR' => date('Y') + 15,
        'MIN_MONTH' => 1,
        'MAX_MONTH' => 12,
        'MAX_ENTRIES' => 10
    ],
    'EVALUATION_DETAILS' => [
        'MAX' => 1000
    ],
    'COMPANY_SEARCH' => [
        'MAX' => 15
    ],
    'BASIC_INFO' => [
        'TELEPHONE' => 11,
        'NAME' => 25,
    ],
    'WITHDRAWAL' => [
        'MAX' => 1000,
    ],
    'JOB_OFFER_SEARCH' => [
        'LIMIT_PER_PAGE' => 10,
        'SORT_BY' => [
            'DATE' => 'date',
            'VIEWS' => 'views'
        ]
    ],
    'PAGINATE' => [
        'JBOFFERS' => 10,
        'COMPANY' =>10,
    ],
    'EVALUATIONCOUNT'=> 0,
    'INQUIRY_NAME' => [
        'MAX' => 50
    ],
    'INQUIRY_EMAIL' => [
        'MAX' => 50
    ],
    'INQUIRY_DETAILS' => [
        'MAX' => 1000
    ],
    'REGISTER_ADMINISTRATOR' => [
        'NAME' => [
            'MAX' => 25,
        ],
        'EMAIL' => [
            'MAX' => 50
        ],
        'TOKEN' => [
            'MAX' => 64
        ],
        'DEFAULT_PASSWORD' => 'default',
    ],
    'INQUIRY_DETAILS' => [
        'MAX' => 1000
    ],
    'REGISTER_COMPANY' => [
        'COMPANY_NAME' => [
            'MAX' => 50,
        ],
        'EMAIL' => [
            'MAX' => 50
        ],
        'TOKEN' => [
            'MAX' => 64
        ],
        'DEFAULT_PASSWORD' => 'default',
    ],
    'REACTION' => [
        'FUNNY' => 'funny',
        'SYMPATHY' => 'sympathy'
    ],
    'STR' => [
        'TRUNC_LIMIT' => 15,
    ],
];
