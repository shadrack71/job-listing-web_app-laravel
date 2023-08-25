<h1> <?php  ?></h1>
<?php foreach($values as $value ): ?>

<h1> <?php echo $value['id'];?></h1>
<p> <?php echo $value['description'];?></p>

<?php endforeach; ?>