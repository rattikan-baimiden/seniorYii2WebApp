<?php

namespace app\models;

use Yii;

/**
 * This is the model class for collection "typesexpense".
 *
 * @property \MongoDB\BSON\ObjectID|string $_id
 * @property mixed $type_name
 * @property mixed $status
 */
class Typesexpense extends \yii\mongodb\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function collectionName()
    {
        return 'typesexpense';
    }

    /**
     * {@inheritdoc}
     */
    public function attributes()
    {
        return [
            '_id',
            'type_name',
            'status',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_name', 'status'], 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            '_id' => 'ID',
            'type_name' => 'Type Name',
            'status' => 'Status',
        ];
    }
    public function getTableSchema()
    {
        return false;
    }
}
