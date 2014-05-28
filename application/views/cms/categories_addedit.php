<?= $_header ?>
<?= form_open( current_url(), 'class="form" id="category-form"' ) ?>
<?php if ( !empty( $data->id ) ): ?>
    <?= form_hidden( 'id', $data->id ) ?>
<?php endif; ?>
    <div class = "form-control row">
        <p class = "large-10 large-offset-2 columns response"></p>
    </div>
    <div class = "form-control row">
        <div class = "large-2 columns">
            <?= form_label( 'Name:', '', array( 'class' => 'right inline' ) ) ?>
        </div>
        <div class = "large-10 columns">
            <?= form_input( 'data[name]', ( !empty( $data->name ) ? $data->name : '' ), 'class="required"' ) ?>
        </div>
    </div>
    <div class = "form-control row">
        <div class = "large-2 columns">
            <?= form_label( 'Alias:', '', array( 'class' => 'right inline' ) ) ?>
        </div>
        <div class = "large-10 columns">
            <?= form_input( 'data[alias]', ( !empty( $data->alias ) ? $data->alias : '' ), 'class="required"' ) ?>
        </div>
    </div>
    <div class = "form-control row">
        <div class = "large-2 columns">
            <?= form_label( 'Parent:', '', array( 'class' => 'right inline' ) ) ?>
        </div>
        <div class = "large-10 columns">
            <?php foreach ( $parent_categories as $pc ): ?>
                <label><?= form_radio( 'data[refparent]', $pc->id, ( !empty( $data->refparent ) AND $data->refparent == $pc->id ? TRUE : FALSE ) ) ?>
                    &nbsp;&nbsp;<?= $pc->name ?></label>
                <?php if ( !empty( $subcategories[$pc->id] ) ): ?>
                    <?php foreach ( $subcategories[$pc->id] as $sc ): ?>
                        <label style="margin-left: 20px;"><?= form_radio( 'data[refparent]', $sc->id, ( !empty( $data->refparent ) AND $data->refparent == $sc->id ? TRUE : FALSE ) ) ?>
                            &nbsp;&nbsp;<?= $sc->name ?></label>
                    <?php endforeach; ?>
                <?php endif; ?>
            <?php endforeach; ?>
            <label><?= form_radio( 'data[refparent]', '', empty( $data->refparent ) ? TRUE : FALSE ) ?>
                &nbsp;&nbsp;None</label>
        </div>
    </div>
    <div class = "form-control row">
        <div class = "large-12 columns text-right">
            <?= form_submit( '', 'Submit', 'class="button"' ) ?>
        </div>
    </div>
<?= form_close() ?>
<?= $_footer ?>