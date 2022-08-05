<?php

class Fabfunc {

	public function __construct() {
		file_put_contents( FABFUNC_PLUGIN_DIR . 'log.txt', "Work!\n", FILE_APPEND );
	}

}
