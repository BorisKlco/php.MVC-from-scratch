<?php
function placeholder()
{
    $placeholder = [
        "I need to remember this before I forget... again.",
        "Don’t forget to feed the cat... or is it the dog?",
        "Pick up milk, eggs, and… what was the third thing?",
        "Reminder: I’m totally going to nail this task!",
        "Call Mom before she calls me first.",
        "I really hope Future Me reads this in time.",
        "Water the plants… unless they’re fake.",
        "Finish the thing I started… whenever that was.",
        "Buy that thing I said I wouldn’t forget to buy.",
        "Meeting at 3 PM! Wait… or was it 2 PM?",
        "Write something here so it looks like I’m busy."
    ];
    return $placeholder[array_rand($placeholder)];
}
?>
<form action="<?= getRoute('Create') ?>" method="POST" class="relative">
    <?= csrf() ?>
    <div class="overflow-hidden rounded-lg border border-gray-300 shadow-sm 
    focus-within:border-sky-500 focus-within:ring-1 focus-within:ring-sky-500">
        <input type="text" name="title" id="title" class="block w-full border-0 pt-2.5 text-lg font-medium 
        placeholder:text-gray-400 focus:ring-0" placeholder="Title">
        <textarea rows="2" name="description" id="description" class="block w-full resize-none border-0 py-0 text-gray-900 
        placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="<?= placeholder() ?>"></textarea>
        <!-- Spacer element to match the height of the toolbar -->
        <div aria-hidden="true">
            <div class="py-2">
                <div class="h-9"></div>
            </div>
            <div class="h-px"></div>
            <div class="py-2">
                <div class="py-px">
                    <div class="h-9"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="absolute inset-x-px bottom-0">
        <div class="flex items-center justify-between space-x-3 border-t border-gray-200 px-2 py-2 sm:px-3">
            <div class="flex">
                <button type="button" class="group -my-2 -ml-2 inline-flex items-center rounded-full px-3 py-2 text-left text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7.217 10.907a2.25 2.25 0 1 0 0 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186 9.566-5.314m-9.566 7.5 9.566 5.314m0 0a2.25 2.25 0 1 0 3.935 2.186 2.25 2.25 0 0 0-3.935-2.186Zm0-12.814a2.25 2.25 0 1 0 3.933-2.185 2.25 2.25 0 0 0-3.933 2.185Z" />
                    </svg>
                </button>
            </div>
            <div class="flex-shrink-0">
                <button type="submit" class="inline-flex items-center rounded-md bg-sky-400 
                px-3 py-2 text-sm font-semibold text-white shadow-sm 
                hover:bg-sky-500 focus-visible:outline focus-visible:outline-2 
                focus-visible:outline-offset-2 focus-visible:outline-sky-600">Create</button>
            </div>
        </div>
    </div>
</form>