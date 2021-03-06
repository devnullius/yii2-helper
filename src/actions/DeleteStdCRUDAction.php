<?php
declare(strict_types=1);

namespace devnullius\helper\actions;

use devnullius\helper\Module;
use Exception;
use Throwable;
use Yii;
use yii\base\Action;
use yii\base\ErrorException;
use yii\helpers\Json;
use yii\web\Response;

abstract class DeleteStdCRUDAction extends Action
{
    use StdCRUDActionsTrait;

    public $redirectPath = 'index';

    /**
     * @param int $id
     *
     * @return Response
     * @throws Throwable
     */
    public function run(int $id): Response
    {

        $db = Yii::$app->db;
        $transaction = $db->beginTransaction();
        try {
            $model = $this->findModelById($id);
            if (!$model->delete()) {
                throw new ErrorException(Module::t(
                    'actions',
                    'Item delete error. {errors}',
                    ['errors' => Json::encode($model->getErrors())]
                ));
            }
            $transaction->commit();
            Yii::$app->session->setFlash('success', Module::t('actions', 'Item successfully deleted.'));
        } catch (Exception $e) {
            $transaction->rollBack();
            Yii::$app->session->setFlash('danger', $e->getMessage());
        }

        return $this->controller->redirect([$this->redirectPath]);
    }
}
