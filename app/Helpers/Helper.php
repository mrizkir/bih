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
   * daftar pendidikan
  */ 
  private static $pendidikan = [  
    '1' => 'Tidak/belum tamat SD',
    '2' => 'SD/MI',
    '3' => 'SMP/MTs',
    '4' => 'SMA/MA/SMK',
    '5' => 'D1/D2/D3',
    '6' => 'D4/S1',
    '7' => 'S2/S3'
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
   * digunakan untuk mendapatkan daftar pendidikan
   */
  public static function getPendidikan($pendidikan = NULL)
  {
    if ($pendidikan === NULL)
    {
      return Helper::$pendidikan;
    }
    else
    {
      return Helper::$pendidikan[$pendidikan];
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