 <!-- partial -->
 <div class="main-panel">
   <div class="content-wrapper">

     <div class="row">
       <div class="col-md-12">
         <table class="table table-responsive table-bordered table-striped" id="dataTable" width="100%" cellspacing="0px">
           <thead class="text-center" style="background-color: #24C0D7">
             <tr>
               <th>Nama Produk</th>
               <th>Brand</th>
               <th>Diskon</th>
               <th>Harga</th>
               <th>Harga Promo</th>
               <th>Stok</th>
               <th>Gambar</th>
               <th>Aksi</th>
             </tr>
           </thead>
           <tbody>
             <?php foreach ($produk->result() as $p) { ?>
               <tr>
                 <td><?= $p->nm_produk ?></td>
                 <td><?= $p->brand ?></td>
                 <td class="text-center"><?= $p->diskon ?></td>
                 <td class="text-right"><?= $this->rupiah->setidr($p->harga) ?></td>
                 <td class="text-right"><?= $this->rupiah->setidr($p->harga_promo) ?></td>
                 <td class="text-center"><?= $p->stok ?></td>
                 <td><img src="<?= $p->img ?>" alt="" width="50px" height="auto"></td>
                 <td class="data-table">
                   <button data-id="<?= $p->id_produk ?>" id="edit-produk" class="btn btn-sm btn-primary">Edit</button>
                   <?php if ($this->session->userdata('level') == "1") { ?>
                     <button data-id="<?= $p->id_produk ?>" id="delete-produk" class="btn btn-sm btn-danger">Hapus</button>
                   <?php } ?>
                 </td>
               </tr>
             <?php } ?>
           </tbody>
         </table>
         <hr>
         <div class="add text-right">
           <button id="create-produk" class="btn btn-sm btn-warning text-dark">Tambah Produk <i class="mdi mdi-arrow-down"></i></button>
         </div>
       </div>
     </div>
     <hr>
     <div hidden class="form-produk">
       <form method="POST" id="form-produk">
         <div class="row">
           <div class="col-md-3">
             <div class="form-group">
               Upload Foto Produk :
             </div>
           </div>
           <div class="col-md-3">
             <div class="form-group">
               <input type="file" class="form-control" id="file" name="file">
             </div>
           </div>
           <div class="col-md-2">
             <div class="form-group">
               <button class="btn btn-primary form-control">Upload</button>
             </div>
           </div>
         </div>
       </form>
       <hr>
       <form method="POST" id="master-produk">
         <div class="row">
           <div class="col-md-6">
             <div id="srcimage" class="form-group">

             </div>
             <div class="form-group">
               <label for="nama">Nama Produk :</label>
               <input required type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
             </div>
             <div class="form-group">
               <label for="brand">Brand :</label>
               <input required type="text" class="form-control" id="brand" name="brand" placeholder="Brand">
             </div>
             <div class="form-group">
               <label for="id_subkategori">Kategori :</label>
               <select class="form-control" name="id_subkategori" id="id_subkategori">
                 <option value="">Pilih Subkategori</option>
                 <?php $data = $this->db->get('subkategori')->result(); ?>
                 <?php foreach ($data as $dt) { ?>
                   <option value="<?= $dt->id_subkategori ?>"><?= $dt->nm_subkategori ?></option>
                 <?php } ?>
               </select>
             </div>
             <div class="form-group">
               <label for="stok">Stok :</label>
               <input required type="text" class="form-control" id="stok" name="stok" placeholder="Stok">
             </div>
           </div>
           <div class="col-md-6">
             <div class="form-group">
               <label for="modal">Modal :</label>
               <input required type="text" class="form-control" id="modal" name="modal" placeholder="Harga Beli Produk">
             </div>
             <div class="form-group">
               <label for="harga">Harga :</label>
               <input required type="text" class="form-control" id="harga" name="harga" placeholder="Harga Jual Produk">
             </div>
             <div class="form-group">
               <label for="diskon">Diskon :</label>
               <input required type="text" class="form-control" id="diskon" name="diskon" placeholder="Diskon dalam persen %">
             </div>
           </div>
           <div class="col-md-12">
             <div class="form-group">
               <label for="deskripsi">Deskripsi : </label>
               <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="10">Masukkan Deskripsi Produk</textarea>
             </div>
           </div>
           <div id="btn-action" class="col-md-12">
             <button type="submit" class="form-control btn btn-success">SIMPAN</button>
           </div>
         </div>
       </form>
     </div>

   </div>
   <!-- content-wrapper ends -->