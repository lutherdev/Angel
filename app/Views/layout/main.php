<?= $this->include('include/head') ?>
<div class="flex min-h-screen">
    <?= $this->include('include/navbar') ?>
 
    <div class="flex-1">
        <?= $this->renderSection('content') ?>
    </div>
</div>
