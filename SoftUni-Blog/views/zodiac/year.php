
<main>
    <?php foreach($this->yearZodiacs as $yearZodiac) : ?>
        <h1><?= htmlentities($yearZodiac['zodiac_sign']) ?></h1>
        <p>
            <i>Posted on:</i>
            <?= htmlentities($yearZodiac['date']) ?>

        </p>
        <p><?= $yearZodiac['content']?></p>
    <?php endforeach ?>
</main>