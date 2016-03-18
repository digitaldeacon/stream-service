<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "stream_log".
 *
 * @property integer $stream_id
 * @property string $type
 * @property string $value
 * @property string $timestamp
 *
 * @property Stream $stream
 */
class StreamLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'stream_log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['stream_id', 'value'], 'required'],
            [['stream_id'], 'integer'],
            [['type', 'value'], 'string'],
            [['timestamp'], 'safe'],
            [['stream_id'], 'exist', 'skipOnError' => true, 'targetClass' => Stream::className(), 'targetAttribute' => ['stream_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'stream_id' => Yii::t('backend', 'Stream ID'),
            'type' => Yii::t('backend', 'Type'),
            'value' => Yii::t('backend', 'Value'),
            'timestamp' => Yii::t('backend', 'Timestamp'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStream()
    {
        return $this->hasOne(Stream::className(), ['id' => 'stream_id']);
    }
}
