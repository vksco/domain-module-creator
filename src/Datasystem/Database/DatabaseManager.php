<?php

namespace Vksco\DomainModuleCreator\Datasystem\Database;

/**
 * Class Database.
 */
class DatabaseManager
{
    /**
     * Database holder.
     *
     * @var \Vksco\DomainModuleCreator\DataSystem\DatabaseContract
     */
    protected $database;

    /**
     * Excluded tables.
     *
     * @var array
     */
    protected $exclude = ['relations', 'role_has_permissions', 'model_has_roles', 'model_has_permissions'];

    public function __construct(DatabaseContractInterface $database)
    {
        $this->database = $database;
    }

    /**
     * New instance based on app's database driver.
     *
     * @return self
     */
    public static function make()
    {
        $class = str_replace(
            'DatabaseManager',
            ucfirst(config('database.default')).'Database',
            self::class
        );

        try {
            return new self(new $class());
        } catch (\Exception $e) {
            return new self(new MysqlDatabase());
        }
    }

    /**
     * Retrieve table names from database.
     *
     * @return \Illuminate\Support\Collection
     */
    public static function tableNames()
    {
        return self::make()->getTablesNames();
    }

    /**
     * Get all tables names.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getTablesNames()
    {
        return $this->database->tableNames()->filter(function ($name) {
            return !in_array($name, $this->exclude);
        });
    }
}
