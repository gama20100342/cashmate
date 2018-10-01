<?php 

class CommonComponent extends Component {

    public function generateRandomString($length){
	$str = "";
	$characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
	$max = count($characters) - 1;
	for ($i = 0; $i < $length; $i++) {
		$rand = mt_rand(0, $max);
		$str .= $characters[$rand];
	}
	    return date('Ymdh').$str.date('isA');
    }
	
    public function generate_pin($length = 6){
        $str = "";
        $characters = range('0','9');
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str .= $characters[$rand];
        }
        return $str;
    }
	
	public function generate_temp_pass($length = 4){
        $str = "";
        $characters = range('0','9');
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str .= $characters[$rand];
        }
        return $str;
    }
	
	
	function setBreadcrumb($url){
        $crumbs = split('/',$url);
        $link = '/';
         
        if($crumbs[0] != 'admin'){
            $breadcrumb[] = array('home', $link);
        }
         
        foreach($crumbs AS $crumb){
            $name = str_replace('_',' ', $crumb);
            $link .= $crumb.'/';
            if($name && !is_numeric($name)){
                $breadcrumb[] = array($name,$link);
            }elseif(is_numeric($name)){
                $key = count($breadcrumb)-1;
                $breadcrumb[$key][1].= $name;
            }
        }
         
        return $breadcrumb;
    }
	
	public function getTheDateAfter($after, $date){		
		$date = new DateTime($date);
		$date->modify($after);
		return $date->format("Y-m-d");
	}
	
	public function listofMos(){
		$string = array(
			'January',
			'February',
			'March',
			'April',
			'May',
			'June',
			'July',
			'August',
			'September',
			'October',
			'November',
			'December'
		);
		
		$new_arr = array();

        foreach($string as $str):
            $new_arr[$str] = $str;
        endforeach;

        return $new_arr;
	}
	
	public function generateFilename($filename=null, $from=null, $to=null){
		return true;
	}

}