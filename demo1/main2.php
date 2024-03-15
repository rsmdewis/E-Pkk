<?php
session_start();
if (isset($_SESSION['password']) == "" || ($_SESSION['hak_akses']) == "") {
	header('location:login.php');
} else {
	$hak_akses = $_SESSION['hak_akses'];
}
?>
<?php include 'header.php'; ?>
<!-- Sidebar -->
<div class="sidebar sidebar-style-2">
	<div class="sidebar-wrapper scrollbar scrollbar-inner">
		<div class="sidebar-content">
			<ul class="nav nav-primary">
				<li class="nav-item active">
					<a href="main2.php">
						<i class="fas fa-home"></i>
						<p>Dashboard</p>
					</a>
				<li class="nav-section">
					<span class="sidebar-mini-icon">
						<i class="fa fa-ellipsis-h"></i>
					</span>
					<h4 class="text-section">fitur</h4>
				</li>
				<?php
				if ($hak_akses == "Admin Desa") {
				?>
					<li class="nav-item">
						<a href="?halaman=tampil_user">
							<i class="fas fa-user-alt"></i>
							<p>Data User</p>
						</a>
					</li>
					
					<li class="nav-item">
						<a href="?halaman=surat_dicetak">
							<i class="far fa-calendar-check"></i>
							<p>Berkas Permohonan</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="?halaman=laporan">
							<i class="fas fa-table"></i>
							<p>Laporan</p>
						</a>
					</li>
										<!-- <li class="nav-item">
						<a href="?halaman=surat_dicetak">
							<i class="far fa-calendar-check"></i>
							<p>Permohonan Selesai</p>
						</a>
					</li> -->
					
					<li class="nav-item">
						<a data-toggle="collapse" href="#tables">
							<i class="fab fa-delicious"></i>
							<p>Pengaturan</p>
							<span class="caret"></span>
						</a>
					<div class="collapse" id="tables">
							<ul class="nav nav-collapse">
								<li>
									
									<a href="?halaman=tampil_pejabat">
										<span class="sub-item">Pejabat Penandatanganan</span>
									</a>
								</li>
								<li>
									<a href="?halaman=tampil_desa">
										<span class="sub-item">Biodata Desa</span>
									</a>
								</li>
							</>
						</div>
					</li>

				
					
					
					
				<?php
				//} elseif ($hak_akses == "Kepala Desa") {
				?>
					<!-- <li class="nav-item">
						<a data-toggle="collapse" href="#tables">
							<i class="fas fa-table"></i>
							<p>Laporan</p>
							<span class="caret"></span>
						</a>
						<div class="collapse" id="tables">
							<ul class="nav nav-collapse">
								<li>
									<a href="?halaman=laporan_perbulan">
										<span class="sub-item">Perbulan</span>
									</a>
								</li>
								<li>
									<a href="?halaman=laporan_pertahun">
										<span class="sub-item">Pertahun</span>
									</a>
								</li>
							</ul>
						</div>
					</li> -->
					<?php
				} else if ($hak_akses == "Admin Pemkab") {
				?>
					<!-- <li class="nav-item">
						<a href="?halaman=tampil_pemkab">
							<i class="far fa-calendar-check"></i>
							<p>Biodata Pemkab</p>
						</a>
					</li> -->
					<li class="nav-item">
						<a href="?halaman=tampil_user">
							<i class="fas fa-user-alt"></i>
							<p>Data Admin Desa</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="?halaman=tampil_berkas">
							<i class="far fa-calendar-check"></i>
							<p>Template Surat</p>
						</a>
					</li>
					<li class="nav-item">
						<a data-toggle="collapse" href="#tables">
							<i class="fas fa-table"></i>
							<p>Laporan</p>
							<span class="caret"></span>
						</a>
						<div class="collapse" id="tables">
							<ul class="nav nav-collapse">
								<li>
									<a href="?halaman=laporan_perbulan">
										<span class="sub-item">Perbulan</span>
									</a>
								</li>
								<li>
									<a href="?halaman=laporan_pertahun">
										<span class="sub-item">Pertahun</span>
									</a>
								</li>
							</ul>
						</div>
					</li>
				<?php
				}
				?>
				<li class="mx-4 mt-2">
					<a href="logout.php" class="btn btn-danger btn-block"><span class="btn-label mr-2"> <i class="icon-logout"></i> </span>Logout</a>
				</li>
			</ul>
		</div>
	</div>
