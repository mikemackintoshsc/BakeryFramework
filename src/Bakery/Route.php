<?php

/*
 * This file is part of the Bakery framework.
 *
 * (c) Mike Mackintosh <mike@bakeryframework.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bakery;

use \Bakery\Interfaces\ControllerProviderInterface;

class Route{
	
	public
		$prefix, 
		$callback,
		$_routeName,
		$_domain,
		$_subdomain;
	
	private
		$_accessProtocol = array("http", "https"),
		$_accessMethods = array("get", "post");
	
	public function __construct( $prefix, $callback){
		
		$this->_routeName = md5(microtime());
		
		$this->prefix = $prefix;
		$this->callback = $callback;
	}
	
	public function method( $method ){
		$this->_accessMethods = explode("|", strtolower($method));
		
		return $this;
	}
	
	public function requireHttps(){
		$this->_accessProtocol = array('https');
		
		return $this;
	}
	
	public function requireHttp(){
		$this->_accessProtocol = array('http');
		
		return $this;
	}

	public function regex( $variable, $pattern){
		$this->_uriPattern[$variable] = $pattern;
	
		return $this;
	}
	
	public function domain( $variable ){
		$this->_domain = $variable;
	
		return $this;
	}

	public function subdomain( $variable){
		$this->_subdomain = $variable;
	
		return $this;
	}	
	public function bind( $name ){
		$this->_routeName = $name;
	}
	
	
	/*
	 * @TODO: Finish implementing verification methods
	 */

	public function getMethod(){
		return $this->_accessMethods;
	}

	public function getDomain(){
		return $this->_domain;
	}

	public function getSubdomain(){
		return $this->_subdomain;
	}

	public function allowGet(){
		return in_array( "get", $this->_accessMethods );
	}

	public function allowPost(){
		return in_array( "post", $this->_accessMethods );
	}
}