<div style="text-align: center; margin-top: 10px">
	<h1>LAPORAN DATA PRODUK FRANZSHOP</h1>
	<h4>Periode : <?=$periode?>8</h4>
</div>
<hr>
<table cellpadding="4px" border="1" cellspacing="0" width="100%">
    <tr style="text-align: center;">
      	<th>Nama Produk</th>
      	<th>Brand</th>
      	<th>Modal</th>
      	<th>Diskon</th>
      	<th>Harga</th>
      	<th>Harga Promo</th>
      	<th>Stok</th>
    </tr>
    <?php foreach ($produk->result() as $p) { ?>
      	<tr>
        	<td><?=$p->nm_produk?></td>
            <td><?=$p->brand?></td>
            <td style="text-align: right;"><?=$this->rupiah->setidr($p->modal)?></td>
            <td style="text-align: center;"><?=$p->diskon?></td>
            <td style="text-align: right;"><?=$this->rupiah->setidr($p->harga)?></td>
            <td style="text-align: right;"><?=$this->rupiah->setidr($p->harga_promo)?></td>
            <td style="text-align: center;"><?=$p->stok?></td>
      	</tr>
    <?php } ?>
</table>
<div class="admin">
	<h4 style="margin-left: 12px">Admin</h4><br>
	<p>( <?=$admin->nm_admin?> )</p>
</div>

