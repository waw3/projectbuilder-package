<?php

namespace Anibalealvarezs\Projectbuilder\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class PbLogger extends PbBuilder
{
    use HasTranslations;

    public $translatable = ['message'];

    protected $table = 'logger';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'severity', 'code', 'message', 'object_type', 'object_id', 'user_id', 'module_id'
    ];

    public function module(): BelongsTo
    {
        return $this->belongsTo(PbModule::class, 'module_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(PbUser::class, 'user_id', 'id');
    }

    public function getMessageAttribute($value)
    {
        if (json_decode($value)) {
            return json_decode($value)->{app()->getLocale()};
        }
        return $value;
    }

    public function getSeverityAttribute($value)
    {
        if (version_compare(PHP_VERSION, '8.0.0') < 0) {
            switch($value){
                case 1:
                    return 'Info';
                case 2:
                    return 'Warning';
                case 3:
                    return 'Error';
                default:
                    return 'Debug';
            }
        } else {
            return match ($value) {
                1 => 'Info',
                2 => 'Warning',
                3 => 'Error',
                default => 'Debug',
            };
        }
    }

    public function save(array $options = [])
    {
        if (PbConfig::getValueByKey('_SAVE_LOGS_')) {
            parent::save();
        }
        return false;
    }

    protected function getEditableStatus(): bool
    {
        return false;
    }
}
