<div class="container">
    <div class="row justify-content--center">
        <?php foreach ($args['cards'] as $index => $card) : ?>

            <div class="twitter-card mb-2 mb-lg-0  col-12 col-lg-5 <?php echo ($index + 1) % 2 !== 0 ? 'offset-lg-1' : ''; ?> ">

                <div class="wrap pv-2 ph-2 card-rounded">
                    <div class="info df">
                        <div class="avatar">
                            <?php media_output($card['image'], 'full', array('class' => 'card-rounded bg-media')); ?>
                        </div>
                        <div class="name">
                            <p><strong><?php echo $card['name']; ?></strong></p>
                            <p><?php echo $card['title']; ?></p>
                        </div>
                    </div>

                    <div class="content mt-2">
                        <h3>
                            <?php echo $card['content']; ?>
                        </h3>
                    </div>
                </div>

            </div>

        <?php endforeach; ?>
    </div>
</div>