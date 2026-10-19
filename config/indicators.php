<?php

$tahun = [
    'name' => 'tahun',
    'label' => 'Tahun',
    'type' => 'number',
    'rules' => ['required', 'integer', 'digits:4', 'min:1990', 'max:2100'],
];

$series = [
    'name' => 'status_data',
    'label' => 'Data Series',
    'type' => 'select',
    'options' => 'series',
    'rules' => ['required', 'integer', 'in:1,2,3'],
];

$number = function (string $name, string $label, ?string $suffix = null, bool $required = true): array {
    return array_filter([
        'name' => $name,
        'label' => $label,
        'type' => 'number',
        'suffix' => $suffix,
        'rules' => [$required ? 'required' : 'nullable', 'numeric'],
    ], fn ($value) => $value !== null);
};

$text = function (string $name, string $label, bool $required = true): array {
    return [
        'name' => $name,
        'label' => $label,
        'type' => 'text',
        'rules' => [$required ? 'required' : 'nullable', 'string', 'max:255'],
    ];
};

$tingkat = [
    'name' => 'tingkat',
    'label' => 'Tingkat',
    'type' => 'select',
    'options' => [
        ['value' => 'SD 7-12 TAHUN', 'label' => 'SD 7-12 Tahun'],
        ['value' => 'SMP 13-15 TAHUN', 'label' => 'SMP 13-15 Tahun'],
        ['value' => 'SMA 16-18 TAHUN', 'label' => 'SMA 16-18 Tahun'],
    ],
    'rules' => ['required', 'string', 'in:SD 7-12 TAHUN,SMP 13-15 TAHUN,SMA 16-18 TAHUN'],
];

$pendidikan = [
    'name' => 'pendidikan',
    'label' => 'Pendidikan',
    'type' => 'select',
    'options' => [
        ['value' => 'Tidak/belum tamat SD', 'label' => 'Tidak/belum tamat SD'],
        ['value' => 'SD/MI', 'label' => 'SD/MI'],
        ['value' => 'SMP/MTs', 'label' => 'SMP/MTs'],
        ['value' => 'SMA/MA/SMK', 'label' => 'SMA/MA/SMK'],
        ['value' => 'D1/D2/D3', 'label' => 'D1/D2/D3'],
        ['value' => 'D4/S1', 'label' => 'D4/S1'],
        ['value' => 'S2/S3', 'label' => 'S2/S3'],
    ],
    'rules' => ['required', 'string', 'max:255'],
];

