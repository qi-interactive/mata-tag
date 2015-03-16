<?php

namespace mata\tag\models;

use Yii;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "mata_tag".
 *
 * @property integer $Id
 * @property string $Name
 * @property string $URI
 *
 * @property MataTagitem[] $mataTagitems
 */
class Tag extends \mata\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mata_tag';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Name', 'URI'], 'required'],
            [['Name'], 'string'],
            [['URI'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'Name' => 'Name',
            'URI' => 'Uri',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTagItems()
    {
        return $this->hasMany(MataTagitem::className(), ['TagId' => 'Id']);
    }

}

