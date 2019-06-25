<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {

    function Member()
    {
        $this->db->select('*');
        $this->db->from('pelanggan');
        $this->db->order_by('nm_pelanggan', 'ASC');
        $data['pelanggan'] = $this->db->get()->result();
        
        $this->load->view('admin/header');
		$this->load->view('admin/data/v_pelanggan', $data);
		$this->load->view('admin/footer');
    }

    function deletePelanggan() {
        if ($this->db->delete('pelanggan', ['id_pelanggan' => $this->input->post('id_pelanggan')])) {
            echo "success";
        }
    }

    function Review()
    {
        $this->db->select('*');
        $this->db->from('ulasan');
        $this->db->join('produk', 'ulasan.id_produk = produk.id_produk');
        $this->db->order_by('id_ulasan', 'DESC');
        $data['ulasan'] = $this->db->get()->result();
        
        $this->load->view('admin/header');
		$this->load->view('admin/data/v_ulasan', $data);
		$this->load->view('admin/footer');
    }

    function deleteUlasan() {
        if ($this->db->delete('ulasan', ['id_ulasan' => $this->input->post('id_ulasan')])) {
            echo "success";
        }
    }

    function Inbox() {
        $this->db->select('*');
        $this->db->from('inbox');
        $this->db->order_by('id', 'DESC');
        $data['inbox'] = $this->db->get()->result();
        
        $this->load->view('admin/header');
		$this->load->view('admin/data/v_inbox', $data);
		$this->load->view('admin/footer');
    }

    function deleteInbox() {
        if ($this->db->delete('inbox', ['id' => $this->input->post('id')])) {
            echo "success";
        }
    }

    function Order() {
        $this->db->select('*');
    	$this->db->from('pesanan');
        $this->db->join('pelanggan', 'pesanan.id_pelanggan = pelanggan.id_pelanggan');
        $this->db->order_by('id_pesanan', 'desc');
        $data['pesanan'] = $this->db->get()->result();
        
        $this->load->view('admin/header');
		$this->load->view('admin/data/v_pesanan', $data);
		$this->load->view('admin/footer');
    }

    function detailPesanan( $no_pesanan ) {
        $this->db->select('*');
    	$this->db->from('pesanan');
    	$this->db->join('pelanggan', 'pesanan.id_pelanggan = pelanggan.id_pelanggan');
    	$this->db->where('pesanan.no_pesanan', $no_pesanan);
        $data['pesanan'] = $this->db->get()->result();
        
        $this->db->select('SUM(jumlah_beli) as qty');
    	$this->db->from('detail_pesanan');
    	$this->db->join('pesanan', 'detail_pesanan.id_pesanan = pesanan.id_pesanan');
    	$this->db->where('pesanan.no_pesanan', $no_pesanan);
    	$data['qty'] = $this->db->get()->row();

    	$this->db->select('SUM(subtotal) as subtotal');
    	$this->db->from('detail_pesanan');
    	$this->db->join('pesanan', 'detail_pesanan.id_pesanan = pesanan.id_pesanan');
    	$this->db->where('pesanan.no_pesanan', $no_pesanan);
    	$sub = $this->db->get()->row();
    	$subtotal = $sub->subtotal;

    	$this->db->select('*');
    	$this->db->from('voucher');
    	$this->db->join('pesanan', 'voucher.kd_voucher = pesanan.kd_voucher');
    	$this->db->where('pesanan.no_pesanan', $no_pesanan);
    	$this->db->limit(1);
    	$voucher = $this->db->get();
    	$row = $voucher->num_rows();
        $result = $voucher->row();
        
        if ($row == NULL) {
    		$potongan = 0;
    		$total = $subtotal - $potongan;
	    	$data['subtotal'] = $subtotal;
	    	$data['potongan'] = $potongan;
	    	$data['total'] = $total;
    	} else {
    		$potongan = $result->potongan_harga;
	    	$total = $subtotal - $potongan;
	    	$data['subtotal'] = $subtotal;
	    	$data['potongan'] = $potongan;
	    	$data['total'] = $total;
        }
        
        $this->load->view('admin/header');
		$this->load->view('admin/data/v_detailpesanan', $data);
		$this->load->view('admin/footer');

    }

    function konfirmasiPesanan() {
        if  ($this->db->update('pesanan', ['status' => "Sedang di kirim"], ['no_pesanan' => $this->input->post('no_pesanan')])) {
            if ($this->db->insert('pesan_pelanggan', [
                'id_pelanggan' => $this->input->post('id_pelanggan'),
                'pesan' => "Hore . . . Pesananmu sedang di kirim, Harap ditunggu yah :) ",
                'tgl' => date('Y-m-d')
            ])) {
                echo "success";
            }
        }
    }

    function batalKonfirmasi() {
        
        if ($this->db->update('pesanan', ['status' => "Dibatalkan"], [
            'no_pesanan' => $this->input->post('no_pesanan')
        ])) {

            $pesanan = $this->db->get_where('detail_pesanan', ['no_pesanan' => $this->input->post('no_pesanan')])->result();
            foreach ($pesanan as $key) {

                $id_produk = $key->id_produk;
                $get = $this->db->get_where('produk', ['id_produk' => $id_produk])->row();
                $stok = $get->stok;
                $newstok = intval($stok) + 1;
                $this->db->update('produk', ['stok' => $newstok], ['id_produk' => $id_produk]);

            }

            if ($this->db->insert('pesan_pelanggan', [
                'id_pelanggan' => $this->input->post('id_pelanggan'),
                'pesan' => "Maaf pesananmu di batalkan :(",
                'tgl' => date('Y-m-d')
            ])) {
                echo "success";
            }

        }
    }

}

/* End of file Data.php */
