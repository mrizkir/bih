<?php

namespace App\Models\Sosial;

use Illuminate\Database\Eloquent\Model;

class LulusanPendidikanModel extends Model {    
  /**
   * nama tabel model ini.
   *
   * @var string
   */
  protected $table = 'm_16_lulusan_pendidikan';
  /**
   * primary key tabel ini.
   *
   * @var array
   */
  protected $primaryKey = ['tahun', 'no'];
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [              
    'tahun',   
    'no',
    'pendidikan',
    'laki',
    'perempuan',
    'total',
    'status_data',            
  ];
  /**
   * enable auto_increment.
   *
   * @var string
   */
  public $incrementing = false;
  /**
   * activated timestamps.
   *
   * @var string
   */
  public $timestamps = true;

  /**
   * Set the keys for a save update query.
   *
   * @param  \Illuminate\Database\Eloquent\Builder  $query
   * @return \Illuminate\Database\Eloquent\Builder
   */
  protected function setKeysForSaveQuery($query)
  {
    $keys = $this->getKeyName();
    if (!is_array($keys)) {
      return parent::setKeysForSaveQuery($query);
    }

    foreach ($keys as $keyName) {
      $query->where($keyName, '=', $this->getKeyForSaveQuery($keyName));
    }

    return $query;
  }

  /**
   * Get the primary key value for a save query.
   *
   * @param  mixed  $keyName
   * @return mixed
   */
  protected function getKeyForSaveQuery($keyName = null)
  {
    if (is_null($keyName)) {
      $keyName = $this->getKeyName();
    }

    if (isset($this->original[$keyName])) {
      return $this->original[$keyName];
    }

    return $this->getAttribute($keyName);
  }

  /**
   * Get the value of the model's primary key.
   *
   * @return mixed
   */
  public function getKey()
  {
    $keys = $this->getKeyName();
    if (!is_array($keys)) {
      return parent::getKey();
    }

    $values = [];
    foreach ($keys as $keyName) {
      $values[$keyName] = $this->getAttribute($keyName);
    }

    return $values;
  }
}
