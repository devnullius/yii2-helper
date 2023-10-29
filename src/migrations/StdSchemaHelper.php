<?php
declare(strict_types=1);

namespace devnullius\helper\migrations;

use yii\db\Migration;

final class StdSchemaHelper
{
    public static function standardFieldSet(Migration $migration): array
    {
        return [
            'id' => $migration->bigPrimaryKey(),
            'created_by' => $migration->bigInteger()->notNull()->defaultValue(0)
                ->comment('Modifier id of create, if 0 created from db, if -1 not registered user.'),
            'updated_by' => $migration->bigInteger()->notNull()->defaultValue(0)
                ->comment('Modifier id of update, if 0 created from db, if -1 not registered user.'),
            'created_at' => $migration->bigInteger()->notNull()
                ->comment('Unix time-stamp of create date.'),
            'updated_at' => $migration->bigInteger()->notNull()
                ->comment('Unix time-stamp of update date.'),
            'modifier' => $migration->string()->notNull()->defaultValue('user')
                ->comment('Operation performer entity name.'),
            'deleted' => $migration->boolean()->defaultValue(false)
                ->comment('If true, row softly deleted, only marker.'),
            'archived' => $migration->boolean()->defaultValue(false)
                ->comment('If true, row archived, only marker.'),
            'is_published' => $migration->boolean()->defaultValue(false)
                ->comment('Is item published, default is - not published.'),
            'is_enabled' => $migration->boolean()->defaultValue(false)
                ->comment('Is item enabled, default is - disabled.'),
        ];
    }

    public static function advancedUuidFieldSet(Migration $migration): array
    {
        return [
            'id uuid DEFAULT uuid_generate_v4 () PRIMARY KEY',
            'created_by uuid DEFAULT NULL',
            'updated_by uuid DEFAULT NULL',
            'deleted_by uuid DEFAULT NULL',
            'archived_by uuid DEFAULT NULL',
            'published_by uuid DEFAULT NULL',
            'enabled_by uuid DEFAULT NULL',
            'created_at' => $migration->bigInteger()->notNull()
                ->comment('Unix time-stamp of create date.'),
            'updated_at' => $migration->bigInteger()->notNull()
                ->comment('Unix time-stamp of update date.'),
            'deleted_at' => $migration->bigInteger()->null()
                ->comment('Unix time-stamp of deleted marker last change date.'),
            'archived_at' => $migration->bigInteger()->null()
                ->comment('Unix time-stamp of archived marker last change date.'),
            'published_at' => $migration->bigInteger()->null()
                ->comment('Unix time-stamp of published marker last change date.'),
            'enabled_at' => $migration->bigInteger()->null()
                ->comment('Unix time-stamp of enabled marker last change date.'),
            'modifier' => $migration->string()->notNull()->defaultValue('user')
                ->comment('Operation performer entity name.'),
            'deleted' => $migration->boolean()->defaultValue(false)
                ->comment('If true, row softly deleted, only marker.'),
            'archived' => $migration->boolean()->defaultValue(false)
                ->comment('If true, row archived, only marker.'),
            'is_published' => $migration->boolean()->defaultValue(false)
                ->comment('Is item published, default is - not published.'),
            'is_enabled' => $migration->boolean()->defaultValue(false)
                ->comment('Is item enabled, default is - disabled.'),
        ];
    }

    public static function executeUUIDInit(Migration $migration): void
    {
        $migration->execute('CREATE EXTENSION IF NOT EXISTS "uuid-ossp";');
    }
}
