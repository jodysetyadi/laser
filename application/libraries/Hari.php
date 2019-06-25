<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Hari
{
    protected $ci;

    public function __construct()
    {
        $this->ci =& get_instance();
    }
    
    function sethari( $hari ) {      
     	$hari = date ("D", strtotime($hari));
 
		switch($hari){
			case 'Sun':
				$sethari = "Minggu";
			break;
	 
			case 'Mon':			
				$sethari = "Senin";
			break;
	 
			case 'Tue':
				$sethari = "Selasa";
			break;
	 
			case 'Wed':
				$sethari = "Rabu";
			break;
	 
			case 'Thu':
				$sethari = "Kamis";
			break;
	 
			case 'Fri':
				$sethari = "Jumat";
			break;
	 
			case 'Sat':
				$sethari = "Sabtu";
			break;
			
			default:
				$sethari = "Tidak di ketahui";		
			break;
		}
	 
		return $sethari;   
    }

}

/* End of file Hari.php */
