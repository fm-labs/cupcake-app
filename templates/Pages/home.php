<?php
/**
 * @var \Cake\View\View $this
 * @var \Cupcake\View\Helper\MenuHelper $Menu
 * @var \Cupcake\View\Helper\AssetCacheHelper $GoogleFonts
 */
declare(strict_types=1);

$this->disableAutoLayout();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>cupcake-app</title>
    <?= $this->Html->css('home.css'); ?>
    <?= $this->fetch('css'); ?>
    <?= $this->fetch('headjs'); ?>
</head>
<body>
<main>
    <div class="home">
        <section class="section">
            <div class="container">
                <?= $this->Html->image('flowmotion.png', ['alt' => 'fm-labs logo']); ?>
                <p style="padding: 1em;">
                    Hello, Cupcake!
                </p>
            </div>
        </section>
    </div>
</main>
<footer id="footer">
</footer>
<?= $this->fetch('script'); ?>
</body>
</html>
