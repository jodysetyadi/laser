<div style="text-align: center; margin-top: 10px">
	<h1>LAPORAN PENJUALAN FRANZSHOP</h1>
	<h4>Periode : <?=$periode?></h4>
</div>
<hr><br>
<table cellpadding="4px" border="1" cellspacing="0" width="100%">
    <tr style="text-align: center;">
        <th>No Pesanan</th>
        <th>Nama Produk</th>
        <th>Qty</th>
        <th>Subtotal</th>
        <th>Laba</th>
    </tr>
    <?php foreach ($pesanan as $p) { ?>

      <?php $modal = $p->modal; 

          if ($p->diskon == NULL) { 
              $harga = $p->harga; 
              $laba = $harga - $modal;
              $laba = $laba * $p->jumlah_beli;
          } else {
              $harga = $p->harga_promo; 
              $laba = $harga - $modal;
              $laba = $laba * $p->jumlah_beli;
          } ?>

          <?php 
            $subtotal = $p->subtotal;
            $totallaba = $laba++;
            $this->db->update('detail_pesanan', ['laba' => $totallaba], ['id_detail' => $p->id_detail]);
          ?>

      <tr class="data-table">
          <td style="text-align: center;"><?=$p->no_pesanan?></td>
          <td style="text-align: left;"><?=$p->nm_produk?></td>
          <td style="text-align: center;"><?=$p->jumlah_beli?></td>
          <td style="text-align: right;"><?=$this->rupiah->setidr($p->subtotal)?></td>
          <td style="text-align: right;"><?=$this->rupiah->setidr($totallaba)?></td>
      </tr>
  <?php } ?>
    <?php 
      $this->db->select('SUM(laba) as lab');
      $this->db->from('detail_pesanan');
      $this->db->join('pesanan', 'detail_pesanan.id_pesanan = pesanan.id_pesanan');
      $this->db->join('produk', 'detail_pesanan.id_produk = produk.id_produk');
      $this->db->where('month(pesanan.tgl_pesanan)', $this->input->post('bulan'));
      $this->db->where('year(pesanan.tgl_pesanan)', $this->input->post('tahun'));
      $this->db->where('pesanan.status', "Sudah Diterima");
      $labaakhir = $this->db->get()->row();
    ?>
      <tr>
        <td colspan="2"></td>
        <td style="text-align: center;">Total : </td>
        <td style="text-align: right;"><?=$this->rupiah->setidr($total->sub)?></td>
        <td style="text-align: right;"><?=$this->rupiah->setidr($labaakhir->lab)?></td>
      </tr>
</table>
<div class="admin">
	<h4 style="margin-left: 12px">Admin</h4><br>
	<p>( <?=$admin->nm_admin?> )</p>
</div>

