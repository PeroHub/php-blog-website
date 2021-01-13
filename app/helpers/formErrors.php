<?php if(count($error) > 0): ?>
    <div class="msg error">
    <?php foreach ($error as $erro): ?>
        <li><?php echo $erro ?></li>
    <?php endforeach; ?>
    </div>
<?php endif;?>