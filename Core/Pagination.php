<?php

namespace Core;

class Pagination {		

        public $total;
        public $limit;
        public $offset;
        public $display;
        public $currentPage;

        public function __construct(){
        	$this->total = 0;
        	$this->limit = 20;
        	$this->currentPage = 1;

        }


    	public function paginate() {
	        $itemsPerPage = ceil($this->total/$this->limit);
	        if (\Core\Request::get('page')){
	        	$this->currentPage = \Core\Request::get('page');
	        }
	        else {
	        	$this->currentPage = 1;
	        }
	        if (\Core\Request::get('q')){
	        	$q = "&q=".\Core\Request::get('q');
	        }
	        else {
	        	$q = "";
	        }	       
	        
    		$this->offset = ($this->currentPage - 1)  * $this->limit;

	    	$start = $this->offset + 1;
	    	$end = max(($this->offset + $this->limit), $this->total);
	    	$pages = range(1, $itemsPerPage);
    		$prevlink = ($this->currentPage > 1) ? '<a class="Fenabled" href="?page=1' . $q . '" title="First page"><i class="fa fa-chevron-left"></i></a><a class="Lenabled" href="?page=' . ($this->currentPage - 1) . $q . '" title="Previous page"><i class="fa fa-angle-left"></i></a>' : '<span class="Fdisabled"><i class="fa fa-chevron-left"></i></span><span class="Ldisabled"><i class="fa fa-angle-left"></i></span>';

		    $links = "";
		    for ($i=0;$i<count($pages);$i++) {
		    	if ($pages[$i] == $this->currentPage) {
		    		$links .= '<span class="disabled">' . $pages[$i] . '</span>';
		    	}
		    	else {
		    		$links .= '<a class="enabled" href="?page='.$pages[$i]. $q . '">' . $pages[$i] . '</a>';
		    	}
		    }
		    
		    $nextlink = ($this->currentPage < $itemsPerPage) ? '<a class="Renabled" href="?page=' . ($this->currentPage + 1) . $q . '" title="Next page"><i class="fa fa-angle-right"></i></a><a class="Tenabled" href="?page=' . $itemsPerPage . $q . '" title="Last page"><i class="fa fa-chevron-right"></i></a>' : '<span class="Rdisabled"><i class="fa fa-angle-right"></i></span><span class="Tdisabled"><i class="fa fa-chevron-right"></i></span>';

		    $this->display = '<div id="paging"><p>'. $prevlink . $links . $nextlink. ' </p></div>';

    	}


}