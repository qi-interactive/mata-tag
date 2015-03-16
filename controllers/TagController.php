<?php

namespace mata\tag\controllers;

use mata\tag\models\Category;
use mata\tag\models\CategorySearch;
use matacms\controllers\module\Controller;

class TagController extends Controller {

	public function getModel() {
		return new Tag();
	}

	public function getSearchModel() {
		return new TagSearch();
	}
}
