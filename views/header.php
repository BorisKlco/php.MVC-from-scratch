<div>
    <nav class="bg-gray-800">
        <div class="mx-auto max-w-4xl px-4">
            <div class="flex h-16 items-center justify-between">
                <div class="flex items-center">
                    <div class="shrink-0">
                        <img class="size-8 rotate-6" src="/img/logo.png" alt="Your Company">
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <?php
                            $links = [
                                'Dashboard' => '/',
                                'Create' => 'create',
                                'Notes' => 'notes',
                                'Archive' => 'archive'
                            ];

                            foreach ($links as $key => $link) {
                                if (request()->isRoute($key)) {
                                    echo "<a href='{$link}' 
                                    class='rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white'>
                                    {$key}</a>";
                                } else {
                                    echo "<a href='{$link}' 
                                    class='rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white'>
                                    {$key}</a>";
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="ml-4 flex items-center gap-4 text-white">
                    <?php if (logged()) : ?>
                        <form action="/logout" method="POST">
                            <button type="submit" class="text-gray-300 hover:text-white">
                                Log out
                            </button>
                        </form>
                        <img class="size-8" src="img/profile.png" alt="">
                    <?php else : ?>
                        <a href="/login" class="text-gray-300 hover:text-white">Log in</a>
                        <a href="/register" class="text-gray-300 hover:text-white">Register</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>
</div>