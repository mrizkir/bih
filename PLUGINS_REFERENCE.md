# Daftar Plugin AdminLTE yang Tersedia

Dokumen ini berisi daftar plugin AdminLTE yang tersedia di `public/administrator/plugins/` untuk referensi saat dibutuhkan di masa depan.

---

## 📦 Plugin yang Tersedia

### ✅ Plugin yang Aktif Digunakan

1. **fontawesome-free** - Icon library
2. **bootstrap** - Framework CSS
3. **jquery** - JavaScript library
4. **overlayScrollbars** - Custom scrollbar
5. **daterangepicker** - Date range picker
6. **select2** - Advanced select dropdown
7. **select2-bootstrap4-theme** - Theme untuk select2
8. **bootstrap4-duallistbox** - Dual listbox
9. **bs-stepper** - Stepper component
10. **dropzone** - File upload dengan drag & drop
11. **summernote** - WYSIWYG editor
12. **tempusdominus-bootstrap-4** - Date/time picker
13. **icheck-bootstrap** - Custom checkbox/radio
14. **jqvmap** - Vector map (CSS digunakan)
15. **inputmask** - Input masking
16. **bootstrap-colorpicker** - Color picker
17. **bootstrap-switch** - Toggle switch
18. **jquery-ui** - jQuery UI components
19. **jquery-knob** - Knob input
20. **sparklines** - Sparkline charts
21. **moment** - Date manipulation library
22. **chart.js** - Chart library

---

### 📚 Plugin yang Tersedia (Belum Digunakan)

#### Chart & Visualization
- **flot** - Chart library (26 files)
- **uplot** - Chart library (5 files)

#### Calendar
- **fullcalendar** - Full calendar widget (85 files)

#### Map
- **jqvmap** - Vector map (32 files) - CSS sudah digunakan
- **jquery-mapael** - Map plugin (13 files)
- **raphael** - Vector graphics library (6 files)

#### Form & Validation
- **jquery-validation** - Form validation (128 files)
- **jsgrid** - Data grid (19 files)
- **bs-custom-file-input** - Custom file input (4 files)
- **bootstrap-slider** - Range slider (4 files)

#### UI/UX Components
- **sweetalert2** - Beautiful alert dialogs (6 files)
- **sweetalert2-theme-bootstrap-4** - Theme untuk sweetalert2 (2 files)
- **toastr** - Toast notifications (4 files)
- **pace-progress** - Progress bar (152 files)
- **fastclick** - Fast click events (1 file)
- **filterizr** - Filter & sort (3 files)
- **ekko-lightbox** - Lightbox gallery (5 files)

#### Editor
- **codemirror** - Code editor (262 files)

#### Icons & Flags
- **flag-icon-css** - Country flags (536 files)

#### DataTables (Local - Saat ini menggunakan CDN)
- **datatables** - Base DataTables (2 files)
- **datatables-autofill** - Auto fill (6 files)
- **datatables-bs4** - Bootstrap 4 integration (4 files)
- **datatables-buttons** - Buttons extension (14 files)
- **datatables-colreorder** - Column reorder (6 files)
- **datatables-fixedcolumns** - Fixed columns (6 files)
- **datatables-fixedheader** - Fixed header (6 files)
- **datatables-keytable** - Keyboard navigation (6 files)
- **datatables-responsive** - Responsive tables (6 files)
- **datatables-rowgroup** - Row grouping (6 files)
- **datatables-rowreorder** - Row reorder (6 files)
- **datatables-scroller** - Virtual scrolling (6 files)
- **datatables-searchbuilder** - Advanced search (6 files)
- **datatables-searchpanes** - Search panes (6 files)
- **datatables-select** - Row selection (6 files)
- **jszip** - ZIP file creation (2 files) - untuk export
- **pdfmake** - PDF generation (5 files) - untuk export

#### Utilities
- **jquery-mousewheel** - Mouse wheel events (2 files)

---

## 🔗 Cara Menggunakan Plugin

### 1. Tambahkan CSS di `<head>`
```html
<link rel="stylesheet" href="{{ asset('administrator/plugins/[plugin-name]/[path-to-css]') }}">
```

### 2. Tambahkan JS sebelum `</body>`
```html
<script src="{{ asset('administrator/plugins/[plugin-name]/[path-to-js]') }}"></script>
```

### 3. Inisialisasi Plugin
```javascript
$(document).ready(function() {
    // Inisialisasi plugin
});
```

---

## 📖 Dokumentasi Plugin

Untuk dokumentasi lengkap setiap plugin, silakan kunjungi:
- **AdminLTE Docs:** https://adminlte.io/docs/3.2/
- **Plugin Official Docs:** Lihat di folder masing-masing plugin atau website resmi plugin

---

## 💡 Tips

1. **Cek Dependencies:** Beberapa plugin memerlukan plugin lain (misalnya: jquery, bootstrap)
2. **Versi Compatibility:** Pastikan versi plugin kompatibel dengan AdminLTE dan Bootstrap
3. **CDN Alternative:** Untuk plugin besar, pertimbangkan menggunakan CDN untuk mengurangi ukuran project
4. **Lazy Load:** Untuk plugin yang jarang digunakan, pertimbangkan lazy loading

---

**Last Updated:** $(date)
**Total Plugins Available:** 50+ plugins

