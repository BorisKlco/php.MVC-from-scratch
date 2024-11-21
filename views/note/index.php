<?php
$notes = array_filter($notes, function ($item) {
    return $item['archived'] ? 0 : 1;
});

if (empty($notes)) {
    echo "<p class='text-center'>You dont have any notes.</p>";
}
?>
<?php foreach ($notes as $note) : ?>
    <ul role="list" class="divide-y divide-gray-100">
        <li class="flex items-center justify-between gap-x-6 py-5">
            <a href="/note?id=<?= $note['link'] ?>" class="group">
                <div class="min-w-0">
                    <div class="flex items-start gap-x-3">
                        <p class="text-sm font-semibold leading-6 text-gray-900 group-hover:underline"><?= $note['title'] ?></p>
                    </div>
                    <div class="mt-1 flex items-center gap-x-2 text-xs leading-5 text-gray-500">
                        <p class="whitespace-nowrap"><time datetime="<?= $note['created_at'] ?>"><?= formatDate($note['created_at']) ?></time></p>
                    </div>
                </div>
            </a>
            <div class="flex flex-none items-center gap-x-4">
                <a href="<?= getRoute('Edit') . '?id=' . $note['link'] ?>" class="rounded-md bg-white px-2.5 py-1.5 
            text-sm font-semibold text-gray-900 shadow-sm 
            ring-1 ring-inset ring-gray-300 hover:bg-gray-50 block">Edit</a>
                <form action="<?= getRoute('Remove') ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete this note?');">
                    <?= csrf() ?>
                    <button type="submit" name="id" value="<?= $note['link'] ?>"
                        class="hidden rounded-md bg-white px-2.5 py-1.5 
                text-sm font-semibold text-gray-900 shadow-sm 
                ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:block">Delete</button>
                </form>
                <form action="<?= getRoute('Archive') ?>" method="POST">
                    <?= csrf() ?>
                    <button type="submit" name="id" value="<?= $note['link'] ?>"
                        class="hidden rounded-md bg-white px-2.5 py-1.5 
                text-sm font-semibold text-gray-900 shadow-sm 
                ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:block">Archive</button>
                </form>
            </div>
        </li>
    </ul>
<?php endforeach; ?>