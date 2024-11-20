<?php foreach ($notes as $note) : ?>
    <ul role="list" class="divide-y divide-gray-100">
        <li class="flex items-center justify-between gap-x-6 py-5">
            <a href="/note?id=<?= $note['link'] ?>" class="group">
                <div class="min-w-0">
                    <div class="flex items-start gap-x-3">
                        <p class="text-sm font-semibold leading-6 text-gray-900 group-hover:underline"><?= $note['title'] ?></p>
                    </div>
                    <div class="mt-1 flex items-center gap-x-2 text-xs leading-5 text-gray-500">
                        <p class="whitespace-nowrap"><time datetime="<?= $note['created_at'] ?>"><?= $note['created_at'] ?></time></p>
                    </div>
                </div>
            </a>
            <div class="flex flex-none items-center gap-x-4">
                <a href="#" class="rounded-md bg-white px-2.5 py-1.5 
            text-sm font-semibold text-gray-900 shadow-sm 
            ring-1 ring-inset ring-gray-300 hover:bg-gray-50 block">Edit</a>
                <a href="#" class="hidden rounded-md bg-white px-2.5 py-1.5 
            text-sm font-semibold text-gray-900 shadow-sm 
            ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:block">Delete</a>
                <a href="#" class="hidden rounded-md bg-white px-2.5 py-1.5 
            text-sm font-semibold text-gray-900 shadow-sm 
            ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:block">Archive</a>
            </div>
        </li>
    </ul>
<?php endforeach;

if (empty($notes)) {
    echo "<p class='text-center'>You dont have any notes.</p>";
}

?>