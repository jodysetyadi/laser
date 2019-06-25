<?php if ($this->session->userdata('status') == "login") :
	foreach ($profile as $p) : ?>
		<div class="container" style="margin-top: 160px">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a class="text-dark" href="<?= base_url() ?>">Beranda</a></li>
					<li class="breadcrumb-item active" aria-current="page">Profil</li>
				</ol>
			</nav>
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-dark rounded mb-4" style="background-color: #F2F2F2">
						<div class="container">
							<div class="row">
								<div class="col-md-12 mt-4 mb-4">
									<div class="row">
										<div id="img-member" class="col-md-2 text-center">
											<?php if ($p->foto != null) : ?>
												<img class="img-thumbnail bg-dark" width="100%" height="auto" src="<?= $p->foto ?>" alt="">
											<?php else : ?>
												<button id="btn-changeFoto" class="btn btn-outline-light mt-5 form-control"><i class="fa fa-lg fa-upload"></i> Upload Foto</button>
											<?php endif; ?>
										</div>
										<div class="col-md-8 mt-4">
											<div class="container">
												<div class="row">
													<div class="col-md-11">
														<input id="name" name="name" style="font-size: 30px; background-color: #F2F2F2" type="text" readonly class="border-left-0 form-control-label border-right-0 border-top-0 border-bottom-0 text-dark" value="<?= $p->nm_pelanggan ?>">
														<hr class="bg-white">
														<input hidden type="text" class="form-control" id="foto" name="foto" value="<?= $p->foto ?>">
													</div>
													<div class="col-md-6">
														<div class="row">
															<div class="col-6">
																<button id="btn-changeName" class="btn btn-sm btn-primary text-white form-control"><i class="fa fa-edit"></i> Ubah Nama</button>
															</div>
															<div id="show-btnimage" class="col-6">
																<?php if ($p->foto != null) : ?>
																	<button id="btn-changeUploadFoto" class="btn btn-sm btn-warning text-dark form-control"><i class="fa fa-lg fa-upload"></i> Ubah Foto</button>
																<?php endif; ?>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<hr class="bg-white">
							<div class="row">
								<div class="col-md-12">
									<div class="container">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="telepon">Telepon *</label>
													<input required type="text" class="form-control hp number" id="telepon" name="telepon" value="<?= $p->no_hp ?>">
													<span hidden id="error-msg" class="fa fa-warning"> Hanya angka saja</span>
													<span hidden id="error-msg-hp" class="fa fa-warning"> Nomor Telepon tidak boleh lebih dari 12 karakter</span>
												</div>
												<div class="form-group">
													<label for="address">Alamat *</label>
													<textarea name="address" id="address" cols="30" rows="8" class="form-control"><?= $p->alamat_pelanggan ?></textarea>
												</div>
												<div class="form-group">
													<label for="kodepos">Kode Pos</label>
													<input required type="text" class="form-control number" id="kodepos" name="kodepos" value="<?= $p->kodepos ?>">
													<span hidden id="error-msg" class="fa fa-warning"> Hanya angka saja</span>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="email">Email *</label>
													<input required type="text" class="form-control email" id="email" name="email" value="<?= $p->email ?>">
													<span hidden id="error-msg" class="fa fa-warning"> Format email example@example.com</span>
												</div>
												<div class="form-group">
													<label for="password">Password *</label>
													<div class="row">
														<div class="col-8">
															<input readonly type="password" class="form-control" id="password" name="password" value="<?= $p->password ?>">
														</div>
														<div class="col-4">
															<button id="btn-changePassword" class="btn btn-outline-primary">Ubah</button>
															<button hidden id="btn-cancelChangePassword" class="btn btn-outline-primary">Batal</button>
														</div>
													</div>
												</div>
												<div name="password-change" hidden class="form-group">
													<label for="passwordDefault">Password lama *</label>
													<input required type="password" class="form-control" id="passwordDefault" name="passwordDefault">
												</div>
												<div name="password-change" hidden class="form-group">
													<label for="passwordNew">Password Baru *</label>
													<input readonly required type="password" class="form-control" id="passwordNew" name="passwordNew">
												</div>
												<div name="password-change" hidden class="form-group">
													<label for="passwordConfirm">Konfirmasi *</label>
													<input readonly required type="password" class="form-control" id="passwordConfirm" name="passwordConfirm">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<hr class="bg-white">
							<div class="row mb-4">
								<div class="col-md-12">
									<button id="btn-update" class="btn btn-lg btn-success text-white form-control"><i class="fa fa-send"></i> Update</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Change Foto Modal -->
		<div id="modalChangeFoto" class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header bg-danger text-white">
						<h5 class="modal-title text-white" id="exampleModalCenterTitle">Upload Foto Profil Anda</h5>
						<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form id="frm-upload" method="post">
						<div class="modal-body">
							<p class="bg-danger rounded px-1 pb-1 pt-2 text-white">
								<marquee onmouseover="this.stop();" onmouseout="this.start();">Ukuran File Maximal 1 Mb</marquee>
							</p>
							<input type="file" class="form-control" id="file" name="file">
						</div>
						<div class="modal-footer">
							<input id="btn-upload" name="btn-upload" type="submit" class="btn btn-outline-success" value="Upload">
						</div>
					</form>
				</div>
			</div>
		</div>
	<?php endforeach;
else : redirect(base_url());
endif; ?>