</div>
<!-- End Sidebar -->

<div class="main-panel">
	<div class="content">
		<?php
		if (isset($_GET['halaman'])) {
			$hal = $_GET['halaman'];
			switch ($hal) {
				case 'beranda';
					include 'beranda.php';
					break;
				case 'tampil_pemkab';
					include 'tampil_pemkab.php';
					break;
				case 'ubah_pemkab';
					include 'ubah_pemkab.php';
					break;
				case 'ubah_pemohon';
					include 'ubah_pemohon.php';
					break;
				case 'ubah_pemohon2';
					include 'ubah_pemohon2.php';
					break;
				case 'tampil_pemohon';
					include 'tampil_pemohon.php';
					break;
				case 'tampil_status';
					include 'status_request.php';
					break;
				case 'status';
					include 'status_request2.php';
					break;
				case 'belum_acc';
					include 'belum_acc.php';
					break;
				case 'sudah_acc';
					include 'acc.php';
					break;
				case 'modal_pejabat';
					include 'modal_pejabat.php';
					break;
				case 'berkas_cetak';
					include 'berkas_cetak.php';
					break;
				case 'detail_request';
					include 'detail_request.php';
					break;
				case 'cetak_request';
					include 'cetak_request.php';
					break;
				case 'tampil_user';
					include 'user.php';
					break;
				case 'tampil_desa';
					include 'tampil_desa.php';
					break;
				case 'tambah_desa';
					include 'tambah_desa.php';
					break;
				case 'tambah_user';
					include 'tambah_user.php';
					break;
				case 'tambah_pejabat';
					include 'tambah_pejabat.php';
					break;
				case 'tambah_template';
					include 'tambah_template.php';
					break;
				case 'ubah_pejabat';
					include 'ubah_pejabat.php';
					break;
				case 'tampil_pejabat';
					include 'tampil_pejabat.php';
					break;
				case 'ubah_user';
					include 'ubah_user.php';
					break;
				case 'ubah_desa';
					include 'ubah_desa.php';
					break;
				case 'view_request';
					include 'view_request.php';
					break;
				case 'view_cetak';
					include 'view_cetak.php';
					break;
				case 'cetak_surat';
					include 'cetak_surat.php';
					break;
				case 'view_surat';
					include 'view_surat.php';
					break;
				case 'surat_dicetak';
					include 'surat_dicetak.php';
					break;
				case 'laporan_perbulan';
					include 'laporan_perbulan.php';
					break;
				case 'laporan_pertahun';
					include 'laporan_pertahun.php';
					break;
				case 'laporan';
					include 'laporan2.php';
					break;
				case 'permohonan_surat';
					include 'permohonan_surat.php';
					break;
				case 'kop_surat';
					include 'kop_surat.php';
					break;
				case 'tampil_pemohon';
					include 'tampil_pemohon.php';
					break;
				case 'request';
					include 'request.php';
					break;
				case 'tampil_berkas';
					include 'tampil_berkas.php';
					break;
				case 'ubah_berkas';
					include 'ubah_berkas.php';
					break;
				case 'ubah_berkas2';
					include 'ubah_berkas2.php';
					break;
				case 'pemohon';
					include 'pemohon.php';
					break;
				case 'pegawai';
					include 'pegawai.php';
					break;
				case 'ubah_desa2';
					include 'ubah_desa2.php';
					break;
				default:
					echo "<center>HALAMAN KOSONG</center>";
					break;
			}
		} else {
			include 'beranda2.php';
		}
		?>
	</div>
	<?php include 'footer.php'; ?>