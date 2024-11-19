<div class="flex min-h-full flex-col justify-center px-6 py-8">
    <div class="mx-auto w-full max-w-sm">
        <img class="mx-auto h-10 w-auto" src="/img/logo.png" alt="Light">
        <h2 class="mt-8 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Create a new account</h2>
    </div>

    <div class="mt-8 mx-auto w-full max-w-sm">
        <form class="space-y-4" action="<?= getRoute('post-register') ?>" method="POST">
            <div>
                <label for="email" class="block text-sm/6 font-medium text-gray-900">Email address</label>
                <div class="mt-2">
                    <input id="email" name="email" type="email" autocomplete="email" required
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm 
                    ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 
                    focus:ring-2 focus:ring-inset focus:ring-sky-400">
                    <?php if ($error['email'] ?? false) : ?>
                        <span class="text-sm text-red-600 px-2"><?= $error['email'] ?></span>
                    <?php endif ?>
                </div>
            </div>

            <div>
                <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>
                <div class="mt-2">
                    <input id="password" name="password" type="password" autocomplete="current-password" required
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm 
                    ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 
                    focus:ring-2 focus:ring-inset focus:ring-sky-400">
                    <?php if ($error['password'] ?? false) : ?>
                        <span class="text-sm text-red-600 px-2"><?= $error['password'] ?></span>
                    <?php endif ?>
                </div>
            </div>

            <div>
                <button type="submit"
                    class="flex w-full justify-center rounded-md bg-gray-600 px-3 py-1.5 
                text-sm/6 font-semibold text-white shadow-sm 
                hover:bg-gray-900 focus-visible:outline 
                focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-400">Sign in</button>
            </div>
        </form>
    </div>
</div>