<?php $this->layout('layout', ['title' => 'Messages de mon salon']);?>

<?php $this->start('main_content'); ?>

Contenu de mon salon !

<ol class= 'messages'>
<?php foreach ($messages as $message) : ?>

<li>
    <span class="personne"><?php echo $this->e($message['pseudo']); ?></span>
    <span class="message"><?php echo $this->e($message['corps']); ?></span>
</li>
</ol>
<?php endforeach; ?>
<?php $this->stop('main_content'); ?>
