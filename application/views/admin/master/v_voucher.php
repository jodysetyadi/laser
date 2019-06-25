 <!-- partial -->
 <div class="main-panel">
   <div class="content-wrapper">

     <div class="row">
       <div class="col-md-12">
         <table class="table table-bordered table-responsive table-striped" id="dataTable" style="width:100%">
           <thead class="text-center" style="background-color: #24C0D7">
             <tr>
               <th style="width:100%">Kode Voucher</th>
               <th style="width:100%">Potongan Harga</th>
               <th style="width:100%">Aksi</th>
             </tr>
           </thead>
           <tbody class="text-center">
             <?php foreach ($voucher->result() as $v) { ?>
               <tr>
                 <td><?= $v->kd_voucher ?></td>
                 <td><?= $v->potongan_harga ?></td>
                 <td class="data-table">
                   <button data-id="<?= $v->id_voucher ?>" id="edit-voucher" class="btn btn-sm btn-primary">Edit</button>
                   <button data-id="<?= $v->id_voucher ?>" id="delete-voucher" class="btn btn-sm btn-danger">Hapus</button>
                 </td>
               </tr>
             <?php } ?>
           </tbody>
         </table>
         <hr>
         <div class="add text-right">
           <button id="create-voucher" class="btn btn-sm btn-warning text-dark">Tambah Voucher <i class="mdi mdi-arrow-down"></i></button>
         </div>
       </div>
     </div>
     <hr>
     <form hidden method="POST" id="master-voucher">
       <div class="row">
         <div class="col-md-6">
           <div class="form-group">
             <label for="kd_voucher">Kode Voucher :</label>
             <input required type="text" class="form-control" id="kd_voucher" name="kd_voucher" placeholder="Kode Voucher">
           </div>
           <div class="form-group">
             <label for="potongan">Potongan Harga :</label>
             <input required type="text" class="form-control" id="potongan" name="potongan" placeholder="Kode Voucher">
           </div>
         </div>
         <div id="btn-action" class="col-md-12">
           <button type="submit" class="form-control btn btn-success">SIMPAN</button>
         </div>
       </div>
     </form>

   </div>
   <!-- content-wrapper ends -->