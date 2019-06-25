
<div class="container single_product_container">
    <div class="row">
        <div class="col">

            <!-- Breadcrumbs -->

            <div class="breadcrumbs d-flex flex-row align-items-center">
                <ul>
                <li><a href="<?=base_url()?>">Home</a></li>
                    <li><a href="<?=base_url('Product')?>"><i class="fa fa-angle-right" aria-hidden="true"></i>Produk</a></li>
                    <li class="active"><i class="fa fa-angle-right" aria-hidden="true"></i><b><?=$detail->nm_produk?></b></li>
                </ul>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-lg-7">
            <div class="single_product_pics">
                <div class="row">
                    <div class="col-lg-10 image_col order-lg-2 order-1">
                        <div class="single_product_image">
                            <div class="single_product_image_background" style="background-image:url(<?=$detail->img?>)"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="product_details">
                <div class="product_details_title">
                    <h2><?=$detail->brand?></h2>
                    <p><?=$detail->nm_produk?></p>
                </div>
                <div class="free_delivery d-flex flex-row align-items-center justify-content-center">
                    <span class="ti-truck"></span><span>Gratis Ongkos Kirim</span>
                </div>
                <?php if($detail->diskon == NULL) { ?>
                    <input type="hidden" id="hargaProduk" value="<?=$detail->harga?>">
                    <div class="original_price"></div>
                    <div class="product_price"><?=$this->rupiah->setidr($detail->harga)?></div>
                <?php } else { ?>
                    <div class="original_price"><?=$this->rupiah->setidr($detail->harga)?></div>
                    <input type="hidden" id="hargaProduk" value="<?=$detail->harga_promo?>">
                    <div class="product_price"><?=$this->rupiah->setidr($detail->harga_promo)?></div>
                <?php } ?>
                <ul class="star_rating">
                    <?php if ($detail->rating == "1") { ?>
                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                        <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                        <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                        <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                        <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                    <?php } else if ($detail->rating == "2") { ?>
                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                        <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                        <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                        <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                    <?php } else if ($detail->rating == "3") { ?>
                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                        <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                        <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                    <?php } else if ($detail->rating == "4") { ?>
                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                        <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                    <?php } else { ?>
                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                    <?php } ?>
                </ul>
                <div class="product_color">
                    <div class="row">
                        <div class="col-md-6">
                            <span>Pilih Ukuran : </span>
                            <div class="row">
                                <div class="col-md-12">
                                    <select class="form-control" name="ukuran" id="ukuran">
                                        <option value="">Pilih Ukuran</option>
                                        <?php foreach ($size as $sz) { ?>
                                            <option value="<?=$sz->id_ukuran?>"><?=$sz->nm_ukuran?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <span>Pilih Warna : </span>
                            <div class="row">
                                <div class="col-md-12">
                                    <select class="form-control" name="warna" id="warna">
                                        <option value="">Pilih Warna</option>
                                        <?php foreach ($color as $cl) { ?>
                                            <option value="<?=$cl->id_warna?>"><?=$cl->nm_warna?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="quantity d-flex flex-column flex-sm-row align-items-sm-center">
                    <span>Kuantitas</span>
                    <div class="quantity_selector">
                        <span class="minus"><i class="fa fa-minus" aria-hidden="true"></i></span>
                        <span id="quantity_value">1</span>
                        <span class="plus"><i class="fa fa-plus" aria-hidden="true"></i></span>
                    </div>
                    <div class="red_button add_to_cart_button">
                        <a data-id="<?=$detail->id_produk?>" id="btn-addToCart" href="">add to cart</a>
                    </div>
                    <div class="product_favorite d-flex flex-column align-items-center justify-content-center"></div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Tabs -->

<div class="tabs_section_container">

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="tabs_container">
                    <ul class="tabs d-flex flex-sm-row flex-column align-items-left align-items-md-center justify-content-center">
                        <li class="tab active" data-active-tab="tab_1"><span>Deskripsi</span></li>
                        <li class="tab" data-active-tab="tab_2"><span>Informasi Tambahan</span></li>
                        <li class="tab" data-active-tab="tab_3"><span>Ulasan (<?=$review->num_rows()?>)</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">

                <!-- Tab Description -->

                <div id="tab_1" class="tab_container active">
                    <div class="row">
                        <div class="col-lg-5 desc_col">
                            <div class="tab_text_block">
                                <h2><?=$detail->brand?></h2>
                                <h4><?=$detail->nm_produk?></h4>
                                <hr>
                                <p><?=$detail->deskripsi?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tab Additional Info -->

                <div id="tab_2" class="tab_container">
                    <div class="row">
                        <div class="col additional_info_col">
                            <div class="tab_title additional_info_title">
                                <h4>Informasi Tambahan</h4>
                            </div>
                            <p>
                                Warna :
                                <span>
                                    <?php foreach ($color as $c) { ?>
                                        <?=$c->nm_warna?>,
                                    <?php } ?>
                                </span>
                            </p>
                            <p>
                                Ukuran :
                                <span>
                                    <?php foreach ($size as $s) { ?>
                                        <?=$s->nm_ukuran?>,
                                    <?php } ?>
                                </span>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Tab Reviews -->

                <div id="tab_3" class="tab_container">
                    <div class="row">

                        <!-- User Reviews -->

                        <div class="col-lg-6 reviews_col">
                            <div class="tab_title reviews_title">
                                <h4>
                                    Ulasan (<?=$review->num_rows()?>)
                                </h4>
                            </div>

                            <!-- User Review -->
                            
                            <?php foreach ($review->result() as $rev) { ?>

                            <div class="user_review_container d-flex flex-column flex-sm-row">
                                <div class="user">
                                    <div class="user_pic"></div>
                                    <div class="user_rating">
                                        <?php if ($rev->make_rating == "1") { ?>
                                            <ul class="star_rating">
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                            </ul>
                                        <?php } else if ($rev->make_rating == "2") { ?>
                                            <ul class="star_rating">
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                            </ul>
                                        <?php } else if ($rev->make_rating == "3") { ?>
                                            <ul class="star_rating">
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                            </ul>
                                        <?php } else if ($rev->make_rating == "4") { ?>
                                            <ul class="star_rating">
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                            </ul>
                                        <?php } else { ?>
                                            <ul class="star_rating">
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            </ul>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="review">
                                    <?php $date = $rev->date_review; ?>
                                    <?php $newdate = date('d M Y', strtotime($date)); ?> 
                                    <div class="review_date"><?=$newdate?></div>
                                    <div class="user_name"><?=$rev->nama?></div>
                                    <p><?=$rev->komentar?></p>
                                </div>
                            </div>

                            <?php } ?>
                        </div>

                        <!-- Add Review -->

                        <div class="col-lg-6 add_review_col">

                            <div class="add_review">
                                <form id="review_form" action="<?=base_url('Product/Review')?>" method="post">
                                    <div>
                                        <h1>Tambah Ulasan</h1>
                                        <input id="review_name" class="form_input input_name" type="text" name="name" placeholder="Nama*" required="required" data-error="Nama harus diisi.">
                                        <input id="review_email" class="form_input input_email" type="email" name="email" placeholder="Email*" required="required" data-error="Harus diisi email yang valid.">
                                        <input type="hidden" id="make_rate" name="make_rate">
                                        <input type="hidden" id="id_product" name="id_product" value="<?=$detail->id_produk?>">
                                    </div>
                                    <div>
                                        <h1>Your Rating:</h1>
                                        <ul class="user_star_rating">
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                        </ul>
                                        <textarea id="review_message" class="input_review" name="message"  placeholder="Ulasan Anda" rows="4" required data-error="Mohon isi ulasan anda"></textarea>
                                    </div>
                                    <div class="text-left text-sm-right">
                                        <button id="review_submit" type="submit" class="red_button review_submit_btn trans_300" value="Submit">submit</button>
                                    </div>
                                </form>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

</div>

<!-- Add To Cart Notification Modal -->

<div id="addToCartModal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Berhasil menambahkan ke keranjang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-6">
                    <a href="<?=base_url()?>" class="btn btn-primary text-white">Belanja lagi</a>
                </div>
                <div class="col-md-6">
                    <a href="<?=base_url('Member/Cart')?>" class="btn btn-warning text-white">Lihat keranjang</a>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>