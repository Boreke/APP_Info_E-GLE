<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['page_title'] ?></title>
</head>
<?php 

        
        require "../app/controllers/header.php";
        $header= new Header();
        $header->displayHeader();

    ?>
<body>
    <h1 class="TITRE">FAQ</h1>


    <div id="faqList">
        <?php if (is_array($data['faqs']) && count($data['faqs']) > 0): ?>
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
    
</body>
<?= $this->view("footer")?>

</html>
