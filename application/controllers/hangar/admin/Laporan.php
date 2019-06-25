<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function produk()
	{
		$this->db->select('*');
		$this->db->from('produk');
		$data['produk'] = $this->db->get();

		$this->load->view('admin/header');
		$this->load->view('admin/laporan/v_laporanproduk', $data);
		$this->load->view('admin/footer');
	}

	public function penjualan()
	{
		$this->db->select('*');
    	$this->db->from('detail_pesanan');
        $this->db->join('pesanan', 'detail_pesanan.id_pesanan = pesanan.id_pesanan');
        $this->db->join('produk', 'detail_pesanan.id_produk = produk.id_produk');
        $this->db->where('pesanan.status', "Sudah Diterima");
        $this->db->order_by('detail_pesanan.id_detail', 'desc');
        $data['pesanan'] = $this->db->get()->result();
        
        $this->load->view('admin/header');
		$this->load->view('admin/laporan/v_laporanpenjualan', $data);
		$this->load->view('admin/footer');
	}

	public function cetaklaporanproduk() {
		$this->db->select('*');
		$this->db->from('produk');
		$data['produk'] = $this->db->get();

		$data['periode'] = date('M Y');

		$data['admin'] = $this->db->get('admin', ['id_admin' => $this->session->userdata('id')])->row();

		$this->pdf->setPaper('A4', 'landscape');
    	$this->pdf->filename = "laporan-produk.pdf";
    	$this->pdf->load_view('admin/laporan/output_laporanproduk', $data);
	}

	public function cetaklaporanpenjualan() {
		$bln = $this->input->post('bulan');
		switch ($bln) {
			case '01':
				$bulan = "Januari";
				break;
			case '02':
				$bulan = "Februari";
				break;
			case '03':
				$bulan = "Maret";
				break;
			case '04':
				$bulan = "April";
				break;
			case '05':
				$bulan = "Mei";
				break;
			case '06':
				$bulan = "Juni";
				break;
			case '07':
				$bulan = "Juli";
				break;
			case '08':
				$bulan = "Agustus";
				break;
			case '09':
				$bulan = "September";
				break;
			case '10':
				$bulan = "Oktober";
				break;
			case '11':
				$bulan = "November";
				break;
			case '12':
				$bulan = "Desember";
				break;
			default:
				$bulan = NULL;
				break;
		}

		$this->db->select('*');
    	$this->db->from('detail_pesanan');
        $this->db->join('pesanan', 'detail_pesanan.id_pesanan = pesanan.id_pesanan');
        $this->db->join('produk', 'detail_pesanan.id_produk = produk.id_produk');
        $this->db->where('month(pesanan.tgl_pesanan)', $this->input->post('bulan'));
        $this->db->where('year(pesanan.tgl_pesanan)', $this->input->post('tahun'));
        $this->db->where('pesanan.status', "Sudah Diterima");
        $this->db->order_by('detail_pesanan.id_detail', 'desc');
        $data['pesanan'] = $this->db->get()->result();

        $data['periode'] = $bulan." ".$this->input->post('tahun');

		$data['admin'] = $this->db->get('admin', ['id_admin' => $this->session->userdata('id')])->row();

		$this->db->select('SUM(subtotal) as sub');
		$this->db->from('detail_pesanan');
		$this->db->join('pesanan', 'detail_pesanan.id_pesanan = pesanan.id_pesanan');
        $this->db->join('produk', 'detail_pesanan.id_produk = produk.id_produk');
        $this->db->where('month(pesanan.tgl_pesanan)', $this->input->post('bulan'));
        $this->db->where('year(pesanan.tgl_pesanan)', $this->input->post('tahun'));
        $this->db->where('pesanan.status', "Sudah Diterima");
        $data['total'] = $this->db->get()->row();

		$this->pdf->setPaper('A4', 'landscape');
    	$this->pdf->filename = "laporan-penjualan.pdf";
    	$this->pdf->load_view('admin/laporan/output_laporanpenjualan', $data);
	}

}

/* End of file Laporan.php */
/* Location: ./application/controllers/hangar/admin/Laporan.php */