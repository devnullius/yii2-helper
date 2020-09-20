<?php
declare(strict_types=1);

namespace devnullius\helper\actions;

use devnullius\helper\Module;
use Exception;
use Yii;
use yii\base\Action;
use yii\web\Response;

abstract class DeleteExtCRUDAction extends Action
{
    public $service;
    public $redirectPath = 'index';

    public function run(int $id): Response
    {

        try {
            $entity = null;
            $this->service->remove($id, $entity);
            Yii::$app->session->setFlash(
                'warning',
                Module::t('actions', 'Item {uid} successfully deleted.', ['uid' => $id])
            );
        } catch (Exception $e) {
            Yii::$app->session->setFlash('danger', $e->getMessage());
        }

        return $this->controller->redirect([$this->redirectPath]);
    }
}
