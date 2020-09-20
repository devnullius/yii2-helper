<?php

namespace devnullius\helper\actions;

use yii\web\Response;

class DeleteExtAction extends DeleteExtCRUDAction
{
    public function run(int $id): Response
    {
        return parent::run($id);
    }
}
