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
    <?= $this->Html->css('normalize.min.css'); ?>
    <?= $this->Html->css('milligram.min.css'); ?>
    <?= $this->Html->css('home.css'); ?>
    <?= $this->fetch('css'); ?>
    <?= $this->fetch('headjs'); ?>
</head>
<body>
<main>
    <div class="home">
        <section class="section">
            <div class="container">
                <p style="padding: 1em;">
                    Welcome to Cupcake!
                </p>
                <p style="padding: 1em;">
                    Flavoured CakePHP application in a Cupcake :)
                </p>
                <p style="padding: 1em;">
                    <?= $this->Html->link('View CakePHP Startpage',
                        ['controller' => 'Pages', 'action' => 'display', 'cake'],
                        ['class' => 'button']
                    ); ?>
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
