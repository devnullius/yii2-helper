<?php
declare(strict_types=1);

namespace devnullius\helper;

use Yii;
use yii\base\Module as BaseModule;

class Module extends BaseModule
{
    public const VERSION = '1.0.0';

    /**
     * Translate module message
     *
     * @param string      $category
     * @param string      $message
     * @param array       $params
     * @param string|null $language
     *
     * @return string
     */
    public static function t(string $category, string $message, array $params = [], string $language = null): string
    {
        return Yii::t('modules/helper/' . $category, $message, $params, $language);
    }

    public function init()
    {
        parent::init();

        $this->registerTranslations();
    }

    final public function registerTranslations(): void
    {
        //        if (!isset(Yii::$app->get('i18n')->translations['modules/helper/*'])) {
        //            Yii::$app->get('i18n')->translations['modules/helper/*'] = [
        //                'class' => PhpMessageSource::class,
        //                'basePath' => __DIR__ . '/messages',
        //            ];
        //        }
    }
}
