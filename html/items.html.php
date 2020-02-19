<h3>
    Bisher erstellte Bookmarks
</h3>
<table border="1">
    <tr>
        <th>Nr</th>
        <th>URL</th>
        <th>Notiz</th>
        <th>Löschen</th>
    </tr>
    <?php foreach ($items as $item) :?>
    <tr>

        <td><?= htmlspecialchars($item->getId())?></td>
        <td><a href="<?= htmlspecialchars($item->getUrl())?>"><?= htmlspecialchars($item->getUrl())?></a></td>
        <td><?= htmlspecialchars($item->getCode())?></td>
        <td><input type='button' name='deletebtn' value='x'></td><!-- <button name='deletebtn' value="< ?= htmlspecialchars($item->getId())?>">x</button>-->
    </tr>
    <?php endforeach;?>
</table>