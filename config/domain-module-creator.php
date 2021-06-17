<?php
// config for Vksco/DomainModuleCreator

return [

    /*
    |--------------------------------------------------------------------
    | Allowed environments
    |--------------------------------------------------------------------
    |
    | Here is where you can register your allowed env-s.
    | By default is ['local']
    |
    */

    'env' => [
        'local',
    ],

    /*
    |--------------------------------------------------------------------
    | Default package Name
    |--------------------------------------------------------------------
    |
    | Here is where you can register your current package.
    | By default is Laravel
    |
    */

    'package' => 'DomainModuleCreator',

    /*
    |--------------------------------------------------------------------
    | Default Files Storage , (Models , Views , Controllers , Migrations)
    |--------------------------------------------------------------------
    |
    | Here is where you can register your storage paths.
    |
    */
    'domain_path'  => base_path('app'),

    'domain_folder_name'  => 'Domains',

    'model' => base_path('app'),

    'views' => base_path('resources/views'),

    'controller' => base_path('app/Http/Controllers'),

    'migration' => base_path('database/migrations'),

    'event_types' => [ 'created', 'updated', 'deleted', 'restored', 'destroyed' ],

    /*
    |--------------------------------------------------------------------
    | Database migration path.
    |--------------------------------------------------------------------
    |
    | Here is where you can register your migrations path to migrate
    | the schema via migrate artisan command.
    |
    */

    'database' => null,

    /*
    |-------------------------------------------------------------------
    | Default route file
    |-------------------------------------------------------------------
    |
    | Here is where you can register your route file.
    |
    */

    'routes' => base_path('routes/web.php'),

    /*
    |-------------------------------------------------------------------
    | Views loader
    |-------------------------------------------------------------------
    |
    | Here is where you can register your default views loader.
    | By default is null
    |
    */

    'loadViews' => null,

    /*
    |-------------------------------------------------------------------
    | Views prefix
    |-------------------------------------------------------------------
    |
    | Here is where you can register your default views prefix.
    | By default is null
    |
    */

    'prefixViews' => null,

    /*
    |-------------------------------------------------------------------
    | Route prefix
    |-------------------------------------------------------------------
    |
    | Here is where you can register your default views prefix.
    | By default is null
    |
    */

    'prefixRoutes' => null,

];

