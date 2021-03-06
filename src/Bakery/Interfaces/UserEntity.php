<?php

/*
 * This file is part of the Bakery framework.
 *
 * (c) Mike Mackintosh <mike@bakeryframework.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bakery\Interfaces;

use \Bakery\Application;
use \Bakery\Provider\ArrayAccessProvider;

/**
 * @author Mike Mackintosh <mike@bakeryframework.com>
 *
 */
interface UserEntity{

	
	public function __construct(Application $app );
	
	/**
	 * 
	 */
	public function saveOrUpdate();
}

?>