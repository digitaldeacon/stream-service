<?php

namespace common\models;

use Yii;
use yii\base\Exception;

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
            [['name', 'code'], 'required'],
            [['url', 'description', 'details', 'config','form_pre'], 'string'],
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
            'id' => Yii::t('backend', 'ID'),
            'name' => Yii::t('backend', 'Name'),
            'url' => Yii::t('backend', 'Url'),
            'code' => Yii::t('backend', 'Code'),
            'description' => Yii::t('backend', 'Description'),
            'details' => Yii::t('backend', 'Details'),
            'config' => Yii::t('backend', 'Config'),
            'parent' => Yii::t('backend', 'Parent'),
            'active' => Yii::t('backend', 'Active'),
            'start' => Yii::t('backend', 'Start'),
            'end' => Yii::t('backend', 'End'),
            'modified_at' => Yii::t('backend', 'Modified At'),
            'modified_by' => Yii::t('backend', 'Modified By'),
            'form_pre' => Yii::t('backend', 'Description before form'),
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

    public function getChildStreams()
    {
        return $this->hasMany(Stream::className(), ['parent' => 'id']);
    }

    public function logClient() {
        if(!isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $client_ip = $_SERVER['REMOTE_ADDR'];
        } else {
            $client_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }

        try {
            $log = new \common\models\StreamLog();
            $log->stream_id = $this->id;
            $log->type = 'login';
            $log->value = implode(',',$_GET);
            $log->clientip = $client_ip;
            if(!$log->save()) {
                var_dump($log->getErrors());
            }
        } catch(Exception $e) {}

    }
}
