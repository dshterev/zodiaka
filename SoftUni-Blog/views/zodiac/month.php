

<main>
    <?php foreach($this->monthZodiacs as $monthZodiac) : ?>
        <h1><?= htmlentities($monthZodiac['zodiac_sign']) ?></h1>
        <p><?= $monthZodiac['content']?></p>
    <?php endforeach ?>
</main>