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
      'user_id',   
      'no_peserta',                   
      'jadwal_ujian_id',            
      'mulai_ujian', 
      'selesai_ujian',         
      'sisa_waktu',         
      'status', //0 daftar, 1 finish, 2 batal, 3 arsip
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