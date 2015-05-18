<?php
 
/**
 * @link http://www.matacms.com/
 * @copyright Copyright (c) 2015 Qi Interactive Limited
 * @license http://www.matacms.com/license/
 */

namespace mata\tag\models;

use Yii;
use yii\db\ActiveQuery;
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
        return new TagItemQuery(get_called_class());
    }

    public static function tableName()
    {
        return 'mata_tagitem';
    }

    public function rules()
    {
        return [
        [['TagId', 'DocumentId', 'Order'], 'required'],
        [['TagId', 'Order'], 'integer'],
        [['DocumentId'], 'string', 'max' => 64]
        ];
    }

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

class TagItemQuery extends ActiveQuery
{
    public function init()
    {
        parent::init();
        $this->orderBy('Order ASC');
    }

<<<<<<< Updated upstream
}
=======
    public function forItem($item) {

        if (is_object($item))
            $item = $item->getDocumentId()->getId();

        $this->andWhere(['DocumentId' => $item]);
        return $this;
    }
}
>>>>>>> Stashed changes
