<?php
namespace Drupal\sample\scripts;

use Drupal\node\Entity\Node;

echo 'Begin sampleNde.php\n';

$p = [];
$p['type'] = 'forum';
$p['taxonomy_forums'] = 2;
$p['title'] = 'It must be successful...';

$node = Node::create( $p );
$node->save();