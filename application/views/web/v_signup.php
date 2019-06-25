<div class="container" style="margin-top: 165px">
    <form class="mt-5" method="post" action="Signup/savePelanggan">
        <div class="row align-content-center">
            <div class="col-md-12">
                <div class="row">
                    <div class="offset-1 col-10">
                        <div class="row">
                            <div class="col-md-7 mb-4">
                                <h3>Buat Akun Franzshop Anda</h3>
                            </div>
                            <div class="col-md-5 text-right">
                                <h6>Sudah menjadi member? <a href="<?=base_url('/Login')?>"> Login disini</a></h6>
                            </div>
                        </div>
                        <div class="row rounded mb-5 text-dark" style="background-color: #F2F2F2">
                            <div class="col-md-12">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 mt-4 mb-2">
                                            <div class="form-group">
                                                <label for="telefon">Nomor Telepon *</label>
                                                <input placeholder="Masukkan Nomor Telepon" required id="telefon" name="telefon" class="form-control number hp" type="text">
                                                <span hidden id="error-msg" class="fa fa-warning"> Hanya angka saja</span>
                                                <span hidden id="error-msg-hp" class="fa fa-warning"> Nomor Telepon tidak boleh lebih dari 12 karakter</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Nama Lengkap *</label>
                                                <input required placeholder="Isi Nama Lengkap Anda" id="name" name="name" class="form-control alpha" type="text">
                                                <span hidden id="error-msg" class="fa fa-warning"> Hanya Huruf Saja</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email *</label>
                                                <input required placeholder="Masukkan Email Anda" id="email" name="email" class="form-control email" type="email">
                                                <span hidden id="error-msg" class="fa fa-warning"> Format email example@example.com</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="tglLahir">Tanggal Lahir *</label>
                                                <div class="row">
                                                    <div class="col-10">
                                                        <input placeholder="yyyy-mm-dd" required id="tglLahir" name="tglLahir" class="form-control" type="text">
                                                    </div>
                                                    <div class="col-2">
                                                        <button disabled class="btn btn-light text-dark"><i class="fa fa-calendar"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="passwordsignup">Kata Sandi *</label>
                                                <input required placeholder="***************" id="passwordsignup" name="passwordsignup" class="form-control" type="password">
                                            </div>
                                            <div class="form-group">
                                                <label for="confirmsignup">Konfirmasi Kata Sandi *</label>
                                                <input required placeholder="***************" id="confirmsignup" name="confirmsignup" class="form-control" type="password">
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-4 mb-2">
                                            <div class="form-group">
                                                <label for="alamat">Alamat Lengkap *</label>
                                                <textarea placeholder="Masukkan Alamat Lengkap Anda" class="form-control" name="alamat" id="alamat" cols="30" rows="5"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="kodepos">Kode Pos</label>
                                                <input id="kodepos" name="kodepos" class="form-control number" type="text" placeholder="Masukkan Kode Pos">
                                                <span hidden id="error-msg" class="fa fa-warning"> Hanya Angka Saja</span>
                                            </div>
                                            <button type="submit" class="btn btn-success form-control"><h4 class="text-white">Daftar</h4></button>
                                            <hr class="bg-light">
                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <h6>Atau daftar dengan :</h6>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-6 text-center">
                                                                <a href="" class="btn btn-primary text-light form-control"><i class="fa fa-lg fa-facebook-square"></i> Facebook</a>
                                                            </div>
                                                            <div class="col-6 text-center">
                                                                <a href="" class="form-control btn btn-danger text-light"><i class="fa fa-lg fa-google-plus-square"></i> Google</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>