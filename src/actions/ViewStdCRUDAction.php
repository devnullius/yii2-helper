<?php
declare(strict_types=1);

namespace devnullius\helper\actions;

use yii\base\Action;
use yii\web\NotFoundHttpException;

abstract class ViewStdCRUDAction extends Action
{
    use StdCRUDActionsTrait;

    public string $view = 'view';

    /**
     * @throws NotFoundHttpException
     */
    public function run(int $id)
    {
        return $this->controller->render(
            $this->view,
            [
                'model' => $this->findModelById($id),
            ]
        );
    }
}
