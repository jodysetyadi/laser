<div class="container" style="margin-top: 170px">
    <form class="mt-5" action="<?=base_url('Forgetpassword')?>">
        <div class="row">
            <div class="offset-2 col-8">
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <h3>Lupa Kata Sandi</h3>
                    </div>
                </div>
                <div class="row rounded mb-5 text-dark" style="background-color: #F2F2F2">
                    <div class="col-md-12">
                            <div class="row">
                                <div class="offset-2 col-8 mt-4 mb-2">
                                    <div class="form-group">
                                        <label for="email">Email atau telepon</label>
                                        <input placeholder="Masukkan email atau telepon anda" required id="email" class="form-control" type="text">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary form-control"><h4>Kirim</h4></button>
                                    </div>
                                    <div class="form-group text-right">
                                        <a href="<?=base_url('/Login')?>" class="text-dark">Kembali</a><br>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>