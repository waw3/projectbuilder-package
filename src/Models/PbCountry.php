<?php

namespace Anibalealvarezs\Projectbuilder\Models;

use Anibalealvarezs\Projectbuilder\Traits\PbModelMiscTrait;
use Anibalealvarezs\Projectbuilder\Traits\PbModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Facades\DB;
use Spatie\Translatable\HasTranslations;


class PbCountry extends Model
{
    use PbModelTrait;
    use PbModelMiscTrait;
    use HasTranslations;

    protected $table = 'countries';

    public $translatable = ['name'];

    protected $appends = ['crud'];

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'code'
    ];

    public function getNameAttribute($value)
    {
        if (json_decode($value)) {
            return json_decode($value)->{app()->getLocale()};
        }
        return $value;
    }

    public static function findByCode($code)
    {
        $country = DB::table('countries')
                ->select('id')
                ->where('code', $code)
                ->first();
        if ($country->id) {
            return self::find($country->id);
        }
        return null;
    }

    public function delete()
    {
        // Remove langs relations
        $this->langs()->detach();

        // Delete cities
        PbCity::where('country_id', $this->id)->delete();

        // Remove countries from users
        PbUser::where('country_id', $this->id)->update(['country_id' => null]);

        // delete the country
        return parent::delete();
    }

    public function cities(): HasMany
    {
        return $this->hasMany(PbCity::class);
    }

    public function capital(): HasOne
    {
        return $this->hasOne(PbCity::class);
    }

    public function users(): HasMany
    {
        return $this->hasMany(PbUser::class);
    }

    public function langs(): MorphToMany
    {
        return $this->morphToMany(PbLanguage::class, 'langable', 'langables', 'language_id', 'language_id');
    }

    public function isEditableBy($id): bool
    {
        return true;
    }

    public function isViewableBy($id): bool
    {
        return true;
    }

    public function isSelectableBy($id): bool
    {
        return true;
    }

    public function isDeletableBy($id): bool
    {
        return true;
    }
}
