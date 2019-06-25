<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">

    <div class="row">
      <div class="col-md-12">
        <table class="table table-bordered table-responsive table-striped" id="dataTable" style="width:100%">
          <thead class="text-center" style="background-color: #24C0D7">
            <tr>
              <th style="width:100%">Produk</th>
              <th style="width:100%">Tgl Berakhir</th>
              <th style="width:100%">Aksi</th>
            </tr>
          </thead>
          <tbody class="text-center">
            <?php foreach ($promo as $pr) { ?>
              <tr>
                <td><?= $pr->nm_produk ?></td>
                <td><?= $pr->date_promo ?></td>
                <td class="data-table">
                  <button data-id="<?= $pr->id_promothisweek ?>" id="edit-promo" class="btn btn-sm btn-primary">Edit</button>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
        <hr>
      </div>
    </div>
    <form hidden method="POST" id="master-promo">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="produk">Produk :</label>
            <select name="produk" id="promo-produk" required class="form-control">
              <option value="">Pilih Produk</option>
              <?php
              $produk = $this->db->get('produk')->result();
              foreach ($produk as $key) {
                ?>
                <option value="<?= $key->id_produk ?>"><?= $key->nm_produk ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="tgl">Tgl Berakhir :</label>
            <input type="text" class="form-control" required placeholder="yyyy-mm-dd" id="promo-tgl" name="tgl">
          </div>
        </div>
        <div id="btn-action" class="col-md-12">
          <button type="submit" class="form-control btn btn-success">SIMPAN</button>
        </div>
      </div>
    </form>

  </div>
  <!-- content-wrapper ends -->