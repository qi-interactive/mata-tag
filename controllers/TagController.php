<?php

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
