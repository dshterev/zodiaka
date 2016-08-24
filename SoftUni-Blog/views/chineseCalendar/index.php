
<main>
    <form name="filterZodiacs" method="get">
        <select name="zodiacs" >
            <option value="all" selected>Избери своят зодиакален знак</option>
            <option value="rat">Плъх</option>
            <option value="ox">Бик</option>
            <option value="tiger">Тигър</option>
            <option value="rabbit">Заек</option>
            <option value="dragon">Дракон</option>
            <option value="snake">Змия</option>
            <option value="horse">Кон</option>
            <option value="goat">Овца</option>
            <option value="monkey">Маймуна</option>
            <option value="rooster">Петел</option>
            <option value="dog">Куче</option>
            <option value="pig">Глиган</option>
        </select>
        <input type="submit" value="Покажи тази зодия">
    </form>

    <?php foreach($this->chinese_zodiacs as $zodiac) : ?>
        <h1><?= htmlentities($zodiac['zodiac_sign']) ?></h1>
        <p>
            <i>Posted on:</i>
            <?= htmlentities($zodiac['date']) ?>

        </p>
        <p><?= $zodiac['content']?></p>

    <?php endforeach ?>
</main>