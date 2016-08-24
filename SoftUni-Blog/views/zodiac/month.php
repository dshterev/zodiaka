

<main>
    <?php foreach($this->monthZodiacs as $monthZodiac) : ?>
        <h1><?= htmlentities($monthZodiac['zodiac_sign']) ?></h1>
        <p>
            <i>Posted on:</i>
            <?= htmlentities($monthZodiac['date']) ?>

        </p>
        <p><?= $monthZodiac['content']?></p>
    <?php endforeach ?>
</main>