<!-- partial -->
     <div class="main-panel">
       <div class="content-wrapper">
         <div class="changePassword">
           <form method="POST" action="<?=base_url('hangar/admin/master/changepass')?>">
             <div class="row">
               <div class="col-md-6">
                 <div class="form-group">
                   <label for="produk">Password Lama</label>
                   <input type="password" placeholder="*********" class="form-control">
                 </div>
                 <div class="form-group">
                   <label for="produk">Password Baru</label>
                   <input type="password" placeholder="*********" class="form-control">
                 </div>
                 <div class="form-group">
                   <label for="produk">Konfirmasi Password Baru</label>
                   <input type="password" placeholder="*********" class="form-control">
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