<?php
declare(strict_types=1);

namespace devnullius\helper\actions;

use devnullius\helper\Module;
use DomainException;
use Yii;
use yii\base\Model;
use yii\bootstrap4\ActiveForm;
use yii\web\Response;
use function assert;

class CreateExtModalAction extends CreateExtCRUDAction
{
    public $redirectOnFailRoute = ['index'];
    public $redirectView = ['index'];

    public function run()
    {
        $form = new $this->form();
        assert($form instanceof Model);

        if (Yii::$app->request->isAjax && $form->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;

            return ActiveForm::validate($form);
        }

        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $entity = $this->service->{$this->serviceAction}($form);

                Yii::$app->session->setFlash(
                    'success',
                    Module::t('actions', 'Item {uid} successfully created.', ['uid' => $entity->id])
                );

                return $this->controller->redirect($this->redirectView);
            } catch (DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }

        return $this->controller->redirect($this->redirectOnFailRoute);
    }
}
