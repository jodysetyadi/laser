 <!-- partial -->
 <div class="main-panel">
     <div class="content-wrapper">

         <div class="row">
             <div class="col-md-12">
                 <div class="table table-responsive">
                     <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0px">
                         <thead class="text-center" style="background-color: #24C0D7">
                             <tr>
                                 <th>Tanggal</th>
                                 <th>No Pesanan</th>
                                 <th>Nama Produk</th>
                                 <th>Qty</th>
                                 <th>Subtotal</th>
                                 <th>Laba</th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php foreach ($pesanan as $p) { ?>
                                 <?php $tgl = date('d M Y', strtotime($p->tgl_pesanan)) ?>

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
                                    $total = $subtotal++;
                                    $totallaba = $laba++;
                                    ?>

                                 <tr class="data-table">
                                     <td class="text-center"><?= $tgl ?></td>
                                     <td><?= $p->no_pesanan ?></td>
                                     <td class="text-left"><?= $p->nm_produk ?></td>
                                     <td class="text-center"><?= $p->jumlah_beli ?></td>
                                     <td class="text-right"><?= $this->rupiah->setidr($subtotal) ?></td>
                                     <td class="text-right"><?= $this->rupiah->setidr($totallaba) ?></td>
                                 </tr>
                             <?php } ?>
                         </tbody>
                     </table>
                 </div>
                 <hr>
                 <form target="_blank" action="<?= base_url('hangar/admin/laporan/cetaklaporanpenjualan') ?>" method="post">
                     <div class="row">
                         <div class="col-md-1">
                             <label for="periode">Periode </label>
                         </div>
                         <div class="col-md-2">
                             <select required class="form-control" name="bulan" id="bulan">
                                 <option value="">Pilih Bulan</option>
                                 <option value="01">Januari</option>
                                 <option value="02">Februari</option>
                                 <option value="03">Maret</option>
                                 <option value="04">April</option>
                                 <option value="05">Mei</option>
                                 <option value="06">Juni</option>
                                 <option value="07">Juli</option>
                                 <option value="08">Agustus</option>
                                 <option value="09">September</option>
                                 <option value="10">Oktober</option>
                                 <option value="11">November</option>
                                 <option value="12">Desember</option>
                             </select>
                         </div>
                         <div class="col-md-2">
                             <select required class="form-control" name="tahun" id="tahun">
                                 <option value="">Pilih Tahun</option>
                                 <option value="2018">2018</option>
                                 <option value="2019">2019</option>
                                 <option value="2020">2020</option>
                                 <option value="2021">2021</option>
                                 <option value="2022">2022</option>
                                 <option value="2023">2023</option>
                                 <option value="2024">2024</option>
                                 <option value="2024">2025</option>
                                 <option value="2024">2026</option>
                                 <option value="2024">2027</option>
                                 <option value="2024">2028</option>
                                 <option value="2024">2029</option>
                                 <option value="2024">2030</option>
                                 <option value="2024">2031</option>
                                 <option value="2024">2032</option>
                                 <option value="2024">2033</option>
                                 <option value="2024">2034</option>
                                 <option value="2024">2035</option>
                             </select>
                         </div>
                     </div>
                     <hr>
                     <div class="cetak">
                         <button type="submit" class="btn btn-lg btn-primary form-control">Print PDF</button>
                     </div>
                 </form>
             </div>
         </div>

     </div>
     <!-- content-wrapper ends -->