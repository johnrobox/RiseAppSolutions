<?php

/*
* BootstrapAlert
* Author : Robert
* DAte : November 15, 2016
*/
class BootstrapAlert {

	public function __construct(){

	}

	/*
	* success - bootstrap alert success
	* @params $message - alert message
	* @return message
	*/
	public function success($message) {
		return $this->layout('success', $message);
	}

	/*
	* info - bootstrap alert success
	* @params $message - alert message
	* @return message
	*/
	public function info($message) {
		return $this->layout('info', $message);
	}

	/*
	* warning - bootstrap alert success
	* @params $message - alert message
	* @return message
	*/
	public function warning($message) {
		return $this->layout('warning', $message);
	}

	/*
	* danger - bootstrap alert success
	* @params $message - alert message
	* @return message
	*/
	public function danger($message) {
		return $this->layout('danger', $message);
	}

	/*
	* layout - construct the bootstrap alert
	* @params $contextualclass - bootstrap alert class
	* 		  $message - alert message
	* @return message
	*/
	private function layout($contextualClass, $message) {
		return '<div class="alert alert-'.$contextualClass.' alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button>'.$message.'</div>';
	}

}