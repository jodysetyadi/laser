 <!-- partial -->
 <div class="main-panel">
   <div class="content-wrapper">

     <div class="row">
       <div class="col-md-12">
         <table class="table table-bordered table-responsive table-striped" id="dataTable">
           <thead class="text-center" style="background-color: #24C0D7">
             <tr>
               <th>Nama</th>
               <th>Username</th>
               <th>Email</th>
               <th>No Hp</th>
               <th>Password</th>
               <th>Level</th>
               <th>Tgl Add</th>
               <th>Aksi</th>
             </tr>
           </thead>
           <tbody class="text-center">
             <?php foreach ($adm->result() as $admin) { ?>
               <tr>
                 <td><?= $admin->nm_admin ?></td>
                 <td><?= $admin->username ?></td>
                 <td><?= $admin->email ?></td>
                 <td><?= $admin->no_hp ?></td>
                 <td><?= $admin->password ?></td>
                 <td><?= $admin->level == '1' ? 'Super Admin' : 'Admin' ?></td>
                 <?php $tgl = date('d M Y', strtotime($admin->tgl_add)) ?>
                 <td><?= $tgl ?></td>
                 <td class="data-table">
                   <button data-id="<?= $admin->id_admin ?>" id="edit-admin" class="btn btn-sm btn-primary">Edit</button>
                   <button data-id="<?= $admin->id_admin ?>" id="delete-admin" class="btn btn-sm btn-danger">Hapus</button>
                 </td>
               </tr>
             <?php } ?>
           </tbody>
         </table>
         <hr>
         <div class="add text-right">
           <button id="create-admin" class="btn btn-sm btn-warning text-dark">Tambah Admin <i class="mdi mdi-arrow-down"></i></button>
         </div>
       </div>
     </div>
     <hr>
     <form hidden method="POST" id="master-admin">
       <div class="row">
         <div class="col-md-6">
           <div class="form-group">
             <label for="nama">Nama :</label>
             <input required type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
           </div>
           <div class="form-group">
             <label for="username">Username :</label>
             <input required type="text" class="form-control" id="username" name="username" placeholder="Username">
           </div>
           <div class="form-group">
             <label for="email">Email :</label>
             <input required type="email" class="form-control" id="email" name="email" placeholder="Nama">
           </div>
           <div class="form-group">
             <label for="hp">No Hp :</label>
             <input required type="text" class="form-control" id="hp" name="hp" placeholder="Nama">
           </div>
         </div>
         <div class="col-md-6">
           <div class="form-group">
             <label for="level">Level :</label>
             <select class="form-control" name="level" id="level">
               <option value="">Pilih Level</option>
               <option value="1">Super Admin</option>
               <option value="2">Admin</option>
             </select>
           </div>
           <div class="form-group">
             <label for="password">Password :</label>
             <input required type="password" class="form-control" id="password" name="password" placeholder="Nama">
           </div>
           <div class="form-group">
             <label for="konfirmasi">Konfirmasi Password :</label>
             <input required type="password" class="form-control" id="konfirmasi" name="konfirmasi" placeholder="Nama">
           </div>
         </div>
         <div id="btn-action" class="col-md-12">
           <button type="submit" class="form-control btn btn-success">SIMPAN</button>
         </div>
       </div>
     </form>

   </div>
   <!-- content-wrapper ends -->