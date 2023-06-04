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
  /**
	 * digunakan untuk mendapatkan status aktif menu
	 */
	public static function isMenuActive ($current_page_active,$page_name,$callback='active') 
	{
		if ($current_page_active == $page_name) {
			return $callback;
		}else{
			return '';
		}
	}
} 