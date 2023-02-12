<?php

require_once ('blocks_autoload.php');

use Blocks\SnippetBlock;

$snippet = new SnippetBlock();

echo $snippet->getOutput();
