<?php if ( !empty( $subcategories ) ): ?>
    <?php
    $order = array();
    for($i=-15;$i<=15;$i++)
        $order[$i] = $i;
    ?>
    <tr class = "category-collapse-<?= $subcategories[ 0 ]->refparent?>" id = "subcategory-collapse-<?= $subcategories[ 0 ]->refparent ?>">
        <td colspan = "6">
            <table class = "fullsize">
                <?php foreach ( $subcategories as $j => $subcategory ): ?>
                    <tr id="category-collapse-<?= $subcategory->id ?>">
                        <td>
                            <a href = "/cms/categories/getSubcategories?id=<?= $subcategory->id ?>" class = "category-collapse"><?= $subcategory->name ?></a>
                        </td>
                        <td width="100"><?=form_checkbox('', '1', $subcategory->published == 1 ? TRUE : FALSE,'onclick="publish('.$subcategory->id.', '.($subcategory->published == 1 ? 0 : 1).')"')?></td>
                        <td width="100"><?=form_dropdown('', $order, $subcategory->order,'onchange="order(this, '.$subcategory->id.')"')?></td>
                        <td width = "150"><?= anchor( '/cms/categories/edit?id=' . $subcategory->id, 'edit', 'class="button nomargin"' ) ?>
                            <?= anchor( '/cms/categories/delete?id=' . $subcategory->id, 'delete', 'class="button nomargin"' ) ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </td>
    </tr>
<?php endif; ?>