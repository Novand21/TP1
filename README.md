
## Janji
Saya Raditya Novandrian dengan NIM 2508283 mengerjakan TP-1 dalam mata kuliah DPBO untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan.

## Desain Program

### 1. Desain Class (Encapsulation)
Program menggunakan satu class utama bernama `Movie` yang murni bertindak sebagai cetak biru (*blueprint*) dari entitas data tunggal.
*   **Atribut Private:** Seluruh atribut (`id`, `title`, `genre`, `description`, `director`, dan `image`) dibuat `private` untuk menerapkan konsep *Encapsulation* guna melindungi data dari modifikasi langsung.
*   **Getter & Setter:** Akses dan modifikasi data dilakukan melalui metode `public` berupa *getter* dan *setter*.

### 2. Pengelolaan Koleksi Data
Karena operasi CRUD (*Create, Read, Update, Delete*) tidak boleh dilakukan di dalam class `Movie` itu sendiri (untuk menghindari penggunaan statis/konsep yang belum diajarkan), pengelolaan *array/list of objects* dilakukan di *driver code*:
*   **Python:** Menggunakan struktur data `list` dinamis.
*   **Java & C++ :** Menggunakan array statis standar dengan batas alokasi manual (misal: maksimal 100 objek). Saat operasi penghapusan (Delete), program menggunakan teknik pergeseran elemen untuk menutupi ruang/indeks yang kosong.
*   **PHP :** Menggunakan `$_SESSION` yang berisi *array of objects* sebagai tempat penyimpanan sementara. Gambar (*poster*) disimpan secara fisik di folder lokal `img/`, sedangkan objek hanya menyimpan jalur aksesnya.

### 3. Antarmuka (Interface)
*   **Versi CLI (C++, Java, Python):** Program berjalan di terminal dengan sistem menu interaktif menggunakan perulangan `while` dan struktur kontrol `if-else`.
*   **Versi Web (PHP):** Antarmuka dibangun menggunakan elemen HTML (Form untuk input data, termasuk `enctype="multipart/form-data"` untuk *upload* gambar, dan Table untuk menampilkan iterasi data dari *session*).

## Video Demo

**Python:** 
<video src="./dokumentasi/python.mp4" controls="controls" width="100%"></video>

**C++:** 
<video src="./dokumentasi/cpp.mp4" controls="controls" width="100%"></video>

**Java:** 
<video src="./dokumentasi/java.mp4" controls="controls" width="100%"></video>

**PHP:** 
<video src="./dokumentasi/php.mp4" controls="controls" width="100%"></video>