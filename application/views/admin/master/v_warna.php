 <!-- partial -->
 <div class="main-panel">
   <div class="content-wrapper">

     <div class="row">
       <div class="col-md-12">
         <table class="table table-bordered display table-responsive table-striped" id="dataTable" style="width:100%">
           <thead class="text-center" style="background-color: #24C0D7">
             <tr>
               <th style="width:100%">Nama</th>
               <th style="width:100%">Aksi</th>
             </tr>
           </thead>
           <tbody class="text-center">
             <?php foreach ($cl->result() as $warna) { ?>
               <tr>
                 <td><?= $warna->nm_warna ?></td>
                 <td class="data-table">
                   <button data-id="<?= $warna->id_warna ?>" id="edit-warna" class="btn btn-sm btn-primary">Edit</button>
                   <button data-id="<?= $warna->id_warna ?>" id="delete-warna" class="btn btn-sm btn-danger">Hapus</button>
                 </td>
               </tr>
             <?php } ?>
           </tbody>
         </table>
         <hr>
         <div class="add text-right">
           <button id="create-warna" class="btn btn-sm btn-warning text-dark">Tambah Warna <i class="mdi mdi-arrow-down"></i></button>
         </div>
       </div>
     </div>
     <hr>
     <form hidden method="POST" id="master-warna">
       <div class="row">
         <div class="col-md-6">
           <div class="form-group">
             <label for="nama">Nama :</label>
             <input required type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
           </div>
         </div>
         <div id="btn-action" class="col-md-12">
           <button type="submit" class="form-control btn btn-success">SIMPAN</button>
         </div>
       </div>
     </form>

   </div>
   <!-- content-wrapper ends -->