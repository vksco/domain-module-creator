<?php

namespace Vksco\DomainModuleCreator\Datasystem\Database;

/**
 * Interface DatabaseContract.
 */
interface DatabaseContractInterface
{
    /**
     * retrieve table names from database.
     *
     * @return \Illuminate\Support\Collection
     */
    public function tableNames();
}
