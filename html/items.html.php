<h3>
    Bisher erstellte Bookmarks
</h3>
<table border="1">
    <tr>
        <th>Nr</th>
        <th>URL</th>
        <th>Notiz</th>
    </tr>
    <?php foreach ($items as $item) :?>
    <tr>

        <td><?= htmlspecialchars($item->getId())?></td>
        <td><a href="<?= htmlspecialchars($item->getUrl())?>"><?= htmlspecialchars($item->getUrl())?></a></td>
        <td><?= htmlspecialchars($item->getCode())?></td>

    </tr>
    <?php endforeach;?>
</table>
