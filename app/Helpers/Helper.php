<?php

namespace App\Helpers;

class Helper
{ 
  /**
   * daftar jenis data series
   */
  private static $data_series = [
    1 => 'Data Sementara',
    2 => 'Data Tetap',
    3 => 'Data Estimasi',
  ];  
  /**
   * digunakan untuk data series
   */
  public static function getJenisDataSeries($jenis = NULL)
  {
    if ($jenis === NULL)
    {
      return Helper::$data_series;
    }
    else
    {
      return Helper::$data_series[$jenis];
    }
  }

  private static $defult_role = [
    1 => 'Super Admin',
    2 => 'User',
    3 => 'Operator',
  ];  
  
  public static function getJenisDataUser($combo_user = NULL)
  {
    if ($combo_user === NULL)
    {
      return Helper::$defult_role;
    }
    else
    {
      return Helper::$defult_role[$combo_user];
    }
  }
  
} 