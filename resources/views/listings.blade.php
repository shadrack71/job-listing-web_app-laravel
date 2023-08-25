<h1> <?php  ?></h1>
<?php foreach($listings as $listing ): ?>

<h2>
    <a href="listing/<?php echo $listing['id'];?>"><?php echo $listing['title'];?></a>
</h2>
<p> <?php echo $listing['description'];?></p>

<?php endforeach; ?>