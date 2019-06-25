<div class="container" style="margin-top: 170px">
    <form class="mt-5" method="post" action="Login/cekLogin">
        <div class="row align-content-center">
            <div class="col-md-12">
                <div class="row">
                    <div class="offset-2 col-8">
                        <div class="row">
                            <div class="col-md-8 mb-4">
                                <h4>Selamat datang di Franzshop! Silahkan Login.</h4>
                            </div>
                            <div class="col-md-4 text-right">
                                <h6>Member baru? <a href="<?=base_url('/Signup')?>"> Daftar disini</a></h6>
                            </div>
                        </div>
                        <div class="row rounded mb-5 text-dark" style="background-color: #F2F2F2">
                            <div class="col-md-12">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-7 mt-4 mb-2">
                                            <div class="form-group">
                                                <label for="email">Email/No.Telp*</label>
                                                <input placeholder="Masukkan Email/No.Telp" required id="email" name="email" class="form-control" type="text">
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Kata Sandi</label>
                                                <input required placeholder="***************" id="password" name="password" class="form-control" type="password">
                                            </div>
                                            <div class="form-group text-right">
                                                <a href="<?=base_url('/Login/forgetPassword')?>" class="text-dark">Lupa kata sandi?</a><br>
                                            </div>
                                        </div>
                                        <div class="col-md-5 mt-4 mb-2">
                                            <button type="submit" class="btn btn-success form-control"><h4 class="text-light">Login</h4></button>
                                            <hr class="bg-dark">
                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <h6>Atau masuk dengan :</h6>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-6 text-center">
                                                                <a href="" class="btn btn-sm btn-primary text-white form-control"><i class="fa fa-lg fa-facebook-square"></i> Facebook</a>
                                                            </div>
                                                            <div class="col-6 text-center">
                                                                <a href="" class="form-control btn btn-sm btn-danger text-white"><i class="fa fa-lg fa-google-plus-square"></i> Google</a>
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
<?php echo $this->session->flashdata('msg') ?>

