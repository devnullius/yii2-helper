<?php
declare(strict_types=1);

namespace devnullius\helper\actions;

use devnullius\helper\Module;
use DomainException;
use Yii;
use yii\base\Action;
use yii\base\Model;
use function assert;

abstract class CreateExtCRUDAction extends Action
{
    /**
     * @var Model
     */
    public $form;
    public $service;
    public string $view = 'create';
    public $redirectView = 'view';
    public string $serviceAction = 'create';

    public function run()
    {
        $form = new $this->form();
        assert($form instanceof Model);

        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $user = $this->service->{$this->serviceAction}($form);

                Yii::$app->session->setFlash('success', Module::t('actions', 'Item successfully created.'));

                return $this->controller->redirect([$this->redirectView, 'id' => $user->id]);
            } catch (DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }

        return $this->controller->render(
            $this->view,
            [
                'model' => $form,
            ]
        );
    }
}
