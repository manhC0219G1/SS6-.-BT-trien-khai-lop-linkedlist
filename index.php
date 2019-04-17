<?php
include_once 'LinkList.php';
include_once "Node.php";

$linkedList = new LinkList();

$linkedList->insertFirst(11);
$linkedList->insertFirst(22);
$linkedList->insertLast(33);
$linkedList->insertLast(44);
$linkData = $linkedList->readList();
echo $totalNodes;
print_r( $linkData);
$linkedList->add(3,1111);
print_r($linkedList->readList());
