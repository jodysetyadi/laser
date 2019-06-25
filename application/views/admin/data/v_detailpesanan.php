 <!-- partial -->
 <div class="main-panel">
    <div class="content-wrapper">

        <div id="detailPesanan" class="row">
            <?php foreach ($pesanan as $key) { ?>
                <div class="col-md-12">
                    <table class="table">
                        <tr>
                            <td>No.Pesanan</td>
                            <td>:</td>
                            <td><b><?=$key->no_pesanan?></b></td>
                        </tr>
                        <tr>
                            <td>Tanggal Pesan</td>
                            <td>:</td>
                            <?php $tgl = date('d M Y', strtotime($key->tgl_pesanan)) ?>
                            <td><b><?=$tgl?></b></td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td><b><?=$key->nm_pelanggan?></b></td>
                        </tr>
                        <tr>
                            <td>Alamat Penerima</td>
                            <td>:</td>
                            <td><b><?=$key->alamat_penerima?></b></td>
                        </tr>
                        <tr>
                            <td>Status Pesanan</td>
                            <td>:</td>
                            <td>
                                <b class="text-success"><?=$key->status?></b>
                                <input type="hidden" id="status" name="status" value="<?=$key->status?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Jumlah Item</td>
                            <td>:</td>
                            <td><b><?=$qty->qty?></b></td>
                        </tr>
                        <tr>
                            <td>Subtotal</td>
                            <td>:</td>
                            <td><b><?=$subtotal?></b></td>
                        </tr>
                        <tr>
                            <td>Kode Voucher</td>
                            <td>:</td>
                            <?php if ($key->kd_voucher == NULL) { ?>
                                <td><b>-</b></td>
                            <?php } else { ?>
                                <td><b><?=$key->kd_voucher?></b></td>
                            <?php } ?>	
                        </tr>
                        <tr>
                            <td>Potongan Harga</td>
                            <td>:</td>
                            <?php if ($key->kd_voucher == NULL) { ?>
                                <td><b>-</b></td>
                            <?php } else { ?>
                                <td><b><?=$potongan?></b></td>
                            <?php } ?>	
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td>:</td>
                            <td><b><?=$total?></b></td>
                        </tr>
                        <tr>
                            <td>Metode Pembayaran</td>
                            <td>:</td>
                            <td><b><?=$key->metode_pembayaran?></b></td>
                        </tr>
                        <tr>
                            <td>Bukti Pembayaran</td>
                            <td>:</td>
                            <td><a href="<?=$key->bukti_pembayaran?>" id="btn-previewBukti"><img src="<?=$key->bukti_pembayaran?>" alt=""></a></td>
                        </tr>
                        <?php if ($key->status == "Menunggu Konfirmasi") { ?>
                            <tr>
                                <td>
                                    <button data-id="<?=$key->id_pelanggan?>" data-no="<?=$key->no_pesanan?>" id="btn-confirm" class="btn btn-success">
                                        Konfirmasi
                                    </button>  
                                    <button data-id="<?=$key->id_pelanggan?>" data-no="<?=$key->no_pesanan?>" id="btn-cancel" class="btn btn-danger">
                                        Batalkan
                                    </button>  
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
                <hr>
                <div id="buktiModal" class="modal" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-center">Bukti Pembayaran</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <img src="<?=$key->bukti_pembayaran?>" alt="" width="100%" height="auto">
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

    </div>
    <!-- content-wrapper ends -->

