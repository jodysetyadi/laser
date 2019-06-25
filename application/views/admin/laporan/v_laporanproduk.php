 <!-- partial -->
 <div class="main-panel">
   <div class="content-wrapper">

     <div class="row">
       <div class="col-md-12">
         <div class="table ">
           <table class="table table-responsive table-bordered table-striped" id="dataTable" width="100%" cellspacing="0px">
             <thead class="text-center" style="background-color: #24C0D7">
               <tr>
                 <th>Nama Produk</th>
                 <th>Brand</th>
                 <th>Modal</th>
                 <th>Diskon</th>
                 <th>Harga</th>
                 <th>Harga Promo</th>
                 <th>Stok</th>
               </tr>
             </thead>
             <tbody>
               <?php foreach ($produk->result() as $p) { ?>
                 <tr class="data-table">
                   <td><?= $p->nm_produk ?></td>
                   <td><?= $p->brand ?></td>
                   <td class="text-right"><?= $this->rupiah->setidr($p->modal) ?></td>
                   <td class="text-center"><?= $p->diskon ?></td>
                   <td class="text-right"><?= $this->rupiah->setidr($p->harga) ?></td>
                   <td class="text-right"><?= $this->rupiah->setidr($p->harga_promo) ?></td>
                   <td class="text-center"><?= $p->stok ?></td>
                 </tr>
               <?php } ?>
             </tbody>
           </table>
         </div>
         <hr>
         <div class="cetak">
           <a target="_blank" href="<?= base_url('hangar/admin/laporan/cetaklaporanproduk') ?>" class="btn btn-lg btn-primary form-control">Print PDF</a>
         </div>
       </div>
     </div>

   </div>
   <!-- content-wrapper ends -->