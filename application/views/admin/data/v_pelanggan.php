 <!-- partial -->
 <div class="main-panel">
    <div class="content-wrapper">
        
        <div class="row">
            <div class="col-md-12">
                <div class="table ">
                <table class="table table-responsive table-bordered table-striped" id="dataTable" width="100%" cellspacing="0px">
                    <thead class="text-center" style="background-color: #24C0D7">
                    <tr>
                        <th>Foto</th>
                        <th>Nama Pelanggan</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>Kode Pos</th>
                        <th>No Hp</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($pelanggan as $p) { ?>
                        <tr class="data-table">
                        <td><img src="<?=$p->foto?>" alt="<?=$p->nm_pelanggan?>"></td>
                        <td><?=$p->nm_pelanggan?></td>
                        <td class="text-center"><?=$p->email?></td>
                        <td class="text-right"><?=$p->alamat_pelanggan?></td>
                        <td class="text-right"><?=$p->kodepos?></td>
                        <td class="text-center"><?=$p->no_hp?></td>
                        <td>
                            <button data-id="<?=$p->id_pelanggan?>" id="delete-pelanggan" class="btn btn-sm btn-danger">Hapus</button>
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