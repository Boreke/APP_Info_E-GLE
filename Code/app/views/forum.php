<!DOCTYPE html>
<html lang="en">

<?php 
    require "../app/controllers/header.php";
    $header= new Header();
    $header->displayHeader($data['page_title']);
?>

<body>
    <main>
    <h1 class="TITRE">FORUM</h1>
    <div id="PostList">
        <?php if (is_array($data['posts']) && count($data['posts']) > 0): ?>
            <?php foreach ($data['faqs'] as $faq): ?>
                <div class="faqItem">
                    <h2 class="question"><?= $faq->question ?></h2>
                    <p class="description"><?= $faq->answer ?></p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No FAQs found.</p>
        <?php endif; ?>
    </div>
    </main>  
</body>

<?= $this->view("footer")?>
</html>