<?php

namespace mata\tag\models;

use Yii;
use mata\behaviors\IncrementalBehavior;

/**
 * This is the model class for table "mata_tagitem".
 *
 * @property integer $TagId
 * @property string $DocumentId
 * @property integer $Order
 *
 * @property MataTag $tag
 */
class TagItem extends \mata\db\ActiveRecord
{

    const REQ_PARAM_TAG_ID = "category-item-tag-id";

    public function behaviors() {
        return [
        [
        'class' => IncrementalBehavior::className(),
        'findBy' => "DocumentId",
        'incrementField' => "Order"
        ]
        ];
    }


    public static function find() {
        return parent::find()->orderBy('Order');
  }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mata_tagitem';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        [['TagId', 'DocumentId', 'Order'], 'required'],
        [['TagId', 'Order'], 'integer'],
        [['DocumentId'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
        'TagId' => 'Tag ID',
        'DocumentId' => 'Document ID',
        'Order' => 'Order',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTag()
    {
        return $this->hasOne(Tag::className(), ['Id' => 'TagId']);
    }
}