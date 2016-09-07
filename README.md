MATA Tag
==========================================

Tag management for MATA CMS

Installation
------------

- Add the module using composer:

```json
"mata/mata-tag": "~1.0.0"
```

-  Run migrations
```
php yii migrate/up --migrationPath=@vendor/mata/mata-tag/migrations
```


Changelog
---------


## 1.0.3.2-alpha, September 7, 2016

- Added migration (alter DocumentId from 64 to 128 characters)

## 1.0.3.1-alpha, October 8, 2015

- Replaced \yii\behaviors\SluggableBehavior with \mata\behaviors\SluggableBehavior

## 1.0.3-alpha, August 21, 2015

- Added deletion of tags for removed document

## 1.0.2-alpha, May 19, 2015

- Fixed a typo in README.md
- Bug fix

## 1.0.1-alpha, May 18, 2015

- Bug fixes, occurred due to a merge conflict.

## 1.0.0-alpha, May 18, 2015

- Initial release.
