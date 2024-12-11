<template>
    <div>
        <header class="bg-green-500 text-white ">
            <nav class="flex item-center justify-between p-4 mx-auto">
                <div>
                    <a href="/">Home</a>
                    <a href="/about">About</a>
                </div>
            </nav>
        </header>
        <main class="p-4">
            <slot/>
        </main>
    </div>
</template>