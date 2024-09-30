 <!-- END: Content -->
 </div>
 </div>


 <!-- BEGIN: JS Assets-->
 <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
 <script src="https://maps.googleapis.com/maps/api/js?key=[" your-google-map-api"]&libraries=places"></script>
 <script src="assets/dist/js/app.js"></script>
 <!-- END: JS Assets-->
 <!-- Skrip jQuery -->

 <!-- Skrip jQuery Validate -->

 <!-- Skrip Anda -->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
 <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

 <script>
     $(document).ready(function() {
         $('#datatable').DataTable({
             // Anda bisa menambahkan opsi konfigurasi DataTable di sini jika perlu
             "paging": true, // Mengaktifkan fitur paging
             "searching": true, // Mengaktifkan fitur pencarian
             "info": true // Menampilkan informasi tabel
         });
     });
 </script>

 </body>

 </html>