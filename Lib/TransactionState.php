<?php
class TransactionState {
	static $transaction_level = 0;
	static $rolling_back = false;
	
	static function reset(){
		self::$transaction_level = 0;
		self::$rolling_back = false;
	}
}
