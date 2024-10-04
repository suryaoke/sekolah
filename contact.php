<?php
$kontak = mysqli_query($koneksi, "SELECT * FROM kontak ORDER BY id_kontak DESC");
$datakontak = mysqli_fetch_array($kontak);

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<section class="ftco-section contact-section">
    <div class="container">
        <div class="row d-flex contact-info">
            <div class="col-md-3 d-flex">
                <div class="bg-light align-self-stretch box p-4 text-center">
                    <h3 class="mb-4">Address</h3>
                    <p><?= $datakontak['alamat'] ?></p>
                </div>
            </div>
            <div class="col-md-3 d-flex">
                <div class="bg-light align-self-stretch box p-4 text-center">
                    <h3 class="mb-4">Contact Number</h3>
                    <p><a href=""><?= $datakontak['no_telp'] ?></a></p>
                </div>
            </div>
            <div class="col-md-3 d-flex">
                <div class="bg-light align-self-stretch box p-4 text-center">
                    <h3 class="mb-4">Email Address</h3>
                    <p><a href=""><?= $datakontak['email'] ?></a></p>
                </div>
            </div>
            <div class="col-md-3 d-flex">
                <div class="bg-light align-self-stretch box p-4 text-center">
                    <h3 class="mb-4">Instagram</h3>
                    <p><a href="#"><?= $datakontak['instagram'] ?></a></p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-no-pt ftco-no-pb contact-section mb-4">
    <div class="container">
        <div class="row d-flex align-items-stretch no-gutters">
            <div class="col-md-6 p-4 p-md-5 order-md-last bg-light">
                <form action="proses_pesan.php" method="POST" id="myForm"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" name="nama_pengirim" class="form-control" placeholder="Nama">
                        <span class="error-message text-danger"></span>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                        <span class="error-message text-danger"></span>
                    </div>
                    <div class="form-group">
                        <input type="text" name="judul" class="form-control" placeholder="Subject">
                        <span class="error-message text-danger"></span>
                    </div>
                    <div class="form-group">
                        <textarea name="isi_pesan" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
                        <span class="error-message text-danger"></span>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
                    </div>
                </form>
            </div>
            <div class="col-md-6 d-flex align-items-stretch">
                <!-- <img alt="Midone - HTML Admin Template" class="w-6" src="assets/images/bg-sma.jpg"> -->
            </div>
        </div>
    </div>
</section>




<script>
    $(document).ready(function() {
        // Menambahkan metode khusus untuk validasi ekstensi file gambar
        $.validator.addMethod("fileExtension", function(value, element) {
            var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i; // Ekstensi file yang diperbolehkan
            return this.optional(element) || allowedExtensions.test(value); // Validasi berdasarkan ekstensi
        }, 'Please upload a file in JPG, JPEG or PNG format.');

        $('#myForm').validate({
            rules: { // Aturan validasi untuk setiap input
                nama_pengirim: {
                    required: true, // Wajib diisi
                },
                email: {
                    required: true, // Wajib diisi
                },

                judul: {
                    required: true, // Wajib diisi
                },
                isi_pesan: {
                    required: true, // Wajib diisi

                },

            },
            messages: { // Pesan error yang akan ditampilkan jika validasi gagal
                nama_pengirim: {
                    required: 'Please Enter Your Nama Pengirim',
                },
                email: {
                    required: 'Please Enter Your Email',
                },
                judul: {
                    required: 'Please Enter Your Subject',
                },
                isi_pesan: {
                    required: 'Please Enter Your Message',

                },
            },
            errorElement: 'span', // Elemen yang digunakan untuk menampilkan pesan error
            errorClass: 'block text-sm text-red-600', // Kelas CSS untuk styling pesan error
            errorPlacement: function(error, element) { // Menempatkan pesan error di bawah input terkait
                error.appendTo(element.next('.error-message'));
            },
            highlight: function(element) { // Jika input tidak valid, tambahkan kelas 'is-invalid'
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element) { // Jika input valid, hapus kelas 'is-invalid'
                $(element).removeClass('is-invalid');
            },
        });
    });
</script>