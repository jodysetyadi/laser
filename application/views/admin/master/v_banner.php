<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">

    <div class="row">
      <div class="col-md-12">
        <table class="table table-bordered table-responsive table-striped" id="dataTable" width="100%">
          <thead class="text-center" style="background-color: #24C0D7">
            <tr>
              <th style="width:100%">Title</th>
              <th style="width:100%">Gambar</th>
              <th style="width:100%">Aksi</th>
            </tr>
          </thead>
          <tbody class="text-center">
            <?php foreach ($banner as $br) { ?>
              <tr>
                <td><?= $br->title ?></td>
                <td><img src="<?= $br->img ?>"></td>
                <td class="data-table">
                  <button data-id="<?= $br->id_carousel ?>" id="edit-banner" class="btn btn-sm btn-primary">Edit</button>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
        <hr>
      </div>
    </div>
    <div hidden class="edit">
      <form method="POST" id="uploadBanner">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="file">Gambar :</label>
              <input type="file" class="form-control" required id="file" name="file">
              <button type="submit" class="form-control btn btn-primary">UPLOAD</button>
            </div>
            <div class="img-banner">
              <input type="hidden" id="img" name="img">
            </div>
          </div>
        </div>
      </form>
      <form method="POST" id="master-banner">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="produk">Judul :</label>
              <textarea name="title" id="title" cols="30" rows="10" class="form-control">
                      <h6>Judul</h6>
                      <h1>Keterangan*</h1>
                   </textarea>
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