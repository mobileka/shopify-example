<?php namespace Mobileka;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property string name
 * @property string token
 */
class Store extends Model
{
    /**
     * @var array
     */
    public $fillable = ['name'];

    /**
     * @param string $append
     * @return string
     */
    public function getUrl($append = '')
    {
        return 'https://' . $this->name . '.myshopify.com/' . $append;
    }

    /**
     * @return mixed
     */
    public function getTokenAttribute()
    {
        return unserialize($this->attributes['token']);
    }
}
