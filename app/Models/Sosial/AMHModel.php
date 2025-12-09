<?php

namespace App\Models\Sosial;

use Illuminate\Database\Eloquent\Model;

class AMHModel extends Model {    
  /**
   * nama tabel model ini.
   *
   * @var string
   */
  protected $table = 'm_4_amh';
  /**
   * primary key tabel ini.
   *
   * @var string
   */
  protected $primaryKey = 'tahun';
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [              
    'tahun',   
    'jumlah',                 
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
}

