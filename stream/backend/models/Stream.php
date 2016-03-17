<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "stream".
 *
 * @property integer $id
 * @property string $name
 * @property string $url
 * @property string $code
 * @property string $description
 * @property string $details
 * @property string $config
 * @property integer $parent
 * @property integer $active
 * @property string $start
 * @property string $end
 * @property string $modified_at
 * @property integer $modified_by
 *
 * @property User $modifiedBy
 * @property StreamLog[] $streamLogs
 */
class Stream extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'stream';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'code', 'modified_by'], 'required'],
            [['url', 'description', 'details', 'config'], 'string'],
            [['parent', 'active', 'modified_by'], 'integer'],
            [['start', 'end', 'modified_at'], 'safe'],
            [['name'], 'string', 'max' => 120],
            [['code'], 'string', 'max' => 12],
            [['modified_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['modified_by' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'url' => Yii::t('app', 'Url'),
            'code' => Yii::t('app', 'Code'),
            'description' => Yii::t('app', 'Description'),
            'details' => Yii::t('app', 'Details'),
            'config' => Yii::t('app', 'Config'),
            'parent' => Yii::t('app', 'Parent'),
            'active' => Yii::t('app', 'Active'),
            'start' => Yii::t('app', 'Start'),
            'end' => Yii::t('app', 'End'),
            'modified_at' => Yii::t('app', 'Modified At'),
            'modified_by' => Yii::t('app', 'Modified By'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModifiedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'modified_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStreamLogs()
    {
        return $this->hasMany(StreamLog::className(), ['stream_id' => 'id']);
    }
}
