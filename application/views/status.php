<!DOCTYPE html>
<html lang="en">

<head>
    <title>FORM PENGEMBALIAN BUKU</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("application/views/vendor/bootstrap/css/bootstrap.min.css") ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("application/views/fonts/font-awesome-4.7.0/css/font-awesome.min.css") ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("application/views/fonts/iconic/css/material-design-iconic-font.min.css") ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("application/views/vendor/animate/animate.css") ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("application/views/vendor/css-hamburgers/hamburgers.min.css") ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("application/views/vendor/animsition/css/animsition.min.css") ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("application/views/vendor/select2/select2.min.css") ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("application/views/vendor/daterangepicker/daterangepicker.css") ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("application/views/vendor/noui/nouislider.min.css") ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("application/views/css/util.css") ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("application/views/css/main.css") ?>">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <!--===============================================================================================-->
</head>

<body>
<style>
		.alert {
			padding: 20px;
			background-color: #4CAF50;
			/* Red */
			color: white;
			margin-bottom: 15px;
		}

		/* The close button */
		.closebtn {
			margin-left: 15px;
			color: white;
			font-weight: bold;
			float: right;
			font-size: 22px;
			line-height: 20px;
			cursor: pointer;
			transition: 0.3s;
		}

		/* When moving the mouse over the close button */
		.closebtn:hover {
			color: black;
		}
	</style>


	<?php if (isset($_SESSION['success'])) : ?>

		<div class="alert">
			<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
			Data Berhasil Di Dapatkan
		</div>
	<?php endif; ?>


    <div class="container-contact100">
        <div class="wrap-contact100">
            <span class="contact100-form-title">
    HASIL
            </span>
            <?php if ($this->session->flashdata('success')) : ?>
                    
                    <table id='example' class='display' style='width:100%'>
                        <thead>
                            <tr>
                                <th>SUBJEK</th>
                                <th>DETAIL</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>NAMA</td>
                                <td><?= $_SESSION['nama'] ?></td>
                            </tr>
                            <tr>
                                <td>NIM</td>
                                <td><?= $_SESSION['nim'] ?></td>
                            </tr>
                            <tr>
                                <td>KODE INVENTARIS BUKU</td>
                                <td><?= $_SESSION['kode_inventaris_buku'] ?></td>
                            </tr>
                            <tr>
                                <td>JUDUL BUKU</td>
                                <td><?= $_SESSION['judul_buku'] ?></td>
                            </tr>
                            <tr>
                                <td>TANGGAL PEMINJAMAN</td>
                                <td><?= $_SESSION['tanggal_pinjam'] ?></td>
                            </tr>
                            <tr>
                                <td>TANGGAL SEHARUSNYA KEMBALI</td>
                                <td><?= $_SESSION['tanggal_seharusnya_kembali'] ?></td>
                            </tr>
                            <tr>
                                <td>TANGGAL KEMBALI</td>
                                <td><?= $_SESSION['tanggal_kembali'] ?></td>
                            </tr>
                            <tr>
                                <td>KETERLAMBATAN</td>
                                <td><?= $_SESSION['keterlambatan'] ?></td>
                            </tr>
                            <tr>
                                <td>JUMLAH DENDA</td>
                                <td><?= $_SESSION['jumlah_denda'] ?></td>
                            </tr>
                        </tbody>
                    </table>
                <?php endif; ?>


            <form action="<?php echo base_url("Peminjaman"); ?>">

                <div class="container-contact100-form-btn">
                    <button class="contact100-form-btn">
                        <span>
                            KEMBALI KE FORM AWAL
                            <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
                        </span>
                    </button>
                </div>
            </form>
            <span class="label-input100"> ©Gery Nugroho - Informatika 2019</span>

        </div>
    </div>



    <!--===============================================================================================-->
    <script src="<?php echo base_url("application/views/vendor/jquery/jquery-3.2.1.min.js"); ?>"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url("application/views/vendor/animsition/js/animsition.min.js"); ?>"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url("application/views/vendor/bootstrap/js/popper.js"); ?>"></script>
    <script src="<?php echo base_url("application/views/vendor/bootstrap/js/bootstrap.min.js"); ?>"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url("application/views/vendor/select2/select2.min.js"); ?>"></script>
    <script>
        $(".js-select2").each(function() {
            $(this).select2({
                minimumResultsForSearch: 20,
                dropdownParent: $(this).next('.dropDownSelect2')
            });


            $(".js-select2").each(function() {
                $(this).on('select2:close', function(e) {
                    if ($(this).val() == "Pilih Fakultas") {
                        $('.js-show-service').slideUp();
                    } else {
                        $('.js-show-service').slideUp();
                        $('.js-show-service').slideDown();
                    }
                });
            });
        })
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    <!--===============================================================================================-->
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/noui/nouislider.min.js"></script>
    <script>
        var filterBar = document.getElementById('filter-bar');

        noUiSlider.create(filterBar, {
            start: [1500, 3900],
            connect: true,
            range: {
                'min': 1500,
                'max': 7500
            }
        });

        var skipValues = [
            document.getElementById('value-lower'),
            document.getElementById('value-upper')
        ];

        filterBar.noUiSlider.on('update', function(values, handle) {
            skipValues[handle].innerHTML = Math.round(values[handle]);
            $('.contact100-form-range-value input[name="from-value"]').val($('#value-lower').html());
            $('.contact100-form-range-value input[name="to-value"]').val($('#value-upper').html());
        });
    </script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>

</body>

</html>