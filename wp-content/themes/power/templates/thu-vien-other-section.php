<div role="tabpanel" class="tab-pane active" id="images">
    <section class="other-information">

        <div class="other-container ">

            <div class="other-content hover-zoom">

                <?php foreach ($other_info as $value) : ?>

                    <a href="<?php echo $value['link']; ?>" class="hydro-electric-news" style="background-image:url('<?php echo $value['image']; ?>')"><span class="text"><?php echo $value['text']; ?></span> </a>

                <?php endforeach; ?>

            </div>

        </div>

    </section>
</div>