return [
    'groups' => [
        'sosial' => 'Sosial',
        'ekonomi' => 'Ekonomi',
        'pertanian' => 'Pertanian',
        'kependudukan' => 'Kependudukan',
        'infrastruktur' => 'Infrastruktur',
        'video' => 'Video',
    ],

    'items' => [
        ['key' => 'ppm', 'group' => 'sosial', 'title' => 'Presentasi Penduduk Miskin (PPM)', 'sumber' => 'BPS', 'table' => 'm_1_pres_pend_miskin', 'primary' => ['tahun'], 'fields' => [$tahun, $number('presentase', 'Presentase', '%'), $series]],
        ['key' => 'ipm', 'group' => 'sosial', 'title' => 'Indeks Pembangunan Manusia (IPM)', 'sumber' => 'BPS', 'table' => 'm_2_ipm', 'primary' => ['tahun'], 'fields' => [$tahun, $number('ipm', 'IPM'), $series]],
        ['key' => 'rls', 'group' => 'sosial', 'title' => 'Angka Rata-Rata Lama Sekolah (RLS)', 'sumber' => 'BPS', 'table' => 'm_3_rls', 'primary' => ['tahun'], 'fields' => [$tahun, $number('rls', 'RLS'), $series]],
        ['key' => 'amh', 'group' => 'sosial', 'title' => 'Angka Melek Huruf (AMH)', 'sumber' => 'BPS', 'table' => 'm_4_amh', 'primary' => ['tahun'], 'timestamps' => true, 'fields' => [$tahun, $number('jumlah', 'Jumlah', '%'), $series]],
        ['key' => 'ahh', 'group' => 'sosial', 'title' => 'Angka Harapan Hidup (AHH)', 'sumber' => 'BPS', 'table' => 'm_5_ahh', 'primary' => ['tahun'], 'fields' => [$tahun, $number('ahh', 'AHH'), $series]],
        ['key' => 'akhb', 'group' => 'sosial', 'title' => 'Angka Kelangsungan Hidup Bayi (AKHB)', 'sumber' => 'BPS', 'table' => 'm_6_akhb', 'primary' => ['tahun'], 'fields' => [$tahun, $number('pres_akhb', 'Persentase', '%'), $series]],
        ['key' => 'akim', 'group' => 'sosial', 'title' => 'Angka Kematian Ibu Melahirkan', 'sumber' => 'BPS', 'table' => 'm_7_kematian_ibu', 'primary' => ['tahun'], 'fields' => [$tahun, $number('kematian_ibu', 'Kematian Ibu'), $series]],
        ['key' => 'pkk', 'group' => 'sosial', 'title' => 'Kondisi Ketenagakerjaan', 'sumber' => 'BPS', 'table' => 'm_8_tenaga_kerja', 'primary' => ['tahun'], 'fields' => [
            $tahun,
            $number('penduduk_usia_kerja', 'Penduduk Usia Kerja'),
            $number('angkatan_kerja', 'Angkatan Kerja'),
            $number('bekerja', 'Bekerja'),
            $number('mencari_pekerjaan', 'Mencari Pekerjaan'),
            $number('tingkat_partisipasi', 'Tingkat Partisipasi', '%'),
            $number('tingkat_pengangguran', 'Tingkat Pengangguran', '%'),
            $series,
        ]],
        ['key' => 'ipg', 'group' => 'sosial', 'title' => 'Indeks Pembangunan Gender (IPG)', 'sumber' => 'BPS', 'table' => 'm_9_ipg', 'primary' => ['tahun'], 'fields' => [$tahun, $number('laki', 'Laki-laki'), $number('perempuan', 'Perempuan'), $number('total', 'Total'), $series]],
        ['key' => 'apk', 'group' => 'sosial', 'title' => 'Angka Partisipasi Kasar (APK)', 'sumber' => 'BPS', 'table' => 'm_10_apk', 'primary' => ['tingkat', 'tahun'], 'fields' => [$tingkat, $tahun, $number('APK', 'APK', '%'), $number('no', 'No', null, false), $series]],
        ['key' => 'apm', 'group' => 'sosial', 'title' => 'Angka Partisipasi Murni (APM)', 'sumber' => 'BPS', 'table' => 'm_11_apm', 'primary' => ['tingkat', 'tahun'], 'fields' => [$tingkat, $tahun, $number('APM', 'APM', '%'), $number('no', 'No', null, false), $series]],
        ['key' => 'hls', 'group' => 'sosial', 'title' => 'Angka Harapan Lama Sekolah (HLS)', 'sumber' => 'BPS', 'table' => 'm_12_hls', 'primary' => ['tahun'], 'fields' => [$tahun, $number('hls', 'HLS'), $series]],
        ['key' => 'jrtlh', 'group' => 'sosial', 'title' => 'Rumah Tidak Layak Huni yang Direhab (JRTLH)', 'sumber' => 'BPS', 'table' => 'm_13_rtlh', 'primary' => ['tahun'], 'fields' => [$tahun, $number('jumlah_unit', 'Jumlah Unit'), $series]],
        ['key' => 'gini', 'group' => 'sosial', 'title' => 'Indeks Gini (IG)', 'sumber' => 'BPS', 'table' => 'm_14_gini', 'primary' => ['tahun'], 'fields' => [$tahun, $number('gini_ratio', 'Gini Ratio'), $series]],
        ['key' => 'idb', 'group' => 'sosial', 'title' => 'Indeks Daya Beli (IDB)', 'sumber' => 'BPS', 'table' => 'm_15_idb', 'primary' => ['tahun'], 'fields' => [$tahun, $number('daya_beli', 'Daya Beli'), $series]],
        ['key' => 'lulusan', 'group' => 'sosial', 'title' => 'Penduduk Usia 15+ menurut Pendidikan', 'sumber' => 'BPS', 'table' => 'm_16_lulusan_pendidikan', 'primary' => ['tahun', 'no'], 'timestamps' => true, 'fields' => [$tahun, $number('no', 'No'), $pendidikan, $number('laki', 'Laki-laki'), $number('perempuan', 'Perempuan'), $number('total', 'Total'), $series]],
        ['key' => 'idg', 'group' => 'sosial', 'title' => 'Indeks Pemberdayaan Gender (IDG)', 'sumber' => 'BPS', 'table' => 'm_38_idg', 'primary' => ['tahun'], 'fields' => [$tahun, $number('idg', 'IDG'), $series]],
        ['key' => 'stunting', 'group' => 'sosial', 'title' => 'Prevalensi Stunting', 'sumber' => 'BPS', 'table' => 'm_39_prevalensi_stunting', 'primary' => ['id'], 'incrementing' => true, 'timestamps' => true, 'fields' => [$tahun, $number('prevalensi', 'Prevalensi', '%'), $series, $text('sumber', 'Sumber')]],

        ['key' => 'pertumbuhan', 'group' => 'ekonomi', 'title' => 'Pertumbuhan Ekonomi (PE)', 'sumber' => 'BPS', 'table' => 'm_17_ekonomi', 'primary' => ['tahun'], 'fields' => [$tahun, $number('pertumbuhan_ekonomi', 'Pertumbuhan Ekonomi', '%'), $series]],
        ['key' => 'inflasi', 'group' => 'ekonomi', 'title' => 'Laju Inflasi (LI)', 'sumber' => 'BPS', 'table' => 'm_18_inflasi', 'primary' => ['tahun'], 'fields' => [
            $tahun,
            $number('umum', 'Umum', '%'),
            $number('bahan_makanan', 'Bahan Makanan', '%'),
            $number('makanan_jadi', 'Makanan Jadi', '%'),
            $number('perumahan', 'Perumahan', '%'),
            $number('sandang', 'Sandang', '%'),
            $number('kesehatan', 'Kesehatan', '%'),
            $number('pendidikan', 'Pendidikan', '%'),
            $number('transportasi', 'Transportasi', '%'),
            $series,
        ]],
        ['key' => 'pdrb-berlaku', 'group' => 'ekonomi', 'title' => 'PDRB Atas Dasar Harga Berlaku (ADHB)', 'sumber' => 'BPS', 'table' => 'm_19_pdrb_berlaku', 'primary' => ['uraian', 'tahun'], 'fields' => [
            ['name' => 'uraian', 'label' => 'Uraian', 'type' => 'select', 'options' => 'uraian', 'rules' => ['required', 'integer']],
            $tahun,
            $number('jumlah', 'Jumlah'),
            $series,
        ]],
        ['key' => 'pdrb-konstan', 'group' => 'ekonomi', 'title' => 'PDRB Atas Dasar Harga Konstan (ADHK)', 'sumber' => 'BPS', 'table' => 'm_19_pdrb_konstan', 'primary' => ['uraian', 'tahun'], 'fields' => [
            ['name' => 'uraian', 'label' => 'Uraian', 'type' => 'select', 'options' => 'uraian', 'rules' => ['required', 'integer']],
            $tahun,
            $number('jumlah', 'Jumlah'),
            $series,
        ]],
        ['key' => 'kunjungan', 'group' => 'ekonomi', 'title' => 'Kunjungan Wisatawan', 'sumber' => 'BPS', 'table' => 'm_20_kunjungan', 'primary' => ['tahun'], 'fields' => [$tahun, $number('mancanegara', 'Mancanegara'), $number('nusantara', 'Nusantara'), $number('jumlah', 'Jumlah'), $series]],
        ['key' => 'pma', 'group' => 'ekonomi', 'title' => 'Penanaman Modal Asing (PMA)', 'sumber' => 'BPS', 'table' => 'm_35_pma', 'primary' => ['tahun'], 'fields' => [$tahun, $number('jumlah', 'Jumlah'), $series]],

        ['key' => 'perikanan-budidaya', 'group' => 'pertanian', 'title' => 'Perikanan Budidaya', 'sumber' => 'BPS', 'table' => 'm_21_perikanan_budidaya', 'primary' => ['tahun'], 'fields' => [$tahun, $number('jumlah', 'Jumlah'), $series]],
        ['key' => 'perikanan-tangkap', 'group' => 'pertanian', 'title' => 'Perikanan Tangkap', 'sumber' => 'BPS', 'table' => 'm_22_perikanan_tangkap', 'primary' => ['tahun'], 'fields' => [$tahun, $number('jumlah', 'Jumlah'), $series]],
        ['key' => 'perkebunan', 'group' => 'pertanian', 'title' => 'Perkebunan', 'sumber' => 'BPS', 'table' => 'm_23_perkebunan', 'primary' => ['tahun'], 'fields' => [$tahun, $number('jumlah', 'Jumlah'), $series]],
        ['key' => 'hortikultura', 'group' => 'pertanian', 'title' => 'Hortikultura', 'sumber' => 'BPS', 'table' => 'm_24_holtikultura', 'primary' => ['tahun'], 'fields' => [$tahun, $number('jumlah', 'Jumlah'), $series]],
        ['key' => 'peternakan', 'group' => 'pertanian', 'title' => 'Peternakan', 'sumber' => 'BPS', 'table' => 'm_25_peternakan', 'primary' => ['tahun'], 'fields' => [$tahun, $number('jumlah', 'Jumlah'), $series]],

        ['key' => 'jumlah-penduduk', 'group' => 'kependudukan', 'title' => 'Jumlah Penduduk', 'sumber' => 'BPS', 'table' => 'm_36_jumlah_penduduk', 'primary' => ['tahun'], 'fields' => [$tahun, $number('laki', 'Laki-laki'), $number('perempuan', 'Perempuan'), $number('total', 'Total'), $series]],
        ['key' => 'penduduk-kecamatan', 'group' => 'kependudukan', 'title' => 'Jumlah Penduduk per Kecamatan', 'sumber' => 'BPS', 'table' => 'm_26_penduduk_kecamatan', 'primary' => ['id'], 'incrementing' => true, 'fields' => [$tahun, $text('kecamatan', 'Kecamatan'), $number('laki', 'Laki-laki'), $number('perempuan', 'Perempuan'), $series]],
        ['key' => 'penduduk-umur', 'group' => 'kependudukan', 'title' => 'Jumlah Penduduk berdasarkan Kelompok Umur', 'sumber' => 'BPS', 'table' => 'm_26_penduduk_umur', 'primary' => ['tahun', 'kelompok_umur'], 'fields' => [
            $tahun,
            ['name' => 'kelompok_umur', 'label' => 'Kelompok Umur', 'type' => 'select', 'options' => 'umur', 'rules' => ['required', 'integer']],
            $number('jumlah', 'Jumlah'),
            $series,
        ]],
        ['key' => 'pertumbuhan-penduduk', 'group' => 'kependudukan', 'title' => 'Laju Pertumbuhan Penduduk', 'sumber' => 'BPS', 'table' => 'm_27_laju_pertumbuhan', 'primary' => ['tahun'], 'fields' => [$tahun, $number('laju', 'Laju', '%'), $series]],

        ['key' => 'jalan', 'group' => 'infrastruktur', 'title' => 'Panjang Jalan yang Dibangun dan Ditingkatkan', 'sumber' => 'BPS', 'table' => 'm_28_jalan', 'primary' => ['tahun'], 'fields' => [$tahun, $number('panjang', 'Panjang'), $series]],
        ['key' => 'air-bersih', 'group' => 'infrastruktur', 'title' => 'Rumah Tangga Pengguna Air Bersih', 'sumber' => 'BPS', 'table' => 'm_29_air', 'primary' => ['tahun'], 'fields' => [$tahun, $number('nilai', 'Nilai', '%'), $series]],
        ['key' => 'kemantapan-jalan', 'group' => 'infrastruktur', 'title' => 'Tingkat Kemantapan Jalan', 'sumber' => 'BPS', 'table' => 'm_37_kemantapan_jalan', 'primary' => ['tahun'], 'fields' => [$tahun, $number('kemantapan_jalan', 'Kemantapan Jalan', '%'), $series]],

        ['key' => 'video', 'group' => 'video', 'title' => 'Video Bintan', 'sumber' => 'Admin', 'table' => 'm_video', 'primary' => ['id'], 'incrementing' => true, 'fields' => [$text('judul', 'Judul'), $text('link', 'Tautan')]],
    ],
];
