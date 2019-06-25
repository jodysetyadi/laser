<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Rupiah
{
    protected $ci;

    public function __construct()
    {
        $this->ci =& get_instance();
    }
    
    function setidr($number) {      
        $rupiah = "Rp " . number_format($number,0,',','.');
        return $rupiah;
    }

    

}

/* End of file Rupiah.php */
