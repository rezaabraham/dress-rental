<?php $pager->setSurroundCount(2) ?>

<nav aria-label="Pagination">
    <ul class="pagination pagination-circle mt-10">
        <!-- Tombol "Sebelumnya" -->
        <?php if ($pager->hasPrevious()) : ?>
            <li class="page-item">
                <a href="<?= $pager->getPrevious() ?>" class="page-link">
                    <i class="previous"></i>
                </a>
            </li>
        <?php endif; ?>

        <!-- Link Halaman -->
        <?php foreach ($pager->links() as $link) : ?>
            <li class="page-item <?= $link['active'] ? 'active' : '' ?>">
                <a href="<?= $link['uri'] ?>" class="page-link">
                    <?= $link['title'] ?>
                </a>
            </li>
        <?php endforeach; ?>

        <!-- Tombol "Berikutnya" -->
        <?php if ($pager->hasNext()) : ?>
            <li class="page-item next">
                <a href="<?= $pager->getNext() ?>" class="page-link">
                    <i class="next"></i>
                </a>
            </li>
        <?php endif; ?>
    </ul>
</nav>