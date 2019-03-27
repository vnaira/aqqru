<?php render('_header',array('title'=>$title))?>

<ul data-role="listview" data-inset="true" data-theme="c" data-dividertheme="b">
    <li data-role="list-divider">Choose a product category</li>
    <?php render($goals) ?>
</ul>

<?php render('_footer')?>