<div class="container product_section_container">
    <div class="row">
        <div class="col product_section clearfix">

            <!-- Breadcrumbs -->

            <div class="breadcrumbs d-flex flex-row align-items-center">
                <ul>
                    <li><a href="<?=base_url()?>">Beranda</a></li>
                    <li>
                        <a href="<?=base_url('Product')?>">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>Produk
                        </a>
                    </li>
                    <li class="active">
                        <a href="<?=base_url('Product/Categories/')?><?=$row?>">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                            <?=$row?>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Sidebar -->

            <div class="sidebar">
                <div class="sidebar_section">
                    <div class="sidebar_title">
                        <h5>Kategori <?=$row?></h5>
                    </div>
                    <ul class="sidebar_categories">
                        <?php foreach ($subcategorie as $sub) { ?>
                            <li>
                                <?php if ($sub->nm_kategori == "Wanita") { ?>
                                    <a href="<?=base_url('Product/Wanita/')?><?=$sub->nm_subkategori?>"><?=$sub->nm_subkategori?>
                                    </a>
                                <?php } else if ($sub->nm_kategori == "Pria") { ?>
                                    <a href="<?=base_url('Product/Pria/')?><?=$sub->nm_subkategori?>"><?=$sub->nm_subkategori?>
                                    </a>
                                <?php } else { ?>
                                    <a href="<?=base_url('Product/Aksesoris/')?><?=$sub->nm_subkategori?>"><?=$sub->nm_subkategori?>
                                    </a>
                                <?php } ?>
                            </li>
                        <?php } ?>
                    </ul>
                </div>

            </div>

            <!-- Main Content -->

            <div class="main_content">

                <!-- Products -->

                <div class="products_iso">
                    <div class="row">
                        <div class="col">

                            <!-- Product Sorting -->

                            <div class="product_sorting_container product_sorting_container_top">
                                <ul class="product_sorting">
                                    <li>
                                        <span>Tampil</span>
                                        <span class="num_sorting_text">6</span>
                                        <i class="fa fa-angle-down"></i>
                                        <ul class="sorting_num">
                                            <li class="num_sorting_btn"><span>6</span></li>
                                            <li class="num_sorting_btn"><span>12</span></li>
                                            <li class="num_sorting_btn"><span>24</span></li>
                                        </ul>
                                    </li>
                                </ul>
                                <div class="pages d-flex flex-row align-items-center">
                                    <div class="page_current">
                                        <span>1</span>
                                        <ul class="page_selection">
                                            <li><a href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                        </ul>
                                    </div>
                                    <div class="page_total"><span>of</span> <?=$num_row?></div>
                                </div>

                            </div>

                            <!-- Product Grid -->

                            <div class="product-grid">

                                <!-- Product 1 -->
                                
                                <?php foreach ($product as $p) : ?>

                                    <?php if ($p->nm_kategori == "Pria") { ?>

                                        <!-- Jika Ada Diskon -->

                                        <?php if ($p->diskon == NULL) { ?>
                                            
                                            <div class="product-item men">
                                                <div class="product product_filter">
                                                    <div class="product_image">
                                                        <a href="<?=base_url('Product/Detailproduct/')?><?=$p->slug?>">
                                                            <img height="220px" src="<?=$p->img?>" alt="<?=$p->nm_produk?>">
                                                        </a>
                                                    </div>
                                                    <div class="favorite"></div>
                                                    <div class="product_info">
                                                        <h6 class="product_name">
                                                            <a href="<?=base_url('Product/Detailproduct/')?><?=$p->slug?>">
                                                                <?=$p->brand?><br><?=$p->nm_produk?>
                                                            </a>
                                                        </h6>
                                                        <div class="product_price"><?=$this->rupiah->setidr($p->harga)?></div>
                                                    </div>
                                                </div>
                                                <div id="btn-addToCart" class="red_button add_to_cart_button"><a href="<?=base_url('Product/Detailproduct/')?><?=$p->slug?>">Detail</a></div>
                                            </div>

                                        <?php } else { ?>

                                            <div class="product-item men">
                                                <div class="product discount product_filter">
                                                    <div class="product_image">
                                                        <a href="<?=base_url('Product/Detailproduct/')?><?=$p->slug?>">
                                                            <img height="220px" src="<?=$p->img?>" alt="<?=$p->nm_produk?>">
                                                        </a>
                                                    </div>
                                                    <div class="favorite favorite_left"></div>
                                                    <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center">
                                                        <span><?=$p->diskon?></span>
                                                    </div>
                                                    <div class="product_info">
                                                        <h6 class="product_name">
                                                            <a href="<?=base_url('Product/Detailproduct/')?><?=$p->slug?>">
                                                                <?=$p->brand?><br><?=$p->nm_produk?>
                                                            </a>
                                                        </h6>
                                                        <div class="product_price"><?=$this->rupiah->setidr($p->harga_promo)?>
                                                            <span><?=$this->rupiah->setidr($p->harga)?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="btn-addToCart" class="red_button add_to_cart_button"><a href="#">add to cart</a></div>
                                            </div>

                                        <?php } ?>

                                    <?php } else if ($p->nm_kategori == "Wanita") { ?>
                                        
                                        <?php if ($p->diskon == NULL) { ?>
                                            
                                            <div class="product-item women">
                                                <div class="product product_filter">
                                                    <div class="product_image">
                                                        <a href="<?=base_url('Product/Detailproduct/')?><?=$p->slug?>">
                                                            <img height="220px" src="<?=$p->img?>" alt="<?=$p->nm_produk?>">
                                                        </a>
                                                    </div>
                                                    <div class="favorite"></div>
                                                    <div class="product_info">
                                                        <h6 class="product_name">
                                                            <a href="<?=base_url('Product/Detailproduct/')?><?=$p->slug?>">
                                                                <?=$p->brand?><br><?=$p->nm_produk?>
                                                            </a>
                                                        </h6>
                                                        <div class="product_price"><?=$this->rupiah->setidr($p->harga)?></div>
                                                    </div>
                                                </div>
                                                <div id="btn-addToCart" class="red_button add_to_cart_button"><a href="<?=base_url('Product/Detailproduct/')?><?=$p->slug?>">Detail</a></div>
                                            </div>

                                        <?php } else { ?>

                                            <div class="product-item women">
                                                <div class="product discount product_filter">
                                                    <div class="product_image">
                                                        <a href="<?=base_url('Product/Detailproduct/')?><?=$p->slug?>">
                                                            <img height="220px" src="<?=$p->img?>" alt="<?=$p->nm_produk?>">
                                                        </a>
                                                    </div>
                                                    <div class="favorite favorite_left"></div>
                                                    <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center">
                                                        <span><?=$p->diskon?></span>
                                                    </div>
                                                    <div class="product_info">
                                                        <h6 class="product_name">
                                                            <a href="<?=base_url('Product/Detailproduct/')?><?=$p->slug?>">
                                                                <?=$p->brand?><br><?=$p->nm_produk?>
                                                            </a>
                                                        </h6>
                                                        <div class="product_price"><?=$this->rupiah->setidr($p->harga_promo)?>
                                                            <span><?=$this->rupiah->setidr($p->harga)?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="btn-addToCart" class="red_button add_to_cart_button"><a href="#">add to cart</a></div>
                                            </div>
                                            
                                        <?php } ?>

                                    <?php } else { ?>
                                        
                                        <?php if ($p->diskon == NULL) { ?>
                                            
                                            <div class="product-item accessories">
                                                <div class="product product_filter">
                                                    <div class="product_image">
                                                        <img height="220px" src="<?=$p->img?>" alt="<?=$p->nm_produk?>">
                                                    </div>
                                                    <div class="favorite"></div>
                                                    <div class="product_info">
                                                        <h6 class="product_name">
                                                            <a href="<?=base_url('Product/Detailproduct/')?><?=$p->slug?>">
                                                                <?=$p->brand?><br><?=$p->nm_produk?>
                                                            </a>
                                                        </h6>
                                                        <div class="product_price"><?=$this->rupiah->setidr($p->harga)?></div>
                                                    </div>
                                                </div>
                                                <div id="btn-addToCart" class="red_button add_to_cart_button"><a href="<?=base_url('Product/Detailproduct/')?><?=$p->slug?>">Detail</a></div>
                                            </div>

                                        <?php } else { ?>

                                            <div class="product-item accessories">
                                                <div class="product discount product_filter">
                                                    <div class="product_image">
                                                        <a href="<?=base_url('Product/Detailproduct/')?><?=$p->slug?>">
                                                            <img height="220px" src="<?=$p->img?>" alt="<?=$p->nm_produk?>">
                                                        </a>
                                                    </div>
                                                    <div class="favorite favorite_left"></div>
                                                    <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center">
                                                        <span><?=$p->diskon?></span>
                                                    </div>
                                                    <div class="product_info">
                                                        <h6 class="product_name">
                                                            <a href="<?=base_url('Product/Detailproduct/')?><?=$p->slug?>">
                                                                <?=$p->brand?><br><?=$p->nm_produk?>
                                                            </a>
                                                        </h6>
                                                        <div class="product_price"><?=$this->rupiah->setidr($p->harga_promo)?>
                                                            <span><?=$this->rupiah->setidr($p->harga)?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="btn-addToCart" class="red_button add_to_cart_button"><a href="#">add to cart</a></div>
                                            </div>
                                            
                                        <?php } ?>

                                    <?php } ?>

                                <?php endforeach;?>

                            </div>

                            <!-- Product Sorting -->

                            <div class="product_sorting_container product_sorting_container_bottom clearfix">
                                <ul class="product_sorting">
                                    <li>
                                        <span>Tampil</span>
                                        <span class="num_sorting_text">04</span>
                                        <i class="fa fa-angle-down"></i>
                                        <ul class="sorting_num">
                                            <li class="num_sorting_btn"><span>01</span></li>
                                            <li class="num_sorting_btn"><span>02</span></li>
                                            <li class="num_sorting_btn"><span>03</span></li>
                                            <li class="num_sorting_btn"><span>04</span></li>
                                        </ul>
                                    </li>
                                </ul>
                                <span class="showing_results">Showing 1–<?=$num_row?> of <?=$num_row?> results</span>
                                <div class="pages d-flex flex-row align-items-center">
                                    <div class="page_current">
                                        <span>1</span>
                                        <ul class="page_selection">
                                            <li><a href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                        </ul>
                                    </div>
                                    <div class="page_total"><span>of</span> <?=$num_row?></div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>