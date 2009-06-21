<?php

chdir(dirname(__FILE__)); //change working dir to the script dir

require_once('../lib/lib.prnl.php');


$rawNetworkManager = new RawIPNetwork();
$rawNetworkManager->createIPSocket(PROT_IPv4, PROT_UDP);

while ($packet = $rawNetworkManager->readPacket()) {
	printf("%s:%u -> %s:%u L:%u TTL: %u IDS: %u OFS: %u\n", $packet->getSrcIP(), 0, $packet->getDstIP(), 0, $packet->getLength(), $packet->getTTL(), $packet->getIdSequence(), $packet->getOffset());
	$packet->dumpPacket();
}