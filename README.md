
## Janji
Saya Raditya Novandrian dengan NIM 2508283 mengerjakan TP-1 dalam mata kuliah DPBO untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan.

## Desain Program

### 1. Desain Class (Encapsulation)
*   **Atribut Private:** Seluruh atribut (`id`, `title`, `genre`, `description`, `director`, dan `image`) dibuat `private` untuk menerapkan konsep encapsulation guna melindungi data dari modifikasi langsung.
*   **Getter & Setter:** Akses dan modifikasi data dilakukan melalui metode `public` berupa *getter* dan *setter*.

### 2. Pengelolaan Koleksi Data
*   **Python:** Menggunakan struktur data `list` dinamis.
*   **Java & C++ :** Menggunakan array statis dengan batas alokasi manual. Saat operasi penghapusan, program menggunakan teknik pergeseran elemen untuk menutupi ruang/indeks yang kosong.
*   **PHP :** Menggunakan `$_SESSION` yang berisi *array of objects* sebagai tempat penyimpanan sementara. Gambar disimpan secara fisik di folder lokal `img/`, sedangkan objek hanya menyimpan jalur aksesnya.

### 3. Antarmuka (Interface)
*   **Versi CLI (C++, Java, Python):** Program berjalan di terminal dengan sistem menu interaktif menggunakan perulangan `while` dan struktur kontrol `if-else`.
*   **Versi Web (PHP):** Antarmuka dibangun menggunakan elemen HTML (Form untuk input data, termasuk untuk upload gambar, dan Table untuk menampilkan iterasi data dari *session*).

## Video Demo

**Python:** 
https://github.com/user-attachments/assets/b3c5b16c-d491-4ebd-b1d5-32e6fb6d8a8d

**C++:** 
https://github.com/user-attachments/assets/4ff50fb2-5306-4634-ae6e-fc966324e896

**Java:** 
https://github.com/user-attachments/assets/f6dcb3f7-7745-4f36-80c3-098d41de9ca5

**PHP:** 
https://github.com/user-attachments/assets/37811d1d-1d67-4bff-9718-bc1dfd178116



