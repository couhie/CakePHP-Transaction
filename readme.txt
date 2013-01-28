This plugin allows you to operate database transaction from controllers and models.

Usage:
Just unzip the archived folder and move it into app's plugin directory.

Add a line like this in your AppController or any controller where you like to use this feature.
var $components = array('Transaction.Transaction');

Add a line like this in your AppModel or any model where you like to use this feature.
var $actsAs = array('Transaction.Transaction');

To operate transaction in controllers, do this way.
$this->Transaction->begin();
$this->Transaction->rollback();
$this->Transaction->commit();

To operate transaction in models, do this way.
$this->begin();
$this->rollback();
$this->commit();
 