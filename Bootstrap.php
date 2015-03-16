<?php 

namespace mata\tag;

use Yii;
use mata\tag\behaviors\TagActiveFormBehavior;
use yii\base\Event;
use matacms\widgets\ActiveField;
use mata\base\MessageEvent;
use mata\tag\models\Tag;
use mata\tag\models\TagItem;

//TODO Dependency on matacms
use matacms\controllers\module\Controller;

class Bootstrap extends \mata\base\Bootstrap {

	public function bootstrap($app) {

		Event::on(ActiveField::className(), ActiveField::EVENT_INIT_DONE, function(MessageEvent $event) {
			$event->getMessage()->attachBehavior('tag', new TagActiveFormBehavior());
		});


		Event::on(Controller::class, Controller::EVENT_MODEL_UPDATED, function(\matacms\base\MessageEvent $event) {
			$this->processSave($event->getMessage());
		});

		Event::on(Controller::class, Controller::EVENT_MODEL_CREATED, function(\matacms\base\MessageEvent $event) {
			$this->processSave($event->getMessage());
		});

	}

	private function processSave($model) {

		if (empty($tags = Yii::$app->request->post(TagItem::REQ_PARAM_TAG_ID)))
			return;

		$documentId = $model->getDocumentId();


		
		TagItem::deleteAll([
			"DocumentId" => $documentId
			]);

		foreach ($tags as $tag) {


			$tagModel = Tag::find()->where(["Name" => $tag])->one();

			if ($tagModel == null) {
				$tagModel = new Tag();
				$tagModel->attributes = [
					"Name" => $tag,
					"URI" => urlencode($tag)
				];

				if ($tagModel->save() == false)
					throw new \yii\web\ServerErrorHttpException($tagModel->getTopError());

			}

			$tagItem = new TagItem();
			$tagItem->attributes = [
				"TagId" => $tagModel->Id,
				"DocumentId" => $documentId
			];

			if ($tagItem->save() == false)
				throw new \yii\web\ServerErrorHttpException($tagItem->getTopError());

		}


	}
}
