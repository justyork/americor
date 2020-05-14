<?php

namespace app\models;


use app\widgets\HistoryList\interfaces\HistoryElementInterface;
use Yii;
use yii\db\ActiveRecord;


/**
 * This is the model class for table "{{%customer}}".
 *
 * @property integer $id
 * @property string $name
 */
class Customer extends ActiveRecord implements HistoryElementInterface
{
    const QUALITY_ACTIVE = 'active';
    const QUALITY_REJECTED = 'rejected';
    const QUALITY_COMMUNITY = 'community';
    const QUALITY_UNASSIGNED = 'unassigned';
    const QUALITY_TRICKLE = 'trickle';

    const TYPE_LEAD = 'lead';
    const TYPE_DEAL = 'deal';
    const TYPE_LOAN = 'loan';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%customer}}';
    }

    /**
     * @param $quality
     * @return mixed|null
     */
    public static function getQualityTextByQuality($quality)
    {
        return self::getQualityTexts()[$quality] ?? $quality;
    }

    /**
     * @return array
     */
    public static function getQualityTexts()
    {
        return [
            self::QUALITY_ACTIVE => Yii::t('app', 'Active'),
            self::QUALITY_REJECTED => Yii::t('app', 'Rejected'),
            self::QUALITY_COMMUNITY => Yii::t('app', 'Community'),
            self::QUALITY_UNASSIGNED => Yii::t('app', 'Unassigned'),
            self::QUALITY_TRICKLE => Yii::t('app', 'Trickle'),
        ];
    }

    /**
     * @param $type
     * @return mixed
     */
    public static function getTypeTextByType($type)
    {
        return self::getTypeTexts()[$type] ?? $type;
    }

    /**
     * @return array
     */
    public static function getTypeTexts()
    {
        return [
            self::TYPE_LEAD => Yii::t('app', 'Lead'),
            self::TYPE_DEAL => Yii::t('app', 'Deal'),
            self::TYPE_LOAN => Yii::t('app', 'Loan'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('app', 'Name'),
        ];
    }
}
