<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $table = 'configs';
    protected $primaryKey = 'id';
    protected $dates = ['deleted_at'];

    const ID = 'id';
    const FUNCTION_CD
                     = 'function_cd';
    const ATTRIBUTE_CD
                     = 'attribute_cd';
    const DETAIL_CD  = 'detail_cd';
    const NAME       = 'name';
    const DISPLAYTEXT
                     = 'displayText';
    const VALUES     = 'values';
    const DEFAULTVALUES
                     = 'defaultValues';
    const DESCRIPTION
                     = 'description';
    const MULTI_VALUE
                     = 'multiValue';

    const EDIT_USER  = 'edit_user';
    const ENABLE     = 'enable';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    protected $fillable = [
        self::FUNCTION_CD,
        self::ATTRIBUTE_CD,
        self::DETAIL_CD,
        self::NAME,
        self::DISPLAYTEXT,
        self::VALUES,
        self::DEFAULTVALUES,
        self::DESCRIPTION,
        self::MULTI_VALUE,
        self::EDIT_USER,
        self::ENABLE,
        self::CREATED_AT,
        self::UPDATED_AT,
    ];

#region Accessor & Mutator
#region "values"
    /**
     * Set encrypted Values
     *
     * @param $value
     */
    public function setValuesAttribute($value)
    {
        $this->attributes[self::VALUES] = encrypt($value);
    }

    /**
     * get decrypted Values
     *
     * @param $value
     * @return bool|mixed
     */
    public function getValuesAttribute($value)
    {
        if(!$value)
            return false;

        return decrypt($value);
    }
#endregion
#region "defaultValues"
    /**
     * Set encrypted defaultValues
     *
     * @param $value
     */
    public function setDefaultValuesAttribute($value)
    {
        $this->attributes[self::DEFAULTVALUES] = encrypt($value);
    }
    /**
     * defaultValues値の取得時に復号化
     *
     * @param $value
     * @return bool|mixed
     */
    public function getDefaultValuesAttribute($value)
    {
        if(!$value)
            return false;

        return decrypt($value);
    }
#endregion
#endregion

}
