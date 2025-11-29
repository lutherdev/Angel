<?= $this->include('include/head') ?>
<div class="flex min-h-screen w-full m-0 p-0 overflow-x-hidden">
    <?= $this->include('include/navbar') ?>
    <div class="flex-1 min-w-0">
        <?= $this->renderSection('content') ?>
    </div>
</div>
