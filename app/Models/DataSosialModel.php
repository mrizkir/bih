<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataSosialModel extends Model {    
    /**
   * nama tabel model ini.
   *
   * @var string
   */
  protected $table = 'sosial';
  /**
   * primary key tabel ini.
   *
   * @var string
   */
  protected $primaryKey = 'id';
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [        
      'id',   
      'tahun',   
      'data_series',                 
      'jenis_data',            
      'persentase',                  
  ];
  /**
   * enable auto_increment.
   *
   * @var string
   */
  public $incrementing = true;
  /**
   * activated timestamps.
   *
   * @var string
   */
  public $timestamps = true;
}