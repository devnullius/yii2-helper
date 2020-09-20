<?php
declare(strict_types=1);

namespace devnullius\helper\actions;

use yii\db\ActiveRecord;
use yii\web\NotFoundHttpException;
use function assert;

trait StdCRUDActionsTrait
{
    //public $id;
    public $modelClass;

    /**
     * @param int $id
     *
     * @return ActiveRecord
     * @throws NotFoundHttpException
     */
    public function findModelById(int $id): ActiveRecord
    {
        $modelClass = $this->modelClass;
        assert($modelClass instanceof ActiveRecord);
        if (null !== ($model = $modelClass::findOne(['id' => $id, 'deleted' => false]))) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
