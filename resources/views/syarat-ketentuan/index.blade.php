@extends('layout.main')

@section('content')
<div class="container mt-m">
    <div class="col-md-12 shadow  rounded" style="padding: 70px">
        <div class="mb-5 d-flex flex-column">
            <small class="ms-auto mb-5">Cianjur, 10 Agustus 2023</small>
            <img class="m-auto shadow rounded-circle p-2" src="{{ asset('img/logo.png') }}" width="150">
        </div>
        <h1 class="fw-bold">Syarat & Ketentuan</h1>
        <p>
            <ol>
                <li class="fw-bold">Definisi & Istilah</li>
                    <ul>
                        <li><div class="fw-bold">Getsu Design :</div> Merujuk pada platform atau website marketplace desain grafis dengan nama "Getsu Design".</li>
                        <li><div class="fw-bold">Pengguna :</div> Mengacu pada individu atau entitas bisnis yang mendaftar dan menggunakan layanan Getsu Design, baik sebagai penjual atau pembeli.</li>
                        <li><div class="fw-bold">Pembeli :</div>  Mengacu pada pengguna yang membeli produk desain grafis di Getsu Design.</li>
                    </ul>
                <li class="fw-bold">Akun Pengguna</li>
                    <ul>
                        <li>Setiap pengguna wajib mendaftar dan membuat akun untuk mengakses dan menggunakan layanan Getsu Design.</li>
                        <li>Informasi akun harus akurat dan mutakhir.</li>
                        <li>Pengguna bertanggung jawab menjaga keamanan informasi akun.</li>
                    </ul>
                <li class="fw-bold">Produk dan Transaksi</li>
                    <ul>
                        <li>Penjual diharapkan menyediakan produk desain grafis berkualitas sesuai dengan deskripsi yang akurat.</li>
                        <li>Harga produk ditetapkan oleh penjual/desainer dan dapat berubah tanpa pemberitahuan sebelumnya.</li>
                        <li>Pembeli wajib membayar harga produk sesuai dengan metode pembayaran yang tersedia di platform.</li>
                        <li>Getsu Design tidak bertanggung jawab atas transaksi yang dilakukan di luar platform.</li>
                    </ul>
                <li class="fw-bold">Standar Produk</li>
                    <ul>
                        <li>Format file hanya PNG, JPG, dan SVG. Selain dari itu tidak diperbolehkan.</li>
                        <li>Desain dengan format PNG & JPG harus berukuran 500x500 px.</li>
                        <li>Dalam format zip harus terdapat 3 file gambar, yaitu SVG,PNG & JPG.</li>
                        <li>Desain tidak boleh sama dengan desain yang pernah di upload.</li>
                        <li>Tidak boleh plagiat desain orang lain, nanti akun anda akan di blok.</li>
                    </ul>
                <li class="fw-bold">Pembagian Hasil Penjualan</li>
                    <ul>
                        <li>Total pendapatan penjual/desainer akan dipotong pada setiap pencairan sebesar 30%. 20% untuk biaya pengembangan website dan 10% untuk PPN</li>
                    </ul>
                <li class="fw-bold">Hak Kekayaan Intelektual</li>
                    <ul>
                        <li>Penjual harus memiliki hak dan izin yang diperlukan untuk produk yang dijualnya.</li>
                        <li>Getsu Design berhak menghapus produk yang melanggar hak kekayaan intelektual tanpa pemberitahuan sebelumnya.</li>
                    </ul>
                <li class="fw-bold">Penggunaan Platform</li>
                    <ul>
                        <li>Pengguna dilarang melakukan tindakan yang merugikan atau merusak platform</li>
                        <li>Dilarang menggunakan Getsu Design untuk tujuan ilegal atau melanggar etika.</li>
                    </ul>
                <li class="fw-bold">Privasi dan Keamanan</li>
                    <ul>
                        <li>Getsu Design menghormati privasi pengguna dan mengumpulkan informasi sesuai dengan kebijakan privasi yang berlaku.</li>
                        <li>Tindakan keamanan akan diterapkan untuk melindungi informasi pengguna, tetapi tidak ada sistem yang sepenuhnya bebas dari risiko.</li>
                    </ul>
                <li class="fw-bold">Perubahan Syarat dan Ketentuan</li>
                    <ul>
                        <li>Getsu Design berhak mengubah syarat dan ketentuan tanpa pemberitahuan sebelumnya.</li>
                        <li>Perubahan tersebut akan diumumkan di platform.</li>
                    </ul>
                <li class="fw-bold">Penutup</li>
                    <ul>
                        <li>Getsu Design tidak bertanggung jawab atas kerugian atau kerusakan yang timbul dari penggunaan platform.</li>
                        <li>Syarat dan ketentuan ini mengatur hubungan antara Getsu Design dan pengguna, menggantikan semua perjanjian sebelumnya. <p>Dengan menggunakan Getsu Design, Anda dianggap telah membaca, memahami, dan menyetujui syarat dan ketentuan ini. Jika Anda tidak setuju, harap hentikan penggunaan platform ini. Syarat dan ketentuan ini efektif sejak tanggal diterbitkannya.</p></li>
                    </ul>
                
            </ol>

            <p><div class="fw-bold">Salam Hormat,</div> From CEO Getsu Design</p>
        </p>
    </div>
</div>
@endsection