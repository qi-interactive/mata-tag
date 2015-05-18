<?php
 
/**
 * @link http://www.matacms.com/
 * @copyright Copyright (c) 2015 Qi Interactive Limited
 * @license http://www.matacms.com/license/
 */

namespace mata\tag\controllers;

use mata\tag\models\Tag;
use mata\tag\models\TagSearch;
use matacms\controllers\module\Controller;

class TagController extends Controller {

	public function getModel() {
		return new Tag();
	}

	public function getSearchModel() {
		return new TagSearch();
	}
}
