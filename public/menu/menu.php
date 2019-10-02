<?php $parent = isset($category['childs']); ?>
<li>
    <a href="category/<?= $category['alias'] ?>"><?= $category['title'] ?></a>
    <?php if( isset($category['childs']) ) : ?>
        <ul class="<?= $this->class_child; ?>">
            <?= $this->getMenuHTML($category['childs']); ?>
        </ul>    
    <?php endif; ?>
</li>