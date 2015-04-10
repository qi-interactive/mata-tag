<?php

namespace mata\tag\behaviors;

use Yii;
use mata\tag\models\Tag;
use mata\tag\models\TagItem;
use matacms\helpers\Html;
use yii\helpers\ArrayHelper;

class TagActiveFormBehavior extends \yii\base\Behavior {

	public function tag($options = []) {

		if(isset($this->owner->options['class'])) {
		    $this->owner->options['class'] .= ' multi-choice-dropdown partial-max-width-item';
		} else {
			$this->owner->options['class'] = ' multi-choice-dropdown partial-max-width-item';
		}

		$options = array_merge($this->owner->inputOptions, $options);

		$this->owner->adjustLabelFor($options);
		$this->owner->labelOptions["label"] = "Tags"; 
		$this->owner->parts['{input}'] = Html::activeTagField($this->owner->model, $options);

		return $this->owner;
	}

}