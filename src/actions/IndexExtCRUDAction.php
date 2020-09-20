<?php
declare(strict_types=1);

namespace devnullius\helper\actions;

use Yii;
use yii\base\Action;
use yii\base\Model;
use function assert;

abstract class IndexExtCRUDAction extends Action
{
    public $view = 'index';
    public $searchModel;

    /**
     * @return string
     */
    public function run()
    {
        $searchModel = new $this->searchModel();
        assert($searchModel instanceof Model);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->controller->render(
            $this->view,
            [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]
        );
    }
}
