<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

	public function index() {
		$keyword = $this->input->post('keyword');
		$data = $this->db->get_where('produk', "nm_produk LIKE '%$keyword%' OR harga LIKE '%$keyword%'");

		if ($data->num_rows() == 0) {

			echo '<h3>Maaf produk yang anda cari tidak tersedia.</h3>';

		} else {

			foreach ($data->result() as $dt) {

			echo '
				<div class="col-md-4">
					<div class="product product_filter">
						<div class="product_image">
							<a href="'.base_url("Product/Detailproduct/").''.$dt->slug.'">
								<img height="220px" src="'.$dt->img.'" alt="'.$dt->nm_produk.'">
							</a>
						</div>
						<div class="favorite"></div>
						<div class="product_info">
							<h6 class="product_name">
								<a href="'.base_url("Product/Detailproduct/").''.$dt->slug.'">
									'.$dt->brand.'<br>'.$dt->nm_produk.'
								</a>
							</h6>
							<div class="product_price">
								'.$this->rupiah->setidr($dt->harga).'
							</div>
						</div>
					</div>
					<div id="btn-addToCart" class="red_button add_to_cart_button">
						<a href="">add to cart</a>
					</div>
				</div>';
			}
		}
	}

}

/* End of file Search.php */
/* Location: ./application/controllers/Search.php */