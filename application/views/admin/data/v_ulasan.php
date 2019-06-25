 <!-- partial -->
 <div class="main-panel">
    <div class="content-wrapper">
        
        <div class="row">
            <div class="col-md-12">
                <div class="table ">
                <table class="table table-responsive table-bordered table-striped" id="dataTable" width="100%" cellspacing="0px">
                    <thead class="text-center" style="background-color: #24C0D7">
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Produk</th>
                        <th>Komentar</th>
                        <th>Tgl Komen</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($ulasan as $p) { ?>
                        <?php $tgl = date('d M Y', strtotime($p->date_review)) ?>
                        <tr class="data-table">
                            <td><?=$p->nama?></td>
                            <td class="text-center"><?=$p->email?></td>
                            <td class="text-center"><?=$p->nm_produk?></td>
                            <td class="text-right"><?=$p->komentar?></td>
                            <td class="text-right"><?=$tgl?></td>
                            <td>
                                <button data-id="<?=$p->id_ulasan?>" id="delete-ulasan" class="btn btn-sm btn-danger">Hapus</button>
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