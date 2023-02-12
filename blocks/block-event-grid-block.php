<?php

use Blocks\EventGridBlock;

require_once ('blocks_autoload.php');

$gridBlock = new EventGridBlock();

echo $gridBlock->getOutput();
