<?php

namespace Anibalealvarezs\Projectbuilder\Helpers;

use Anibalealvarezs\Projectbuilder\Models\PbConfig;
use Anibalealvarezs\Projectbuilder\Models\PbModule;
use Anibalealvarezs\Projectbuilder\Models\PbUser;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use JetBrains\PhpStorm\ArrayShape;

class PbHelpers
{
    public string $vendor;
    public string $package;
    public string $directory;
    public string $prefix;
    public string $name;
    public array $modulekeys;
    /* Configurable */
    public array $nonmodules;
    public string $storageDirName;
    protected array $toExtract;
    protected array $defaults;
    protected string $configFileName;
    /* End Configurable */

    function __construct(
        $configFileName = "",
        $storageDirName = "",
        $nonmodules = [],
        $defaults = []
    )
    {
        $this->configFileName = $configFileName ?: 'pbuilder.php';
        $this->storageDirName = $storageDirName ?: 'pbstorage';
        $this->nonmodules = $nonmodules ?: ['logger'];
        $this->defaults = $defaults ?: require(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . $this->configFileName);
        $this->toExtract = ['vendor', 'package', 'directory', 'prefix', 'modulekeys'];
        $overrided = [];
        if (file_exists(config_path($this->configFileName))) {
            $overrided = require(config_path($this->configFileName));
        }
        foreach ($this->toExtract as $var) {
            $this->{$var} = $overrided[$var] ?? $this->defaults[$var];
        }
    }

    /**
     * Returns existing migration file if found, else uses the current timestamp.
     *
     * @param $key
     * @return mixed
     */
    public static function getDefault($key): mixed
    {
        $self = new self();
        return $self->{$key};
    }

    /**
     * Returns existing migration file if found, else uses the current timestamp.
     *
     * @return array
     */
    #[ArrayShape([
        'read' => "array",
        'create' => "\string[][]",
        'update' => "\string[][]",
        'delete' => "\string[][]"
    ])] public static function getMethodsByPermission(): array
    {
        return [
            'read' => [],
            'create' => ['only' => ['create', 'store']],
            'update' => ['only' => ['edit', 'update']],
            'delete' => ['only' => ['destroy']],
        ];
    }

    /**
     * Returns existing migration file if found, else uses the current timestamp.
     *
     * @return array
     */
    public static function getModelsLevels(): array
    {
        return ['level', 'parent', 'grandparent', 'child', 'grandchild'];
    }

    /**
     * Returns existing migration file if found, else uses the current timestamp.
     *
     * @param $collection
     * @param array $fields
     * @param string $outputFormatType
     * @param string $outputFormat
     * @return object
     */
    public static function setCollectionAttributeDatetimeFormat(
        $collection,
        array $fields = [],
        string $outputFormatType = 'method',
        string $outputFormat = "toDateTimeString"
    ): object {
        return $collection->map(function ($array) use ($fields, $outputFormat, $outputFormatType) {
            foreach ($fields as $f) {
                $array[$f] = (
                $outputFormatType == "method" ?
                    Carbon::parse($array[$f])->{$outputFormat}() :
                    Carbon::parse($array[$f])->format($outputFormat)
                );
            }
            return $array;
        });
    }

    /**
     * Returns existing migration file if found, else uses the current timestamp.
     *
     * @return string
     */
    public static function getCustomLocale(): string
    {
        if (Auth::check()) {
            $user = PbUser::current();
            return $user->getLocale();
        }
        return "";
    }

    /**
     * Returns existing migration file if found, else uses the current timestamp.
     *
     * @param $string
     * @return string
     */
    public static function toPlural($string): string
    {
        return $string . 's';
    }

    /**
     * Returns existing migration file if found, else uses the current timestamp.
     *
     * @param $route
     * @return array
     */
    public static function getStubsList($route): array
    {
        return array_map('basename', File::glob($route . DIRECTORY_SEPARATOR . '*.stub'));
    }

    /**
     * Returns existing migration file if found, else uses the current timestamp.
     *
     * @param $filename
     * @param $offset
     * @return string
     */
    public static function getMigrationFileName($filename, $offset): string
    {
        $timestamp = date("Y_m_d_His", $offset ? strtotime("+" . $offset . " seconds") : strtotime("now"));
        $phpFile = str_replace(".stub", "", $filename);
        return Collection::make(database_path('migrations' . DIRECTORY_SEPARATOR))
            ->flatMap(function ($path) use ($phpFile) {
                return File::glob($path . '*_' . $phpFile);
            })->push(database_path('migrations' . DIRECTORY_SEPARATOR . $timestamp . '_' . $phpFile))
            ->first();
    }

    /**
     * Returns existing migration file if found, else uses the current timestamp.
     *
     * @return array
     */
    public static function getMigrationsKeyWords(): array
    {
        return ['create', 'add'];
    }

    /**
     * Returns existing migration file if found, else uses the current timestamp.
     *
     * @return bool
     */
    public static function getDebugStatus(): bool
    {
        return (bool)PbConfig::getValueByKey('_DEBUG_MODE_');
    }

    /**
     * Returns existing migration file if found, else uses the current timestamp.
     *
     * @param $type
     * @return void
     */
    public function buildCrudRoutes($type): void
    {
        $models = [...$this->nonmodules, ...PbModule::whereIn('modulekey', $this->modulekeys)->pluck('modulekey')];

        foreach ($models as $model) {
            $controller = self::getDefault('vendor') . '\\' . self::getDefault('package') . '\\Controllers\\' . ucfirst($model) . '\\' . self::getDefault('prefix') . ucfirst($model) . 'Controller';
            switch ($type) {
                case 'web':
                    Route::resource($model . 's', $controller)->middleware(['web', 'auth:sanctum', 'verified']);
                    break;
                default:
                    Route::prefix('api')->group(
                        fn() => Route::resource($model . 's', $controller)->middleware([
                            'auth:sanctum',
                            'verified',
                            'api_access'
                        ])->names(self::getApiRoutesNames($model))
                    );
                    break;
            }
        }
    }

    /**
     * Returns existing migration file if found, else uses the current timestamp.
     *
     * @param $model
     * @return array
     */
    public static function getApiRoutesNames($model): array
    {
        $route = [];
        foreach (['index', 'show', 'create', 'store', 'edit', 'update', 'destroy'] as $method) {
            $route[$method] = 'api.' . $model . 's.' . $method;
        }
        return $route;
    }

    /**
     * Returns existing migration file if found, else uses the current timestamp.
     *
     * @param $var
     * @return string
     */
    public static function pretty($var): string
    {
        header('Content-Type: application/json; charset=utf-8');
        die(gettype($var) . ' ' . json_encode(
                $var,
                JSON_UNESCAPED_SLASHES |
                JSON_UNESCAPED_UNICODE |
                JSON_PRETTY_PRINT |
                JSON_PARTIAL_OUTPUT_ON_ERROR |
                JSON_INVALID_UTF8_SUBSTITUTE
            ));
    }
}
