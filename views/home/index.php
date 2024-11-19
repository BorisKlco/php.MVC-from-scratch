<div class="relative isolate px-6 pt-8">
    <div class="absolute inset-x-0 -top-10 -z-10 transform-gpu overflow-hidden blur-3xl">
        <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#7e22ce] to-[#14b8a6] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
    </div>
    <div class="mx-auto max-w-2xl">
        <div class="mb-8 flex justify-center">
            <div class="relative rounded-md px-3 py-1 text-gray-600 ring-1 ring-gray-900/10 hover:ring-gray-900/20">
                <a href="https://github.com/BorisKlco/php.light-framework" target="_blank" class="font-semibold text-indigo-600">
                    <span class="inline-flex items-center gap-2 py-1 px-2">
                        <svg fill="currentColor" viewBox="0 0 24 24" aria-hidden="true" class="size-5">
                            <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"></path>
                        </svg>
                        Github
                    </span>
                </a>
            </div>
        </div>
        <div class="text-center">
            <h1 class="text-balance text-5xl font-semibold tracking-tight text-gray-900 sm:text-6xl">Light</h1>
            <p class="mt-8 text-pretty text-lg font-medium text-gray-500">A simple MVC framework inspired by Laravel.</p>
            <p class="text-pretty text-lg font-medium text-gray-500">Built as a learning project in my free time.</p>
        </div>
        <div class="mt-10">
            <h3 class="text-sm font-medium text-gray-900">Highlights</h3>

            <div class="mt-4">
                <ul role="list" class="list-disc space-y-2 pl-4 text-sm">
                    <li class="text-gray-400"><span class="text-gray-600">SQLite Database support.</span></li>
                    <li class="text-gray-400"><span class="text-gray-600">Routing: Supports both controller actions and directly rendering views with functions.</span></li>
                    <li class="text-gray-400"><span class="text-gray-600">Middleware: Easily implement middleware for request handling.</span></li>
                    <li class="text-gray-400"><span class="text-gray-600">Helper Functions</span></li>
                </ul>
            </div>

            <div class="bg-gray-900 text-gray-300 hover:text-white px-3 rounded-lg shadow-lg mt-4 transition-all">
                <pre class="overflow-x-auto whitespace-pre-wrap">
                    <code class="block text-sm">App::get('/', [Home::class, 'index'])
    ->name('home');

App::post('/user', function () {
    $id = request()->get('id');
    $user = Database::query('SELECT * FROM users WHERE id = ?', [$id])->fetchAll();
    View::show('users', [
        'title' => 'User',
        'data' => $user
    ]);
})->only('auth')->name('user');</code>
                </pre>
            </div>
        </div>
    </div>
</div>