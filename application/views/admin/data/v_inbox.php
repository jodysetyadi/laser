 <!-- partial -->
 <div class="main-panel">
    <div class="content-wrapper">
        
        <div class="row">
            <div class="col-md-12">
                <div class="table table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0px">
                    <thead class="text-center" style="background-color: #24C0D7">
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Pesan</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($inbox as $p) { ?>
                        <?php $tgl = date('d M Y', strtotime($p->tgl)) ?>
                        <tr class="data-table">
                            <td><?=$p->nama?></td>
                            <td class="text-center"><?=$p->email?></td>
                            <td class="text-right"><?=$p->pesan?></td>
                            <td class="text-right"><?=$tgl?></td>
                            <td>
                                <button data-id="<?=$p->id?>" id="delete-inbox" class="btn btn-sm btn-danger">Hapus</button>
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