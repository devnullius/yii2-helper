<?php
declare(strict_types=1);

namespace devnullius\helper\actions;

use devnullius\helper\exceptions\NotFoundException;
use yii\base\Action;
use yii\web\NotFoundHttpException;

abstract class ViewExtCRUDAction extends Action
{
    /**
     * @var GetRepository
     */
    public $repository;

    public $view = 'view';

    /**
     * @param int $id
     *
     * @return string
     * @throws NotFoundHttpException
     */
    public function run(int $id)
    {
        try {
            $model = $this->repository->get($id);
        } catch (NotFoundException $e) {
            throw new NotFoundHttpException($e->getMessage());
        }

        return $this->controller->render(
            $this->view,
            [
                'model' => $model,
            ]
        );
    }
}
