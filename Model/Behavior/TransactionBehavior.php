<?php
App::import('Lib', 'Transaction.TransactionState');
class TransactionBehavior extends ModelBehavior {
	var $transaction_begun = false;
	
	function begin($model){
		if(TransactionState::$transaction_level == 0){
			$db = $model->getDataSource();
			$db->begin($this);
		}
		TransactionState::$transaction_level++;
	}
	function rollback($model){
		if(TransactionState::$transaction_level == 0){
			return;
		}elseif(TransactionState::$transaction_level == 1){
			$db = $model->getDataSource();
			$db->rollback($this);
			TransactionState::reset();
		}else{
			TransactionState::$rolling_back = true;
			TransactionState::$transaction_level--;
		}
	}
	function commit($model){
		if(TransactionState::$transaction_level == 0){
			return;
		}elseif(TransactionState::$transaction_level == 1){
			$db = $model->getDataSource();
			if(TransactionState::$rolling_back){
				$db->rollback($this);
			}else{
				$db->commit($this);
			}
			TransactionState::reset();
		}else{
			TransactionState::$transaction_level--;
		}
	}
}
