<?php

declare(strict_types=1);

namespace App\Http\Enum;

/**
 * Condition Job Changes Attributes
 */
final class ConditionJobChangeAttributes
{
    /**
     * Make the most of your qualifications and experience | 資格・経験を活かせる
     *
     * @var string
     */
    public const ATTRIBUTE1 = 'lang.label.job_change_condition.edit.attributes1';

    /**
     * Gain experience | 経験を積める
     *
     * @var string
     */
    public const ATTRIBUTE2 = 'lang.label.job_change_condition.edit.attributes2';

    /**
     * Incentive system | インセンティブ制度がある
     *
     * @var string
     */
    public const ATTRIBUTE3 = 'lang.label.job_change_condition.edit.attributes3';

    /**
     * Emphasis on stability | 安定重視
     *
     * @var string
     */
    public const ATTRIBUTE4 = 'lang.label.job_change_condition.edit.attributes4';

    /**
     * Vacations (Saturdays, Sundays, national holidays) | 休み（土日祝）
     *
     * @var string
     */
    public const ATTRIBUTE5 = 'lang.label.job_change_condition.edit.attributes5';

    /**
     * No overtime work | 残業なし
     *
     * @var string
     */
    public const ATTRIBUTE6 = 'lang.label.job_change_condition.edit.attributes6';

    /**
     * Good benefits | 福利厚生が充実
     *
     * @var string
     */
    public const ATTRIBUTE7 = 'lang.label.job_change_condition.edit.attributes7';

    /**
     * Can have a second job | 副業ができる
     *
     * @var string
     */
    public const ATTRIBUTE8 = 'lang.label.job_change_condition.edit.attributes8';

    /**
     * Other | その他
     *
     * @var string
     */
    public const ATTRIBUTE9 = 'lang.label.job_change_condition.edit.attributes9';

    /**
     * not selected | 未選択
     *
     * @var string
     */
    public const ATTRIBUTE1_COLUMN = 'jc_attribute1';

    /**
     * Completely closed on Saturdays and Sundays | 完全土日休み
     *
     * @var string
     */
    public const ATTRIBUTE2_COLUMN = 'jc_attribute2';

    /**
     * No overtime | 残業なし
     *
     * @var string
     */
    public const ATTRIBUTE3_COLUMN = 'jc_attribute3';

    /**
     * No transfer | 転勤なし
     *
     * @var string
     */
    public const ATTRIBUTE4_COLUMN = 'jc_attribute4';

    /**
     * I want to earn | 稼ぎたい
     *
     * @var string
     */
    public const ATTRIBUTE5_COLUMN = 'jc_attribute5';

    /**
     * I want to work abroad | 海外で働きたい
     *
     * @var string
     */
    public const ATTRIBUTE6_COLUMN = 'jc_attribute6';


    /**
     * Good benefits | 福利厚生が充実
     *
     * @var string
     */
    public const ATTRIBUTE7_COLUMN = 'jc_attribute7';

    /**
     * Can have a second job | 副業ができる
     *
     * @var string
     */
    public const ATTRIBUTE8_COLUMN = 'jc_attribute8';

    /**
     * Other | その他
     *
     * @var string
     */
    public const ATTRIBUTE9_COLUMN = 'jc_attribute9';

    /**
     * Attribute list
     *
     * @var array
     */
    public const ATTRIBUTES = [
        [
            'column' => 'jc_attribute1',
            'description' => self::ATTRIBUTE1
        ],
        [
            'column' => 'jc_attribute2',
            'description' => self::ATTRIBUTE2
        ],
        [
            'column' => 'jc_attribute3',
            'description' => self::ATTRIBUTE3
        ],
        [
            'column' => 'jc_attribute4',
            'description' => self::ATTRIBUTE4
        ],
        [
            'column' => 'jc_attribute5',
            'description' => self::ATTRIBUTE5
        ],
        [
            'column' => 'jc_attribute6',
            'description' => self::ATTRIBUTE6
        ],
        [
            'column' => 'jc_attribute7',
            'description' => self::ATTRIBUTE7
        ],
        [
            'column' => 'jc_attribute8',
            'description' => self::ATTRIBUTE8
        ],
        [
            'column' => 'jc_attribute9',
            'description' => self::ATTRIBUTE9
        ],
    ];

    /**
     * Attribute list
     *
     * @var array
     */
    public const ATTRIBUTE_LIST = [
        'jc_attribute1',
        'jc_attribute2',
        'jc_attribute3',
        'jc_attribute4',
        'jc_attribute5',
        'jc_attribute6',
        'jc_attribute7',
        'jc_attribute8',
        'jc_attribute9'
    ];

    /**
     * Accept value on/true
     *
     * @var int
     */
    public const VALUE_ON = 1;

    /**
     * Accept value of/false
     *
     * @var int
     */
    public const VALUE_OFF = 0;
}
