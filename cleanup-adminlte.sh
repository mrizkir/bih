#!/bin/bash

# Script untuk menghapus file AdminLTE yang tidak digunakan
# HATI-HATI: Script ini akan menghapus file secara permanen!
# Pastikan sudah backup project Anda terlebih dahulu!

echo "=========================================="
echo "AdminLTE Cleanup Script"
echo "=========================================="
echo ""
echo "⚠️  PERINGATAN: Script ini akan menghapus file secara permanen!"
echo "Pastikan Anda sudah backup project terlebih dahulu!"
echo ""
read -p "Apakah Anda yakin ingin melanjutkan? (yes/no): " confirm

if [ "$confirm" != "yes" ]; then
    echo "Operasi dibatalkan."
    exit 1
fi

cd public/administrator || exit

echo ""
echo "Menghapus folder development & build..."
rm -rf build/
rm -rf docs/
rm -rf pages/
rm -rf icofont/

echo "Menghapus file contoh..."
rm -f index.html index2.html index3.html starter.html iframe.html iframe-dark.html

echo "Menghapus file konfigurasi development..."
rm -f package.json package-lock.json composer.json docker-compose.yml Dockerfile .bundlewatch.config.json 2>/dev/null

echo "Menghapus file dokumentasi..."
rm -f README.md LICENSE CODE_OF_CONDUCT.md

echo "Menghapus plugin yang tidak digunakan..."
rm -rf plugins/flot/
rm -rf plugins/fullcalendar/
rm -rf plugins/jquery-mapael/
rm -rf plugins/raphael/
rm -rf plugins/jquery-validation/
rm -rf plugins/jsgrid/
rm -rf plugins/bs-custom-file-input/
rm -rf plugins/bootstrap-slider/
rm -rf plugins/sweetalert2/
rm -rf plugins/sweetalert2-theme-bootstrap-4/
rm -rf plugins/toastr/
rm -rf plugins/pace-progress/
rm -rf plugins/fastclick/
rm -rf plugins/filterizr/
rm -rf plugins/ekko-lightbox/
rm -rf plugins/codemirror/
rm -rf plugins/flag-icon-css/
rm -rf plugins/datatables/
rm -rf plugins/datatables-autofill/
rm -rf plugins/datatables-bs4/
rm -rf plugins/datatables-buttons/
rm -rf plugins/datatables-colreorder/
rm -rf plugins/datatables-fixedcolumns/
rm -rf plugins/datatables-fixedheader/
rm -rf plugins/datatables-keytable/
rm -rf plugins/datatables-responsive/
rm -rf plugins/datatables-rowgroup/
rm -rf plugins/datatables-rowreorder/
rm -rf plugins/datatables-scroller/
rm -rf plugins/datatables-searchbuilder/
rm -rf plugins/datatables-searchpanes/
rm -rf plugins/datatables-select/
rm -rf plugins/jszip/
rm -rf plugins/pdfmake/
rm -rf plugins/jquery-mousewheel/
rm -rf plugins/uplot/

echo "Menghapus CSS alternatif..."
rm -rf dist/css/alt/

echo "Menghapus JS jqvmap (CSS tetap digunakan)..."
find plugins/jqvmap/ -name "*.js" -type f -delete

echo ""
echo "=========================================="
echo "✅ Cleanup selesai!"
echo "=========================================="
echo ""
echo "Silakan test aplikasi untuk memastikan tidak ada yang rusak."
echo ""

