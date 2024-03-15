<?php 

include '../konek.php';
date_default_timezone_set('Asia/Jakarta');
?>

			    <div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">KOP SURAT</h2>
                                <a href="?halaman=tambah_template" class="btn btn-primary btn-round ml-auto">
                                <i class="fa fa-plus"></i>
                                    Add Template Surat
                            </a>
							</div>

						</div>
					</div>
                </div>
                <div class="page-inner mt--5">
					<div class="row mt--2">
						<div class="col-md-6">
							<div class="card full-height">
								<div class="card-body">
									<div class="card-tools">
                                        <form action="" method="POST">
                                            <div class="form-group">
                                                <select name="bulan" id="bulan" class="form-control">
													<option value="">Pilih</option>
                                                    <option value="1" ><a href="?halaman=tampil_user">Surat Keterangan Domisili Duplikat</a></option>
                                                    <option value="2">Surat Rekomendasi</option>
                                                    <option value="3">Surat Keterangan Tanah Tidak Sengketa</option>
                                                    <option value="4">Surat Keterangan Penghasilan Orang Tua</option>
                                                    <option value="5">Surat Keterangan Domisili Organisasi</option>
                                                    <option value="6">Surat Keterangan Lainnya</option>
                                                    <option value="7">Surat Keterangan Kehilangan</option>
                                                    <option value="8">Surat Keterangan Kelakuan baik</option>
                                                    <option value="9">Surat Keterangan Tidak Mampu (Prasejahtera)</option>
                                                    <option value="10">Surat Keterangan Domisili Lembaga</option>
                                                    <option value="11">Surat Keterangan Tidak Mampu</option>
                                                    <option value="12">Surat Keterangan Domisili</option>
													<option value="12">Surat Keterangan Beda Identitas</option>
													<option value="12">Surat Keterangan Kematian</option>
													<option value="12">Surat Keterangan Usaha</option>
													<option value="12">Surat Keterangan Domisili Perusahaan</option>
													<option value="12">Surat Pernyataan Lainnya</option>
													<option value="12">Surat Keterangan Belum Menikah</option>
												</select>
                                                <div class="form-group">
                                                    <input type="submit" name="tampilkan" value="Tampilkan" class="btn btn-primary btn-sm">
													<a href="?halaman=kop_surat">
													<input type="submit" value="Reload" class="btn btn-primary btn-sm">
													</a>
                                                </div>
                                            </div>
                                        </form>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div>
            <div id="editor"></div>
            <form>
                <div class="form-group">
                    <textarea name="content" id="content" cols="30" rows="10">CK EDITOR 4</textarea>
                </div>
            </form>
			<div class="form-group">
                <input type="submit" name="simpan" value="Simpan" class="btn btn-primary btn-sm">
            </div>
        </div>
        
        <script src="ckeditor/ckeditor.js"></script>
        <script>
            CKEDITOR.replace('content');
        </script>
				</div>

