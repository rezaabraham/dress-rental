<?php if ($pager->getPageCount() > 1): ?>
    <ul class="pagination pagination-circle mt-10">
        <!-- Previous Page Link -->
        <?php if ($pager->getPreviousPage()): ?>
            <li class="page-item previous">
                <a class="page-link" href="<?= $pager->getPreviousPage() ?>"><i class="previous"></i></a>
            </li>
        <?php else: ?>
            <li class="page-item previous disabled">
                <a class="page-link" href="#"><i class="previous"></i></a>
            </li>
        <?php endif; ?>

        <!-- Page Number Links -->
        <?php foreach ($pager->links() as $link): ?>
            <li class="page-item <?= $link['active'] ? 'active' : '' ?>">
                <a class="page-link" href="<?= $link['uri'] ?>"><?= $link['title'] ?></a>
            </li>
        <?php endforeach; ?>

        <!-- Next Page Link -->
        <?php if ($pager->getNextPage()): ?>
            <li class="page-item next">
                <a class="page-link" href="<?= $pager->getNextPage() ?>"><i class="next"></i></a>
            </li>
        <?php else: ?>
            <li class="page-item next disabled">
                <a class="page-link" href="#"><i class="next"></i></a>
            </li>
        <?php endif; ?>
    </ul>
<?php endif; ?>