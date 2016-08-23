<main>
    <table>
        <tr>
            <th>ID</th>
            <th>Content</th>
            <th>Date</th>
            <th>Zodiac Sign</th>
            <th>Actions</th>
        </tr>
<?php foreach($this->chinese_zodiacs as $zodiac) : ?>
    <tr>
        <td><?= htmlspecialchars($zodiac['id']) ?></td>
        <td><?=cutLongText($zodiac['content']) ?></td>
        <td><?=htmlspecialchars($zodiac['date']) ?></td>
        <td><?=htmlspecialchars($zodiac['zodiac_sign']) ?></td>
        <td>
            <a href="<?=APP_ROOT?>/posts/edit/<?=htmlspecialchars($zodiac['id']) ?>"> [EDIT] </a>
            <a href="<?=APP_ROOT?>/posts/delete/<?=htmlspecialchars($zodiac['id']) ?>"> [DELETE] </a>
        </td>
    </tr>
<?php endforeach ?>
    </table>
</main>
