<?php
require_once('includes/include_dao.php');

$transaction = new Transaction();
$newitem = new Item();

$newitem->name = ($_POST['name']);
$newitem->vendor = ($_POST['vendor']);
$newitem->vendorpartno = ($_POST['vendorpartno']);
$newitem->type = ($_POST['type']);
$newitem->origin = ($_POST['origin']);
$newitem->cost = ($_POST['cost']);
$newitem->unit = ($_POST['unit']);
$newitem->quantity = ($_POST['quantity']);
$newitem->description = ($_POST['description']);

DAOFactory::getItemsDAO()->insert($newitem);

	//commit transaction
$transaction->commit();

echo 'generated id = '. $newitem->itemId .'<br/>';	



?>