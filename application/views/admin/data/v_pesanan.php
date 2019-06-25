 <!-- partial -->
 <div class="main-panel">
    <div class="content-wrapper">
        
        <div class="row">
            <div class="col-md-12">
                <div class="table table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0px">
                    <thead class="text-center" style="background-color: #24C0D7">
                    <tr>
                        <th>No Pesanan</th>
                        <th>Nama Pelanggan</th>
                        <th>Tanggal Pesan</th>
                        <th>Alamat Penerima</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($pesanan as $p) { ?>
                        <?php $tgl = date('d M Y', strtotime($p->tgl_pesanan)) ?>
                        <tr class="data-table">
                            <td><?=$p->no_pesanan?></td>
                            <td class="text-center"><?=$p->nm_pelanggan?></td>
                            <td class="text-right"><?=$tgl?></td>
                            <td class="text-right"><?=$p->alamat_penerima?></td>
                            <td class="text-right"><?=$this->rupiah->setidr($p->total)?></td>
                            <td class="text-right"><?=$p->status?></td>
                            <td>
                                <a href="<?=base_url('hangar/admin/data/detailpesanan/')?><?=$p->no_pesanan?>" class="btn btn-sm btn-primary">Detail</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>

    </div>
    <!-- content-wrapper ends -->

