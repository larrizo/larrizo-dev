<?= $_header ?>
    <a href = "/cms/categories/add" class = "button">Add category</a>
    <table class = "fullsize" id="category-table">
        <thead>
        <tr>
            <th width = "10">#</th>
            <th width = "10">ID</th>
            <th>Name</th>
            <th width="100">Published</th>
            <th width="100">Order</th>
            <th width = "150">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $order = array();
        for($i=-15;$i<=15;$i++)
            $order[$i] = $i;
        ?>
        <?php foreach ( $categories as $i => $category ): ?>
            <tr id="category-collapse-<?= $category->id ?>">
                <td><?= $i + 1 ?></td>
                <td><?= $category->id ?></td>
                <td><a href = "/cms/categories/getSubcategories?id=<?= $category->id ?>" class = "category-collapse"><?= $category->name ?></a></td>
                <td><?=form_checkbox('', '1', $category->published == 1 ? TRUE : FALSE,'onclick="publish('.$category->id.', '.($category->published == 1 ? 0 : 1).')"')?></td>
                <td><?=form_dropdown('', $order, $category->order,'onchange="order(this, '.$category->id.')"')?></td>
                <td><?= anchor( '/cms/categories/edit?id=' . $category->id, 'edit', 'class="button nomargin"' ) ?>
                    <?= anchor( '/cms/categories/delete?id=' . $category->id, 'delete', 'class="button nomargin"' ) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?= $_footer ?>