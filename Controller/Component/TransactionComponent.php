<?php
class TransactionComponent extends Object {

	private $controller;

	public function startup($controller){
		$controller->loadModel('Transaction.Transact');
		$this->controller = $controller;
	}

	public function begin(){
		return $this->controller->Transact->begin();
	}

	public function rollback(){
		return $this->controller->Transact->rollback();
	}

	public function commit(){
		return $this->controller->Transact->commit();
	}

	function initialize(&$controller) {
	}

	function beforeRender(&$controller) {
	}

	function beforeRedirect(&$controller) {
	}

	function shutdown(&$controller) {
	}

}
