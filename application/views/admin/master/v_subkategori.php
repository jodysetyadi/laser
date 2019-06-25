 <!-- partial -->
 <div class="main-panel">
   <div class="content-wrapper">

     <div class="row">
       <div class="col-md-12">
         <table class="table table-bordered table-responsive table-striped" id="dataTable" style="width:100%">
           <thead class="text-center" style="background-color: #24C0D7">
             <tr>
               <th style="width:100%">Nama</th>
               <th style="width:100%">Kategori</th>
               <th style="width:100%">Aksi</th>
             </tr>
           </thead>
           <tbody class="text-center">
             <?php foreach ($subcategory->result() as $sub) { ?>
               <tr>
                 <td><?= $sub->nm_subkategori ?></td>
                 <td><?= $sub->nm_kategori ?></td>
                 <td class="data-table">
                   <button data-id="<?= $sub->id_subkategori ?>" id="edit-subkategori" class="btn btn-sm btn-primary">Edit</button>
                   <button data-id="<?= $sub->id_subkategori ?>" id="delete-subkategori" class="btn btn-sm btn-danger">Hapus</button>
                 </td>
               </tr>
             <?php } ?>
           </tbody>
         </table>
         <hr>
         <div class="add text-right">
           <button id="create-subkategori" class="btn btn-sm btn-warning text-dark">Tambah Subkategori <i class="mdi mdi-arrow-down"></i></button>
         </div>
       </div>
     </div>
     <hr>
     <form hidden method="POST" id="master-subkategori">
       <div class="row">
         <div class="col-md-6">
           <div class="form-group">
             <label for="nama">Nama :</label>
             <input required type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
           </div>
           <div class="form-group">
             <label for="kategori">Kategori :</label>
             <select class="form-control" name="id_kategori" id="id_kategori">
               <option value="">Pilih Kategori</option>
               <?php $data = $this->db->get('kategori_produk')->result(); ?>
               <?php foreach ($data as $dt) { ?>
                 <option value="<?= $dt->id_kategori ?>"><?= $dt->nm_kategori ?></option>
               <?php } ?>
             </select>
           </div>
         </div>
         <div id="btn-action" class="col-md-12">
           <button type="submit" class="form-control btn btn-success">SIMPAN</button>
         </div>
       </div>
     </form>

   </div>
   <!-- content-wrapper ends -->