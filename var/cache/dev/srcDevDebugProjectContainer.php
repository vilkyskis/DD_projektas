<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerFZBFxfD\srcDevDebugProjectContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerFZBFxfD/srcDevDebugProjectContainer.php') {
    touch(__DIR__.'/ContainerFZBFxfD.legacy');

    return;
}

if (!\class_exists(srcDevDebugProjectContainer::class, false)) {
    \class_alias(\ContainerFZBFxfD\srcDevDebugProjectContainer::class, srcDevDebugProjectContainer::class, false);
}

return new \ContainerFZBFxfD\srcDevDebugProjectContainer(array(
    'container.build_hash' => 'FZBFxfD',
    'container.build_id' => '971fc305',
    'container.build_time' => 1523813275,
), __DIR__.\DIRECTORY_SEPARATOR.'ContainerFZBFxfD');
