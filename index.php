<?php
$koneksi = mysqli_connect("localhost", "root", "root", "ajax");
// if ($koneksi) {
//     echo "berhasil";
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap 3 Example</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Optional Bootstrap theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.bootstrap.css">

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>

    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.bootstrap.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <style>
        /* Style untuk tabel data */
        #dataTable {
            font-family: Arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #dataTable th,
        #dataTable td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        #dataTable tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #dataTable th {
            background-color: #2980b9;
            color: white;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Hello, Bootstrap 3!</h1>

        <!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

        <!-- prosesModal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Modal Header</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" id="formMahasiswa">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="email">Mahasiswa:</label>
                                <div class="col-sm-10">
                                    <select name="id_mahasiswa" id="id_mahasiswa" class="form-control">
                                        <option disabled="" selected="">- Pilih mahasiswa -</option>
                                        <?php
                                        $query = mysqli_query($koneksi, "select * from mahasiswa order by id desc");
                                        while ($data = mysqli_fetch_array($query)) {
                                        ?>
                                            <option value="<?= $data['id']; ?>"><?= $data['nama']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="prosesMahasiswa">Proses</button>
                    </div>
                </div>

            </div>
        </div>

        <div class="table-responsive" style="margin-top: 25px;">
            <div id="tableMahasiswa">

            </div>
        </div>

        <!-- editModal -->
        <div id="editModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Modal Header</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" action="/action_page.php">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="email">Email:</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email" placeholder="Enter email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="pwd">Password:</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="pwd" placeholder="Enter password">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Update</button>
                    </div>
                </div>

            </div>

            <!-- <table id="kosong" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Tiger Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011-04-25</td>
                    <td>$320,800</td>
                </tr>
                <tr>
                    <td>Garrett Winters</td>
                    <td>Accountant</td>
                    <td>Tokyo</td>
                    <td>63</td>
                    <td>2011-07-25</td>
                    <td>$170,750</td>
                </tr>
                <tr>
                    <td>Ashton Cox</td>
                    <td>Junior Technical Author</td>
                    <td>San Francisco</td>
                    <td>66</td>
                    <td>2009-01-12</td>
                    <td>$86,000</td>
                </tr>
                <tr>
                    <td>Cedric Kelly</td>
                    <td>Senior Javascript Developer</td>
                    <td>Edinburgh</td>
                    <td>22</td>
                    <td>2012-03-29</td>
                    <td>$433,060</td>
                </tr>
                <tr>
                    <td>Airi Satou</td>
                    <td>Accountant</td>
                    <td>Tokyo</td>
                    <td>33</td>
                    <td>2008-11-28</td>
                    <td>$162,700</td>
                </tr>
                <tr>
                    <td>Brielle Williamson</td>
                    <td>Integration Specialist</td>
                    <td>New York</td>
                    <td>61</td>
                    <td>2012-12-02</td>
                    <td>$372,000</td>
                </tr>
                <tr>
                    <td>Herrod Chandler</td>
                    <td>Sales Assistant</td>
                    <td>San Francisco</td>
                    <td>59</td>
                    <td>2012-08-06</td>
                    <td>$137,500</td>
                </tr>
                <tr>
                    <td>Rhona Davidson</td>
                    <td>Integration Specialist</td>
                    <td>Tokyo</td>
                    <td>55</td>
                    <td>2010-10-14</td>
                    <td>$327,900</td>
                </tr>
                <tr>
                    <td>Colleen Hurst</td>
                    <td>Javascript Developer</td>
                    <td>San Francisco</td>
                    <td>39</td>
                    <td>2009-09-15</td>
                    <td>$205,500</td>
                </tr>
                <tr>
                    <td>Sonya Frost</td>
                    <td>Software Engineer</td>
                    <td>Edinburgh</td>
                    <td>23</td>
                    <td>2008-12-13</td>
                    <td>$103,600</td>
                </tr>
                <tr>
                    <td>Jena Gaines</td>
                    <td>Office Manager</td>
                    <td>London</td>
                    <td>30</td>
                    <td>2008-12-19</td>
                    <td>$90,560</td>
                </tr>
                <tr>
                    <td>Quinn Flynn</td>
                    <td>Support Lead</td>
                    <td>Edinburgh</td>
                    <td>22</td>
                    <td>2013-03-03</td>
                    <td>$342,000</td>
                </tr>
                <tr>
                    <td>Charde Marshall</td>
                    <td>Regional Director</td>
                    <td>San Francisco</td>
                    <td>36</td>
                    <td>2008-10-16</td>
                    <td>$470,600</td>
                </tr>
                <tr>
                    <td>Haley Kennedy</td>
                    <td>Senior Marketing Designer</td>
                    <td>London</td>
                    <td>43</td>
                    <td>2012-12-18</td>
                    <td>$313,500</td>
                </tr>
                <tr>
                    <td>Tatyana Fitzpatrick</td>
                    <td>Regional Director</td>
                    <td>London</td>
                    <td>19</td>
                    <td>2010-03-17</td>
                    <td>$385,750</td>
                </tr>
                <tr>
                    <td>Michael Silva</td>
                    <td>Marketing Designer</td>
                    <td>London</td>
                    <td>66</td>
                    <td>2012-11-27</td>
                    <td>$198,500</td>
                </tr>
                <tr>
                    <td>Paul Byrd</td>
                    <td>Chief Financial Officer (CFO)</td>
                    <td>New York</td>
                    <td>64</td>
                    <td>2010-06-09</td>
                    <td>$725,000</td>
                </tr>
                <tr>
                    <td>Gloria Little</td>
                    <td>Systems Administrator</td>
                    <td>New York</td>
                    <td>59</td>
                    <td>2009-04-10</td>
                    <td>$237,500</td>
                </tr>
                <tr>
                    <td>Bradley Greer</td>
                    <td>Software Engineer</td>
                    <td>London</td>
                    <td>41</td>
                    <td>2012-10-13</td>
                    <td>$132,000</td>
                </tr>
                <tr>
                    <td>Dai Rios</td>
                    <td>Personnel Lead</td>
                    <td>Edinburgh</td>
                    <td>35</td>
                    <td>2012-09-26</td>
                    <td>$217,500</td>
                </tr>
                <tr>
                    <td>Jenette Caldwell</td>
                    <td>Development Lead</td>
                    <td>New York</td>
                    <td>30</td>
                    <td>2011-09-03</td>
                    <td>$345,000</td>
                </tr>
                <tr>
                    <td>Yuri Berry</td>
                    <td>Chief Marketing Officer (CMO)</td>
                    <td>New York</td>
                    <td>40</td>
                    <td>2009-06-25</td>
                    <td>$675,000</td>
                </tr>
                <tr>
                    <td>Caesar Vance</td>
                    <td>Pre-Sales Support</td>
                    <td>New York</td>
                    <td>21</td>
                    <td>2011-12-12</td>
                    <td>$106,450</td>
                </tr>
                <tr>
                    <td>Doris Wilder</td>
                    <td>Sales Assistant</td>
                    <td>Sydney</td>
                    <td>23</td>
                    <td>2010-09-20</td>
                    <td>$85,600</td>
                </tr>
                <tr>
                    <td>Angelica Ramos</td>
                    <td>Chief Executive Officer (CEO)</td>
                    <td>London</td>
                    <td>47</td>
                    <td>2009-10-09</td>
                    <td>$1,200,000</td>
                </tr>
                <tr>
                    <td>Gavin Joyce</td>
                    <td>Developer</td>
                    <td>Edinburgh</td>
                    <td>42</td>
                    <td>2010-12-22</td>
                    <td>$92,575</td>
                </tr>
                <tr>
                    <td>Jennifer Chang</td>
                    <td>Regional Director</td>
                    <td>Singapore</td>
                    <td>28</td>
                    <td>2010-11-14</td>
                    <td>$357,650</td>
                </tr>
                <tr>
                    <td>Brenden Wagner</td>
                    <td>Software Engineer</td>
                    <td>San Francisco</td>
                    <td>28</td>
                    <td>2011-06-07</td>
                    <td>$206,850</td>
                </tr>
                <tr>
                    <td>Fiona Green</td>
                    <td>Chief Operating Officer (COO)</td>
                    <td>San Francisco</td>
                    <td>48</td>
                    <td>2010-03-11</td>
                    <td>$850,000</td>
                </tr>
                <tr>
                    <td>Shou Itou</td>
                    <td>Regional Marketing</td>
                    <td>Tokyo</td>
                    <td>20</td>
                    <td>2011-08-14</td>
                    <td>$163,000</td>
                </tr>
                <tr>
                    <td>Michelle House</td>
                    <td>Integration Specialist</td>
                    <td>Sydney</td>
                    <td>37</td>
                    <td>2011-06-02</td>
                    <td>$95,400</td>
                </tr>
                <tr>
                    <td>Suki Burks</td>
                    <td>Developer</td>
                    <td>London</td>
                    <td>53</td>
                    <td>2009-10-22</td>
                    <td>$114,500</td>
                </tr>
                <tr>
                    <td>Prescott Bartlett</td>
                    <td>Technical Author</td>
                    <td>London</td>
                    <td>27</td>
                    <td>2011-05-07</td>
                    <td>$145,000</td>
                </tr>
                <tr>
                    <td>Gavin Cortez</td>
                    <td>Team Leader</td>
                    <td>San Francisco</td>
                    <td>22</td>
                    <td>2008-10-26</td>
                    <td>$235,500</td>
                </tr>
                <tr>
                    <td>Martena Mccray</td>
                    <td>Post-Sales support</td>
                    <td>Edinburgh</td>
                    <td>46</td>
                    <td>2011-03-09</td>
                    <td>$324,050</td>
                </tr>
                <tr>
                    <td>Unity Butler</td>
                    <td>Marketing Designer</td>
                    <td>San Francisco</td>
                    <td>47</td>
                    <td>2009-12-09</td>
                    <td>$85,675</td>
                </tr>
                <tr>
                    <td>Howard Hatfield</td>
                    <td>Office Manager</td>
                    <td>San Francisco</td>
                    <td>51</td>
                    <td>2008-12-16</td>
                    <td>$164,500</td>
                </tr>
                <tr>
                    <td>Hope Fuentes</td>
                    <td>Secretary</td>
                    <td>San Francisco</td>
                    <td>41</td>
                    <td>2010-02-12</td>
                    <td>$109,850</td>
                </tr>
                <tr>
                    <td>Vivian Harrell</td>
                    <td>Financial Controller</td>
                    <td>San Francisco</td>
                    <td>62</td>
                    <td>2009-02-14</td>
                    <td>$452,500</td>
                </tr>
                <tr>
                    <td>Timothy Mooney</td>
                    <td>Office Manager</td>
                    <td>London</td>
                    <td>37</td>
                    <td>2008-12-11</td>
                    <td>$136,200</td>
                </tr>
                <tr>
                    <td>Jackson Bradshaw</td>
                    <td>Director</td>
                    <td>New York</td>
                    <td>65</td>
                    <td>2008-09-26</td>
                    <td>$645,750</td>
                </tr>
                <tr>
                    <td>Olivia Liang</td>
                    <td>Support Engineer</td>
                    <td>Singapore</td>
                    <td>64</td>
                    <td>2011-02-03</td>
                    <td>$234,500</td>
                </tr>
                <tr>
                    <td>Bruno Nash</td>
                    <td>Software Engineer</td>
                    <td>London</td>
                    <td>38</td>
                    <td>2011-05-03</td>
                    <td>$163,500</td>
                </tr>
                <tr>
                    <td>Sakura Yamamoto</td>
                    <td>Support Engineer</td>
                    <td>Tokyo</td>
                    <td>37</td>
                    <td>2009-08-19</td>
                    <td>$139,575</td>
                </tr>
                <tr>
                    <td>Thor Walton</td>
                    <td>Developer</td>
                    <td>New York</td>
                    <td>61</td>
                    <td>2013-08-11</td>
                    <td>$98,540</td>
                </tr>
                <tr>
                    <td>Finn Camacho</td>
                    <td>Support Engineer</td>
                    <td>San Francisco</td>
                    <td>47</td>
                    <td>2009-07-07</td>
                    <td>$87,500</td>
                </tr>
                <tr>
                    <td>Serge Baldwin</td>
                    <td>Data Coordinator</td>
                    <td>Singapore</td>
                    <td>64</td>
                    <td>2012-04-09</td>
                    <td>$138,575</td>
                </tr>
                <tr>
                    <td>Zenaida Frank</td>
                    <td>Software Engineer</td>
                    <td>New York</td>
                    <td>63</td>
                    <td>2010-01-04</td>
                    <td>$125,250</td>
                </tr>
                <tr>
                    <td>Zorita Serrano</td>
                    <td>Software Engineer</td>
                    <td>San Francisco</td>
                    <td>56</td>
                    <td>2012-06-01</td>
                    <td>$115,000</td>
                </tr>
                <tr>
                    <td>Jennifer Acosta</td>
                    <td>Junior Javascript Developer</td>
                    <td>Edinburgh</td>
                    <td>43</td>
                    <td>2013-02-01</td>
                    <td>$75,650</td>
                </tr>
                <tr>
                    <td>Cara Stevens</td>
                    <td>Sales Assistant</td>
                    <td>New York</td>
                    <td>46</td>
                    <td>2011-12-06</td>
                    <td>$145,600</td>
                </tr>
                <tr>
                    <td>Hermione Butler</td>
                    <td>Regional Director</td>
                    <td>London</td>
                    <td>47</td>
                    <td>2011-03-21</td>
                    <td>$356,250</td>
                </tr>
                <tr>
                    <td>Lael Greer</td>
                    <td>Systems Administrator</td>
                    <td>London</td>
                    <td>21</td>
                    <td>2009-02-27</td>
                    <td>$103,500</td>
                </tr>
                <tr>
                    <td>Jonas Alexander</td>
                    <td>Developer</td>
                    <td>San Francisco</td>
                    <td>30</td>
                    <td>2010-07-14</td>
                    <td>$86,500</td>
                </tr>
                <tr>
                    <td>Shad Decker</td>
                    <td>Regional Director</td>
                    <td>Edinburgh</td>
                    <td>51</td>
                    <td>2008-11-13</td>
                    <td>$183,000</td>
                </tr>
                <tr>
                    <td>Michael Bruce</td>
                    <td>Javascript Developer</td>
                    <td>Singapore</td>
                    <td>29</td>
                    <td>2011-06-27</td>
                    <td>$183,000</td>
                </tr>
                <tr>
                    <td>Donna Snider</td>
                    <td>Customer Support</td>
                    <td>New York</td>
                    <td>27</td>
                    <td>2011-01-25</td>
                    <td>$112,000</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                </tr>
            </tfoot>
        </table> -->
        </div>

        <!-- Your content here -->

        <!-- Bootstrap JS and jQuery (Optional) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</body>

<script>
    $(document).ready(function() {
        const pk = "default";
        tampilData(pk);
        $('#prosesMahasiswa').on('click', function(e) {
            e.preventDefault();
            var pk = document.getElementById('id_mahasiswa').value;
            console.log(pk);
            tampilData(pk);
        });

        // Event handler untuk tombol "lihat" dan "tutup"
        $(document).on('click', '.lihatBtn, .tutupBtn', function() {
            const ambil_id = $(this).data('id');
            const ambil_nama = $(this).data('nama');
            const ambil_matkul = $(this).data('matkul');
            console.log(ambil_id);
            const row = $(this).closest('tr');
            const isLihatBtn = $(this).hasClass('lihatBtn');
            const isTutupBtn = $(this).hasClass('tutupBtn');

            if (isLihatBtn) {
                const id = ambil_id;
                const nama = ambil_nama;
                const matkul = ambil_matkul;

                $('.detail-form').remove();

                const detailFormHtml = `<tr class="detail-form" id="detail_${id}">
                    <td colspan="4">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h2>Detail Data</h2>
                                <div id="dataTable" >
                                    <!-- Tabel akan dimasukkan di sini -->
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>`;

                row.after(detailFormHtml);

                // Buat permintaan AJAX untuk mendapatkan data tabel
                $.ajax({
                    url: 'jsphp/getMahasiswa.php',
                    method: 'GET',
                    data: {
                        id: ambil_id // Kirim ID yang diperlukan untuk mengambil data tabel
                    },
                    dataType: 'json',
                    success: function(data) {
                        // Bangun tabel HTML berdasarkan data yang diterima
                        var tableHtml = '<table id="example" class="table">';
                        tableHtml += '<thead><tr><th>Mahasiswa</th><th>Aksi</th></tr></thead>';
                        tableHtml += '<tbody>';
                        $.each(data, function(index, item) {
                            tableHtml += '<tr>';
                            tableHtml += '<td>' + item.nama + '</td>';
                            tableHtml += '<td> <a href="javascript:void(0);" class="btn btn-warning editBtn" data-id="' + item.id + '">edit</a> <a href="javascript:void(0);" class="btn btn-danger hapusBtn" data-id="' + item.id + '">hapus</a> </td>'; // Sesuaikan dengan nama kolom dari data Anda
                            tableHtml += '</tr>';
                        });
                        tableHtml += '</tbody></table>';

                        // Masukkan tabel HTML ke dalam kontainer tabel di dalam detail form
                        $('#dataTable').html(tableHtml);

                        new DataTable('#example');

                        $('.editBtn').on('click', function() {
                            console.log(0);
                            $('#editModal').modal('show');
                        });

                        $('.hapusBtn').on('click', function(e) {
                            // Mencegah perilaku default dari tombol submit
                            e.preventDefault();
                            var id = $(this).data('id');

                            // Simpan URL sebelumnya di variabel
                            var previousUrl = document.referrer;

                            swal({
                                    title: "Are you sure?",
                                    text: "Data akan dihapus",
                                    icon: "warning",
                                    buttons: true,
                                    dangerMode: true,
                                })
                                .then((willDelete) => {
                                    if (willDelete) {

                                        // Contoh penggunaan jQuery untuk mengirim permintaan Ajax POST
                                        $.ajax({
                                            type: "POST",
                                            url: "jsphp/hapusMahasiswa.php",
                                            data: {
                                                id: id,
                                                jenis_form: "form2"
                                            }, // Sesuaikan nama parameter yang sesuai dengan server
                                            success: function(response) {

                                                swal("Berhasil dihapus", {
                                                    icon: "success",
                                                });

                                                // Menunda reload halaman setelah 2 detik (2000 milidetik)
                                                setTimeout(function() {
                                                    window.location.reload();
                                                }, 2000);

                                            },
                                            error: function(error) {
                                                // Handle error jika diperlukan
                                                console.log(error);
                                            }
                                        });

                                    } else {
                                        // swal("Your imaginary file is safe!");
                                    }
                                });
                        });
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error('AJAX Error:', textStatus, errorThrown);
                    }
                });

                $(this).removeClass('lihatBtn').addClass('tutupBtn').text('tutup');
            } else if (isTutupBtn) {
                row.next('.detail-form').remove();
                $(this).removeClass('tutupBtn').addClass('lihatBtn').text('lihat');
            }
        });
    });

    function tampilData(pk) {
        var title = "mahasiswa";
        setTimeout(function() {
            $.ajax({
                url: 'jsphp/tampilData.php',
                method: 'get',
                data: {
                    title: title,
                    id: pk
                },
                dataType: 'json',
                success: function(data) {
                    var tableHtml = '<table class="table table-striped">';
                    tableHtml += '<thead><tr><th>No</th><th>Matkul</th><th>Nama Mahasiswa</th><th>Aksi</th></tr></thead>';
                    tableHtml += '<tbody>';
                    $.each(data, function(index, item) {
                        tableHtml += '<tr><td>' + (index + 1) + '</td><td>' + item.matkul + '</td><td>' + item.nama + '</td><td> <a href="javascript:void(0);" class="btn btn-info btn-sm lihatBtn" data-id="' + item.id_mahasiswa + '" data-nama="' + item.nama + '" data-matkul="' + item.matkul + '"><i class="fa fa-edit"></i> lihat</a> <a href="javascript:void(0);" class="btn btn-warning btn-sm editBtn" data-id="' + item.id_mahasiswa + '"><i class="fa fa-edit"></i> edit</a> <a href="javascript:void(0);" class="btn btn-danger btn-sm deleteBtn" data-id="' + item.id_mahasiswa + '"><i class="fa fa-close"></i> hapus</a></td></tr>';
                    });
                    tableHtml += '</tbody></table>';

                    $('#tableMahasiswa').html(tableHtml);

                    $('#myModal').modal('hide');


                },
                error: function(jqXHR, textStatus, errorThrown) {
                    $('#tableMahasiswa').html('<center><div class="alert alert-danger"><strong>Data kosong</strong></div></center>');
                }
            });
        }, 300);
    }
</script>

</html>