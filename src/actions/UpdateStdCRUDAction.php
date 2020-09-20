<?php
declare(strict_types=1);

namespace devnullius\helper\actions;

use devnullius\helper\Module;
use Exception;
use Yii;
use yii\base\Action;
use yii\base\ErrorException;
use yii\db\ActiveRecord;
use yii\helpers\Json;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use function assert;

abstract class UpdateStdCRUDAction extends Action
{
    use StdCRUDActionsTrait;

    public $view = 'update';
    public $redirectView = 'view';

    /**
     * @param int $id
     *
     * @return string|Response
     * @throws NotFoundHttpException
     */
    public function run(int $id)
    {
        $model = $this->findModelById($id);
        assert($model instanceof ActiveRecord);

        if ($model->load(Yii::$app->request->post())) {
            $db = Yii::$app->db;
            $transaction = $db->beginTransaction();
            try {
                if (!$model->save()) {
                    throw new ErrorException(Module::t('actions', 'Item save error. {errors}', ['errors' => Json::encode($model->getErrors())]));
                }
                $transaction->commit();
                Yii::$app->session->setFlash('success', Module::t('actions', 'Item successfully updated.'));
            } catch (Exception $e) {
                $transaction->rollBack();
                Yii::$app->session->setFlash('danger', $e->getMessage());
            }

            return $this->controller->redirect([$this->redirectView, 'id' => $model->id]);
        }

        return $this->controller->render(
            $this->view,
            [
                'model' => $model,
            ]
        );
    }
}
