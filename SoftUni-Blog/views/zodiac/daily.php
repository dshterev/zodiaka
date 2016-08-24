

<main>
    <?php foreach($this->dailyZodiacs as $dailyZodiac) : ?>
        <h1><?= htmlentities($dailyZodiac['zodiac_sign']) ?></h1>
        <p>
            <i>Posted on:</i>
            <?= htmlentities($dailyZodiac['date']) ?>

        </p>
        <p><?= $dailyZodiac['content']?></p>
    <?php endforeach ?>
</main>