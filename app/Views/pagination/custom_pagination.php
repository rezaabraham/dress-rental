<?php $pager->setSurroundCount(2) ?>

<nav aria-label="Pagination">
    <ul class="pagination justify-content-center">
        <!-- Tombol "Sebelumnya" -->
        <?php if ($pager->hasPrevious()) : ?>
            <li class="page-item">
                <a class="page-link" href="<?= $pager->getPrevious() ?>" aria-label="Sebelumnya">
                    <span aria-hidden="true">&laquo; Sebelumnya</span>
                </a>
            </li>
        <?php endif; ?>

        <!-- Link Halaman -->
        <?php foreach ($pager->links() as $link) : ?>
            <li class="page-item <?= $link['active'] ? 'active' : '' ?>">
                <a class="page-link" href="<?= $link['uri'] ?>">
                    <?= $link['title'] ?>
                </a>
            </li>
        <?php endforeach; ?>

        <!-- Tombol "Berikutnya" -->
        <?php if ($pager->hasNext()) : ?>
            <li class="page-item">
                <a class="page-link" href="<?= $pager->getNext() ?>" aria-label="Berikutnya">
                    <span aria-hidden="true">Berikutnya &raquo;</span>
                </a>
            </li>
        <?php endif; ?>
    </ul>
</nav>
